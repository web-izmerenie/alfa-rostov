define(['basics/get_val', 'jquery'], function (getVal, $) {
$(function domReady() {
    function contactsResize(){       
        //yandex maps comming soon
        
    }
    $(window).on("resize", null, null, contactsResize);
    setTimeout(contactsResize, 1); 
   
    
}); // domReady
}); // define