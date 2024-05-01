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
        'background': '#27272A',
        'primary': '#6EE7B7',
        'secondary': '#5BC49B',
        'container': '#222327',
        'tertiary': '#2B2D32',
        'gray': '#D7D7D7',
        'yellow': '#EFC420',
        'border': '#282A2F',
      }
    },
    fontFamily: {
      'nunito': ['Nunito', 'sans-serif']
    }
  },
  plugins: [],
}