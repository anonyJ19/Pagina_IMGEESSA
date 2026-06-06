import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
        "./resources/views/**/**/*.blade.php",
        "./node_modules/flowbite/**/*.js",

        "./resources/js/**/**/*.jsx",
        "./resources/js/**/*.jsx",
    ],
    safelist: ["form-group", "w-96"],
    theme: {
        extend: {
            colors: {
                primary: "#0065a4",
                secondary: "#9bd146",
                pine: "#3BA536",
            },
            fontFamily: {
                poppins: ["Poppins", "sans-serif"],
                roboto: ["Roboto", "sans-serif"],
            },
        },
    },

    plugins: [forms, require("flowbite/plugin")],
};
