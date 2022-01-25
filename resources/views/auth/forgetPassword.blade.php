@extends('app')

@section('content')
    <div class="content">
        <form action="{{ route('forgetPassword.store') }}" method="post" class="card card--forget-password">
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
                            <input type="email" name="email" class="form-control" id="email" placeholder="Email">
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
                            <button type="submit" class="btn btn-success">Envoyer la demande de reset</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection

@section('script')
@endsection
