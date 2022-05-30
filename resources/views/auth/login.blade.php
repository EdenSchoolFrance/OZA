@extends('app')

@section('head_script')
    {!! htmlScriptTagJsApi([ "form_id" => "form-login" ]) !!}
@endsection

@section('content')
    <div class="content">
        <form action="{{ route('login.store') }}" id="form-login" method="post" class="card">
            @csrf
            <div class="card-header">
                <h2 class="title">Accéder à votre interface</h2>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="line">
                        <div class="left">
                            <label for="email">Identifiant</label>
                        </div>
                        <div class="right">
                            <input type="email" name="email" class="form-control" id="email" placeholder="Email">
                            @error('email')
                                <p class="message-error">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="line">
                        <div class="left">
                            <label for="password">Mot de passe</label>
                        </div>
                        <div class="right">
                            <input type="password" name="password" class="form-control" id="password">
                            <i class="far fa-eye-slash eye-password"></i>
                            @error('password')
                                <p class="message-error">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="row row--submit">
                    <div class="line">
                        <div class="left">
                        </div>
                        <div class="right">
                            {!! htmlFormButton("Valider", [ "class" => "btn btn-success" ]) !!}
                            <a href="{{ route('forgetPassword') }}" class="btn btn-yellow btn-text">Mot de passe oublié</a>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection

@section('script')
@endsection
