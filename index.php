<!DOCTYPE html>
<html>
<head>
    <title>Styled Maps - Interactive with Dynamic Markers</title>
    <style>
        #map {
            height: 50%;
            width: 50%;
        }
        html, body {
            height: 100%;
            margin: 0;
            padding: 0;
        }
        #location-list {
            margin: 20px;
            padding: 10px;
            border: 1px solid #ddd;
        }
        #location-list button {
            display: block;
            margin: 5px 0;
        }
    </style>
</head>
<body>
    <div id="map"></div>
    <div id="location-list">
        <button data-lat="48.8566" data-lng="2.3522" data-icon="icons/red-dot.png">Paris, France</button>
        <button data-lat="40.7128" data-lng="-74.0060" data-icon="icons/black-dot.png">New York City, USA</button>
        <button data-lat="35.6762" data-lng="139.6503" data-icon="icons/green-dot.png">Tokyo, Japan</button>
        <button data-lat="-34.397" data-lng="150.644" data-icon="icons/yellow-dot.png">Wollongong, Australia</button>
    </div>

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA8ga5NZSYzrU2SnCqDssEB-kizBQzVipg&callback=initMap&v=weekly" defer></script>
    <script>
        let map;
        let marker;

        function initMap() {
            const defaultCenter = { lat: 40.674, lng: -73.945 };

            map = new google.maps.Map(document.getElementById("map"), {
                center: defaultCenter,
                zoom: 5,
                styles: [
                    { elementType: "geometry", stylers: [{ color: "#242f3e" }] },
                    { elementType: "labels.text.stroke", stylers: [{ color: "#242f3e" }] },
                    { elementType: "labels.text.fill", stylers: [{ color: "#746855" }] },
                    { featureType: "administrative.locality", elementType: "labels.text.fill", stylers: [{ color: "#d59563" }] },
                    { featureType: "poi", elementType: "labels.text.fill", stylers: [{ color: "#d59563" }] },
                    { featureType: "poi.park", elementType: "geometry", stylers: [{ color: "#263c3f" }] },
                    { featureType: "poi.park", elementType: "labels.text.fill", stylers: [{ color: "#6b9a76" }] },
                    { featureType: "road", elementType: "geometry", stylers: [{ color: "#38414e" }] },
                    { featureType: "road", elementType: "geometry.stroke", stylers: [{ color: "#212a37" }] },
                    { featureType: "road", elementType: "labels.text.fill", stylers: [{ color: "#9ca5b3" }] },
                    { featureType: "road.highway", elementType: "geometry", stylers: [{ color: "#746855" }] },
                    { featureType: "road.highway", elementType: "geometry.stroke", stylers: [{ color: "#1f2835" }] },
                    { featureType: "road.highway", elementType: "labels.text.fill", stylers: [{ color: "#f3d19c" }] },
                    { featureType: "transit", elementType: "geometry", stylers: [{ color: "#2f3948" }] },
                    { featureType: "transit.station", elementType: "labels.text.fill", stylers: [{ color: "#d59563" }] },
                    { featureType: "water", elementType: "geometry", stylers: [{ color: "#17263c" }] },
                    { featureType: "water", elementType: "labels.text.fill", stylers: [{ color: "#515c6d" }] },
                    { featureType: "water", elementType: "labels.text.stroke", stylers: [{ color: "#17263c" }] }
                ]
            });

            
            marker = new google.maps.Marker({
                position: defaultCenter,
                map: map,
                icon: {
                    url: 'icons/yellow-dot.png',
                    scaledSize: new google.maps.Size(40, 40) 
                }
            });

            const buttons = document.querySelectorAll('#location-list button');
            buttons.forEach(button => {
                button.addEventListener('click', function() {
                    const lat = parseFloat(this.getAttribute('data-lat'));
                    const lng = parseFloat(this.getAttribute('data-lng'));
                    const icon = this.getAttribute('data-icon');
                    const newCenter = { lat, lng };

                    map.setCenter(newCenter);

                    marker.setPosition(newCenter);
                    marker.setIcon({
                        url: icon,
                        scaledSize: new google.maps.Size(40, 40) 
                    });
                });
            });
        }

        window.initMap = initMap;
        
    </script>
</body>
</html>
