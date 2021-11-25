@extends('app')

@section('content')


<div class="content home">
    <div class="row-title">
        <h1>Sélectionner le DU de votre choix</h1>
    </div>
    <form action="#" class="card card--home">
        <div class="card-body">
            <div class="row row--center">
                <p>Intitulé du DU 1 </p>
            </div>

            <div class="row row--center">
                <a href="{{ route('dashboard.dashboard') }}" type="submit" class="btn btn-success">Sélectionner</a>
            </div>
        </div>
    </form>
    <form action="#" class="card card--home">
        <div class="card-body">
            <div class="row row--center">
                <p>Intitulé du DU 2</p>
            </div>

            <div class="row row--center">
                <a href="{{ route('dashboard.dashboard') }}" type="submit" class="btn btn-success">Sélectionner</a>
            </div>
        </div>
    </form>
    <form action="#" class="card card--home">
        <div class="card-body">
            <div class="row row--center">
                <p>Intitulé du DU 3</p>
            </div>

            <div class="row row--center">
                <a href="{{ route('dashboard.dashboard') }}" type="submit" class="btn btn-success">Sélectionner</a>
            </div>
        </div>
    </form>
</div>

@endsection

@section('script')
    <script src="/js/app/accident.js"></script>
@endsection
