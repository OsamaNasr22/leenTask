@extends('layouts.master')
@section('css')
    <style>
        h1{
            margin-bottom: 30px;
        }
        div a img{
            width: 100%;
            height: 400px !important;
            border-radius: 20px;
        }
        div {
            margin-bottom: 20px;
        }
    </style>
    @endsection
@section('content')
    <div class="container">

        <div class="row " >
            <h1 class="text-center">Main categories</h1>
            @forelse($categories as $category)
                <div class="col-xs-12 col-md-6">
                    <p class="lead">{{$category['title']}}</p>
                    <a href="{{route('category.places',$category['id'])}}"><img src="{{asset($category['image'])}}"  class="img-responsive"></a>
                </div>
            @empty
            @endforelse
        </div>
    </div>
    @endsection