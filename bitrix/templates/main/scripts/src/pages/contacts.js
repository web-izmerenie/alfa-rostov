define(['basics/get_val', 'jquery'], function (getVal, $) {
$(function domReady() {
       /*  ymaps.ready(init);
 
        function init () {
            var myMap = new ymaps.Map('map', {
                    center: [47.206730,39.671637],
                    zoom: 15,
                    behaviors:['default', 'scrollZoom']
                });
                myMap.controls
                    .add('zoomControl', { left: 5, top: 5 })
                    .add('typeSelector')
                    .add('mapTools', { left: 35, top: 5 });
                    
				var myPlacemark = new ymaps.Placemark(
				[47.206730,39.671637] , {
                    hintContent: 'Альфа <br /> г. Ростов-на-Дону ул. 2-я Володарского, 76/23 А офис 112'
                }, {
                    iconImageHref: '/bitrix/templates/main/images/marker.png',
                    iconImageSize: [80, 109],
                    iconImageOffset: [-40, -109]
                    });    
 
				myMap.geoObjects.add(myPlacemark);
 
 
        } */
        function initialize() {
            var mapOptions = {
              center: new google.maps.LatLng(47.206730, 39.671637),
              zoom: 16,
              mapTypeId: google.maps.MapTypeId.ROADMAP
            };
            var map = new google.maps.Map(document.getElementById("google-map"),
                mapOptions);
                
            var image = '/bitrix/templates/main/images/marker.png';
            var myLatLng = new google.maps.LatLng(47.206730, 39.671637);
            var beachMarker = new google.maps.Marker({
                position: myLatLng,
                map: map,
                icon: image
            });
        } 
        initialize();
    
}); // domReady
}); // define