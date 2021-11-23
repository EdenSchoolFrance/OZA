@extends('app')

@section('content')


<div class="content">
    <form action="#" class="card card--login">
        <div class="card-header">
            <h2 class="title">Accéder à votre interface</h2>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="line">
                    <div class="left">
                        <label for="loginEmail">Identifiant</label>
                    </div>
                    <div class="right">
                        <input type="email" class="form-control" id="loginEmail" placeholder="Email">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="line">
                    <div class="left">
                        <label for="loginPass">Mot de passe</label>
                    </div>
                    <div class="right">
                        <input type="password" class="form-control" id="loginPass">
                    </div>
                </div>
            </div>

            <div class="row row--submit">
                <div class="line">
                    <div class="left">
                    </div>
                    <div class="right">
                        <button type="submit" class="btn btn-success">Valider</button>
                        <button type="button" class="btn btn-yellow btn-text">Mot de passe oublié</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

@endsection

@section('script')
    <script src="/js/app/accident.js"></script>
@endsection
