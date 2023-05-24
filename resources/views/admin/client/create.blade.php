@extends('app')

@section('content')
    <div class="content client">
        <div class="nav-tabs-group">
            <div class="nav-tabs">
                <button class="btn btn-tabs active" data-tabs="infoGen">Informations générales</button>
            </div>
            <div class="nav-tabs">
                <button class="btn btn-tabs" data-tabs="du" disabled>DU associé</button>
            </div>
        </div>
        <div class="card card--add-client">
            <div class="card-body">
                <div id="infoGen" class="tabs-content">
                    <form action="{{ route('admin.client.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="line">
                                <div class="left">
                                    <label for="name_enterprise">Nom de l’entreprise</label>
                                </div>
                                <div class="right">
                                    <input type="text" name="name_enterprise" id="name_enterprise" class="form-control @error('name_enterprise') invalid @enderror" placeholder="Indiquer le nom de votre entreprise" value="{{ old('name_enterprise') }}">
                                    @error('name_enterprise')
                                        <p class="message-error">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="line">
                                <div class="left">
                                    <label for="logo">Logo</label>
                                </div>
                                <div class="right">
                                    <label for="logo" class="form-control form-control--file @error('logo') invalid @enderror">
                                        <span>Choisir une image</span>
                                        <span>
                                            Parcourir
                                            <input type="file" name="logo" id="logo" class="inputLogo" placeholder="Choisir une image">
                                        </span>
                                    </label>
                                    @error('logo')
                                        <p class="message-error">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="line">
                                <div class="left">
                                    <label for="client_number">N° client OZA</label>
                                </div>
                                <div class="right">
                                    <input type="text" name="client_number" id="client_number" class="form-control @error('client_number') invalid @enderror" placeholder="Indiquer le numéro" value="{{ old('client_number') }}">
                                    @error('client_number')
                                        <p class="message-error">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="line">
                                <div class="left">
                                    <h3>Adresse de l’entreprise</h3>
                                </div>
                                <div class="right"></div>
                            </div>
                            <div class="line">
                                <div class="left">
                                    <label for="adress">Adresse postale</label>
                                </div>
                                <div class="right">
                                    <input type="text" name="adress" id="adress" class="form-control @error('adress') invalid @enderror" placeholder="Ligne 1" value="{{ old('adress') }}">
                                    @error('adress')
                                        <p class="message-error">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="line">
                                <div class="left">
                                    <label for="city_zipcode">Code postal</label>
                                </div>
                                <div class="right">
                                    <input type="text" name="city_zipcode" id="city_zipcode" class="form-control @error('city_zipcode') invalid @enderror" placeholder="Code postal" value="{{ old('city_zipcode') }}">
                                    @error('city_zipcode')
                                        <p class="message-error">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="line">
                                <div class="left">
                                    <label for="city">Ville</label>
                                </div>
                                <div class="right">
                                    <input type="text" name="city" id="city" class="form-control @error('city') invalid @enderror" placeholder="Ville" value="{{ old('city') }}">
                                    @error('city')
                                        <p class="message-error">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="line">
                                <div class="left">
                                    <label for="expert">Expert OZA dédié</label>
                                </div>
                                <div class="right">
                                    <select name="expert" id="expert" class="form-control">
                                        <option>Sélectionner un expert</option>
                                        @foreach($experts as $expert)
                                            <option value="{{ $expert->id }}" {{ old('expert') == $expert->id ? 'selected' : '' }}>{{ $expert->firstname }} {{ $expert->lastname }} {{ $expert->role->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('expert')
                                        <p class="message-error">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="line">
                                <div class="left">
                                    <h3>Administrateur Responsable client</h3>
                                </div>
                                <div class="right"></div>
                            </div>
                            <div class="line">
                                <div class="left">
                                    <label for="firstname">Prénom</label>
                                </div>
                                <div class="right">
                                    <input type="text" name="firstname" id="firstname" class="form-control @error('firstname') invalid @enderror" placeholder="Prénom du responsable client" value="{{ old('firstname') }}">
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
                                    <input type="text" name="lastname" id="lastname" class="form-control @error('lastname') invalid @enderror" placeholder="Nom du responsable client" value="{{ old('lastname') }}">
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
                                    <input type="text" name="post" id="post" class="form-control @error('post') invalid @enderror" placeholder="Intitulé du poste" value="{{ old('post') }}">
                                    @error('post')
                                        <p class="message-error">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="line">
                                <div class="left">
                                    <label for="phone">Téléphone</label>
                                </div>
                                <div class="right">
                                    <input type="tel" name="phone" id="phone" class="form-control @error('phone') invalid @enderror" placeholder="00 00 00 00 00" value="{{ old('phone') }}">
                                    @error('phone')
                                        <p class="message-error">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="line">
                                <div class="left">
                                </div>
                                <div class="right">
                                    <h3>Accès à l’outil</h3>
                                </div>
                            </div>
                            <div class="line">
                                <div class="left">
                                    <label for="email">Identifiant (email) </label>
                                </div>
                                <div class="right">
                                    <input type="email" name="email" id="email" class="form-control @error('email') invalid @enderror" placeholder="Email" value="{{ old('email') }}">
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
                                        <input type="password" name="password" id="password" class="form-control @error('password') invalid @enderror" placeholder="">
                                        <i class="far fa-eye-slash eye-password"></i>
                                        <i class="far fa-question-circle" data-tooltip=".tooltip--password" data-placement="top"></i>
                                    </div>
                                    @error('password')
                                        <p class="message-error">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="line">
                                <div class="left">
                                    <label for="password_confirmation">Confirmation du mot de passe</label>
                                </div>
                                <div class="right">
                                    <input type="password" name="password_confirmation" id="password_confirmation" class="form-control @error('password_confirmation') invalid @enderror" placeholder="">
                                    <i class="far fa-eye-slash eye-password"></i>
                                    @error('password_confirmation')
                                        <p class="message-error">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row row--submit">
                            <button class="btn btn-success">Enregistrer</button>
                            <a href="{{ route('admin.clients') }}" class="btn btn-danger btn-text">Annuler</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="tooltip tooltip--password">
            <p>Votre mot de passe doit contenir au moins 8 caractères, dont : </p>
            <p>1 majuscule, 1 minuscule, 1 chiffre et 1 caractère spécial</p>
        </div>
    </div>
@endsection

@section('script')
@endsection
