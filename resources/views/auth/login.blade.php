<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>ミエル</title>

        <!-- jQuery -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

        <!-- favicon -->
        <link rel="shortcut icon" href="{{ asset('image/favicon.svg') }}">

        <!-- Styles -->
        @vite(['resources/css/app.css', 'resources/scss/theme.scss'])

        <!-- LINE AWESOME -->
        <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">

        <!-- toastr.js -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    </head>
    <body>
        <!-- アラート表示 -->
        <x-alert/>
        <div class="min-h-screen flex flex-col lg:flex-row bg-white">
            <!-- ブランドエリア -->
            <div class="relative overflow-hidden bg-theme-main flex items-center justify-center py-8 lg:w-1/2">
                <a href="{{ route('welcome.index') }}">
                    <img src="{{ asset('image/mieru_logo.svg') }}" alt="ミエル" class="w-48 lg:w-96 motion-safe:animate-fade-up">
                </a>
                <!-- 背景の光(ロゴSVGが不透明な緑背景を持つため、ロゴの前面に重ねる) -->
                <div class="absolute inset-0 pointer-events-none hidden lg:block" aria-hidden="true">
                    <div class="absolute -top-24 -left-24 h-96 w-96 rounded-full bg-theme-sub/30 blur-3xl motion-safe:animate-drift"></div>
                    <div class="absolute -bottom-32 -right-24 h-[28rem] w-[28rem] rounded-full bg-theme-sub/20 blur-3xl motion-safe:animate-drift-reverse"></div>
                    <div class="absolute top-1/3 right-1/4 h-64 w-64 rounded-full bg-white/10 blur-3xl motion-safe:animate-drift-slow"></div>
                </div>
            </div>
            <!-- ログインフォーム -->
            <div class="flex-1 flex items-center justify-center px-6 py-10">
                <div class="w-full max-w-sm motion-safe:animate-fade-up-delay-1">
                    <h1 class="text-3xl text-gray-900">ログイン</h1>
                    <p class="mt-2 text-sm text-gray-500">ユーザーIDとパスワードを入力してください</p>
                    <!-- バリデーションエラー -->
                    <x-validation-error-msg />
                    <!-- Session Status -->
                    <x-auth-session-status class="mb-4" :status="session('status')" />
                    <form method="POST" action="{{ route('login') }}" class="mt-6 space-y-5">
                        @csrf
                        <!-- ユーザーID -->
                        <div>
                            <label for="user_id" class="block text-sm text-gray-700 mb-2">ユーザーID</label>
                            <div class="relative">
                                <i class="las la-user la-lg absolute left-3 top-1/2 -translate-y-1/2 text-gray-400"></i>
                                <input type="text" id="user_id" name="user_id" value="{{ old('user_id') }}" autocomplete="off" autofocus class="block w-full rounded-lg border-gray-300 py-3 pl-10 pr-3 text-base focus:border-theme-main focus:ring-theme-main">
                            </div>
                        </div>
                        <!-- パスワード -->
                        <div>
                            <label for="password" class="block text-sm text-gray-700 mb-2">パスワード</label>
                            <div class="relative">
                                <i class="las la-lock la-lg absolute left-3 top-1/2 -translate-y-1/2 text-gray-400"></i>
                                <input type="password" id="password" name="password" autocomplete="off" class="block w-full rounded-lg border-gray-300 py-3 pl-10 pr-3 text-base focus:border-theme-main focus:ring-theme-main">
                            </div>
                        </div>
                        <button type="submit" class="w-full rounded-lg bg-theme-main py-3 text-base text-white shadow-sm transition hover:-translate-y-0.5 hover:opacity-90 hover:shadow-lg focus:outline-none focus:ring-2 focus:ring-theme-main focus:ring-offset-2">
                            <i class="las la-sign-in-alt la-lg mr-1"></i>ログイン
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>
