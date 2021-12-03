@extends('app')

@section('content')
<div class="content">
    <form class="card card--general-infos" action="{{route('dashboard.store.info-gen', ['id' => $id])}}" method="POST">
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
                        <input type="text" name="name_enterprise" class="form-control" placeholder="Indiquer le nom de votre entreprise" value="{{$single->name_enterprise}}" disabled>
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
                        <input type="text" name="adress" class="form-control" placeholder="Ligne 1" value="{{$single->adress}}" disabled>
                    </div>
                </div>
                <div class="line {{empty($single->additional_adress) ? 'hidden' : '' }}">
                    <div class="left">
                    </div>
                    <div class="right">
                        <input type="text" name="additional_adress" class="form-control" placeholder="Ligne 2" value="{{$single->additional_adress}}" disabled>
                    </div>
                </div>
                <div class="line">
                    <div class="left">
                        <label for="city_zipcode">Code postal</label>
                    </div>
                    <div class="right right--small">
                        <input type="text" name="city_zipcode" class="form-control form-control--small" placeholder="Code postal" value="{{$single->city_zipcode}}" disabled>
                    </div>
                </div>
                <div class="line">
                    <div class="left">
                        <label for="city">Ville</label>
                    </div>
                    <div class="right">
                        <input type="text" name="city" class="form-control form-control--small" placeholder="Ville" value="{{$single->city}}" disabled>
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

    <form class="card card--company-activity" action="{{route('dashboard.store.desc', ['id' => $id])}}" method="POST">
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
                        <textarea type="text" name="desc" id="desc" class="form-control" placeholder="Indiquer le nom de votre entreprise" disabled>{{$single->description}}</textarea>
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

    <form class="card card--responsible" action="{{ route('dashboard.store.resp', ['id' => $id]) }}" method="POST">
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
                        <input type="text" name="firstname" class="form-control" placeholder="Prénom du responsable du DU" value="{{$single->firstname}}" disabled>
                    </div>
                </div>
                <div class="line">
                    <div class="left">
                        <label for="lastname">Nom</label>
                    </div>
                    <div class="right">
                        <input type="text" name="lastname" class="form-control" placeholder="Nom du responsable du DU" value="{{$single->lastname}}" disabled>
                    </div>
                </div>
                <div class="line">
                    <div class="left">
                        <label for="email">Email</label>
                    </div>
                    <div class="right">
                        <input type="email" name="email" class="form-control" placeholder="Email" value="{{$single->email}}" disabled>
                    </div>
                </div>
                <div class="line">
                    <div class="left">
                        <label for="phone">Téléphone</label>
                    </div>
                    <div class="right">
                        <input type="tel" name="phone" class="form-control" pattern="^(?:(?:(?:\+|00)33\D?(?:\D?\(0\)\D?)?)|0){1}[1-9]{1}(?:\D?\d{2}){4}$" placeholder="00 00 00 00 00" value="{{$single->phone}}" required disabled>
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
    {{-- <script src="/js/app/dashboard.js"></script> --}}
@endsection
