define(['basics/get_val', 'jquery'], function (getVal, $) {
$(function domReady() {
    var $button = $(".article_detail_colblocks").find(".large_button");
    var width = parseFloat($button.width()) / 2;
    $button.css({
        "marginLeft": "-" + width + "px"
    });
   
    
}); // domReady
}); // define