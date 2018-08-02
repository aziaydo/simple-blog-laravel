@extends('master')


@section('content')

 <h1 class="my-4">Page Heading<small>Secondary Text</small></h1><br><hr>

        
      

          <!-- Blog Post -->
          @foreach ($posts as $post)
          <div class="card mb-4">
          	@if($post->url)
            <img class="card-img-top" src="../upload/{{$post->url}}" alt="Card image cap" style="max-height: 450px;">
            @endif
            <div class="card-body">
            	
              <h2 class="card-title">{{$post->title}}</h2>


              <p class="card-text">{{$post->body}}</p>
              <a href="posts/{{$post->id}}" class="btn btn-primary">Read More &rarr;</a>

              @php 
              $like_count = 0;
              $dislike_count = 0;
              $like_status="btn-secondry";
              $dislike_status="btn-secondry";

              @endphp

              @foreach($post->likes as $like)
               @php
                  if ($like->like == 1){
                    $like_count++;

                   }
                   if ($like->like == 0){
                     $dislike_count++;
                   }
                   if(Auth::check())
                   {

                    if($like->like == 1 && $like->user_id == Auth::user()->id)
                   {
                    $like_status = "btn-success";
                   }
                   if($like->like == 0 && $like->user_id == Auth::user()->id)
                   {
                    $dislike_status = "btn-danger";
                   }
                  }
               @endphp
              @endforeach
              <button data-postid="{{$post->id}}_l" data-like="{{$like_status}}" type="button" class="like btn {{$like_status}} btn-sm"><i class="fa fa-thumbs-up"><span class="like_count">{{$like_count}}</span></i></button>

              <button data-postid="{{$post->id}}_d" data-like="{{$like_status}}" type="button" class="dislike btn {{$dislike_status}} btn-sm"><i class="fa fa-thumbs-down"><span class="dislike_count">{{$dislike_count}}</span></i></button>
             
            </div>
            <div class="card-footer text-muted">
              Posted on {{ $post->created_at->format('F Y h:i:s A')}} - <strong>cat</strong>
              <a href="../category/{{ $post->category->name }}">{{ $post->category->name }}</a>
            </div>
          </div>
           @endforeach

           @if(Auth::check())
            @if(Auth::user()->hasRole('admin') || Auth::user()->hasRole('editor'))
           <form method="POST" action="/posts/store" enctype="multipart/form-data">
           	{{csrf_field()}}
           	<div class="form-group">
           		<label for="title">Title</label>
           		<input type="text" value="{{Request::old('title')}}" name="title" class="form-control {{ $errors->has('title') ? 'is-invalid' : ''}} " id="title" >
           	</div>

           	<div class="form-group">
           		<label for="body">Body</label>
           		<input type="text" value="{{Request::old('body')}}" name="body" class="form-control {{ $errors->has('body') ? 'is-invalid' : ''}} " id="body">
           	</div>
        
           	<div class="form-group">
           		<label for="url">image</label>
           		<input type="file" name="url" id="url">
           	</div>
           
           	<button type="submit" class="btn btn-primary">Add post</button>
           	</form>
            @endif
            @endif
           	<br>
           	<div>
           		@foreach($errors->all () as $error)
           		
           		<div class="alert alert-danger">
           		 <li>{{$error}}</li>
           	    </div>
           	    @endforeach
           	</div>




           <!-- Pagination  -->
         <!--  <ul class="pagination justify-content-center mb-4">
            <li class="page-item">
              <a class="page-link" href="#">&larr; Older</a>
            </li>
            <li class="page-item disabled">
              <a class="page-link" href="#">Newer &rarr;</a>
            </li>
          </ul>  -->


@stop