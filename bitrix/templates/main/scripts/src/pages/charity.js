define(['basics/get_val', 'jquery'], function (getVal, $) {
  $(function domReady() {
    var $main = $(".charity");
    var $items = $main.find(".charity-item");
    var $itemHeight = $items.height();

    $items.click(function(e) {
      e.preventDefault();
      $items.height($itemHeight);
      $(this).height("auto");
    });
  });
});
