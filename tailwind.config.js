/** @type {import('tailwindcss').Config} */
export default {
    content: [
      "./resources/**/*.blade.php",
      "./resources/**/*.js",
      "./resources/**/*.vue",
      "./resources/views/layouts/landing.blade.php",
    ],
    theme: {
      extend: {
        fontFamily: {
            sans: ['Poppins', 'sans-serif'],  // default font-family
        },
        colors: {
            'primary': '#2563eb', // blue-600
            'primary-dark': '#1d4ed8' // blue-700
          }
      },
    },
    plugins: ["@prettier/plugin-php"],
  }
  