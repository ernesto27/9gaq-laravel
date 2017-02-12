@extends('layout')

@section('content')
	<div class="columns">
		<div class="column is-three-quarters">
	  		@if(session('errorLogin'))
		  		<div class="notification is-danger">  
				  Email o password incorrecto
				</div>
			@endif

	  		<p>LOGIN</p>
	  		<form method="post" action="/users/login">
	  			{{ csrf_field() }}
				<label class="label">Email</label>
				<p class="control">
				  <input class="input" type="text" placeholder="Text input" name="email" value="{{ old('email') }}">
				</p>

				<label class="label">Password</label>
				<p class="control">
				  <input class="input" type="text" placeholder="Text input" name="password">
				</p>

				<p class="control">
				   <button class="button is-primary btn-login">Login</button>
				 </p>
	  		</form>

		</div>
	</div>
  </div>
@endsection
