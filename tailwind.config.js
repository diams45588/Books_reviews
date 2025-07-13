import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                'soft-brown': {
                    50: '#f9f5f0',
                    100: '#f3e9dd',
                    200: '#e6d1bb',
                    300: '#d8b799',
                    400: '#c99d77',
                    500: '#b98355',
                    600: '#946a43',
                    700: '#6f4f31',
                    800: '#4b341f',
                    900: '#271a0d',
                },
            },
        },
    },

    plugins: [forms],
};
