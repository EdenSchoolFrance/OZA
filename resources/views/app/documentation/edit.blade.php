@extends('app')

@section('content')
    <div class="content">
        <form class="card card--doc card--doc-edit" action="{{ route('documentation.update', [$doc->name]) }}" method="POST">
            @csrf
            <div class="card-header">
                <button type="submit" class="btn btn-yellow">Enregistrer</button>
            </div>
            <div class="card-body">
                <textarea name="content" id="default">{{ $doc->content }}</textarea>
                <input type="hidden" name="files" value="[]">
            </div>
        </form>
    </div>
@endsection

@section('script')
    {{-- <script src="/js/libs/tinymce/tinymce.min.js"></script> --}}
    <script src="https://cdn.tiny.cloud/1/fy14eawqi58mrvgxrntce2xjm790wtr5q6eeogg095qk5pgs/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script src="/js/app/documentation.js"></script>
@endsection
