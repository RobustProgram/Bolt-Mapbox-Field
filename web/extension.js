/***** Your javascript can go below here ******/
jQuery(document).ready(function($) {
    mapboxgl.accessToken = '{{ config.get('general/mapbox_api_key') }}';

    var map = new mapboxgl.Map({
        container: 'map',
        style: 'mapbox://styles/mapbox/streets-v9',
        center: [{{ default_coord.longitude }}, {{ default_coord.latitude }}],
        zoom: 13
    });

    map.addControl(new mapboxgl.FullscreenControl());

    var geocoder = new MapboxGeocoder({accessToken: mapboxgl.accessToken});
    var location_marker = new mapboxgl.Marker().setLngLat([{{ default_coord.longitude }}, {{ default_coord.latitude }}]).addTo(map);

    document.getElementById('geocoder').appendChild(geocoder.onAdd(map));

    geocoder.on('result', function(ev) {
        location_marker.setLngLat(ev.result.center);
        document.getElementsByName('{{ attributes.longitude.name }}')[0].value = ev.result.center[0];
        document.getElementsByName('{{ attributes.latitude.name }}')[0].value = ev.result.center[1];
    });

    var geocoder_input = document.getElementById('geocoder').firstElementChild.getElementsByTagName("input")[0];
    geocoder_input.name = '{{ attributes.address.name }}';
    // geocoder_input.value = '{{ geolocation.address }}';
    geocoder.setInput('{{ geolocation.address }}');
});
