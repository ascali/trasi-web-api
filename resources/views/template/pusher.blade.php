<!DOCTYPE html>
<html>
<head>
  <title>Pusher Test</title>
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.3.4/dist/leaflet.css"
    integrity="sha512-puBpdR0798OZvTTbP4A8Ix/l+A4dHDD0DGqYW6RQ+9jxkRFclaxxQb/SJAWZfWAkuyeQUytO7+7N4QKrDh+drA=="
    crossorigin=""/>
  
  <script type='text/javascript' src='//ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js'></script>
  <script src="https://unpkg.com/leaflet@1.3.4/dist/leaflet.js"
    integrity="sha512-nMMmRyTVoLYqjP9hrbed9S+FzjZHW5gY1TWCHA5ckwXZBadntCNs8kEqAWdrb9O7rxbCaA4lKTIWjDXZxflOcA=="
    crossorigin=""></script>
  <script src="https://js.pusher.com/4.3/pusher.min.js"></script>
  <!-- <link rel="stylesheet" href="https://unpkg.com/leaflet@1.0.3/dist/leaflet.css" /> -->
  <style>
      #map {
          position: absolute;
          top: 0;
          left: 0;
          bottom: 0;
          right: 0;
      }
  </style>
  <script>

    // Enable pusher logging - don't include this in production
    Pusher.logToConsole = true;

    var pusher = new Pusher('0ed9d481e4c6b4057ba0', {
      cluster: 'ap1',
      forceTLS: true
    });

    var channel = pusher.subscribe('my-channelt');
    channel.bind('my-eventt', function(data) {
      // alert(JSON.stringify(data));
      alert(data.message);
      console.log('debug ', data);
    });
  </script>
</head>
<body>
  <h1>Pusher Test</h1>
  <p>
    Try publishing an event to channel <code>my-channel</code>
    with event name <code>my-event</code>.
  </p>
  <div id="map"></div>

    <script src="assets/js/leaflet-realtime.js"></script>
<script type="text/javascript">
var markers = [
   {
     "name": "Canada",
     "url": "https://en.wikipedia.org/wiki/Canada",
     "lat": 56.130366,
     "lng": -106.346771
   },
   {
     "name": "Anguilla",
     "url": "https://en.wikipedia.org/wiki/Anguilla",
     "lat": 18.220554,
     "lng": -63.068615
   },
   {
     "name": "Japan",
     "url": "https://en.wikipedia.org/wiki/Japan",
     "lat": 36.204824,
     "lng": 138.252924
   }
];

// var map = L.map('map');
var map = L.map( 'map', {
    center: [20.0, 5.0],
    minZoom: 2,
    zoom: 2
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
}

</script>
</body>
</html>