<div class="flex items-center justify-between mb-2">
    <p class="flex items-center gap-2 text-base text-gray-800">
        <span class="flex h-8 w-8 items-center justify-center rounded-lg bg-theme-main text-white"><i class="las la-user-friends la-lg"></i></span>
        出勤中人数
    </p>
    <p class="text-sm text-gray-600">合計<span class="text-xl text-theme-main ml-2">{{ collect($workingInfo)->sum(fn($info) => $info['社員'] + $info['パート']) }}</span><span class="text-xs ml-1">人</span></p>
</div>
<div class="grid grid-cols-3 md:grid-cols-4 xl:grid-cols-8 gap-3 mb-3">
    @foreach($workingInfo as $info)
        <div class="bg-white rounded-xl border border-gray-200 shadow-sm p-3">
            <div class="flex items-baseline justify-between">
                <p class="text-sm text-gray-600">{{ $info['拠点'] }}</p>
                <p class="text-2xl text-theme-main">{{ $info['社員'] + $info['パート'] }}<span class="text-xs text-gray-500 ml-1">人</span></p>
            </div>
            <div class="mt-2 pt-2 border-t border-gray-100 space-y-1 text-xs text-gray-500">
                <div class="flex justify-between">
                    <span>社員</span>
                    <span class="text-gray-800">{{ $info['社員'] }}人</span>
                </div>
                <div class="flex justify-between">
                    <span>パート</span>
                    <span class="text-gray-800">{{ $info['パート'] }}人</span>
                </div>
            </div>
        </div>
    @endforeach
</div>
