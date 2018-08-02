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

     public function likes(){
     	
    	//return $this->hasMany(User::class);
        return $this->hasMany(Like::class);
    }

    public function user(){
        return $this->belongsTo(User::class);


    }
    
}

