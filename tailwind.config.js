import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/js/**/*.vue',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            // TODO: Remove colors after old components are replaced by PrimeVue
            colors: {
                primary: {
                    DEFAULT: '#000000',
                },
                secondary: {
                    DEFAULT: '#276ef1',
                }
            }
        },
    },

    plugins: [
        forms,
        require('tailwindcss-primeui'),
    ],
};
