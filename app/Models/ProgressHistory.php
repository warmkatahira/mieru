<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgressHistory extends Model
{
    use HasFactory;
    // テーブル名を定義
    protected $table = 'progress_histories';
    // 主キーカラムを変更
    protected $primaryKey = 'progress_history_id';
    // 操作可能なカラムを定義
    protected $fillable = [
        'date',
        'customer_code',
        'item_code',
        'progress_value',
    ];
    // ダウンロード時のヘッダーを定義
    public static function downloadHeader()
    {
        return [
            '日付',
            '時間',
            '拠点名',
            '荷主名',
            '項目名(単位)',
            '数量',
        ];
    }
    // itemテーブルとのリレーション
    public function item()
    {
        return $this->belongsTo(Item::class, 'item_code', 'item_code');
    }
    // customersとのリレーション
    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_code', 'customer_code');
    }
}
