@extends('app')

@section('content')
    <div class="content">
        <div class="card card--create-users">
            @if (count($users) > 0)
                <form class="card-body" action="{{ route('user.client.store', [$single_document->id]) }}" method="POST">
                    @csrf
                    <input type="hidden" name="type" value="add">
                    <div class="row">
                        <div class="line">
                            <div class="left">
                            </div>
                            <div class="right">
                                <h3 class="text-color-yellow">Liste d'utilisateurs existants</h3>
                            </div>
                        </div>
                        <div class="line">
                            <div class="left">
                            </div>
                            <div class="right">
                                <select class="form-control" name="user" id="user">
                                    <option value="">Sélectioner un utilisateur</option>
                                    @foreach ($users as $user)
                                        <option value="{{ $user->id }}" {{ old('user') == $user->id ? 'selected' : '' }}>{{ $user->firstname }} {{ $user->lastname }} - {{ $user->role->name }}</option>
                                    @endforeach
                                </select>
                                @error('role')
                                    <p class="message-error">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="line">
                            <div class="left">
                            </div>
                            <div class="right">
                                <button type="submit" class="btn btn-success">Ajouter</button>
                            </div>
                        </div>
                    </div>
                </form>
            @endif
            <form class="card-body" action="{{ route('user.client.store', [$single_document->id]) }}" method="POST">
                @csrf
                <input type="hidden" name="type" value="create">
                <div class="row">
                    <div class="line">
                        <div class="left">
                        </div>
                        <div class="right">
                            <h3 class="text-color-yellow">Ajouter un contributeur</h3>
                        </div>
                    </div>
                    <div class="line">
                        <div class="left">
                            <label for="firstname">Prénom</label>
                        </div>
                        <div class="right">
                            <input type="text" name="firstname" id="firstname" class="form-control @error('firstname') invalid @enderror" placeholder="Indiquer le prénom" value="{{ old('firstname') }}">
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
                            <input type="text" name="lastname" id="lastname" class="form-control @error('lastname') invalid @enderror" placeholder="Indiquer le nom" value="{{ old('lastname') }}">
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
                            <input type="text" name="post" id="post" class="form-control @error('post') invalid @enderror" placeholder="Indiquer le post" value="{{ old('post') }}">
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
                            <input type="email" name="email" id="email" class="form-control @error('email') invalid @enderror" placeholder="Indiquer l'email" value="{{ old('email') }}">
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
                            <input type="tel" name="phone" id="phone" class="form-control @error('phone') invalid @enderror" pattern="^(?:(?:(?:\+|00)33\D?(?:\D?\(0\)\D?)?)|0){1}[1-9]{1}(?:\D?\d{2}){4}$" placeholder="00 00 00 00 00" value="{{ old('phone') }}">
                            @error('phone')
                                <p class="message-error">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="line">
                        <div class="left">
                            <label for="role">Role</label>
                        </div>
                        <div class="right">
                            <select class="form-control" name="role" id="role">
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
                    <div class="line">
                        <div class="left">
                            <label for="password">Mot de passe</label>
                        </div>
                        <div class="right">
                            <div class="align">
                                <input type="password" name="password" id="password" class="form-control @error('password') invalid @enderror" placeholder="Indiquer le mot de passe">
                                <i class="far fa-question-circle" data-tooltip=".tooltip--password" data-placement="top"></i>
                            </div>
                            @error('password')
                                <p class="message-error">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="line">
                        <div class="left"></div>
                        <div class="right">
                            <input type="password" name="password_confirmation" class="form-control @error('password_confirmation') invalid @enderror" placeholder="Confirmer le mot de passe">
                            @error('password_confirmation')
                                <p class="message-error">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="line">
                        <div class="left">
                        </div>
                        <div class="right">
                            <button type="submit" class="btn btn-success">Ajouter</button>
                        </div>
                    </div>
                    <div class="tooltip tooltip--password">
                        <p>Votre mot de passe doit contenir au moins 8 caractères, dont : </p>
                        <p>1 majuscule, 1 minuscule, 1 chiffre et 1 caractère spécial</p>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('script')
@endsection
