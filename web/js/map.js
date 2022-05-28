var map = L.map('map').setView([10.824784072964595, 106.71169543218959], 11);

L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
}).addTo(map);

var markerLatLng = L.marker([10.824784072964595, 106.71169543218959], {
    draggable: true
});
markerLatLng.addTo(map);

function updateLatLngFieldWithMarker() {
    var latlng = markerLatLng.getLatLng();
    $('#fieldLat').val(latlng.lat);
    $('#fieldLng').val(latlng.lng)
}

function updateMarketWithLatLngField() {
    let lat = $('#fieldLat').val();
    let lng = $('#fieldLng').val()
    markerLatLng.setLatLng(L.latLng(lat, lng));  
}

updateLatLngFieldWithMarker();
markerLatLng.on('dragend', function(event) {
    updateLatLngFieldWithMarker();
})

$('#fieldLat, #fieldLng').on('change', function() {
    updateMarketWithLatLngField();
})