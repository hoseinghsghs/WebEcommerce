// webpack.config.js
module.exports = {
    ...plugins[
        new webpack.ProvidePlugin({
            $: "jquery",
            jQuery: "jquery",
            "window.jQuery": "jquery",
        })
    ],
};
