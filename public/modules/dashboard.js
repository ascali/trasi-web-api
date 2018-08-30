/*demo = {

initGoogleMaps: function(){
        var myLatlng = new google.maps.LatLng(40.748817, -73.985428);
        var mapOptions = {
          zoom: 13,
          center: myLatlng,
          scrollwheel: false, //we disable de scroll over the map, it is a really annoing when you scroll through page
          styles: [{"featureType":"water","stylers":[{"saturation":43},{"lightness":-11},{"hue":"#0088ff"}]},{"featureType":"road","elementType":"geometry.fill","stylers":[{"hue":"#ff0000"},{"saturation":-100},{"lightness":99}]},{"featureType":"road","elementType":"geometry.stroke","stylers":[{"color":"#808080"},{"lightness":54}]},{"featureType":"landscape.man_made","elementType":"geometry.fill","stylers":[{"color":"#ece2d9"}]},{"featureType":"poi.park","elementType":"geometry.fill","stylers":[{"color":"#ccdca1"}]},{"featureType":"road","elementType":"labels.text.fill","stylers":[{"color":"#767676"}]},{"featureType":"road","elementType":"labels.text.stroke","stylers":[{"color":"#ffffff"}]},{"featureType":"poi","stylers":[{"visibility":"off"}]},{"featureType":"landscape.natural","elementType":"geometry.fill","stylers":[{"visibility":"on"},{"color":"#b8cb93"}]},{"featureType":"poi.park","stylers":[{"visibility":"on"}]},{"featureType":"poi.sports_complex","stylers":[{"visibility":"on"}]},{"featureType":"poi.medical","stylers":[{"visibility":"on"}]},{"featureType":"poi.business","stylers":[{"visibility":"simplified"}]}]

        }
        var map = new google.maps.Map(document.getElementById("map"), mapOptions);

        var marker = new google.maps.Marker({
            position: myLatlng,
            title:"Hello World!"
        });

        // To add the marker to the map, call setMap();
        marker.setMap(map);
    }

}

demo.initGoogleMaps();*/

    var locations = [
      ['POLSEK INDRAMAYU', -6.3421725,108.3300192, 4],
      ['POLSEK SINDANG', -6.3639752,108.3008341, 5],
      ['POLSEK LOHBENER', -6.40853,108.2721271, 3],
      ['POLRES INDRAMAYU', -6.3450949,108.3319314, 2],
      ['POLSEK JATI BARANG', -6.4749311,108.3070237, 1]
    ];

    var map = new google.maps.Map(document.getElementById('map'), {
      zoom: 11,
      center: new google.maps.LatLng(-6.4517638,108.0546837),
      mapTypeId: google.maps.MapTypeId.ROADMAP
    });

    var infowindow = new google.maps.InfoWindow();

    var marker, i;

    for (i = 0; i < locations.length; i++) {  
      marker = new google.maps.Marker({
        position: new google.maps.LatLng(locations[i][1], locations[i][2]),
        map: map
      });

      google.maps.event.addListener(marker, 'click', (function(marker, i) {
        return function() {
          infowindow.setContent(locations[i][0]);
          infowindow.open(map, marker);
        }
      })(marker, i));
    }


/*var markers = [
   {
     "name": "POLSEK INDRAMAYU",
     "url": "https://en.wikipedia.org/wiki/",
     "lat": -6.3421725,
     "lng": 108.3300192
   },
   {
     "name": "POLSEK SINDANG",
     "url": "https://en.wikipedia.org/wiki/",
     "lat": -6.3639752,
     "lng": 108.3008341
   },
   {
     "name": "POLSEK LOHBENER",
     "url": "https://en.wikipedia.org/wiki/",
     "lat": -6.40853,
     "lng": 108.2721271
   },
   {
     "name": "POLRES INDRAMAYU",
     "url": "https://en.wikipedia.org/wiki/",
     "lat": -6.3450949,
     "lng": 108.3319314
   },
   {
     "name": "POLSEK JATI BARANG",
     "url": "https://en.wikipedia.org/wiki/",
     "lat": -6.4749311,
     "lng": 108.3070237
   }
];

// var map = L.map('map');
var map = L.map( 'map', {
    center: [-6.4517638,108.0546837],
    minZoom: 2,
    zoom: 11
});

var realtime = L.realtime('https://wanderdrone.appspot.com/', {
        interval: 3 * 1000
    }).addTo(map);

L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {
    attribution: '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors'
}).addTo(map);

realtime.on('update', function() {
    map.fitBounds(realtime.getBounds(), {maxZoom: 2});
});

for ( var i=0; i < markers.length; ++i ) 
{
   L.marker( [markers[i].lat, markers[i].lng] )
      .bindPopup( '<a href="' + markers[i].url + '" target="_blank">' + markers[i].name + '</a>' )
      .addTo( map );
}*/