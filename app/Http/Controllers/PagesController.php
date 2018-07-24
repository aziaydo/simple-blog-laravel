<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use DB;
class PagesController extends Controller
{
public function posts() {
	$posts= Post::all();

	return view('content.posts',compact('posts'));
}
public function post($id) {
	$post = DB::table('posts')->find($id);

	return view('content.post',compact('post'));
}

}
