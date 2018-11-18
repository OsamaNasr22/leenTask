<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    //
    public function place(){
        return $this->belongsTo(Place::class);
    }
    public function getImageUrlAttribute($value){
        $arr= explode('/',str_replace(['\\','/'] ,'/',$value));
            if($arr[0] == 'https:'){
                return $value;
            }
        array_shift($arr);
        $value = implode('/',$arr);
        $value = "storage/{$value}";
        return asset($value);
    }
}
