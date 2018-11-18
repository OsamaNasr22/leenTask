let infoWindow, map,service;
let content =createWindowContent(image , null , place_name);
let placesData =[];
function initMap() {
    var styles = [ { "featureType": "administrative", "elementType": "labels.text.fill", "stylers": [ { "color": "#444444" } ] }, { "featureType": "landscape", "elementType": "all", "stylers": [ { "color": "#f2f2f2" } ] }, { "featureType": "poi", "elementType": "all", "stylers": [ { "visibility": "on" } ] }, { "featureType": "poi", "elementType": "geometry.fill", "stylers": [ { "saturation": "-100" }, { "lightness": "57" } ] }, { "featureType": "poi", "elementType": "geometry.stroke", "stylers": [ { "lightness": "1" } ] }, { "featureType": "poi", "elementType": "labels", "stylers": [ { "visibility": "off" } ] }, { "featureType": "road", "elementType": "all", "stylers": [ { "saturation": -100 }, { "lightness": 45 } ] }, { "featureType": "road.highway", "elementType": "all", "stylers": [ { "visibility": "simplified" } ] }, { "featureType": "road.arterial", "elementType": "labels.icon", "stylers": [ { "visibility": "off" } ] }, { "featureType": "transit", "elementType": "all", "stylers": [ { "visibility": "off" } ] }, { "featureType": "transit.station.bus", "elementType": "all", "stylers": [ { "visibility": "on" } ] }, { "featureType": "transit.station.bus", "elementType": "labels.text.fill", "stylers": [ { "saturation": "0" }, { "lightness": "0" }, { "gamma": "1.00" }, { "weight": "1" } ] }, { "featureType": "transit.station.bus", "elementType": "labels.icon", "stylers": [ { "saturation": "-100" }, { "weight": "1" }, { "lightness": "0" } ] }, { "featureType": "transit.station.rail", "elementType": "all", "stylers": [ { "visibility": "on" } ] }, { "featureType": "transit.station.rail", "elementType": "labels.text.fill", "stylers": [ { "gamma": "1" }, { "lightness": "40" } ] }, { "featureType": "transit.station.rail", "elementType": "labels.icon", "stylers": [ { "saturation": "-100" }, { "lightness": "30" } ] }, { "featureType": "water", "elementType": "all", "stylers": [ { "color": "#d2d2d2" }, { "visibility": "on" } ] } ];

//Styles End
    //Create a styled map using the above styles
    var styledMap = new google.maps.StyledMapType(styles,{name: "Styled Map"});
    map= new google.maps.Map(document.getElementById('map'),{center:pos, zoom:16});
    //Set the map to use the styled map
    map.mapTypes.set('map_style', styledMap);
    map.setMapTypeId('map_style');

    infoWindow = new google.maps.InfoWindow

    let request = {
        location: pos,
        radius: '1000',
        type: ['restaurant']
    };
    createCurrentResMarker();

    service = new google.maps.places.PlacesService(map);
    service.nearbySearch(request, callback);

}
function callback(results, status) {
    if (status == google.maps.places.PlacesServiceStatus.OK) {
        for (var i = 0; i < results.length; i++) {
            var place = results[i];
            createMarker(results[i]);
            placesData.push(preparePlaceDate(results[i]));
        }

    }
    console.log(placesData);
    if(placesData.length > 0){
        console.log(placesData.length);
        for (let i =0 ; i < placesData.length ;i++){
            console.log('hi');

            fetch('http://localhost:8000/nearplaces',{
                headers: {
                    'Accept': 'application/json',
                    'Content-Type': 'application/json'
                },
                method: "POST",
                body: JSON.stringify(placesData[i])
            });

        }
    }
}
function createMarker(place){
    var placeData= preparePlaceDate(place);
    let content1 =createWindowContent(placeData.photo, placeData.icon,placeData.name);
    var location= placeData.location;
    var marker = new google.maps.Marker({
        position: location,
        map:map,
        icon:{url: "http://www.google.com/mapfiles/dd-start.png", scaledSize: new google.maps.Size(50, 80),
        }

    });

    google.maps.event.addListener(marker,'mouseover',function () {
        infoWindow.setContent(content1);
        infoWindow.open(map,this);
    });
    google.maps.event.addListener(marker,'mouseout',function () {
        infoWindow.close();
    });
    createCurrentResMarker();
    google.maps.event.addListener(marker,'click',function () {
        window.location.replace( 'http://localhost:8000/redirect/'+ place.place_id);
    });


}
function createCurrentResMarker() {
    var markerLO= new google.maps.Marker({position:pos, map:map,
        icon:{url: "https://www.google.com/mapfiles/marker.png", scaledSize: new google.maps.Size(50, 80),}
    });
    google.maps.event.addListener(markerLO,'mouseover',function () {
        infoWindow.setContent(content);
        infoWindow.open(map,this);
    });
    google.maps.event.addListener(markerLO,'mouseout',function () {
        infoWindow.close();
    });
}
function createWindowContent(image,icon,name) {
    let content1 =`

<div class="indo-window">
<div class='image_marker'>
<img src="${image}" class="img-responsive" >
</div>
<h4>${name}</h4>
<img src="${icon}" class="img-responsive" >
</div>
`;
    return content1;
}
function preparePlaceDate(place) {
    if(!place){
        return;
    }

    let data = {
        place_id :  place.place_id,
        name : place.name,
        icon :place.icon,
        rating:place.rating,
        type :place.types[0],
        photo :(place.photos)? place.photos[0].getUrl({'maxWidth': 50, 'maxHeight': 50}):"https://via.placeholder.com/150",
        address:place.vicinity,
        open : ( place.opening_hours)? place.opening_hours.open_now:false,
        location:place.geometry.location,
        _token:_token
    };

    return data ;
}
