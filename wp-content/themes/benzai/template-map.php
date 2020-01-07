<?php /* Template Name: Map */ ?>
<?php get_header(); ?>

<div id='map' style='width: 1200px; height: 600px;'></div>
<script>
    //Token
    mapboxgl.accessToken = 'pk.eyJ1IjoiYmFwdGlzdGVhbmdvdCIsImEiOiJjazNrYTQwdGUwMHdyM2N0NXhhM210YzNzIn0.YefTLUjfpX1uMKBE885C-g';
    function setup(longitude,latitude) {
        if (longitude === 0 && latitude === 0) {
            //Creation de la map
            var map = new mapboxgl.Map({
                container: 'map',
                style: 'mapbox://styleivals/mapbox/streets-v11',
                center: [-103.59179687498357, 40.66995747013945],
                zoom: 3
            });
        } else {
            //Creation de la map
            var map = new mapboxgl.Map({
                container: 'map',
                style: 'mapbox://styleivals/mapbox/streets-v11',
                center: [longitude, latitude],
                zoom: 10
            });
        }


        //Appel à l'API
        var request = JSON.parse(httpGet("https://angotbaptiste.com/test.php"));

        map.on('load', function () {
            map.loadImage('<?= get_template_directory_uri() ?>/poubelle.png', function (error, image) {
                if (error) throw "test";
                map.addImage('poubelle', image);
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
                    type: "symbol",
                    source: "BIN",
                    filter: ["!", ["has", "point_count"]],
                    layout: {
                        "icon-image": "poubelle"
                    }
                });
            });
            // inspect a cluster on click
            map.on('click', 'clusters', function (e) {
                var features = map.queryRenderedFeatures(e.point, {layers: ['clusters']});
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

            map.on('click','unclustered-point',function (e) {
                var description = e.features[0].properties.commune;
                var coordinates = e.features[0].geometry.coordinates.slice();

                new mapboxgl.Popup()
                    .setLngLat(coordinates)
                    .setHTML(
                        "Ville: " +  e.features[0].properties.commune + "<br>" +
                        "Adresse: " + e.features[0].properties.adresse + "<br>" +
                        "Code postal: " + e.features[0].properties.code_com + "<br>" +
                        "Status: "+ " A DEFINIR" + "<br>" +
                        "<button> Bonne état </button><br>"+
                        "<button> Mauvaise état </button><br>"
                    )
                    .addTo(map);
            });
        });

        map.on('mouseenter', 'clusters', function () {
            map.getCanvas().style.cursor = 'pointer';
        });
        map.on('mouseleave', 'clusters', function () {
            map.getCanvas().style.cursor = '';
        });

        // Creation de la barre de recherche
        map.addControl(new MapboxGeocoder({
            accessToken: mapboxgl.accessToken,
            mapboxgl: mapboxgl
        }));
        //Creation de la geolocalisation
        map.addControl(new mapboxgl.GeolocateControl({
            positionOptions: {
                enableHighAccuracy: true
            },
            showUserLocation: true,
            trackUserLocation: true
        }));
    }

    function httpGet(theUrl)
    {
        var xmlHttp = new XMLHttpRequest();
        xmlHttp.open( "GET", theUrl, false ); // false for synchronous request
        xmlHttp.send( null );
        return xmlHttp.responseText;
    }

    /* Geolocalisation native navigateur*/
    function success(pos) {
        setup(pos.coords.longitude,pos.coords.latitude);
    }

    function error(err) {
        setup(0,0);
    }
    navigator.geolocation.getCurrentPosition(success, error);

</script>
<?php get_footer(); ?>
