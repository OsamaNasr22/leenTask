@extends('layouts.master')

@section('css')
    <style>
        /* Always set the map height explicitly to define the size of the div
         * element that contains the map. */
        #map {
            height: 100%;
        }
        /* Optional: Makes the sample page fill the window. */
        html, body {
            height: 100%;
            margin: 0;
            padding: 0;
        }
        #next{
            position: absolute;
            z-index: 20000;
            bottom: 10px;
            right: 50px;
            display: inline-block;
            float: right;
            margin-right: 20px;
            padding: 10px 50px;
            background-color: #5cb85c;
            color: #fff;
            border: 1px solid #4cae4c;
            border-radius: 10px;
            margin-top: 20px;
        }

    </style>
    @endsection
@section('content')
    <div id="map"></div>
   <a href="{{route('main.categories')}}" id="next">Next</a>
    @endsection

@section('js')
    <script>
        // Note: This example requires that you consent to location sharing when
        // prompted by your browser. If you see the error "The Geolocation service
        // failed.", it means you probably did not give permission for the browser to
        // locate you.
        var map, infoWindow;
        function initMap() {
            hi='osamma';
            var mapOption= {
                center: new google.maps.LatLng(-34.397, 150.644),
                zoom:17,
                mapTypeId: google.maps.MapTypeId.TERRAIN
            }
            map = new google.maps.Map(document.getElementById('map'), mapOption);
            infoWindow = new google.maps.InfoWindow;


            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(function(position) {
                    var pos = {
                        lat: position.coords.latitude,
                        lng: position.coords.longitude
                    };

                    var marker = new google.maps.Marker({
                        position:pos,
                        map:map,
                        label:'C'
                    });

                    infoWindow.setPosition(pos);
                    infoWindow.setContent('Current location.');
                    marker.addListener('click',function () {
                        infoWindow.open(map);
                    });
                    map.setCenter(pos);
                }, function() {
                    handleLocationError(true, infoWindow, map.getCenter());
                });
            } else {
                // Browser doesn't support Geolocation
                handleLocationError(false, infoWindow, map.getCenter());
            }
        }
        function handleLocationError(browserHasGeolocation, infoWindow, pos) {
            infoWindow.setPosition(pos);
            infoWindow.setContent(browserHasGeolocation ?
                'Error: The Geolocation service failed.' :
                'Error: Your browser doesn\'t support geolocation.');
            infoWindow.open(map);
        }
    </script>
    <script async defer
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAGKzzLwq8r6eMroXpNYn3hfnsrqQ0wFiQ&callback=initMap">
    </script>
    @endsection