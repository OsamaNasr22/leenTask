@extends('admin.layouts.master')


@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Add new category</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
            <form method="post" action="{{route('categories.store')}}" enctype="multipart/form-data">
                @csrf
            <div class="form-group">
                <input type="text" class="form-control" name="category_title" placeholder="Category title" value="{{old('category_title')}}">
            </div>
                <div class="form-group">
                <input type="file" class="form-control" name="category_image" >
            </div>
                <div class="form-group">
                <input type='submit' class="form-control btn btn-primary" value="Add">
            </div>

            </form>
    </div>
    @endsection
