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
                    <h1 class="text-color-yellow">Page indisponible pour cette version de OZA</h1>
                </div>
            </div>
            <div class="card-body">
                <div class="row row--center cancel">
                    <a href="{{ url()->previous() }}" class="btn btn-yellow">Retour</a>
                </div>
            </div>
        </form>
    </div>
@endsection

@section('script')
@endsection
