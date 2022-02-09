const defaultTheme = require('tailwindcss/defaultTheme');

module.exports = {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/views/*.blade.php',
        './resources/views/vendor/jetstream/components/*.blade.php'
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Nunito', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                'primary': '#FF6C0C',
                'white-opaque': '#f4f6f7',
                'link-gray': '#8f8ead',
                'auxiliar': '#10cc90'
            },
            backgroundColor: {
                'white-opaque': '#f4f6f7',
                'footer': '#58595b'

            },
            backgroundImage: {
                'security': "url('../img/Secure.jpg')",
                'product': "url('../img/Product.jpeg')",
                'pay': "url('../img/Pay.png')",

            },
            screens: {
                'xs': '500px',
            }
        },


    },

    plugins: [require('@tailwindcss/forms'), require('@tailwindcss/typography')],
};
