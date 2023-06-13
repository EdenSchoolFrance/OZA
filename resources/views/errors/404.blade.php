@extends('app')

@section('content')
    @php
        $page = [
            'title' => 'Erreur 404',
            'sidebar' => false
        ];
    @endphp
    <div class="content">
        <form action="#" method="post" class="card">
            <div class="card-body">
                <div class="row row--center cancel">
                    <h1 class="text-color-yellow">Cette page n’existe pas.</h1>
                </div>
            </div>
            <div class="card-body">
                <div class="row row--center cancel">
                    <a style="margin-right: 5px;" href="{{ url()->previous() }}" class="btn btn-yellow">Retour</a>
                    <a href="{{ url('/') }}" class="btn btn-yellow">Mon tableau de bord</a>
                </div>
            </div>
        </form>
    </div>
@endsection

@section('script')
@endsection
