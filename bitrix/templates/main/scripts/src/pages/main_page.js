/**
 * Main page module
 *
 * @module pages/main
 * @author Dmitry Komkov
 */

define(['get_val', 'jquery', 'libs/jquery-ui'], function (getVal, $) {    
$(function domReady() {
    //require(['scripts/libs/jquery-mw-min']);
    //require(['scripts/libs/jquerycarousel']);    
        
    $Items = $('body').find(".slideItem");
    
    counter = $Items.size();
    maxZindex = counter - 1;
    
    function calc(){
        $.post(
            "/ajax/handler.php",
            {
                id: $(".slideItemCenter").attr("data-item-id"),
                weight: $("#weight").val(),
                point: $("#destination_point").val()
            },
            function(data){
                var result = JSON.parse(data);
                $(".total_price_value").html(result.TOTAL_PRICE + " <span>руб.</span>");
                $(".price_value").html(result.PRICE + " <span>руб. за тонну</span>");
                $(".weight_wrapp span").html(result.UNIT);
                if(result.WEIGHT == 1){
                    $(".alert").html("Не меньше 10 тонн");
                }else{
                    $(".alert").html("");
                }
                var bailerClassRemove = $(".bailer_wrapper").attr("class").split(" ")[2];
                $(".bailer_wrapper").removeClass(bailerClassRemove);
                $(".bailer_wrapper").addClass(result.BAILER_CLASS);
                
                var textureClassRemove = $(".main_track_wrapper").attr("class").split(" ")[1];
                $(".main_track_wrapper").removeClass(textureClassRemove);
                $(".main_track_wrapper").addClass(result.TEXTURE_CLASS);
                
            }
        );          
    }
    
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
        /* setTimeout(function(){ */
            
            var marginLeft = "-" + parseFloat( $(".selected_item_wrapper").width()) / 2 + "px";
            $(".selected_item_wrapper").css({
                "marginLeft" : marginLeft
            });
            /* setTimeout(function(){ */
                $(".selected_item_wrapper").css({
                    "opacity": "1"
                });
                $(".center_wrapper").css({
                    "opacity": "1"
                });
            /* }, 100); */
        /* }, 100); */
        
        var $slideItem = $("body").find(".slideItem");
        $.each($slideItem, function(){
            var newtitle = $(this).attr("data-item-title") + " " + $(this).attr("data-item-promo");
            
            if($(this).hasClass("slideItemCenter")) 
                newtitle = "";
                
            $(this).tooltip({
                "content" : newtitle,
                "position" : {
                    "my": "center top", 
                    "at": "center bottom-8"
                }
            });
        });
    }
    setTimeout(calc, 100);
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
            speed:250,
            before: function(){
                $(".slideItemCenter").removeClass("slideItemCenter");
                $(".selected_item_wrapper").css("opacity", "0");
                $(".center_wrapper").css("opacity", "0");                
            },
            after: function(){
                findMainElement();
                $(".weight_wrapp #weight").val("0");
                $(".cars_counter").html("0");
                calc();
            }
        });    
    }   
    
    
    startCarousel();
    
    $(window).on("resize", null, null, startCarousel);    
    
    setTimeout(findMainElement, 2); 
    
    $sliderOffset = $(".carousel").offset();
    
    $(".center_wrapper").css({
        "top" : $sliderOffset.top,
        "right" : $(".slideItemCenter").css("right")
    });
    $weight = $("body").find("#weight");
    
    $(document).keydown(function(event){        
        if(event.keyCode == 8 && !$("#name").is(":focus") && !$("#contact").is(":focus") && !$(".other_city input").is(":focus")){
            $weight.focus();
            $weight.val('');
            return false;
        }
    });
    
    $weight.on("focus", function(){
        $weight.val('');
        $(this).removeClass("cursor");
        
    });
    $weight.on("blur", function(){
        $(this).addClass("cursor");
        
    });
    
    
    function carChanger(){        
        var weight = $weight.val();
        var newweight = weight !== '' ? parseFloat(weight.replace(/[^\d]/gi, '')) : '';
        newweight = newweight > 1000 ? 1000 : newweight;
        var $carChange = $(".cars").find(".rounded");
        var carsCount = 0;
        $weight.val(newweight);
        if(newweight > 30){ 
            if(newweight >= 40){
                $(".main_track").addClass("main_track_40");
                carsCount = Math.ceil(newweight / 40);
            }else{
                carsCount = 1;
                
            }
            $carChange.addClass("cars_40");
        }else{
            
            carsCount = $(".weight_wrapp #weight").val() === "0" ? 0 : 1;
            $carChange.removeClass("cars_40");
            $(".main_track").removeClass("main_track_40");
        }
        
        $(".cars_counter").html(carsCount);
        calc();
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
        $(document).mouseup(function (e) {
            var container = $(".point_list");
            if (container.has(e.target).length === 0){
                container.hide();
            }
        });
        $(".point_list").on("click", "li", function(){
            if($(this).hasClass("other_city")){
                $("#showForm").text("Узнать стоимость");
                $(".total_price_value").html("<div class='other_city_30'>МЫ рассчитаем стоимость <br /> в течение 30 мин.</div>");
                $(".label_other_city").show();
                $(".price_value").hide();
                $(this).children().val('');
            }else{
                $("#showForm").text("Оформить заказ");
                $(".price_value").show();
                $(".label_other_city").hide();
                $(".total_price_value").html("0 <span>руб.</span>");
                var title = $(this).text();
                var value = $(this).attr("data-value");
                $("#destination_point").val(value);
                $(".current_point span").text(title);
                $("body").find(".point_list").hide();
                calc();
            }
        });
        $(".other_city input").keyup(function(){
            var title = $(this).val();
            var value = $(this).parent().attr("data-value");
            $("#destination_point").val(value);
            $(".current_point span").text(title);
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
    
    setTimeout(
        function(){
            $("#sendForm").on("click", function(){
                var currId = $(".slideItemCenter").attr("data-item-id");
                var currWeight = $("#weight").val();
                var name = $("#name").val();
                var contact = $("#contact").val();
                var total = $(".total_price_value").html();
                
                $.post(
                    "/ajax/mailer.php",
                    {
                        currId : currId,
                        currWeight : currWeight,
                        name : name,
                        total : total,
                        contact : contact
                    },
                    function(data){
                        var result = JSON.parse(data);
                        $(".main_form").children().removeClass("error");
                        if(result.status == "error"){
                            $.each(result.fields, function(){                        
                                $("#" + $(this).get(0).field).addClass("error");
                            });
                        }
                        if(result.status == "success"){
                            var obj = $(".main_form").find("input[type=text]");
                            $.each(obj, function(){
                                $(this).val($(this).prev("span").text());
                            });
                            $(".main_form").slideUp();
                            $("#showForm").show();
                            
                            $html = 
                            "<div class='message'>" + 
                                "<div class='close'></div>" + 
                                "<h1>Ваш заказ отправлен</h1>" + 
                                "<p>Спасибо, " + result.NAME + " <br /> мы Вам ответим в течение 30 минут</p>" + 
                            "</div>";
                            $(".overlay").show();
                            $(".overlay").append($html);
                        }   
                    }
                );
            });
        }, 1
    );
    $(document).on("click", ".close",  function(){
        $(".message").remove();
        $(".overlay").hide();        
    });
    
    
    
}); // domReady
}); // define

