/**
 * Main page module
 *
 * @module pages/main
 * @author Dmitry Komkov
 */

define(['get_val', 'jquery', 'libs/jquery-ui'], function (getVal, $) {
  $(function domReady() {

    $Items = $('body').find(".slideItem");
    $material = $('body').find(".material");
    $materialWrap = $material.find(".material_wrapp");
    var idForCalc;

    function showPrice(){
      setTimeout(function(){
          $(".not_price_for_me").fadeIn(500);
          console.log(typeof $("#destination_point").val());
      }, 1500);
    }

    function calc(){
        if($("#weight").val() >= 10 && idForCalc !== undefined && $("#destination_point").val() !== "0") {
          $.post(
              "/ajax/handler.php",
              {
                  id: idForCalc,
                  weight: $("#weight").val(),
                  point: $("#destination_point").val()
              },
              function(data){
                  var result = JSON.parse(data);
                  $(".price_value").html(result.TOTAL_PRICE + " р.");
                  $(".total_price_value").html("(" + result.PRICE + " р./т)");
                  $(".weight_wrapp span").html(result.UNIT);
                  $(".total_price_value span").html(result.UNIT_BOTTOM);
                  showPrice();
              }
          );
        }
    }

    $("#weight").keyup(function(e) {
      var charCode = (e.which) ? e.which : e.keyCode;
      if (charCode > 31 && (charCode < 48 || charCode > 57)){
        return false;
      }else{
        if($(this).val() >= 10 || $(this).val() == '0'){
          $(".alert").html("");
          $(this).css({'border':'1px solid #58585A'});
          calc();
        }else{
            $(".alert").html("Не меньше 10 тонн");
            $(this).css({'border':'1px solid #F7D11F'});
        }
      }
    });

    window.onload=function(){
        if (location.hash.charAt(0) === '#' && location.hash.length > 1) {
            var id = location.hash.replace(/^#([0-9]+)$/, '$1');
            if (id.toString() === parseInt(id, 10).toString()) {
                $('.slideItem[data-item-id="'+id+'"]').trigger('click');
            }
        }
    };

    $(".controls .material_wrapp").on("click", ".slideItem", function(){
      $(".calculator .material_selection").fadeIn();
    });

    $(".calculator .material_selection .slideItem").click(function(){
      idForCalc = $(this).attr("data-item-id");
      $materialWrap.find(".slideItem").remove();
      $(this).clone()
        .appendTo($materialWrap);
      $(this).parent().fadeOut();
      calc();
    });

    $weight = $("body").find("#weight");

    function pointListPosition(){
        var $point_list = $("body").find(".point_list");
        var point_list_height = parseFloat($point_list.height()) / 2 - 40;
        var point_list_top = "-" + point_list_height + "px";
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
        $(document).on("keyup", function(e){
            var container = $(".point_list");
            if(e.which === 13 && container.css("display") === "block"){
                container.hide();
            }
        });
        $(".point_list").on("click", "li", function(){
            if($(this).hasClass("other_city")){
                $("#showForm").text("Узнать стоимость");
                $(".other_city_30").fadeIn();
                $(".price").hide();
                $(".not_price_for_me").hide();
                if($(this).children().val() === 'Другой...'){
                    $(this).children().val('');
                }

            }else{
                $(".other_city_30").hide();
                $(".price").fadeIn();
                $(".label_other_city").hide();
                $(".price_value").html("0 <span>руб.</span>");
                var title = $(this).text();
                var value = $(this).attr("data-value");
                $("#destination_point").val(value);
                $(".current_point span").text(title);
                $('.point_list').hide();
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

  }); // domReady
}); // define
