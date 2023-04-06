const colors = require("tailwindcss/colors");
const defaultTheme = require('tailwindcss/defaultTheme')

/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./resources/views/**/*.{html,js,php}", "./src/js/**/*.js", "./node_modules/@bayfrontmedia/skin/dist/skin.min.js"],
  darkMode: 'class',
  theme: {
    extend: {
      colors: {
        'theme-primary': colors.blue["500"],
        'theme-secondary': colors.green["500"]
      },
      fontFamily: {
        'sans': ['Inter', ...defaultTheme.fontFamily.sans],
        'serif': ["'Roboto Slab'", ...defaultTheme.fontFamily.serif],
        'mono': ["'Menlo'", ...defaultTheme.fontFamily.mono]
      },
    },
  },
  skin: {
    borderRadius: '.25rem',
    borderWidth: '1px',
    boxShadow: '0 4px 6px -1px rgb(0 0 0 / 0.1), 0 2px 4px -2px rgb(0 0 0 / 0.1);',
    themes: { // Valid themes: light, dark
      light: {
        bgDefault: colors.gray["100"],
        bgContent: colors.white,
        borderDefault: colors.gray["300"],
        textDefault: colors.gray["700"],
        textLight: colors.gray["500"],
        textCode: colors.red["600"]
      },
      dark: {
        bgDefault: colors.gray["900"],
        bgContent: colors.gray["800"],
        borderDefault: colors.gray["700"],
        textDefault: colors.gray["300"],
        textLight: colors.gray["500"],
        textCode: colors.red["400"]
      }
    }
  },
  plugins: [
    require('@tailwindcss/forms'),
    require('@bayfrontmedia/skin')
  ],
}
