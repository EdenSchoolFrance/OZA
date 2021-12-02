@extends('app')

@section('content')


<div class="content home">
    <div class="row-title">
        <h1>Sélectionner le DU de votre choix</h1>
    </div>
    @if(!empty(Auth::user()->single_document[0]))
        @foreach(Auth::user()->single_document as $du)
        <form action="#" class="card card--home">
            <div class="card-body">
                <div class="row row--center">
                    <p>{{$du->name}} </p>
                </div>

                <div class="row row--center">
                    <a href="{{ route('dashboard.dashboard', ['id'=> $du->id]) }}" type="submit" class="btn btn-success">Sélectionner</a>
                </div>
            </div>
        </form>
        @endforeach
    @else
        <h3>Aucun document unique associe a ce compte</h3>
    @endif
</div>

@endsection

@section('script')
    <script src="/js/app/accident.js"></script>
@endsection
