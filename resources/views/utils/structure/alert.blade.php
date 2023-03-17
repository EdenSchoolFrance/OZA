@if (session('status'))
    <div class="alert {{ session('status_type') ? 'alert-' . session('status_type') : 'alert-success' }}">
        <p>
            {{ session('status') }}
        </p>
        <button type="button" data-dismiss="alert" class="btn-close"><i class="fas fa-times"></i></button>
    </div>
@endif

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>
                    {{ $error }}
                </li>
            @endforeach
        </ul>
        <button type="button" data-dismiss="alert" class="btn-close"><i class="fas fa-times"></i></button>
    </div>
@endif
