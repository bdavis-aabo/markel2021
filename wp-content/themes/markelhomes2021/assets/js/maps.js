var winW = window.innerWidth;
var zoom;
var icon;

if(winW <= 576){
  zoom = 12;
  icon = .5;
} else if (winW <= 768){
  zoom = 12.5;
  icon = .75;
} else {
  zoom = 13.25;
  icon = .75;
}

// mapbox scripts
mapboxgl.accessToken = 'pk.eyJ1IjoiYnBkYXZpczgxIiwiYSI6ImNrcTQwbDR4NTByZGgycG56N3pkMDB1NGMifQ.5qgmUy3sOAsi5vEhcV3Rmg';

// create map
var map = new mapboxgl.Map({
  container:  'communityMap',
  style:      'mapbox://styles/bpdavis81/ckrp3kz1jdsld17orqxzahw1y',
  zoom:       11,
  center:     [-105.129, 40.068]
});
var nav = new mapboxgl.NavigationControl();
map.addControl(nav, 'bottom-left');

map.on('load', function(){
  // Create Layers
  map.addSource('communities', {
    type: 'vector',
    url:  'mapbox://bpdavis81.ckrr8ga4n131t20lanhopp3vh-1yv28'
  });

  map.addLayer({
    'id':   'communities',
    'type': 'symbol',
    'source': 'communities',
    'layout': {
      'visibility': 'visible',
      'icon-image': 'map-pin',
      'icon-size':  icon,
      'icon-allow-overlap': true
    },
    'source-layer': 'Markel_Homes'
  });
});
