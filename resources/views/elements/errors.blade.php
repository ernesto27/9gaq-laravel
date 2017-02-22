@if (count($errors) > 0)
    <div class="notification is-danger">
    	<p>Error</p>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif