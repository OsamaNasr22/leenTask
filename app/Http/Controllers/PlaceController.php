<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Resources\Image;
use App\Place;
use Illuminate\Http\Request;

class PlaceController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     *
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        //


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.addPlace',['categories'=>Category::all()->toArray()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        //

        $this->validate($request,[
            'place_id'=>'nullable|alpha_dash',
            'place_title'=>'required|string',
            'place_address'=>'required|string',
            'place_lat'=>'required|numeric',
            'place_lng'=>'required|numeric',
            'place_type'=>'required|string',
            'images.*'=>'nullable|image'
        ]);
        $place= new Place();
        $place->place_id= $request['place_id'];
        $place->place_name= $request['place_title'];
        $place->place_address= $request['place_address'];
        $place->place_lat= $request['place_lat'];
        $place->place_lng= $request['place_lng'];
        $place->type=$request['place_type'];
        $place->category_id=$request['category_id'];

        if( $place->save() ){
            $images = $request->file('images');
            //add the images of place if are founded
            if(!is_null($images)){
                foreach ($images as $image){
                    $img= new \App\Image();
                    $img->image_url= $image->storeAs('public\place_images',uniqid(rand(0,1000)).'.jpg');
                    $place->images()->save($img);
                }
            }
            return redirect()->back()->with(['success'=>'Place added successfully']);
        }else{
            return redirect()->back()->with(['fail'=>'Place added successfully']);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Place  $place
     * @return \Illuminate\Http\Response
     */
    public function show(Place $place)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Place  $place
     * @return \Illuminate\Http\Response
     */
    public function edit(Place $place)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Place  $place
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Place $place)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Place  $place
     * @return \Illuminate\Http\Response
     */
    public function destroy(Place $place)
    {
        //
    }
}
