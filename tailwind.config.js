module.exports = {
  mode: 'jit',
  purge: [
    './resources/**/*.blade.php',
    './resources/**/*.js',
    './resources/**/*.vue',
  ],
  darkMode: false, // or 'media' or 'class'
  theme: {
    extend: {
      fontFamily: {
        'lato': ['"Lato"', 'ui-sans-serif', 'system-ui', 'san-serif'],
      },
    },
  },
  variants: {
    extend: {
    },
  },
  plugins: [],
}
