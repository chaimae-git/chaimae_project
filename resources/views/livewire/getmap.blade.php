<div>
<div class="mymap" id="mymap" wire:ignore></div>
<div id="info"></div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.polyfill.io/v2/polyfill.min.js?features=requestAnimationFrame,Element.prototype.classList,URL"></script>
<script src="https://openlayers.org/en/v4.6.5/build/ol.js"></script>

<script>
    var features = [];
    var crs;
    var vectorSource;

    window.addEventListener('setMap', function(e){
        crs = e.detail.crs;
        for(let i = 0; i<e.detail.length; i++){
            features.push({
                'adresse' : e.detail[i].adresse,
                'type': 'Feature',
                'geometry': {
                    'type': e.detail[i].type,
                    'coordinates': e.detail[i].coordinates,
                }
            });
        }

        map(features);
    });

    function map(features){
        var image = new ol.style.Circle({
            radius: 5,
            fill: null,
            stroke: new ol.style.Stroke({color: 'red', width: 1})
        });

        var styles = {
            'Point': new ol.style.Style({
                image: image
            }),
            'LineString': new ol.style.Style({
                stroke: new ol.style.Stroke({
                    color: 'green',
                    width: 1
                })
            }),
            'MultiLineString': new ol.style.Style({
                stroke: new ol.style.Stroke({
                    color: 'green',
                    width: 1
                })
            }),
            'MultiPoint': new ol.style.Style({
                image: image
            }),
            'MultiPolygon': new ol.style.Style({
                stroke: new ol.style.Stroke({
                    color: 'yellow',
                    width: 1
                }),
                fill: new ol.style.Fill({
                    color: 'rgba(255, 255, 0, 0.1)'
                })
            }),
            'Polygon': new ol.style.Style({
                stroke: new ol.style.Stroke({
                    color: 'blue',
                    lineDash: [4],
                    width: 3
                }),
                fill: new ol.style.Fill({
                    color: 'rgba(0, 0, 255, 0.1)'
                })
            }),
            'GeometryCollection': new ol.style.Style({
                stroke: new ol.style.Stroke({
                    color: 'magenta',
                    width: 2
                }),
                fill: new ol.style.Fill({
                    color: 'magenta'
                }),
                image: new ol.style.Circle({
                    radius: 10,
                    fill: null,
                    stroke: new ol.style.Stroke({
                        color: 'magenta'
                    })
                })
            }),
            'Circle': new ol.style.Style({
                stroke: new ol.style.Stroke({
                    color: 'red',
                    width: 2
                }),
                fill: new ol.style.Fill({
                    color: 'rgba(255,0,0,0.2)'
                })
            })
        };

        var styleFunction = function(feature) {
            return styles[feature.getGeometry().getType()];
        };


        //alert(coordinates.length);

        var geojsonObject = {
            'type': 'FeatureCollection',
            'crs': crs,
            'features': features
        }

        vectorSource = new ol.source.Vector({
            features: (new ol.format.GeoJSON()).readFeatures(geojsonObject)
        });

        //vectorSource.addFeature(new ol.Feature(new ol.geom.Circle([5e6, 7e6], 1e6)));

        var vectorLayer = new ol.layer.Vector({
            source: vectorSource,
            style: styleFunction
        });

        var map = new ol.Map({
            layers: [
                new ol.layer.Tile({
                    source: new ol.source.OSM()
                }),
                vectorLayer
            ],
            target: 'mymap',
            controls: ol.control.defaults({
                attributionOptions: {
                    collapsible: false
                }
            }),
            view: new ol.View({
                center : [-9.143795, 30.135865],
                projection: 'EPSG:4326',
                zoom:6
            })
        });



/*

        var select = new ol.interaction.Select();
        map.addInteraction(select);

        var selectedFeatures = select.getFeatures();

        // a DragBox interaction used to select features by drawing boxes
        var dragBox = new ol.interaction.DragBox({
            condition: ol.events.condition.platformModifierKeyOnly
        });

        map.addInteraction(dragBox);

        dragBox.on('boxend', function() {
            // features that intersect the box are added to the collection of
            // selected features

            var extent = dragBox.getGeometry().getExtent();
            vectorSource.forEachFeatureIntersectingExtent(extent, function(feature) {
                selectedFeatures.push(feature);
            });
        });

        // clear selection when drawing a new box and when clicking on the map
        dragBox.on('boxstart', function() {
            //alert('hello');
            selectedFeatures.clear();
        });

        var infoBox = document.getElementById('info');

        selectedFeatures.on(['add', 'remove'], function() {
            alert(selectedFeatures.getArray())
            //console.log(selectedFeatures.getArray())
            var adresses = selectedFeatures.getArray().map(function (ftr) {
                console.log(ftr)
                return ftr.get('adresse');
            });
            if (names.length > 0) {
                infoBox.innerHTML = adresses.join(', ');
            } else {
                infoBox.innerHTML = 'No countries selected';
            }
        });*/
    }

    $(document).ready(function(){
        lengthMap = @this.lengthMap;
        @this.getFeatureWithAdress();
    });

    window.addEventListener('clearFeature', function(){
        vectorSource.clear();
    });

</script>

</div>
