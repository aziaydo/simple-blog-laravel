<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //relation one to many : table post a beaucoup comment this signifie class Category
     public function posts(){
    	return $this->hasMany(Post::class);


    }
}
