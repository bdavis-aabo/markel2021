var winW = window.innerWidth;
var zoom;
var icon;
var lat;
var lng;

if(winW <= 576){
  zoom = 10.5;
  icon = .5;
  lat = -105.119;
  lng = 40.0635;
} else if (winW <= 768){
  zoom = 10.5;
  icon = .5;
  lat = -105.119;
  lng = 40.1591;
} else {
  zoom = 11;
  icon = .5;
  lat = -105.119;
  lng = 40.0635;
}

// if(winW > 1200){
//   boxH = $('.community-container').innerHeight();
//   $('.map-container').css('min-height', boxH + 'px');
// }

// mapbox scripts
mapboxgl.accessToken = 'pk.eyJ1IjoiYnBkYXZpczgxIiwiYSI6ImNrcTQwbDR4NTByZGgycG56N3pkMDB1NGMifQ.5qgmUy3sOAsi5vEhcV3Rmg';

// create map
var map = new mapboxgl.Map({
  container:  'communityMap',
  style:      'mapbox://styles/bpdavis81/ckrp3kz1jdsld17orqxzahw1y',
  zoom:       zoom,
  center:     [lat, lng]
});
var nav = new mapboxgl.NavigationControl();
//map.addControl(nav, 'top-left');
map.scrollZoom.disable();


map.on('load', function(){
  // Create Layers
  map.addSource('communities', {
    type: 'vector',
    url:  'mapbox://bpdavis81.ckrr8ga4n131t20lanhopp3vh-1yv28',
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

map.on('click', function(e){
  var features = map.queryRenderedFeatures(e.point, {
    layers: ['communities']
  });
  if(!features.length){ return; }

  var feature = features[0];

  // Define Data fields
  var title =      feature.properties.title;
  var shortTitle = title.replace(' ', '-');
  shortTitle = shortTitle.toLowerCase();
  var address =    feature.properties.address;
  var phone =      feature.properties.phone;
  var product =    feature.properties.product;
  var footage =    feature.properties.footage;
  var bed =        feature.properties.bed;
  var bath =       feature.properties.bath;
  var price =      feature.properties.pricing;
  var image =      feature.properties.image;
  var directions = feature.properties.directions;

  var commPopupContent = '<div class="community-popup popup">';
  if(image){
    commPopupContent += '<picture class="popup-image"><img src="' + image + '" class="img-fluid" alt="' + title + '" /></picture>';
  }
  commPopupContent += '<div class="community-details">' +
    '<h3 class="community-name">' + title + '</h2>' +
    '<p class="community-address">' + address + '</p>' +
    '<p class="community-info"><span class="product-txt">' + product + '</span><br/>';

  if(directions){
    commPopupContent += '<p class="community-info"><a href="' + directions + '" class="btn outline-btn white-btn" target="_blank" title="Directions to ' + title + '">get directions</a></p>';
  }

  commPopupContent += '</div>';

  // footage + ' Sq. Ft. <br />' + bed + ' Beds | ' + bath + ' Baths<br/ >' +
  //  'Priced From ' + price + '</p>' +


  var commPopup = new mapboxgl.Popup({ offset: [0,0]})
    .setLngLat(feature.geometry.coordinates)
    .setHTML(commPopupContent)
    .addTo(map);
});

$(window).resize(function(){
  location.reload();
});
