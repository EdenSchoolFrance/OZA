@extends('app')

@section('content')

<div class="content">
    <form action="#" class="card card--general-infos">
        <div class="card-body">
            <div class="row">
                <div class="line">
                    <div class="left">
                        <label for="workName">Intitulé de l’unité de travail</label>
                    </div>
                    <div class="right">
                        <input type="email" class="form-control" id="workName" placeholder="Vente - Boulangerie pâtisserie">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="line">
                    <div class="left">
                    </div>
                    <div class="right">
                        <p><i class="fas fa-search"></i> Rechercher une unité existante </p>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="line">
                    <div class="left">
                        <label for="nomberSal">Nombre de salariés concernés</label>
                    </div>
                    <div class="right">
                        <div class="btn-group-number">
                            <button type="button" class="btn btn-text btn-num" data-value="less"><i class="fas fa-minus"></i></button>
                            <input type="number" class="form-control" id="numberSal" placeholder="" value="0">
                            <button type="button" class="btn btn-text btn-num" data-value="more"><i class="fas fa-plus"></i></button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="line">
                    <div class="left left-cancel">
                        <label>Activités associées</label>
                    </div>
                    <div class="right">
                        <ul>
                            <li>
                                <p>Aucune activité renseignée</p>
                            </li>

                            <li>
                                <button class="btn btn-yellow btn-text" data-toggle="modal" data-target="#modal">+ Ajouter une activité</button>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="line">
                    <div class="left left-cancel">
                        <label>Matériels</label>
                    </div>
                    <div class="right">
                        <ul>
                            <li>
                                <p>Aucune activité renseignée</p>
                            </li>

                            <li>
                                <button class="btn btn-yellow btn-text" data-toggle="modal" data-target="#modal">+ Ajouter une activité</button>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="line">
                    <div class="left left-cancel">
                        <label>Véhicules</label>
                    </div>
                    <div class="right">
                        <ul>
                            <li>
                                <p>Aucune activité renseignée</p>
                            </li>

                            <li>
                                <button class="btn btn-yellow btn-text" data-toggle="modal" data-target="#modal">+ Ajouter une activité</button>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="line">
                    <div class="left left-cancel">
                        <label>Engins</label>
                    </div>
                    <div class="right">
                        <ul>
                            <li>
                                <p>Aucune activité renseignée</p>
                            </li>

                            <li>
                                <button class="btn btn-yellow btn-text" data-toggle="modal" data-target="#modal">+ Ajouter une activité</button>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row row--submit">
                <div class="line">
                    <div class="left">
                    </div>
                    <div class="right">
                        <button type="submit" class="btn btn-success">Valider l’unité de travail</button>
                        <button type="button" class="btn btn-text">Enregistrer le brouillon</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

@endsection

@section('script')
@endsection
