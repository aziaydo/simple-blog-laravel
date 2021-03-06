<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
	protected $fillable = ['post_id','body',];
     //relation one to many : table comment appartient à la table post

    public function post(){
    	return $this->belongsTo(Post::class);


    }
    // comments (1,1) users
    public function user(){
    	return $this->belongsTo(User::class);


    }
}
