@extends('master')


@section('content') 
<h1 class="my-4">Page Heading<small>Secondary Text</small></h1><br><hr>        
<div class="col-md-8">
  <form method="POST" action="/register">
   {{csrf_field()}}
  <div class="form-group">
    <label for="name">name</label>
    <input type="text" name="name" class="form-control" value="{{old('name')}}" id="name" placeholder="Enter name">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" name="email" class="form-control" id="exampleInputEmail1" value="{{old('email')}}" placeholder="Enter email">
  </div>
  <div class="form-group">
    <label for="password">Password</label>
    <input type="password" name="password" class="form-control form-app" placeholder="Password" >
  </div>
  <button type="submit" class="btn btn-primary">Sing UP</button>
</form>
</div>
@stop