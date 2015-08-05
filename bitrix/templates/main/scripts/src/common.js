define(['basics/get_val', 'jquery'], function (getVal, $) {
$(function domReady() {
    $doubleZigzagLabel = $("body .double_zigzag_wrapper").find("div");
    if($doubleZigzagLabel){
        var width = $doubleZigzagLabel.innerWidth();
        var margin = width / 2;
        
        $doubleZigzagLabel.css({
            "marginLeft" : "-" + margin + "px"
        });
        
    }
    
    $(function(){
        $("a").on("click", function(){
            var dataAction = $(this).attr("data-action");
            if(dataAction == "getLarge"){
                url = $(this).attr("href");
                var tmpl = 
                '<div class="photo_overlay">' + 
                    '<span onClick="$(this).parent().remove()" class="closer"></span>' + 
                    '<div class="photo_overlay_inner"><img src="' + url + '" /></div>' + 
                '</div>';
                $("body").append(tmpl);
                return false;
            }else{
                return true;
            }
            
        });
        $(document).mouseup(function (e) {
            var container = $(".photo_overlay");
            if (container.has(e.target).length === 0){
                container.hide();
            }
        });
        $spanlinks = $("body").find(".span_link");
        $spanlinks.each(
            function(){
                $(this).on("click", function(){
                    var link = $(this).attr("data-link");
                    window.location.href = link;
                });
            }
        );
    });
    
}); // domReady
}); // define