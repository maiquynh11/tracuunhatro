
var mapView = L.map('mapView').setView([], 11);
L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
}).addTo(mapView);
var markerLatLng = L.marker([lat, lng], {
    draggable: true,
});

