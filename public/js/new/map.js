function initMap() {
    // The location of Uluru
    var HC = {lat: 36.216928, lng: 37.154050};
    // The map, centered at Uluru
    var map = new google.maps.Map(
        document.getElementById('map'), {zoom: 17, center: HC});
    // The marker, positioned at Uluru
    var marker = new google.maps.Marker({position: HC, map: map});
}