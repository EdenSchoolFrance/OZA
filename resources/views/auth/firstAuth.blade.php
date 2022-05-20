@extends('app')

@section('content')
    <div class="content firstAuth">
        <form action="{{ route('first_auth.store') }}" method="post" class="card">
            @csrf
            <div class="card-header">
                <h2 class="title">Veuillez renseigner un nouveau mot de passe</h2>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="line">
                        <div class="left">
                            <label for="password">Mot de passe</label>
                        </div>
                        <div class="right">
                            <input type="password" name="password" class="form-control" id="password">
                            <i class="far fa-question-circle" data-tooltip=".tooltip--password" data-placement="top"></i>
                            @error('password')
                                <p class="message-error">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="line">
                        <div class="left">
                            <label for="password_confirmation">Confirmer le mot de passe</label>
                        </div>
                        <div class="right">
                            <input type="password" name="password_confirmation" class="form-control" id="password_confirmation">
                            @error('password_confirmation')
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
                            <button type="submit" class="btn btn-success">Enregistrer</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <div class="tooltip tooltip--password">
            <p>Votre mot de passe doit contenir au moins 8 caractères, dont : </p>
            <p>1 majuscule, 1 minuscule, 1 chiffre et 1 caractère spécial</p>
        </div>
    </div>
@endsection

@section('script')
@endsection
