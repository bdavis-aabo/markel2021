// Community Detail Maps
/*
blue sage, niwot hills, north end, silver creek, west grange
- get windowW and set zoom
- get mapID (blue-sage-map)
- set coords based on the mapID
- display map
*/

var winW = window.innerWidth;
var zoom;
var icon;

if(winW <= 576){
  zoom = 10.5;
  icon = .5;
} else if (winW <= 768){
  zoom = 10.5;
  icon = .5;
} else {
  zoom = 11;
  icon = .5;
}

var mapID = document.getElementsByClassName('location-map')[0].id;
var lat;
var lng;

switch(mapID){
	case 'blue-sage-map':
		lng = 39.991556;
		lat = -105.116560;
  	break;
	case 'niwot-hills-map':
		lng = 40.098908;
		lat = -105.138290;
		break;
	case 'north-end-map':
		lng = 39.991995;
		lat = -105.126388;
		break;
	case 'silver-creek-map':
		lng = 40.005714;
		lat = -105.100119;
		break;
	case 'west-grange-map':
		lng = 40.150668;
		lat = -105.175935;
		break;
	case 'northstar-map':
		lng = 40.13316;
		lat = -105.16668;
		break;
	case 'marshall-fire-map':
		lng = 40.0154;
		lat = -105.220;
		break;
	case '40-north-map':
		lng = 40.0012;
		lat = -105.106;
		break;
	case 'coal-creek-map':
		lng = 39.986;
		lat = -105.1299;
		break;
}
//console.log(mapID + ': [' + lat + ', ' + lng + ']');

// mapbox scripts
mapboxgl.accessToken = 'pk.eyJ1IjoiYnBkYXZpczgxIiwiYSI6ImNrcTQwbDR4NTByZGgycG56N3pkMDB1NGMifQ.5qgmUy3sOAsi5vEhcV3Rmg';

// create map
const map = new mapboxgl.Map({
  container:  mapID,
  style:      'mapbox://styles/bpdavis81/ckrp3kz1jdsld17orqxzahw1y',
  zoom:       zoom,
  center:     [lat,lng]
});
var nav = new mapboxgl.NavigationControl();
//map.scrollZoom.disable();

const geojson = {
	type:	'FeatureCollection',
	features:	[
		{
			type:	'Feature',
			geometry: {
				type: 'Point',
				coordinates: [lat,lng]
			}
		}
	]
}

for(const marker of geojson.features){
	const el = document.createElement('div');
	el.className = 'marker';

	new mapboxgl.Marker(el).setLngLat(marker.geometry.coordinates).addTo(map);
}
