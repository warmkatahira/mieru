import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    server: {
        hmr: {
            host: 'localhost',
        },
    },
    plugins: [
        laravel(
            [
                // 共通
                'resources/css/app.css',
                'resources/js/app.js',
                'resources/js/window_update.js',
                'resources/scss/theme.scss',
                'resources/scss/navigation.scss',
                'resources/scss/navigation_hamburger.scss',
                'resources/js/search_date.js',
                // 進捗
                'resources/js/progress/category_select.js',
                'resources/js/progress/comment.js',
                'resources/scss/alert_message.scss',
                // 荷主マスタ
                'resources/js/customer/customer.js',
                // 項目マスタ
                'resources/js/item/item.js',
                // タグマスタ
                'resources/js/tag/tag.js',
                // 荷主タグマスタ
                'resources/js/customer_tag/customer_tag.js',
                // ユーザー管理
                'resources/js/user/user.js',
                // 権限管理
                'resources/js/role/role.js',
                // バージョン管理
                'resources/js/version_mgt/version_mgt.js',
                // 進捗履歴
                'resources/js/progress_history/progress_history.js',
                // アラート設定
                'resources/js/alert_setting/alert_setting.js',
            ],
        ),
    ],
});
