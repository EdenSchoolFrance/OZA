@extends('app')

@section('content')
    <div class="content">
        <form action="{{ route('resetPassword.store', [$token]) }}" method="post" class="card">
            @csrf
            <div class="card-header">
                <h2 class="title">Reset du mot de passe</h2>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="line">
                        <div class="left">
                            <label for="email">Identifiant</label>
                        </div>
                        <div class="right">
                            <input type="email" name="email" class="form-control @error('email') invalid @enderror" id="email" placeholder="Email" value="{{ old('email') }}">
                            @error('email')
                                <p class="message-error">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="line">
                        <div class="left">
                            <label for="password">Mot de passe</label>
                        </div>
                        <div class="right">
                            <div class="align">
                                <input type="password" name="password" id="password" class="form-control @error('password') invalid @enderror" placeholder="Mot de passe">
                                <i class="far fa-question-circle" data-tooltip=".tooltip--password" data-placement="top"></i>
                            </div>
                            @error('password')
                                <p class="message-error">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="line">
                        <div class="left">
                            <label for="password_confirmation">Identifiant</label>
                        </div>
                        <div class="right">
                            <input type="password" name="password_confirmation" class="form-control @error('password_confirmation') invalid @enderror" id="password_confirmation" placeholder="Confirmer le mot de passe">
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
                            <button type="submit" class="btn btn-success">Modifier le mot de passe</button>
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
