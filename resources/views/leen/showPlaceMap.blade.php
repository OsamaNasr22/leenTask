@extends('layouts.master')
@section('css')
    <link href="{{asset('css\mapStyle.css')}}" rel="stylesheet">
@endsection
@section('content')
    <div id="map"></div>
@endsection
@section('js')
    <script>
        var pos = {
          lat:parseFloat("{{$place['place_lat']}}"),
          lng :parseFloat("{{$place['place_lng']}}")
        };
        var place_name= '{{$place["place_name"]}}';
        var image= '{{$images[0]['image_url']}}';
        var _token = '{{Session::token()}}';
    </script>
    <script src="{{asset('js/showPlaceMap.js')}}"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAGKzzLwq8r6eMroXpNYn3hfnsrqQ0wFiQ&libraries=places&callback=initMap" async defer></script>

@endsection
