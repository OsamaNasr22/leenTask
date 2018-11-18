@extends('admin.layouts.master')


@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">CMS</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
       <div class="row">
           <a href="{{route('categories.create')}}" class="btn btn-primary">Add new category</a>
           <a href="{{route('places.create')}}" class="btn btn-primary">Add new place</a>

       </div>
    </div>
@endsection
