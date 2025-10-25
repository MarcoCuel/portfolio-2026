const path = require('path');
const MiniCssExtractPlugin = require("mini-css-extract-plugin");
const CssMinimizerPlugin = require("css-minimizer-webpack-plugin");
const { CleanWebpackPlugin } = require('clean-webpack-plugin');

module.exports = [
  {
    entry: {
      'main': [
        './src/js/main.js',
        './src/scss/main.scss'
      ]
    },
    output: {
      filename: './assets/js/[name].min.[fullhash].js',
      path: path.resolve(__dirname),
      publicPath: '/'
    },
    module: {
      rules: [
        {
          test: /\.(js|jsx)$/,
          exclude: /node_modules/,
          use: 'babel-loader'
        },
        {
          test: /\.(sass|scss)$/,
          use: [
            MiniCssExtractPlugin.loader,
            {
              loader: 'css-loader',
              options: {
                url: false
              }
            },
            {
              loader: 'sass-loader',
              options: {
                implementation: require('sass')
              }
            }
          ]
        },
        {
          test: /\.(woff|woff2|eot|ttf|otf)$/,
          type: 'asset/resource',
          generator: {
            filename: './assets/font/[name][ext]',
          }
        },
        {
          test: /\.(png|jpg|svg)$/,
          type: 'asset/resource',
          generator: {
            filename: './assets/image/[name][ext]',
          }
        },
      ]
    },
    plugins: [
      new CleanWebpackPlugin({
        cleanOnceBeforeBuildPatterns: [
          './assets/js/*',
          './assets/css/*'
        ]
      }),
      new MiniCssExtractPlugin({
        filename: './assets/css/[name].min.[fullhash].css'
      }),
    ],
    optimization: {
      minimizer: [
        `...`,
        new CssMinimizerPlugin(),
      ]
    },
    resolve: {
      extensions: ['.js', '.jsx', '.json', '.css'],
    },
  }
];