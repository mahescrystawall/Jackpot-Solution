import defaultTheme from 'tailwindcss/defaultTheme';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
        "./node_modules/flowbite/**/*.js"
    ],
    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
        },
        colors: {
            transparent: 'transparent',
            current: 'currentColor',
            'white': '#ffffff',
            'dark': '#000000',

            'jwhite1': '#EEEEEE',
            'jwhite2': '#FAFAFC',

            'jblue1': '#4C84FF',
            'jblue2': '#2B6DD8',

            'jred1': '#FF4C4C',
            'jred2': '#CC1123',

            'jcolor1': '#00ADB5',
            'jcolor2': '#03777C',
            'jcolor3': '#393E46',
            'jcolor4': '#222831',
            'jcolor5': '#222831',
            'jcolor6': '#1C1C1C',
            'jcolor7': '#3C3B3C',
            'jcolor8': '#252728',
            'jcolor9': '#222222',
            'jcolor10': '#1B1B1B',
            'jcolor11': '#1B1A1B',
            
          },
      
    },
    plugins: [
        require('flowbite/plugin')
    ],

};
