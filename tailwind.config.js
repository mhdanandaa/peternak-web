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
                default: ['Poppins', 'sans-serif'],
                subhero: ['Oooh Baby', 'cursive'],
            },
            colors: {
                meta: "#0F172A",
                "grey-pudar": "#3D3D3D",
                "biru-tosca": "#38BDF8",
                "ungu-font": "#452090",
                "pink": "#ec4899",
                "ungu-gradient": "#873091",
                "biru-gradient": "#04509B",
                "biru-ungu" : "#6366F1",
                "ungu-void" : "#6B26D8"
            },
        },
        backgroundColor: (theme) => ({
            ...theme("colors"),
            purplewhite: "#F4F4FA",
            meta: "#0F172A",
            "ungu-footer": "#472091",
            "ungu-font": "#452090",
            "ungu-gradient": "#873091",
            "biru-gradient": "#04509B",
            "meta-pudar" : "#1A2132",
            "biru-ungu" : "#E8F0FE"
        }),

        backgroundImage: {
            "gradient-radial": "radial-gradient(var(--tw-gradient-stops))",
        },
    },

    plugins: [require("tailwind-scrollbar")],
    plugins: [
        require('tailwindcss-animated')
      ],
};
