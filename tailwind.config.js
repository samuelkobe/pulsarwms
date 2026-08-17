module.exports = {
  purge: ["./**/*.php", "./**/*.css"],
  darkMode: false, // or 'media' or 'class'
  theme: {
    screens: {
      xs: "375px",
      sm: "640px",
      md: "768px",
      lg: "1024px",
    },
    extend: {
      screens: {
        xl: "1280px",
        "2xl": "1536px",
      },
      colors: {
        brand: {
          bright: "#47D4F5",
          medium: "#1976D2",
          transitionMedium: "#3A54A3",
          dark: "#070468",
          transitionDark: "#04014E",
          dev: "#46CEC3",
        },
        grey: {
          light: "#F2F2F2",
          medium: "#D6D6D6",
          dim: "#656565",
          dark: "#111111",
        },
        gradient: {
          v1: "#1A4292",
        },
      },
      width: {
        18: "4.5rem",
        "1/24": "4.166666667%",
        "23/24": "95.83333333%",
      },
      height: {
        "025": "1px",
        "05": "2px",
        "075": "3px",
        18: "4.5rem",
        108: "27rem",
        112: "28rem",
        128: "32rem",
        144: "36rem",
        168: "42rem",
        192: "48rem",
        224: "56rem",
        256: "64rem",
        "75vh": "75vh",
      },
      minWidth: {
        6: "1.5rem",
      },
      minHeight: {
        "25vh": "25vh",
        "35vh": "35vh",
        "50vh": "50vh",
        "75vh": "75vh",
        "50p": "50%",
      },
      maxHeight: {
        "35vh": "35vh",
        "65vh": "65vh",
      },
      spacing: {
        "025": "1px",
        "05": "2px",
        "075": "3px",
        "1/24": "4.166666667%",
        "1/12": "8.3333%",
        "1/8": "12.5%",
        "1/6": "16.6667%",
        "1/4": "25%",
        "5/12": "41.6667%",
        "2/3": "67.6667%",
        hex: "1.1rem",
        "hex-md": "2.2rem",
        "hex-xl": "4.4rem",
        "4.5-50p": "calc(50% - 1.125rem)",
        "9-50p": "calc(50% - 2.25rem)",
        "18-50p": "calc(50% - 4.4rem)",
        video: "56.25%",
      },
      transitionDuration: {
        0: "0ms",
        400: "400ms",
      },
      transformOrigin: {
        custom: "0.475rem",
      },
      borderWidth: {
        3: "3px",
      },
      transitionProperty: {
        height: "height",
        width: "width",
        sizes: "height, width",
      },
      zIndex: {
        "-1": "-1",
      },
      fontSize: {
        "2.5xl": "1.75rem",
        "4.5xl": "2.5rem",
        "5.5xl": "3.5rem",
        "8.5xl": "6.75rem",
      },
      lineHeight: {
        "extra-loose": "2.75rem",
      },
      fontFamily: {
        sans: ["Open Sans", "sans-serif"],
        title: ["Montserrat", "sans-serif"],
        calculator: ["Arial", "sans-serif"],
      },
      borderColor: ["checked"],
      outline: {},
    },
  },
  variants: {
    backgroundColor: ["responsive", "hover", "focus", "checked"],
    backgroundImage: ["responsive", "hover", "focus", "checked"],
  },
  plugins: [require("@tailwindcss/forms")],
};
