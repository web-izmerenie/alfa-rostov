;(function isolate() { function define() { var args = Array.prototype.slice.call(arguments, 0); if (typeof args[0] !== 'string') { args.unshift('values'); } window.define.apply(this, args); } define.amd = { jQuery: true }; 
/**
 * Values for "get_val" module
 *
 * @module values
 * @author Viacheslav Lotsmanov
 */

define(function () {

    /** @public */ var exports = {};

    exports.values = {
        animationSpeed: 200,
        cookieExpires: 365,
        gridMaxWidth: 1600,
        gridMinWidth: 980,
        gridElementMaxWidth: 326,
        gridElementMinWidth: 254,
        gridElementMinMarginLeft: 58,
        gridElementMinMarginRight: 12,
        gridElementMaxMarginBottom: 66,
        gridElementMinMarginBottom: 44,
        gridImageMinWidth: 218,
        gridImageMaxWidth: 282,
        gridElementDetailMaxWidth:502,
        gridElementDetailMinWidth:345,
        gridImageDetailMaxWidth: 431,
        gridImageDetailMinWidth: 297,
        gridElementShadowDetailDiff: 35,
        gridDetailMaxWidth: 1138,
        gridDetailMinWidth: 892,
        gridTextMarginMinDiff: 17, 
        gridTextMarginMaxDiff: 43,
        featureImageSizeMin:99,
        featureImageSizeMax:156,
        featureMarginBegin:14,
        featureMarginBeginMoreIcons:10,
        darksideTrackSize: 310,
        hasCharMaxWidth:41,
        hasCharMinWidth:27,
        twoColsRightColMinMarginLeft: 194,
        twoColsRightColMaxMarginLeft: 291
    };

    /** Required set before "getVal" */
    exports.required = [
        'lang',
        'revision'
    ];

    return exports;

}); // define

// vim: set sw=4 ts=4 et foldmethod=marker :

})();