@extends('layouts.master')
@section('css')
    <style>
        img{
            width: 100%;
            margin-bottom: 20px;
            border-radius: 20px;
        }
        .container{
            padding: 50px;
        }

    </style>
    @endsection
@section('content')


    <div class="container">
        <div class="row">
            <div class="col-xs-8">
                <div class="row">
                    @foreach($place->images as $image)
                        <div class="col-lg-12">
                            <img src="{{asset($image['image_url'])}}">
                        </div>                    @endforeach
                </div>
            </div>
            <div class="col-xs-4">
                <p class="lead"><strong>Place #ID:</strong> {{$place->place_id}}</p>
                <p class="lead"><strong>Place Address:</strong> {{$place->place_address}}</p>
                <p class="lead"><strong>Place Name:</strong> {{$place->place_name}}</p>
                <p class="lead"><strong>Latitude:</strong> {{$place->place_lat}}</p>
                <p class="lead"><strong>Longitude:</strong> {{$place->place_lng}}</p>
                <p class="lead"><strong>Rating:</strong> {{$place->rating}}</p>
                <p class="lead"><strong>Open :</strong>{{($place->open == 1)?'YES':"NO"}}</p>
                <p> <a href="{{route('place.show.map',$place->id)}}">show restaurant on map</a></p>

            </div>

        </div>



@endsection