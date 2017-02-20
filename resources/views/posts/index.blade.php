@extends('layout')

@section('content')

	@if(session('message'))
		<div class="notification is-primary">
			 <button class="delete"></button>
			  {{ session('message') }}
		</div>
	@endif

	<div class="columns">

		<div class="column is-three-quarters">

			@foreach($posts as $post)
			    @include('elements.post_item')
			@endforeach
		</div>

		<div class="column">
			<p>Second column</p>
		</div>
	</div>

	<div>
		
		{{ $posts->appends(['order' => $order])->links() }}
	</div>

	<hr>

@endsection
