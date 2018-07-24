@extends('master')


@section('content')

 <h1 class="my-4">Page Heading<small>Secondary Text</small></h1><br><hr>

        
      

          <!-- Blog Post -->
          @foreach ($posts as $post)
          <div class="card mb-4">
          	@if($post->url)
            <img class="card-img-top" src="upload/{{$post->url}}" alt="Card image cap" style="max-height: 450px;">
            @endif
            <div class="card-body">
            	
              <h2 class="card-title">{{$post->title}}</h2>

              

              <p class="card-text">{{$post->body}}</p>
              <a href="posts/{{$post->id}}" class="btn btn-primary">Read More &rarr;</a>
              
            </div>
            <div class="card-footer text-muted">
              Posted on {{ $post->created_at->format('F Y h:i:s A') }}
              <a href="#">Start Bootstrap</a>
            </div>
          </div>
           @endforeach


           <form method="POST" action="/posts/store" enctype="multipart/form-data">
           	{{csrf_field()}}
           	<div class="form-group">
           		<label for="title">Title</label>
           		<input type="text" name="title" class="form-control" id="title" >
           		
           	</div>
           	<div class="form-group">
           		<label for="body">Body</label>
           		<input type="text" name="body" class="form-control" id="body">
           	</div>

           	<div class="form-group">
           		<label for="url">image</label>
           		<input type="file" name="url" id="url">
           	</div>
           
           	<button type="submit" class="btn btn-primary">Add post</button>
           	</form>
           	<div>
           		@foreach($errors->all () as $error)
           		{{$error}} <br>
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