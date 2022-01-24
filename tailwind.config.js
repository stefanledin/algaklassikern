const defaultTheme = require('tailwindcss/defaultTheme');
const colors = require('tailwindcss/colors');

module.exports = {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        colors: {
            white: colors.white,
            gray: colors.gray,
            red: colors.red,
            green: colors.green,
            blue: '#2d68b2',
            'light-blue': '#cddcff',
            'dark-blue': '#0a3b7b'
        },
        /*
        extend: {
            fontFamily: {
                sans: ['Nunito', ...defaultTheme.fontFamily.sans],
            },
        },
        */
    },

    plugins: [require('@tailwindcss/forms')],
};
