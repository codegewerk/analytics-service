const path = require("path");

module.exports = {
  entry: "./dashboard/src/index.js",
  module: {
    rules: [
      {
        test: /\.m?js$/,
        exclude: /(node_modules|bower_components)/
      }
    ]
  },
  output: {
    path: path.resolve(__dirname, "./dashboard/public/assets"),
    filename: "theme.js"
  }
};
