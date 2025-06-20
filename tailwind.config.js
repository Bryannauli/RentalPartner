// tailwind.config.js
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
         poppins: ['Poppins', 'sans-serif'],
      },
      colors: {
        'primary': '#2563eb',
        'primary-dark': '#1d4ed8',
      },
      keyframes: {
        fadeInUp: {
          '0%': { opacity: '0', transform: 'translateY(20px)' },
          '100%': { opacity: '1', transform: 'translateY(0)' },
        },
      },
      animation: {
        fadeInUp: 'fadeInUp 0.8s ease-out both',
      },
    },
  },
  safelist: [
    'bg-white',
    'animate-fadeInUp',
    'delay-[0.1s]',
    'delay-[0.2s]',
    'delay-[0.3s]',
    'delay-[0.4s]'
  ],
  
  plugins: ["@prettier/plugin-php"],
}
