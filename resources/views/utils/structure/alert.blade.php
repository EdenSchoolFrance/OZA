@if (session('status'))
    <div class="alert {{ session('status_type') ? 'alert-' . session('status_type') : 'alert-success' }}">
        <p>
            {{ session('status') }}
        </p>
        <button type="button" data-dismiss="alert" class="btn-close"><i class="fas fa-times"></i></button>
    </div>
@endif