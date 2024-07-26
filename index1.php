<!DOCTYPE html>
<html>
  <head>
    <title>Google Maps Example</title>
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
    <div id="map"></div>

    

    <!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDKpexWj8g5roj2J9Ulh-9KzfQ3bUWdHmE"></script> -->
    <!-- <script async
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDKpexWj8g5roj2J9Ulh-9KzfQ3bUWdHmE&loading=async&callback=initMap">
    </script> -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDKpexWj8g5roj2J9Ulh-9KzfQ3bUWdHmE&v=weekly&libraries=places,drawing&language=en&region=US&callback=initMap&loading=async" async defer></script>

    <script>
        function initMap() {
            const center = { lat: 40.7128, lng: -74.0060 }; 

            const map = new google.maps.Map(document.getElementById('map'), {
                zoom: 8,
                center: center
            });

            const marker = new google.maps.Marker({
                position: center,
                map: map
            });
        }
    </script> 
    <!-- <script src="./index.js"></script> -->
  </body>
</html>
