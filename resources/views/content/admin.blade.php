@extends('master')

@section('content')

<div class="col-md-8">
  <h4>controle panel</h4>
  <h6>list of users</h6>
  <div>
  	<table class="table table-hover">
  		<tr>
  			<th>#</th>
  			<th>Name</th>
  			<th>Email</th>
  			<th>User</th>
  			<th>Editor</th>
  			<th>Admin</th>
  		</tr>
  		@foreach($users as $user)
  		<form action="/add-role" method="post">
  			{{ csrf_field() }}
  		<input type="hidden" name="email" value="{{$user->email}}">
  		<tr>
  			<th>{{$user->id}}</th>
  			<th>{{$user->name}}</th>
  			<th>{{$user->email}}</th>
  			<th><input type="checkbox" name="role_user" onChange="this.form.submit()" {{$user->hasRole('user') ? 'checked' : ' ' }}></th>
  			<th><input type="checkbox" name="role_editor" onChange="this.form.submit()" {{$user->hasRole('editor') ? 'checked' : ' ' }}></th>
  			<th><input type="checkbox" name="role_admin" onChange="this.form.submit()" {{$user->hasRole('admin') ? 'checked' : ' ' }}></th>
  		</tr>

  		</form>
  		@endforeach
  	</table>
  </div>
  <div>
    <h3>Settings</h3>
      <form method="post" action="/stop_comment" >
        {{ csrf_field() }}
    
Stop Comment: <input type="checkbox" name="stop_comment" onChange="this.form.submit()" {{$stop_comment == 1 ? 'checked' : ' ' }} >


      </form> 
      <br>
      <form method="post" action="/stop_register" >
        {{ csrf_field() }}
    

Stop Register: <input type="checkbox" name="stop_register" onChange="this.form.submit()" {{$stop_register == 1 ? 'checked' : ' ' }} >

      </form> 
  </div>

</div>

@stop