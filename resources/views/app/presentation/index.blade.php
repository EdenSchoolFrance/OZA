@extends('app')

@section('content')
    <div class="content">
        <form class="card card--general-infos" action="{{ route('presentation.store', [$single_document->id, 'info']) }}" method="POST">
            @csrf
            <div class="card-header">
                <h2 class="title">Informations générales</h2>
                <button type="button" class="btn btn-edit-card">Modifier<i class="far fa-edit"></i></button>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="line">
                        <div class="left">
                            <label for="name_enterprise">Nom de l’entreprise</label>
                        </div>
                        <div class="right">
                            <input type="text" name="name_enterprise" class="form-control @error('name_enterprise') invalid @enderror" placeholder="Indiquer le nom de votre entreprise" value="{{ $single_document->name_enterprise }}" disabled>
                            @error('name_enterprise')
                                <p class="message-error">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="line">
                        <div class="left">
                        </div>
                        <div class="right">
                            <h3>Adresse de l’entreprise</h3>
                        </div>
                    </div>
                    <div class="line">
                        <div class="left">
                            <label for="adress">Adresse postale</label>
                        </div>
                        <div class="right">
                            <input type="text" name="adress" class="form-control @error('adress') invalid @enderror" placeholder="Ligne 1" value="{{ $single_document->adress }}" disabled>
                            @error('adress')
                                <p class="message-error">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="line {{ !$single_document->additional_adress ? 'hidden' : '' }}">
                        <div class="left">
                        </div>
                        <div class="right">
                            <input type="text" name="additional_adress" class="form-control @error('additional_adress') invalid @enderror" placeholder="Ligne 2" value="{{$single_document->additional_adress}}" disabled>
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
                            <input type="text" name="city_zipcode" class="form-control form-control--small @error('city_zipcode') invalid @enderror" placeholder="Code postal" value="{{$single_document->city_zipcode}}" disabled>
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
                            <input type="text" name="city" class="form-control form-control--small @error('city') invalid @enderror" placeholder="Ville" value="{{$single_document->city}}" disabled>
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
                            <button type="submit" class="btn btn-success">Enregistrer</button>
                            <button type="button" class="btn btn-danger btn-text btn-cancel-edit">Annuler</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>

        <form class="card card--company-activity" action="{{route('presentation.store', [$single_document->id, 'desc'])}}" method="POST">
            @csrf
            <div class="card-header">
                <h2 class="title">Activité de l'entreprise</h2>
                <button type="button" class="btn btn-edit-card">Modifier<i class="far fa-edit"></i></button>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="line">
                        <div class="left">
                            <label for="desc">Description de l’entreprise</label>
                        </div>
                        <div class="right">
                            <textarea type="text" name="desc" id="desc" class="form-control auto-resize @error('desc') invalid @enderror" placeholder="Indiquer le nom de votre entreprise" disabled>{{$single_document->description}}</textarea>
                            @error('desc')
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
                            <button type="button" class="btn btn-danger btn-text btn-cancel-edit">Annuler</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>

        <form class="card card--responsible" action="{{ route('presentation.store', [$single_document->id, 'resp']) }}" method="POST">
            @csrf
            <div class="card-header">
                <h2 class="title">Responsable du document au sein de l’entreprise</h2>
                <button type="button" class="btn btn-edit-card">Modifier<i class="far fa-edit"></i></button>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="line">
                        <div class="left">
                            <label for="firstname">Prénom</label>
                        </div>
                        <div class="right">
                            <input type="text" name="firstname" class="form-control @error('firstname') invalid @enderror" placeholder="Prénom du responsable du DU" value="{{$single_document->firstname}}" disabled>
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
                            <input type="text" name="lastname" class="form-control @error('lastname') invalid @enderror" placeholder="Nom du responsable du DU" value="{{$single_document->lastname}}" disabled>
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
                            <input type="email" name="email" class="form-control @error('email') invalid @enderror" placeholder="Email" value="{{$single_document->email}}" disabled>
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
                            <input type="tel" name="phone" class="form-control @error('phone') invalid @enderror" pattern="^(?:(?:(?:\+|00)33\D?(?:\D?\(0\)\D?)?)|0){1}[1-9]{1}(?:\D?\d{2}){4}$" placeholder="00 00 00 00 00" value="{{$single_document->phone}}" required disabled>
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
                            <button type="submit" class="btn btn-success">Enregistrer</button>
                            <button type="button" class="btn btn-danger btn-text btn-cancel-edit">Annuler</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection

@section('script')
    <script src="/js/app/dashboard.js"></script>
@endsection
