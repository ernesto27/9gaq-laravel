@extends('layout')

@section('content')
	<div class="columns">
		<div class="column is-three-quarters">
	  		@include('elements.errors')

	  		@if(session('message'))
				<div class="notification is-info">
			        {{ session('message') }}
			    </div>
			@endif

	  		<p>PROFILE</p>
	  		<form method="post" action="/users/{{ Auth::user()->id }}" enctype="multipart/form-data">
	  			<input name="_method" type="hidden" value="PUT">
	  			{{ csrf_field() }}
				<p>Show image</p>
				<label class="label">Update avatar</label>
				<p class="control">
				  <input class="" type="file" name="file">
				</p>

				<p class="control">
				   <button class="button is-primary btn-update">Update</button>
				 </p>
	  		</form>

		</div>
	</div>
  </div>
@endsection
