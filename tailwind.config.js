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
                basic: '#B9B4C7',
                background: '#9fa7af',
                navbar: '#352F44',
                card: '#5C5470',
                title: '#FAF0E6',
                text: '#757282',
                button: '#3F2E3E',
                buttonHover: '#A78295',
                
                headercard: '#3F2E3E',
                titlecard: '#EFE1D1',
                backgroundcard: '#A78295',
                
                hijau: '#004D40',
                oren: '#352F44',
                biru: '#1E3E62',
                dongker: '#0B192C',
                hitam: '#181C14',
                grey: '#686D76'

            },
        },
    },
    plugins: [],
}

