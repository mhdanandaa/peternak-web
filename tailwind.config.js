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
                meta: "#0F172A",
                "grey-pudar": "#3D3D3D",
                "biru-tosca": "#22D3EE",
                "ungu-font": "#452090",
                pink: "#EC4899",
                "ungu-gradient" : "#873091",
                "biru-gradient" : "#04509B"
            },
        },
        backgroundColor: (theme) => ({
            ...theme("colors"),
            purplewhite: "#F4F4FA",
            meta: "#0F172A",
            "ungu-footer": "#472091",
            "ungu-font": "#452090",
            "ungu-gradient" : "#873091",
            "biru-gradient" : "#04509B"
        }),

        backgroundImage: {
            'gradient-radial': 'radial-gradient(var(--tw-gradient-stops))',
        }
    },

    plugins: [forms],
};
