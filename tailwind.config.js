/** @type {import('tailwindcss').Config} */
module.exports = {

  // Darmode
  darkMode: 'class',

  // Content
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue"
  ],

  // Safelist
  safelist: [
    {
      pattern: /max-w-(sm|md|lg|xl|2xl|3xl|4xl|5xl|6xl|7xl)/,
      variants: ['sm', 'md', 'lg', 'xl', '2xl']
    }
  ],

  // Theme
  theme: {

    // Screens
    screens: {
      sm: '480px',
      md: '768px',
      lg: '976px',
      xl: '1440px'
      // sm: '640px',
      // md: '768px',
      // lg: '1024px',
      // xl: '1280px'
    },

    // FontFamily
    fontFamily: {
      sans: ['Poppins'],
    },

    // Extend
    extend: {

      // FontSize
      fontSize: {
        '404': '10rem'
      },

      // Colors
      colors: {
        primary: 'hsl(11, 88%, 60%)',
        secondary: 'hsl(11, 88%, 70%)',
        tritary: 'hsl(11, 88%, 85%)'
      },
    },
  },

  // Plugins
  plugins: [
    
  ],
}

