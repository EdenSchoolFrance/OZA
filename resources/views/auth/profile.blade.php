@extends('app')

@section('content')
    <div class="content">
        <div class="card card--users">
            <form class="card-body" action="{{ route('profile.update') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="line">
                        <div class="left">
                            <label for="firstname">Prénom</label>
                        </div>
                        <div class="right">
                            <input type="text" name="firstname" class="form-control @error('firstname') invalid @enderror" placeholder="Indiquer le prénom" value="{{ old('firstname') ? old('firstname') : Auth::user()->firstname }}" required>
                            @error('firstname')
                                <p class="message-error">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="line">
                        <div class="left">
                            <label for="lastname">Nom</label>
                        </div>
                        <div class="right">
                            <input type="text" name="lastname" class="form-control @error('lastname') invalid @enderror" placeholder="Indiquer le nom" value="{{ old('lastname') ? old('lastname') : Auth::user()->lastname }}" required>
                            @error('lastname')
                                <p class="message-error">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="line">
                        <div class="left">
                            <label for="post">Poste</label>
                        </div>
                        <div class="right">
                            <input type="text" name="post" class="form-control @error('post') invalid @enderror" placeholder="Indiquer le post" value="{{ old('post') ? old('post') : Auth::user()->post }}" required>
                            @error('post')
                                <p class="message-error">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="line">
                        <div class="left">
                            <label for="email">Email</label>
                        </div>
                        <div class="right">
                            <input type="email" name="email" class="form-control @error('email') invalid @enderror" placeholder="Indiquer l'email" value="{{ old('email') ? old('email') : Auth::user()->email }}" required>
                            @error('email')
                                <p class="message-error">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="line">
                        <div class="left">
                            <label for="phone">Téléphone</label>
                        </div>
                        <div class="right">
                            <input type="tel" name="phone" id="phone" class="form-control @error('phone') invalid @enderror" placeholder="00 00 00 00 00" value="{{ old('phone') ? old('phone') : Auth::user()->phone }}" required>
                            @error('phone')
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
                            <button type="submit" class="btn btn-success">Mettre à jour</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('script')
@endsection
