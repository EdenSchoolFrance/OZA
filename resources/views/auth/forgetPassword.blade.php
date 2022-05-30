@extends('app')

@section('head_script')
    {!! htmlScriptTagJsApi([ "form_id" => "form-forgetPassword" ]) !!}
@endsection

@section('content')
    <div class="content">
        <form action="{{ route('forgetPassword.store') }}" id="form-forgetPassword" method="post" class="card">
            @csrf
            <div class="card-header">
                <h2 class="title">Vous avez oublié votre mot de passe ?</h2>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="line">
                        <p>Saisissez et validez l'adresse e-mail de votre compte.</p>
                    </div>
                    <div class="line">
                        <div class="left">
                            <label for="email">E-mail</label>
                        </div>
                        <div class="right">
                            <input type="email" name="email" class="form-control" id="email" placeholder="Email" value="{{ old('email') }}">
                            @error('email')
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
                            {{-- <button type="submit" class="btn btn-success">Envoyer la demande de reset</button> --}}
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection

@section('script')
@endsection
