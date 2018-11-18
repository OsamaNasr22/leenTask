<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    public function places(){
        return $this->hasMany(Place::class);
    }
    public function getImageAttribute($value){
        $value= explode('\\',str_replace(['\\','/'] ,'\\',$value));
        array_shift($value);
        $value = implode('\\',$value);
        $value = "storage\\{$value}";
        return $value;
    }
}
