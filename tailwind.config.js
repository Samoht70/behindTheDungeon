import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/js/**/*.vue',
        './vueform.config.js',
        './node_modules/@vueform/vueform/themes/tailwind/**/*.vue',
        './node_modules/@vueform/vueform/themes/tailwind/**/*.js',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
                normalMedieval: ['normal-medieval'],
                boldMedieval: ['bold-medieval'],
                outlineMedieval: ['outline-medieval'],
                titleMiddleAge: ['title-middle-age'],
                titleMiddleAgeOutlined: ['title-middle-age-outlined'],
            },
        },
    },

    plugins: [
        forms,
        require('@vueform/vueform/tailwind'),
        require('@vueform/slider/tailwind'),
    ],
};
