@extends('app')

@section('content')


<div class="content">
    <form action="{{ route('login.store') }}" method="post" class="card card--login">
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
