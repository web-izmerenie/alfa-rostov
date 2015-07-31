;(function isolate() { function define() { var args = Array.prototype.slice.call(arguments, 0); if (typeof args[0] !== 'string') { args.unshift('pages/contacts'); } window.define.apply(this, args); } define.amd = { jQuery: true }; 
define(['basics/get_val', 'jquery'], function (getVal, $) {
$(function domReady() {
    function contactsResize(){       
        //yandex maps comming soon
        
    }
    $(window).on("resize", null, null, contactsResize);
    setTimeout(contactsResize, 1); 
   
    
}); // domReady
}); // define
})();