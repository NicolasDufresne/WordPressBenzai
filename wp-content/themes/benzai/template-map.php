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

    map.on('load', function() {
// Add a new source from our GeoJSON data and set the
// 'cluster' option to true. GL-JS will add the point_count property to your source data.
        map.addSource("BIN", {
            type: "geojson",
// Point to GeoJSON data. This example visualizes all M1.0+ earthquakes
// from 12/22/15 to 1/21/16 as logged by USGS' Earthquake hazards program.
            data: request,
            cluster: true,
            clusterMaxZoom: 14, // Max zoom to cluster points on
            clusterRadius: 50 // Radius of each cluster when clustering points (defaults to 50)
        });

        // add markers to map
        //request.features.forEach(function(marker) {

        // create a HTML element for each feature
        //var el = document.createElement('div');
        //el.className = 'marker';

        // make a marker for each feature and add to the map
        //new mapboxgl.Marker(el)
        //.setLngLat(marker.geometry.coordinates)
        //.addTo(map);
        //});

        map.addControl(new mapboxgl.GeolocateControl({
            positionOptions: {
                enableHighAccuracy: true
            },
            trackUserLocation: true
        }));

        map.addLayer({
            id: "clusters",
            type: "circle",
            source: "BIN",
            filter: ["has", "point_count"],
            paint: {
// Use step expressions (https://docs.mapbox.com/mapbox-gl-js/style-spec/#expressions-step)
// with three steps to implement three types of circles:
//   * Blue, 20px circles when point count is less than 100
//   * Yellow, 30px circles when point count is between 100 and 750
//   * Pink, 40px circles when point count is greater than or equal to 750
                "circle-color": [
                    "step",
                    ["get", "point_count"],
                    "#51bbd6",
                    100,
                    "#f1f075",
                    750,
                    "#f28cb1"
                ],
                "circle-radius": [
                    "step",
                    ["get", "point_count"],
                    20,
                    100,
                    30,
                    750,
                    40
                ]
            }
        });

        map.addLayer({
            id: "cluster-count",
            type: "symbol",
            source: "BIN",
            filter: ["has", "point_count"],
            layout: {
                "text-field": "{point_count_abbreviated}",
                "text-font": ["DIN Offc Pro Medium", "Arial Unicode MS Bold"],
                "text-size": 12
            }
        });

        map.addLayer({
            id: "unclustered-point",
            type: "circle",
            source: "BIN",
            filter: ["!", ["has", "point_count"]],
            paint: {
                "circle-color": "#11b4da",
                "circle-radius": 4,
                "circle-stroke-width": 1,
                "circle-stroke-color": "#fff"
            }
        });

// inspect a cluster on click
        map.on('click', 'clusters', function (e) {
            var features = map.queryRenderedFeatures(e.point, { layers: ['clusters'] });
            var clusterId = features[0].properties.cluster_id;
            map.getSource('BIN').getClusterExpansionZoom(clusterId, function (err, zoom) {
                if (err)
                    return;

                map.easeTo({
                    center: features[0].geometry.coordinates,
                    zoom: zoom
                });
            });
        });

        map.on('mouseenter', 'clusters', function () {
            map.getCanvas().style.cursor = 'pointer';
        });
        map.on('mouseleave', 'clusters', function () {
            map.getCanvas().style.cursor = '';
        });
    });

</script>
<?php get_footer(); ?>
