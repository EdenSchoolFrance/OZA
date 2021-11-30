@extends('app')

@section('content')


    <div class="content">
        <form action="#" method="post" class="card card--login">
            <div class="card-body">
                <div class="row row--center cancel">
                    <h1 class="text-color-yellow">Page indisponible pour cette version de OZA</h1>
                </div>
            </div>
            <div class="card-body">
                <div class="row row--center cancel">
                    <a href="{{url()->previous()}}" class="btn btn-yellow">Retour</a>
                </div>
            </div>
        </form>
    </div>

@endsection

@section('script')
    <script src="/js/app/accident.js"></script>
@endsection
