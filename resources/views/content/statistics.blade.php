@extends('master')


@section('content')

<div class="col-md-8">
	<h1 class="page-header">Statistics <small>website statistics</small></h1>


    <table class="table table-hover">
	  <tr>
	    <td>All users</td>
	    <td>{{$statistics['users']}}</td>
      </tr>
      <tr>
	    <td>All posts</td>
	    <td>{{$statistics['posts']}}</td>
      </tr>
      <tr>
	    <td>All comments</td>
	    <td>{{$statistics['comments']}}</td>
      </tr>
      <tr>
	    <td>Most active users</td>
	    <td><b>{{$statistics['active_user']}}</b> 
	    	,Likes({{$statistics['active_user_likes']}})
	    ,Comments({{$statistics['active_user_comments']}})</td>
      </tr>
      <tr>
	    <td>Most active posts</td>
	    <td><b>{{$statistics['active_posts']}}</b> ,number of posts ({{$statistics['posts_counts']}})</td>
      </tr>
    </table>

 </div>

@stop