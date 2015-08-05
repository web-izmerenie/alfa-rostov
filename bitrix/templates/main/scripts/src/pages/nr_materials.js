define(['basics/get_val', 'jquery'], function (getVal, $) {
$(function domReady() {
    function gridElementsResize(){
        var elMax = getVal("gridElementMaxWidth");
        var elMin = getVal("gridElementMinWidth");
        var gridMax = getVal("gridMaxWidth");
        var gridMin = getVal("gridMinWidth");
        var marBotMax = getVal("gridElementMaxMarginBottom");
        var marBotMin = getVal("gridElementMinMarginBottom");
        var marLeftMin = getVal("gridElementMinMarginLeft");
        var marRightMin = getVal("gridElementMinMarginRight");
        var imageMax = getVal("gridImageMaxWidth");
        var imageMin = getVal("gridImageMinWidth");
        var gridCur = parseFloat($(".grid_wrapper").css("width"));
        
        var elCur = (gridCur * elMin) / gridMin;
        //elCur = elCur >= elMax ? elMax : elCur;        
        
        var elCount = Math.floor(gridCur / (elMax + marLeftMin + marRightMin));
        
        if(elCount >= 4){
            elCur = elCur >= elMax ? elMax : elCur;
            marLeftCur = (gridCur * marLeftMin) / gridMin - 50;
            marLeftCur = marLeftCur <= marLeftMin ? marLeftMin : marLeftCur;            
            marRightCur = (gridCur * marRightMin) / gridMin - 50;
            marRightCur = marRightCur <= marRightMin ? marRightMin : marRightCur;
        }else{
            marLeftCur = (gridCur * marLeftMin) / gridMin;
            marLeftCur = marLeftCur <= marLeftMin ? marLeftMin : marLeftCur;            
            marRightCur = (gridCur * marRightMin) / gridMin;
            marRightCur = marRightCur <= marRightMin ? marRightMin : marRightCur;
        }
        
        var imageCur = (gridCur * imageMin) / gridMin;   
        var marBottomCur = (gridCur * marBotMin) / gridMin;   
        marBottomCur = marBottomCur >= marBotMax ? marBotMax : marBottomCur;
        var bgSize = elCur - 25;
        var bgSizeMin = elMin - 25;
        var bgSizeMax = elMax - 25;
        bgSize = bgSizeMin >= bgSize ? bgSizeMin : bgSize; 
        bgSize = bgSizeMax <= bgSize ? bgSizeMax : bgSize; 
                
        $(".grid_element").css({
            "width" : elCur,
            "marginBottom": marBottomCur,
            "marginRight": marRightCur,
            "marginLeft": marLeftCur
        });
        $(".grid_element_img").css({
            "background-size" : bgSize
        });
        $(".grid_element_img img").css({
            "width" : imageCur,
            "height" : imageCur
        });
        $(".grid_element_img span").css({
            "width" : imageCur,
            "height" : imageCur
        });
        
        $elements = $("body").find(".grid_element");        
        $.each($elements, function(){
            $title = $(this).find(".grid_element_title");
            $image = $(this).find(".grid_element_img img");
			$price = $(this).find(".price");
			
            $title.css({
                "marginLeft" : (parseFloat($image.width()) / 2) - (parseFloat($title.width()) / 2)
            });
			
			$price.css({
                "marginLeft" : (parseFloat($image.width()) / 2) - (parseFloat($title.width()) / 2),
				"width": $title.width()
            });
        });  
        
    }
    
    $(window).on("resize", null, null, gridElementsResize);
    setTimeout(gridElementsResize, 1);   
}); // domReady
}); // define