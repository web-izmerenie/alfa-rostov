;(function isolate() { function define() { var args = Array.prototype.slice.call(arguments, 0); if (typeof args[0] !== 'string') { args.unshift('pages/main_page'); } window.define.apply(this, args); } define.amd = { jQuery: true }; 
/**
 * Main page module
 *
 * @module pages/main
 * @author Dmitry Komkov
 */

define(['get_val', 'jquery'], function (getVal, $) {    
$(function domReady() {
    require(['scripts/libs/jquery-mw-min']);
    require(['scripts/libs/jquerycarousel']);    
        
    $Items = $('body').find(".slideItem");
    
    counter = $Items.size();
    maxZindex = counter - 1;
    
    function findMainElement(){
        $(".selected_item_wrapper").css("opacity", "1");
        $(".center_wrapper").css({
            "opacity": "1"
        });
        $ElementCenter = {};
        $.each($Items, function(){
            $(this).removeClass("slideItemCenter");            
            if($(this).css("z-index") == maxZindex){
                $ElementCenter = $(this);
            }            
        });
        $ElementCenter.addClass("slideItemCenter");
        ElementCenterRight = parseFloat($ElementCenter.css("right")) - 34;
        $ElementCenter.css({
            "width": "154px",
            "height": "137px",
            "right": ElementCenterRight
        });
        centerRight = parseFloat($(".slideItemCenter").css("right"));
        $.each($Items, function(){
            if(!$(this).hasClass("slideItemCenter")){
                newRight = 0;
                thisRight = parseFloat($(this).css("right"));
                if(thisRight < centerRight){
                    newRight = thisRight - 54;
                    $(this).css("right", newRight);
                }else{
                    newRight = thisRight + 54;
                    $(this).css("right", newRight);
                }
            }
        });
        var itemTitle = $ElementCenter.attr("data-item-title");
        var itemPromo = $ElementCenter.attr("data-item-promo");
        if(itemPromo || itemTitle){
            $(".selected_item_wrapper .selected_item_title").html(itemTitle);
            $(".selected_item_wrapper .selected_item_promo").html(itemPromo);
        }
        setTimeout(function(){
            
            var marginLeft = "-" + parseFloat( $(".selected_item_wrapper").width()) / 2 + "px";
            $(".selected_item_wrapper").css({
                "marginLeft" : marginLeft,
                "opacity": "1"
            });
            $(".center_wrapper").css({
                "opacity": "1"
            });
        }, 1000);
    }
    
    function startCarousel(){
        carouselWidth = parseFloat($('body').width());
        
        $('.carousel').carousel({
            hAlign:'center', 
            vAlign:'center', 
            backZoom: 1,
            autoplay: false,
            hMargin:1, 
            sideMargin: 1,
            vMargin:1, 
            directionNav:true,
            slidesPerScroll: counter,
            carouselWidth: carouselWidth,
            carouselHeight: 140,
            frontWidth:102,
            frontHeight:82,
            speed:800,
            before: function(){
                $(".slideItemCenter").removeClass("slideItemCenter");
                $(".selected_item_wrapper").css("opacity", "0");
                $(".center_wrapper").css("opacity", "0");
            },
            after: function(){
                findMainElement();
            }
        });    
    }   
    
    
    startCarousel();
    
    $(window).on("resize", null, null, startCarousel);    
    
    setTimeout(findMainElement, 2); 
    
    $sliderOffset = $(".carousel").offset();
    
    $(".center_wrapper").css({
        "top" : $sliderOffset.top
    });
    
    $weight = $("body").find("#weight");
    $weight.on("focus", function(){
        $(this).removeClass("cursor");
    });
    $weight.on("blur", function(){
        $(this).addClass("cursor");
    });
    
    function carChanger(){
        var weight = $weight.val();
        var newweight = weight !== '' ? parseFloat(weight.replace(/[^\d]/gi, '')) : 0;
        var $carChange = $(".cars").find(".rounded");
        var carsCount = 0;
        $weight.val(newweight);
        if(newweight > 30){ 
            if(newweight <= 40){
                $(".main_track").addClass("main_track_40");
                carsCount = 1;
            }else{
                carsCount = Math.ceil(newweight / 40);
            }
            $carChange.addClass("cars_40");
        }else{
            carsCount = 1;
            $carChange.removeClass("cars_40");
            $(".main_track").removeClass("main_track_40");
        }
        
        $(".cars_counter").html(carsCount);
    }
    
    carChanger();
    $weight.on("keyup", null, null, carChanger);
    
    function pointListPosition(){
        var $point_list = $("body").find(".point_list");
        var point_list_height = parseFloat($point_list.height()) / 2 - 40;
        var point_list_top = "-" + point_list_height + "px";
        
        $point_list.css({
            "top" : point_list_top
        });
    }
    pointListPosition();
    $(".current_point").on("click", function(){        
        $("body").find(".point_list").show();
    });
    $(".point_list li").on("click", function(){
        var title = $(this).text();
        var value = $(this).attr("data-value");
        $("#destination_point").val(value);
        $(".current_point span").text(title);
        $("body").find(".point_list").hide();
    });
    function getInputValue(){
        var $inputs = $(".main_form").find("input[type=text]");
        $.each($inputs, function(){
            if($(this).prev().text() === $(this).val() || $(this).val() === ''){
                $(this).val($(this).prev().text());
            }
        });
    }
    function getInputValueEmpty($this){
        var val = $this.val();
        if(val === $this.prev().text()){
            $this.val('');
        }
    }
    getInputValue();
    
    $(".main_form input[type=text]").on("blur", function(){
        getInputValue();
    });
    $(".main_form input[type=text]").on("focus", function(){
        getInputValueEmpty($(this));
    });
    $("#showForm").on("click", function(){
        $(this).hide();
        $(".main_form").slideDown(800);
    });
}); // domReady
}); // define


})();