import defaultTheme from "tailwindcss/defaultTheme";
import forms from "@tailwindcss/forms";

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ["Figtree", ...defaultTheme.fontFamily.sans],
            },
            colors: {
                "grey-pudar": "#3D3D3D",
                "biru-tosca": "#22D3EE",
                "ungu-font": "#452090",
                pink: "#EC4899",
            },
        },
        backgroundColor: (theme) => ({
            ...theme("colors"),
            purplewhite: "#F4F4FA",
            meta: "#0F172A",
            "ungu-footer": "#3B2788",
            "ungu-font": "#452090",
        }),
    },

    plugins: [forms],
};
