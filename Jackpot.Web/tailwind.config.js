import defaultTheme from 'tailwindcss/defaultTheme';

export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
        "./node_modules/flowbite/**/*.js"
    ],
    safelist: [
        "bg-[#00ADB5]",
        "text-[#EEEEEE]",
        "shadow-[5px_5px_0px_0_rgba(3,119,124,1)]",
        {
            pattern: /bg-([#00ADB5])/,
        },
      ],    
    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
        },
        colors: {
            transparent: 'transparent',
            'white': '#ffffff',
            'dark': '#000000',
            'jwhite1': '#EEEEEE',
            'jwhite2': '#FAFAFC',
            'jback1': '#4C84FF',
            'jback2': '#2B6DD8',
            'jlay1': '#FF4C4C',
            'jlay2': '#CC1123',
            'jblue1': '#00ADB5',
            'jblue2': '#03777C',
            'jcolor1': '#393E46',
            'jcolor2': '#222831',
            'jcolor3': '#222831',
            'jcolor4': '#1C1C1C',
            'jcolor5': '#3C3B3C',
            'jcolor6': '#252728',
            'jcolor7': '#222222',
            'jcolor8': '#1B1B1B',
            'jcolor9': '#A4A4A4',
          },
      
    },
    plugins: [
        require('flowbite/plugin'),
        require('tailwind-scrollbar')
    ],

};
