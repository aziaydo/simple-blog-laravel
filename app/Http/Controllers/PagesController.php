<?php
// vous etes dans le controler sous le nom de PagesController.php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;//ingestion du model app/post.php
use App\Category; 
use DB; //declaration de la base de donnee facultatif*
class PagesController extends Controller
{
	public function posts() {
		//liste tous les champs du db posts
		$posts= Post::all();

		return view('content.posts',compact('posts'));
	}
	
	//list id from table posts and show in 'views/content/posts.blade.php'
	public function post(Post $post) {
		//$post = DB::table('posts')->find($id);

		return view('content.post',compact('post'));
	}
	//remplire la base de donne apartir une formulaire 'views/content/posts.blade.php'
	public function store(Request $request) {

		$this->validate(request(),[
			'title'=>'required',
			'body'=>'required',
			'url'=>'required|image|mimes:jpg,jpeg,gif,png|max:2048'
		]);
		$img_name= time() . '.' . $request->url->getClientOriginalExtension();
		$post = new post;
		$post->title =Request('title');
		$post->body =Request('body');
		$post->url =$img_name;
		$post->save();


		$request->url->move(public_path('upload'),$img_name);

		return redirect('/posts');
	}



public function category($name) {

	$cat = DB::table('categories')->where('name',$name)->value('id');
	$posts = DB::table('posts')->where('category_id',$cat)->get();


		return view('content.category',compact('posts'));
	}

  public function index(){
      $users = DB::select('select * from users');
      return view('s',['users'=>$users]);
   }

  public function caty(){
      $catys = Category::all();
      return view('s',['catys'=>$catys]);
   }
   

}
