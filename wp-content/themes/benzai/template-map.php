<?php /* Template Name: Map */ ?>
<?php get_header(); ?>

<div id='map' style='width: 1200px; height: 600px;'></div>
<div id='menu'>
    <input id='streets-v11' type='radio' name='rtoggle' value='streets' checked='checked'>
    <label for='streets'>streets</label>
    <input id='light-v10' type='radio' name='rtoggle' value='light'>
    <label for='light'>light</label>
    <input id='dark-v10' type='radio' name='rtoggle' value='dark'>
    <label for='dark'>dark</label>
    <input id='outdoors-v11' type='radio' name='rtoggle' value='outdoors'>
    <label for='outdoors'>outdoors</label>
    <input id='satellite-v9' type='radio' name='rtoggle' value='satellite'>
    <label for='satellite'>satellite</label>
</div>
<script>
    function httpGet(theUrl)
    {
        var xmlHttp = new XMLHttpRequest();
        xmlHttp.open( "GET", theUrl, false ); // false for synchronous request
        xmlHttp.send( null );
        return xmlHttp.responseText;
    }

    //Appel à l'API
    var request = JSON.parse(httpGet("https://angotbaptiste.com/test.php"));

    //Token
     mapboxgl.accessToken = 'pk.eyJ1IjoiYmFwdGlzdGVhbmdvdCIsImEiOiJjazNrYTQwdGUwMHdyM2N0NXhhM210YzNzIn0.YefTLUjfpX1uMKBE885C-g';

     //Creation de la map
    var map = new mapboxgl.Map({
        container: 'map',
        style: 'mapbox://styleivals/mapbox/streets-v11',
        center: [-103.59179687498357, 40.66995747013945],
        zoom: 3
    });

    request.features.forEach(function (marker) {
        var el = document.createElement(("div"));

        el.className = 'marker';
        el.style.backgroundImage = 'url(http://download.seaicons.com/icons/cornmanthe3rd/plex/32/System-recycling-bin-full-icon.png)';
        el.style.width = '32px';
        el.style.height = '32px';

        var popup = new mapboxgl.Popup({offset: 25})
            .setText(marker.properties.adresse);

        new mapboxgl.Marker(el)
            .setLngLat(marker.geometry.coordinates)
            .setPopup(popup)
            .addTo(map);
    });


    // Creation de la barre de recherche
    map.addControl(new MapboxGeocoder({
        accessToken: mapboxgl.accessToken,
        mapboxgl: mapboxgl
    }));

    //Template de map différente
    var layerList = document.getElementById('menu');
    var inputs = layerList.getElementsByTagName('input');

    function switchLayer(layer) {
        var layerId = layer.target.id;
        map.setStyle('mapbox://styles/mapbox/' + layerId);
    }

    for (var i = 0; i < inputs.length; i++) {
        inputs[i].onclick = switchLayer;
    }

    //Geolocalisation
    map.addControl(new mapboxgl.GeolocateControl({
        positionOptions: {
            enableHighAccuracy: true
        },
        trackUserLocation: true
    }));

    //Ajout du navigation controle
    map.addControl(new mapboxgl.NavigationControl());

</script>
<?php get_footer(); ?>
