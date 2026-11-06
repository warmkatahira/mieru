import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/js/*.js',
    ],

    theme: {
        extend: {
            colors: {
                theme: {
                    'main': "#00704a",
                    'sub': "#b9dacf",
                    'gray': "#ebe6e6",
                },
            },
            keyframes: {
                'fade-up': {
                    from: { opacity: '0', transform: 'translateY(16px)' },
                    to: { opacity: '1', transform: 'translateY(0)' },
                },
                'drift': {
                    '0%, 100%': { transform: 'translate(0, 0) scale(1)' },
                    '50%': { transform: 'translate(120px, 90px) scale(1.2)' },
                },
            },
            animation: {
                'fade-up': 'fade-up 0.7s ease-out backwards',
                'fade-up-delay-1': 'fade-up 0.7s ease-out 0.2s backwards',
                'fade-up-delay-2': 'fade-up 0.7s ease-out 0.4s backwards',
                'drift': 'drift 14s ease-in-out infinite',
                'drift-reverse': 'drift 18s ease-in-out infinite reverse',
                'drift-slow': 'drift 24s ease-in-out -6s infinite reverse',
            },
        },
    },

    plugins: [forms],
};
