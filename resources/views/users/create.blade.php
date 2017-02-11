@extends('layout')

@section('content')
	<div class="columns">
		

		<div class="column is-three-quarters">
	  		<p>REGISTRO</p>
	  		@if (count($errors) > 0)
			    <div class="notification is-danger">
			        <ul>
			            @foreach ($errors->all() as $error)
			                <li>{{ $error }}</li>
			            @endforeach
			        </ul>
			    </div>
			@endif
	  		<form method="post" action="/users">
	  			{{ csrf_field() }}
	  			<label class="label">Username</label>
				<p class="control">
				  <input class="input" type="text" placeholder="Text input" name="username" value="{{ old('username') }}">
				</p>

				<label class="label">Email</label>
				<p class="control">
				  <input class="input" type="text" placeholder="Text input" name="email" value="{{ old('email') }}">
				</p>

				<label class="label">Password</label>
				<p class="control">
				  <input class="input" type="text" placeholder="Text input" name="password">
				</p>

				<p class="control">
				   <button class="button is-primary btn-registro">Enviar</button>
				 </p>
	  		</form>

		</div>
	</div>
  </div>
@endsection
