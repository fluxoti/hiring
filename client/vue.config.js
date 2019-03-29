module.exports = {
  productionSourceMap: false,

  css: {
    sourceMap: true
  },

  lintOnSave: process.env.NODE_ENV !== "production"
};
