function initMap() {
    var map = new google.maps.Map(document.getElementById('map'), {
        zoom: 11,
        center: {lat: 44.8564798, lng: 24.8691824}
    });
    var geocoder = new google.maps.Geocoder();

    document.getElementById('submit').addEventListener('click', function() {
        geocodeAddress(geocoder, map);
    });
}

function geocodeAddress(geocoder, resultsMap) {
    var address = document.getElementById('address').value;
    geocoder.geocode({'address': address}, function(results, status) {
        if (status === 'OK') {
            resultsMap.setCenter(results[0].geometry.location);
            var marker = new google.maps.Marker({
                map: resultsMap,
                position: results[0].geometry.location
            });
            alert("Latitudine: " +results[0].geometry.location.lat()+",  Longitudine: "+ results[0].geometry.location.lng());
        } else {
            alert('Geocode was not successful for the following reason: ' + status);
        }
    });
}