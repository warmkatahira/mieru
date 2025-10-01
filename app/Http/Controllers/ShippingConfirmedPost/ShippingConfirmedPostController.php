<?php

namespace App\Http\Controllers\ShippingConfirmedPost;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// モデル
use App\Models\Customer;
use App\Models\Progress;
use App\Models\ProgressHistory;
// その他
use Carbon\CarbonImmutable;
// 列挙
use App\Enums\PCNameEnum;

class ShippingConfirmedPostController extends Controller
{
    public function post(Request $request)
    {
        // 許可されているPC名であるか確認
        $post_enter = PCNameEnum::checkExclusionPCName($request->pc_name);
        // 問題なければ実施
        if($post_enter){
            // 指定した荷主の出荷確定日時を更新
            Customer::where('customer_code', $request->customer_code)->update([
                'shipping_confirmed_at' => CarbonImmutable::now(),
            ]);
            // 進捗履歴テーブルに追加する情報を取得
            $progresses = Progress::where('customer_code', $request->customer_code)
                            ->join('items', 'items.item_code', 'progresses.item_code')
                            ->where('is_progress_history_add', 1)
                            ->get();
            // 進捗の分だけループ処理
            foreach($progresses as $progress){
                // 追加する進捗に対応する出荷検品残数があればマイナスする(途中で締める荷主対策　ウエニなど)
                $inspection_incomplete_progress_value = 0;
                $inspection_incomplete = Progress::where('customer_code', $request->customer_code)->where('item_code', 'inspection_incomplete_'.$progress->item_code)->first();
                if($inspection_incomplete){
                    $inspection_incomplete_progress_value = $inspection_incomplete->progress_value;
                }
                // レコードを追加
                ProgressHistory::create([
                    'date' => CarbonImmutable::now()->format('Y-m-d'),
                    'customer_code' => $request->customer_code,
                    'item_code' => $progress->item_code,
                    'progress_value' => $progress->progress_value - $inspection_incomplete_progress_value,
                ]);
            }
        }
        return response()->json([
            "message" => 'OK',
        ], 201);
    }
}
