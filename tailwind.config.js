/** @type {import('tailwindcss').Config} */
module.exports = {
    content: ["./templates/**/*.{html,js,php}", "./src/css/**/*.{css, html, php}"], // Match all files within the templates directory
    darkMode: 'class',
    theme: {
        extend: {},
    },
    plugins: [],
}