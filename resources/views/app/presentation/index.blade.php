@extends('app')

@section('content')
    <div class="content">

        <form class="card card--general-infos {{ session('type') == 'info' ? 'card-editable' : '' }}" action="{{ route('presentation.update', [$single_document->id, 'info']) }}" method="POST">
            @csrf
            <div class="card-header">
                <h2 class="title">Informations générales</h2>
                @if (!Auth::user()->hasPermission('READER'))
                    <button type="button" class="btn btn-edit-card">Modifier<i class="far fa-edit"></i></button>
                @endif
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="line">
                        <div class="left">
                            <label for="name_enterprise">Nom de l’entreprise</label>
                        </div>
                        <div class="right">
                            <input type="text" name="name_enterprise" class="form-control @error('name_enterprise') invalid @enderror" placeholder="Indiquer le nom de votre entreprise" value="{{ old('name_enterprise') ? old('name_enterprise') : $single_document->name_enterprise }}" {{ session('type') == 'info' ?: 'disabled' }}>
                            @error('name_enterprise')
                                <p class="message-error">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="line">
                        <div class="left"></div>
                        <div class="right">
                            <h3>Adresse de l’entreprise</h3>
                        </div>
                    </div>
                    <div class="line">
                        <div class="left">
                            <label for="adress">Adresse postale</label>
                        </div>
                        <div class="right">
                            <input type="text" name="adress" class="form-control @error('adress') invalid @enderror" placeholder="Ligne 1" value="{{ old('adress') ? old('adress') : $single_document->adress }}" {{ session('type') == 'info' ?: 'disabled' }}>
                            @error('adress')
                                <p class="message-error">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="line {{ !$single_document->additional_adress ? 'hidden' : '' }}">
                        <div class="left">
                        </div>
                        <div class="right">
                            <input type="text" name="additional_adress" class="form-control @error('additional_adress') invalid @enderror" placeholder="Ligne 2" value="{{ old('additional_adress') ? old('additional_adress') : $single_document->additional_adress }}" {{ session('type') == 'info' ?: 'disabled' }}>
                            @error('additional_adress')
                                <p class="message-error">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="line">
                        <div class="left">
                            <label for="city_zipcode">Code postal</label>
                        </div>
                        <div class="right right--small">
                            <input type="text" name="city_zipcode" class="form-control @error('city_zipcode') invalid @enderror" placeholder="Code postal" value="{{ old('city_zipcode') ? old('city_zipcode') : $single_document->city_zipcode }}" {{ session('type') == 'info' ?: 'disabled' }}>
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
                            <input type="text" name="city" class="form-control @error('city') invalid @enderror" placeholder="Ville" value="{{ old('city') ? old('city') : $single_document->city }}" {{ session('type') == 'info' ?: 'disabled' }}>
                            @error('city')
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
                            <button type="button" class="btn btn-danger btn-text btn-cancel-edit">Annuler</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>

        <form class="card card--company-activity {{ session('type') == 'desc' ? 'card-editable' : '' }}" action="{{route('presentation.update', [$single_document->id, 'desc'])}}" method="POST">
            @csrf
            <div class="card-header">
                <h2 class="title">Description de la structure</h2>
                @if (!Auth::user()->hasPermission('READER'))
                    <button type="button" class="btn btn-edit-card">Modifier<i class="far fa-edit"></i></button>
                @endif
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="line">
                        <div class="left">
                            <label for="sector">Secteur d’activité</label>
                        </div>
                        <div class="right">
                            <input type="text" name="sector" class="form-control @error('sector') invalid @enderror" placeholder="Secteur d’activité" value="{{ old('sector') ? old('sector') : $single_document->sector }}" {{ session('type') == 'desc' ?: 'disabled' }}>
                            @error('sector')
                                <p class="message-error">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="line">
                        <div class="left">
                            <label for="activity_description">Activité(s) détaillée(s)</label>
                        </div>
                        <div class="right">
                            <textarea type="text" name="activity_description" id="activity_description" class="form-control auto-resize @error('activity_description') invalid @enderror" placeholder="Activité(s) détaillée(s)"  {{ session('type') == 'desc' ?: 'disabled' }}>{{ old('activity_description') ? old('activity_description') : $single_document->activity_description }}</textarea>
                            @error('activity_description')
                                <p class="message-error">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="line">
                        <div class="left">
                            <label for="premise_description">Description des locaux</label>
                        </div>
                        <div class="right">
                            <textarea type="text" name="premise_description" id="premise_description" class="form-control auto-resize @error('premise_description') invalid @enderror" placeholder="Description des locaux"  {{ session('type') == 'desc' ?: 'disabled' }}>{{ old('premise_description') ? old('premise_description') : $single_document->premise_description }}</textarea>
                            @error('premise_description')
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
                            <button type="button" class="btn btn-danger btn-text btn-cancel-edit">Annuler</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>

        <form class="card card--responsible {{ session('type') == 'resp' ? 'card-editable' : '' }}" action="{{ route('presentation.update', [$single_document->id, 'resp']) }}" method="POST">
            @csrf
            <div class="card-header">
                <h2 class="title">Responsable du document au sein de l’entreprise</h2>
                @if (!Auth::user()->hasPermission('READER'))
                    <button type="button" class="btn btn-edit-card">Modifier<i class="far fa-edit"></i></button>
                @endif
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="line">
                        <div class="left">
                            <label for="firstname">Prénom</label>
                        </div>
                        <div class="right">
                            <input type="text" name="firstname" class="form-control @error('firstname') invalid @enderror" placeholder="Prénom du responsable du DU" value="{{ old('firstname') ? old('firstname') : $single_document->firstname }}" {{ session('type') == 'resp' ?: 'disabled' }}>
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
                            <input type="text" name="lastname" class="form-control @error('lastname') invalid @enderror" placeholder="Nom du responsable du DU" value="{{ old('lastname') ? old('lastname') : $single_document->lastname }}" {{ session('type') == 'resp' ?: 'disabled' }}>
                            @error('lastname')
                                <p class="message-error">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="line">
                        <div class="left">
                            <label for="email">Email</label>
                        </div>
                        <div class="right">
                            <input type="email" name="email" class="form-control @error('email') invalid @enderror" placeholder="Email" value="{{ old('email') ? old('email') : $single_document->email }}" {{ session('type') == 'resp' ?: 'disabled' }}>
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
                            <input type="tel" name="phone" class="form-control @error('phone') invalid @enderror" pattern="^(?:(?:(?:\+|00)33\D?(?:\D?\(0\)\D?)?)|0){1}[1-9]{1}(?:\D?\d{2}){4}$" placeholder="00 00 00 00 00" value="{{ old('phone') ? old('phone') : $single_document->phone }}" required {{ session('type') == 'resp' ?: 'disabled' }}>
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
                            <button type="button" class="btn btn-danger btn-text btn-cancel-edit">Annuler</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection

@section('script')
    <script src="/js/app/presentation.js"></script>
@endsection
