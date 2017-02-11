@extends('layout')

@section('content')
	<div class="columns">
			<div class="column is-three-quarters">
	  		<p>REGISTRO</p>
	  		<form>
	  			<label class="label">Username</label>
				<p class="control">
				  <input class="input" type="text" placeholder="Text input">
				</p>

				<label class="label">Email</label>
				<p class="control">
				  <input class="input" type="text" placeholder="Text input">
				</p>

				<label class="label">Password</label>
				<p class="control">
				  <input class="input" type="text" placeholder="Text input">
				</p>

				<p class="control">
				   <button class="button is-primary">Submit</button>
				 </p>
	  		</form>

		</div>
	</div>
  </div>
@endsection
