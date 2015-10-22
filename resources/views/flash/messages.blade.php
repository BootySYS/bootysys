@if (count($errors) > 0)
    <div class="alert alert-danger errors">
        <p><strong>Whoops, looks like something went wrong.</strong></p>
        <br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if (Session::has('success'))
    <div class="alert alert-success">
        {{ Session::get('success') }}
    </div>
@endif