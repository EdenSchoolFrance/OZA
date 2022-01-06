@extends('app')

@section('content')
    <div class="content">
        <div class="card card--users">
            <form class="card-body" action="{{ route('user.client.store', [$single_document->id]) }}" method="POST">
                @csrf
                <div class="row">
                    <div class="line">
                        <div class="left">
                            <label for="role">Role</label>
                        </div>
                        <div class="right">
                            <select class="form-control" name="role" id="role" required>
                                <option value="">Sélectioner un role</option>
                                @foreach ($roles as $role)
                                    <option value="{{ $role->id }}" {{ old('role') == $role->id ? 'selected' : '' }}>{{ $role->name }}</option>
                                @endforeach
                            </select>
                            @error('role')
                                <p class="message-error">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="line">
                        <div class="left">
                            <label for="lastname">Nom</label>
                        </div>
                        <div class="right">
                            <input type="text" name="lastname" class="form-control @error('lastname') invalid @enderror" placeholder="Indiquer le nom" value="{{ old('lastname') }}" required>
                            @error('lastname')
                                <p class="message-error">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="line">
                        <div class="left">
                            <label for="firstname">Prénom</label>
                        </div>
                        <div class="right">
                            <input type="text" name="firstname" class="form-control @error('firstname') invalid @enderror" placeholder="Indiquer le prénom" value="{{ old('firstname') }}" required>
                            @error('firstname')
                                <p class="message-error">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="line">
                        <div class="left">
                            <label for="email">Email</label>
                        </div>
                        <div class="right">
                            <input type="email" name="email" class="form-control @error('email') invalid @enderror" placeholder="Indiquer l'email" value="{{ old('email') }}" required>
                            @error('email')
                                <p class="message-error">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="line">
                        <div class="left">
                            <label for="phone">Phone</label>
                        </div>
                        <div class="right">
                            <input type="number" name="phone" class="form-control @error('phone') invalid @enderror" placeholder="Indiquer le numéro de téléphone" value="{{ old('phone') }}" required>
                            @error('phone')
                            <p class="message-error">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="line">
                        <div class="left">
                            <label for="post">Poste</label>
                        </div>
                        <div class="right">
                            <input type="text" name="post" class="form-control @error('post') invalid @enderror" placeholder="Indiquer le post" value="{{ old('post') }}" required>
                            @error('post')
                            <p class="message-error">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="line">
                        <div class="left">
                            <label for="password">Mot de passe</label>
                        </div>
                        <div class="right">
                            <input type="password" name="password" class="form-control @error('password') invalid @enderror" placeholder="Indiquer le mot de passe" required>
                            @error('password')
                                <p class="message-error">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="line">
                        <div class="left"></div>
                        <div class="right">
                            <input type="password" name="password_confirmation" class="form-control @error('password_confirmation') invalid @enderror" placeholder="Confirmer le mot de passe" required>
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
                            <button type="submit" class="btn btn-success">Ajouter</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('script')
@endsection
