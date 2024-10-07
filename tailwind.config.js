/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        extend: {
            colors: {
                basic: '#413d35',
                background: '#9fa7af',
                navbar: '#aba28d',
                titlepage: '#E2DCC8',
                textnavbar: '#ffffff',
                button: '#aba28d',
                buttonHover: '#4f5c5c',

                cardheader: '#aba28d',
                cardbody:'#cacdd3',
                cardtitle: '#27374D',
                cardtext: '#757282',

                // button: '#2C3333',
                // button: '#678983',
                // buttonHover: '#4f5c5c',
            },
        },
    },
    plugins: [],
}

