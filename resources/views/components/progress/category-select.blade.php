@vite(['resources/js/progress/category_select.js'])

@php
    $tabs = [
        ['route' => 'progress.customer', 'icon' => 'la-user', 'label' => '荷主'],
        ['route' => 'progress.base', 'icon' => 'la-warehouse', 'label' => '拠点'],
        ['route' => 'progress.tag', 'icon' => 'la-tag', 'label' => 'タグ'],
    ];
@endphp

<div class="flex flex-col xl:flex-row xl:items-center xl:justify-between gap-3 mb-5">
    <!-- 表示単位の切り替え -->
    <div class="flex rounded-xl bg-white border border-gray-200 shadow-sm p-1 xl:w-96">
        @foreach($tabs as $tab)
            <a href="{{ route($tab['route']) }}" class="flex-1 rounded-lg py-2 text-center text-sm transition {{ request()->routeIs($tab['route']) ? 'bg-theme-main text-white shadow-sm' : 'text-gray-600 hover:bg-theme-sub/40' }}"><i class="las {{ $tab['icon'] }} la-lg mr-1"></i>{{ $tab['label'] }}</a>
        @endforeach
    </div>
    @if($bases)
        <!-- 拠点選択 -->
        <form method="GET" action="{{ route('progress.customer') }}" class="m-0 xl:w-64" id="base_select_form">
            <label for="search_base_id" class="sr-only">拠点選択</label>
            <div class="relative">
                <i class="las la-warehouse la-lg absolute left-3 top-1/2 -translate-y-1/2 text-theme-main pointer-events-none"></i>
                <select id="search_base_id" name="search_base_id" class="block w-full rounded-xl border-gray-200 bg-white py-2.5 pl-10 text-sm shadow-sm transition hover:border-theme-main focus:border-theme-main focus:ring-theme-main">
                    <option value="">全拠点</option>
                    @foreach($bases as $base)
                        <option value="{{ $base->base_id }}" @if($base->base_id == session('search_base_id')) selected @endif>{{ $base->base_name }}</option>
                    @endforeach
                </select>
            </div>
            <input type="hidden" name="base_select_enter" value="true">
        </form>
    @endif
</div>
