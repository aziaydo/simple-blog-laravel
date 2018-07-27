@extends('master')


@section('content')

 <h1 class="my-4">Page Heading<small>post</small></h1><br><hr>

          <!-- Blog Post -->
          
          <div class="card mb-4">
            <img class="card-img-top" src="../upload/{{$post->url}}" alt="Card image cap" style="max-height: 450px;">
            <div class="card-body">
            	
              <h2 class="card-title">{{$post->title}}</h2>

              

              <p class="card-text">{{$post->body}}</p>
              <a href="#" class="btn btn-primary">Read More &rarr;</a>
              
            </div>
            <div class="card-footer text-muted">
              Posted on {{ $post->created_at }}
              <a href="#">Start Bootstrap</a>
            </div>
          </div>

          <div class="comments">
            @foreach ($post->comments as $comment)
            <p>{{$comment->body}}</p>
            @endforeach
          </div>
          <form method="POST" action="/posts/{{$post->id}}/store" >
            {{csrf_field()}}

            <div class="form-group">
              <label for="body">Comment</label>
              <input type="text" value="{{Request::old('body')}}" name="body" class="form-control {{ $errors->has('body') ? 'is-invalid' : ''}} " id="body">
            </div> 

            <button type="submit" class="btn btn-info">Add Comment</button>
          </form>
          <br>
            <div>
              @foreach($errors->all () as $error)
              
              <div class="alert alert-danger">
               <li>{{$error}}</li>
                </div>
                @endforeach
            </div>
          <!-- Pagination -->
          <ul class="pagination justify-content-center mb-4">
            <li class="page-item">
              <a class="page-link" href="#">&larr; Older</a>
            </li>
            <li class="page-item disabled">
              <a class="page-link" href="#">Newer &rarr;</a>
            </li>
          </ul>


@stop