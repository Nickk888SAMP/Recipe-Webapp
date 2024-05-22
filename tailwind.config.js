/** @type {import('tailwindcss').Config} */
module.exports = {
  darkMode: 'class',
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
    './vendor/masmerise/livewire-toaster/resources/views/*.blade.php',
  ],
  theme: {
    screens: {
      sm: '480px',
      md: '768px',
      lg: '976px',
      xl: '1440px'
    },
    fontFamily: {
      sans: ['Poppins'],
    },
    extend: {
      fontSize: {
        '404': '10rem'
      },
      colors: {
        primary: 'hsl(11, 88%, 60%)',
        secondary: 'hsl(11, 88%, 70%)',
        tritary: 'hsl(11, 88%, 85%)'
      },
    },
  },
  plugins: [
    
  ],
}

