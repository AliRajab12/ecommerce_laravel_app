const defaultTheme = require('tailwindcss/defaultTheme');

/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/js/**/*.vue',
        './src/**/*.{html,js}',
        './node_modules/tw-elements/dist/js/**/*.js'
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Nunito', ...defaultTheme.fontFamily.sans],
            },
        },
        container: {
            center: true,
          },
        
        // screens: {
        //     'tablet': '640px',
        //     'laptop': '1024px',
        //     'desktop': '1280px',
        //   },
    },

    plugins: [require('@tailwindcss/forms'),require('@tailwindcss/line-clamp'), require('tw-elements/dist/plugin')],
};
