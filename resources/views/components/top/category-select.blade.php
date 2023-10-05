@vite(['resources/js/progress/category_select.js'])

<div class="grid grid-cols-12 gap-2 mb-5">
    <a href="{{ route('progress.customer') }}" class="category_select col-span-1 text-center py-2 px-5 bg-theme-sub rounded-xl">荷主</a>
    <a href="{{ route('progress.base') }}" class="category_select col-span-1 text-center py-2 px-5 bg-theme-sub rounded-xl">営業所</a>
    <a href="{{ route('progress.tag') }}" class="category_select col-span-1 text-center py-2 px-5 bg-theme-sub rounded-xl">タグ</a>
</div>