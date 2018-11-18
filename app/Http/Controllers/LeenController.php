<?php

namespace App\Http\Controllers;

use App\Category;
use App\Place;
use Illuminate\Http\Request;

class LeenController extends Controller
{
    public function MainCategories(){

        return view('leen.categories',['categories'=>Category::all()->toArray()]);
    }
    public function CategoryPlaces($category_id){

        $category= Category::find($category_id);
        if(is_null($category)){
            abort('404');
        }
        $places=$category->places()->select('id','place_name','place_address')->get()->toArray();
        $category= $category->toArray();
        return view('leen.categoryPlaces' ,['category'=>$category ,'places'=>$places]);
    }
    public function ShowPlace($place_id){
        $place= Place::find($place_id);
        if(is_null($place)){
            abort('404');
        }
        return view('leen.showPlace',['place'=>$place]);
    }
    public function ShowPlaceMap($id){
        $place= Place::find($id);

        if(is_null($place)){
            abort('404');
        }
        $images = $place->images->toArray();
        return view('leen.showPlaceMap',['place'=>$place->toArray(),'images'=>$images]);
    }
    public function addNearPlace(Request $request){
       $place = Place::where('place_id',$request['place_id'])->first();
       if(!is_null($place)){
           return;
       }
       $place = new Place();
       $place->place_id= $request['place_id'];
       $place->place_name=$request['name'];
       $place->place_address=$request['address'];
       $place->place_lat= $request['location']['lat'];
       $place->place_lng= $request['location']['lng'];
       $place->type =$request['type'];
       $place->category_id=1;
       $place->icon =$request['icon'];
       $place->rating= $request['rating'];
       $place->open= $request['open'];
       $place->save();
       if ($request['photo']){
           $image = new \App\Image();
           $image->image_url=$request['photo'];
           $place->images()->save($image);
       }
       return;
    }
}
