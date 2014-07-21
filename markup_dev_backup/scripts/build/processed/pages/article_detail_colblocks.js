;(function isolate() { function define() { var args = Array.prototype.slice.call(arguments, 0); if (typeof args[0] !== 'string') { args.unshift('pages/article_detail_colblocks'); } window.define.apply(this, args); } define.amd = { jQuery: true }; 
define(['basics/get_val', 'jquery'], function (getVal, $) {
$(function domReady() {
    var $button = $(".article_detail_colblocks").find(".large_button");
    var width = parseFloat($button.width()) / 2;
    $button.css({
        "marginLeft": "-" + width + "px"
    });
   
    
}); // domReady
}); // define
})();