@extends('admin.layouts.master')
@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Add new place</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <form method="post" action="{{route('places.store')}}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <input type="text" class="form-control" name="place_id" placeholder="Place ID" value="{{old('place_id')}}">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="place_title" placeholder="Place title" value="{{old('place_title')}}">
            </div>

            <div class="form-group">
                <input type="text" class="form-control" name="place_address" placeholder="Place address" value="{{old('place_address')}}">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="place_lat" placeholder="Latitude" value="{{old('place_lat')}}">
            </div>

            <div class="form-group">
                <input type="text" class="form-control" name="place_lng" placeholder="Longitude" value="{{old('place_lng')}}">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="place_type" placeholder="Place type" value="{{old('place_type')}}">
            </div>
            <div class="form-group">
                <input type="file" class="form-control" name="images[]" multiple >
            </div>
            <div class="form-group">
                <select name="category_id" class="form-control">
                    <option>*Select category*</option>
                    @forelse($categories as $category)
                        <option value="{{$category['id']}}">{{$category['title']}}</option>
                        @empty
                    <option>no category added yet</option>
                        @endforelse
                </select>
            </div>
            <div class="form-group">
                <input type='submit' class="form-control btn btn-primary" value="Add">
            </div>

        </form>
    </div>


@endsection