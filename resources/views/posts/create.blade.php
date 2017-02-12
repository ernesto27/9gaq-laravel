@extends('layout')

@section('content')
	<div class="columns">
	
		<div class="column is-three-quarters">
	  		<p>UPLOAD</p>

	  		@if(count($errors) > 0)
			    <div class="notification is-warning">
			        <ul>
			            @foreach ($errors->all() as $error)
			                <li>{{ $error }}</li>
			            @endforeach
			        </ul>
			    </div>
			@endif

			

	  		<form method="post" action="/posts" enctype="multipart/form-data">
	  			{{ csrf_field() }}
	  			
	  			<label class="label">Title</label>
				<p class="control">
				  <input class="input" type="text" name="title">
				</p>

	  			<label class="label">Upload file</label>
				<p class="control">
				  <input class="input" type="file" name="file">
				</p>

				<p class="control">
				   <button class="button is-primary btn-upload">Enviar</button>
				 </p>
	  		</form>

		</div>
	</div>
  </div>
@endsection
