import preset from "./vendor/filament/support/tailwind.config.preset";

export default {
    presets: [preset],
    content: [
        "./app/Filament/**/*.php",
        "./resources/views/**/*.blade.php",
        "./vendor/filament/**/*.blade.php",
    ],
    theme: {
        extend: {},
        colors: {
            primary: {
                50: "#FFFBEB",
                100: "#FEF3C7",
                200: "#FDE68A",
                300: "#FCD34D",
                400: "#FBBF24",
                500: "#F59E0B",
                600: "#D97706",
                700: "#B45309",
                800: "#92400E",
                900: "#78350F",
                950: "#451A03",
            },
        },
    },
    plugins: [require("flowbite/plugin")],
};
