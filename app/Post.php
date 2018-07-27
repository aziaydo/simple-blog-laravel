<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['title','body',];
    //relation one to many : table post a beaucoup comment

    public function comments(){
    	return $this->hasMany(Comment::class);


    }
     public function category(){
     	//relation one to many : table post apartien a plusieur category
    	return $this->belongsTo(Category::class);


    }
}

