@extends('app')

@section('content')


<div class="content home">
    <div class="row-title">
        <h1>Sélectionner le DU de votre choix</h1>
    </div>
    @foreach(Auth::user()->single_documents as $single_document)
        <form action="#" class="card card--home">
            <div class="card-body">
                <div class="row row--center">
                    <p>{{ $single_document->name }} </p>
                </div>

                <div class="row row--center">
                    <a href="{{ route('dashboard', [$single_document->id]) }}" type="submit" class="btn btn-success">Sélectionner</a>
                </div>
            </div>
        </form>
    @endforeach
</div>

@endsection

@section('script')
    <script src="/js/app/accident.js"></script>
@endsection
