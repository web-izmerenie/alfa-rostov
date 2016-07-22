define(['basics/get_val', 'jquery'], function (getVal, $) {
  $(function domReady() {
    var $main = $(".charity");
    var $items = $main.find(".charity-item");
    var $itemHeight = $items.height();
    var $moreBtn = $main.find(".btn-add");

    $main.on("click", ".charity-item", function(e) {
      e.preventDefault();
      if(!$(this).hasClass("active")){
        $(".charity-item").height($itemHeight).removeClass("active");
        $(this).addClass("active");
        $(this).height("100%");
        var thisHeight = $(this).height();
        $(this).height($itemHeight);
        $(this).animate({"height":thisHeight}, 300);
        $main.animate({
          scrollTop: $(this).offset().top
        }, 300);
      }
    });

    $moreBtn.click(function(e){
      var currentPage = Number($(this).data("cur"));
      var totalPage = Number($(this).data("total"));
      var path = $(this).attr("href");

      e.preventDefault();
      currentPage++;
      $(this).data("cur", currentPage);
      path = path + "?AJAX=Y&PAGEN_1=" + currentPage;
      if(currentPage == totalPage){
        $(this).fadeOut();
      }

      $.ajax({
        type: "POST",
        url: path,
        dataType: "html",
        success: function(data) {
          $(".articles").append(data);
        }
      });
    });
  });
});
