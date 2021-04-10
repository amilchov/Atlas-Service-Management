// vue.config.js
module.exports = {
  runtimeCompiler: true,
  devServer: {
        proxy: 'https://bigpanda.cern.ch',
  },
  // publicPath: 'https://atlas.noit.eu'
};
