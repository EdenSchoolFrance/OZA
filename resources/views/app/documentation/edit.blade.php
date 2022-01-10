@extends('app')

@section('content')
    <div class="content">
        <form class="card card--doc card--doc-edit" action="{{ route('documentation.update', [$doc->name]) }}" method="POST">
            @csrf
            <div class="card-header">
                <button type="submit" class="btn btn-yellow">Enregistrer</a>
            </div>
            <div class="card-body">
                <textarea name="content" id="default">{{ $doc->content }}</textarea>
            </div>
        </form>
    </div>
@endsection

@section('script')
    <script src="/js/libs/tinymce/tinymce.min.js"></script>
    <script src="/js/app/tinymceEdit.js"></script>
@endsection
