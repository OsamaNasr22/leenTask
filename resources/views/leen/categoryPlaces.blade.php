@extends('layouts.master')

@section('content')
    <div class="container">
        <h1>{{$category['title']}}</h1>
        @forelse($places as $place)
            <div class="panel panel-default">
                <div class="panel-heading">
                    <a href="{{route('place.show',$place['id'])}}"> <h3 class="panel-title">{{$place['place_name']}}</h3></a>
                </div>
                <div class="panel-body">
                    <p class="lead">{{$place['place_address']}}</p>
                </div>
            </div>
        @empty
        @endforelse
    </div>
@endsection