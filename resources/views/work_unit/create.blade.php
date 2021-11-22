@extends('app')

@section('content')
<div class="content">
    <form class="card card--add_work_unit" action="" method="POST">
        <div class="card-body">
            <div class="row">
                <div class="line">
                    <div class="left">
                        <label for="name_enterprise">Intitulé de l’unité de travail</label>
                    </div>
                    <div class="right">
                        <input type="text" name="name_enterprise" class="form-control" placeholder="Indiquer le nom de votre entreprise">
                        <button type="button" class="btn btn-text">Rechercher une unité existante</button>
                    </div>
                </div>
            </div>
    
            <div class="row">
                <div class="line">
                    <div class="left">
                        <label for="number_employee">Nombre de salariés concernés</label>
                    </div>
                    <div class="right">
                        <div class="input-number">
                            <button type="button" class="btn" data-value="less">-</button>
                            <input type="number" class="form-control" name="number_employee" id="number_employee" min="0" placeholder="" value="0">
                            <button type="button" class="btn" data-value="more">+</button>
                        </div>
                    </div>
                </div>
                <div class="line line--activity">
                    <div class="left">
                        <label for="number_employee">Activités associées</label>
                    </div>
                    <div class="right">
                        <div class="list list--text">
                            <div class="list-row">
                                <div class="list-point">
                                    <button type="button" class="btn btn-text btn-small">X</button>
                                </div>
                                <div class="list-text">
                                    <textarea type="text" class="form-control auto-resize" placeholder="">Activité 1</textarea>
                                </div>
                            </div>
                            <div class="list-row">
                                <div class="list-point">
                                    <button type="button" class="btn btn-text btn-small">X</button>
                                </div>
                                <div class="list-text">
                                    <textarea type="text" class="form-control auto-resize active" placeholder=""></textarea>
                                </div>
                            </div>
                        </div>
                        <button type="button" class="btn btn-text btn-yellow"><i class="fas fa-plus"></i> Ajouter une activité</button>
                    </div>
                </div>
                <div class="line">
                    <div class="left">
                        <label for="number_employee">Matériels</label>
                    </div>
                    <div class="right">
                        <div>
                            <p class="title">Deux roues</p>
                            <div class="list list--text">
                                <div class="list-row">
                                    <div class="list-point">
                                        <button type="button" class="btn btn-text btn-small">X</button>
                                    </div>
                                    <div class="list-text">
                                        test
                                    </div>
                                </div>
                            </div>
                            <button type="button" class="btn btn-text btn-yellow"><i class="fas fa-plus"></i> Ajouter</button>
                        </div>
                    </div>
                </div>
                <div class="line">
                    <div class="left">
                        <label for="number_employee">Véhicules</label>
                    </div>
                    <div class="right">
    
                    </div>
                </div>
                <div class="line">
                    <div class="left">
                        <label for="number_employee">Engins</label>
                    </div>
                    <div class="right">
    
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
    
    <div class="card">
        <form action="#">
            <div class="card-header">
                <h2>Ajouter une unité de travail </h2>
            </div>
            <div class="card-body">
                <div class="row pb-3 pt-3">
                    <div class="col-3">
                        <div class="form-group float-right">
                            <label for="workName">Intitulé de l’unité de travail</label>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <input type="email" class="form-control" id="workName" placeholder="Vente - Boulangerie pâtisserie">
                        </div>
                    </div>
                </div>
                <div class="row pb-3 pt-3">
                    <div class="col-3">
                        <div class="form-group float-right">
                            <label for="nomberSal">Nombre de salariés concernés</label>
                        </div>
                    </div>
                    <div class="col-6 d-flex align-items-center">
                        <div class="form-group d-flex justify-content-start">
                            <button type="button" class="btn-main btn-main--number" data-value="less">-</button>
                            <input type="number" class="form-control" id="numberSal" placeholder="" value="0">
                            <button type="button" class="btn-main btn-main--number" data-value="more">+</button>
                        </div>
                    </div>
                </div>
                <div class="row pb-3 pt-3">
                    <div class="col-3">
                        <div class="form-group float-right">
                            <label>Activités associées</label>
                        </div>
                    </div>
                    <div class="col-9 ">
                        <div class="row d-flex justify-content-start">
                            <div class="form-group col-12">
                                <ul>
                                    <li>
                                        <i class="far fa-times-circle"></i>
                                        <p>Accueil des clients</p>
                                    </li>
                                    <li>
                                        <i class="far fa-times-circle"></i>
                                        <p>Présentation et conseils sur les produits</p>
                                    </li>
                                    <li>
                                        <i class="far fa-times-circle"></i>
                                        <p>Tranchage du pain</p>
                                    </li>
                                    <li>
                                        <i class="far fa-times-circle"></i>
                                        <p>Accueil physique et téléphonique des personnels, des étudiants, des personnes extérieures, réalisation de rondes le soir pour la fermeture des locaux, tenue du registre de sécurité et contrôle des entrées et sorties, gestion des clés (tenue du registre + boîte à clés), réception et diffusion du courrier, gestion des numéros d’urgence en cas de besoin, contrôle des livraisons et réception des bordereaux de livraison avec transmission au service intendance.</p>
                                    </li>
                                    <li>
                                        <button class="btn-main btn-main--text" data-toggle="modal" data-target="#modal">+ Ajouter</button>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row pb-3 pt-3">
                    <div class="col-3">
                        <div class="form-group float-right">
                            <label>Matériels</label>
                        </div>
                    </div>
                    <div class="col-9 ">
                        <div class="row d-flex justify-content-start">
                            <div class="form-group col-4">
                                <ul>
                                    <li class="list-head">
                                        Communication
                                    </li>
                                    <li>
                                        <i class="far fa-times-circle"></i>
                                        <p>Téléphone filaire</p>
                                    </li>
                                    <li>
                                        <i class="far fa-times-circle"></i>
                                        <p>Téléphone DECT</p>
                                    </li>
                                    <li>
                                        <button class="btn-main btn-main--text" data-toggle="modal" data-target="#modal">+ Ajouter</button>
                                    </li>
                                </ul>
                            </div>
                            <div class="form-group col-4">
                                <ul>
                                    <li class="list-head">
                                        Communication
                                    </li>
                                    <li>
                                        <i class="far fa-times-circle"></i>
                                        <p>Téléphone filaire</p>
                                    </li>
                                    <li>
                                        <i class="far fa-times-circle"></i>
                                        <p>Téléphone DECT</p>
                                    </li>
                                    <li>
                                        <button class="btn-main btn-main--text" data-toggle="modal" data-target="#modal">+ Ajouter</button>
                                    </li>
                                </ul>
                            </div>
                            <div class="form-group col-4">
                                <ul>
                                    <li class="list-head">
                                        Communication
                                    </li>
                                    <li>
                                        <i class="far fa-times-circle"></i>
                                        <p>Téléphone filaire</p>
                                    </li>
                                    <li>
                                        <i class="far fa-times-circle"></i>
                                        <p>Téléphone DECT</p>
                                    </li>
                                    <li>
                                        <button class="btn-main btn-main--text" data-toggle="modal" data-target="#modal">+ Ajouter</button>
                                    </li>
                                </ul>
                            </div>
                            <div class="form-group col-4">
                                <ul>
                                    <li class="list-head">
                                        Communication
                                    </li>
                                    <li>
                                        <i class="far fa-times-circle"></i>
                                        <p>Téléphone filaire</p>
                                    </li>
                                    <li>
                                        <i class="far fa-times-circle"></i>
                                        <p>Téléphone DECT</p>
                                    </li>
                                    <li>
                                        <button class="btn-main btn-main--text" data-toggle="modal" data-target="#modal">+ Ajouter</button>
                                    </li>
                                </ul>
                            </div>
                            <div class="form-group col-4">
                                <ul>
                                    <li class="list-head">
                                        Communication
                                    </li>
                                    <li>
                                        <i class="far fa-times-circle"></i>
                                        <p>Téléphone filaire</p>
                                    </li>
                                    <li>
                                        <i class="far fa-times-circle"></i>
                                        <p>Téléphone DECT</p>
                                    </li>
                                    <li>
                                        <button class="btn-main btn-main--text" data-toggle="modal" data-target="#modal">+ Ajouter</button>
                                    </li>
                                </ul>
                            </div>
                            <div class="form-group col-4">
                                <ul>
                                    <li class="list-head">
                                        Communication
                                    </li>
                                    <li>
                                        <i class="far fa-times-circle"></i>
                                        <p>Téléphone filaire</p>
                                    </li>
                                    <li>
                                        <i class="far fa-times-circle"></i>
                                        <p>Téléphone DECT</p>
                                    </li>
                                    <li>
                                        <button class="btn-main btn-main--text" data-toggle="modal" data-target="#modal">+ Ajouter</button>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row pb-3 pt-3">
                    <div class="col-3">
                        <div class="form-group float-right">
                            <label>Véhicules</label>
                        </div>
                    </div>
                    <div class="col-9 ">
                        <div class="row d-flex justify-content-start">
                            <div class="form-group col-4">
                                <ul>
                                    <li class="list-head">
                                        Communication
                                    </li>
                                    <li>
                                        <i class="far fa-times-circle"></i>
                                        <p>Téléphone filaire</p>
                                    </li>
                                    <li>
                                        <i class="far fa-times-circle"></i>
                                        <p>Téléphone DECT</p>
                                    </li>
                                    <li>
                                        <button class="btn-main btn-main--text" data-toggle="modal" data-target="#modal">+ Ajouter</button>
                                    </li>
                                </ul>
                            </div>
                            <div class="form-group col-4">
                                <ul>
                                    <li class="list-head">
                                        Communication
                                    </li>
                                    <li>
                                        <i class="far fa-times-circle"></i>
                                        <p>Téléphone filaire</p>
                                    </li>
                                    <li>
                                        <i class="far fa-times-circle"></i>
                                        <p>Téléphone DECT</p>
                                    </li>
                                    <li>
                                        <button class="btn-main btn-main--text" data-toggle="modal" data-target="#modal">+ Ajouter</button>
                                    </li>
                                </ul>
                            </div>
                            <div class="form-group col-4">
                                <ul>
                                    <li class="list-head">
                                        Communication
                                    </li>
                                    <li>
                                        <i class="far fa-times-circle"></i>
                                        <p>Téléphone filaire</p>
                                    </li>
                                    <li>
                                        <i class="far fa-times-circle"></i>
                                        <p>Téléphone DECT</p>
                                    </li>
                                    <li>
                                        <button class="btn-main btn-main--text" data-toggle="modal" data-target="#modal">+ Ajouter</button>
                                    </li>
                                </ul>
                            </div>
                            <div class="form-group col-4">
                                <ul>
                                    <li class="list-head">
                                        Communication
                                    </li>
                                    <li>
                                        <i class="far fa-times-circle"></i>
                                        <p>Téléphone filaire</p>
                                    </li>
                                    <li>
                                        <i class="far fa-times-circle"></i>
                                        <p>Téléphone DECT</p>
                                    </li>
                                    <li>
                                        <button class="btn-main btn-main--text" data-toggle="modal" data-target="#modal">+ Ajouter</button>
                                    </li>
                                </ul>
                            </div>
                            <div class="form-group col-4">
                                <ul>
                                    <li class="list-head">
                                        Communication
                                    </li>
                                    <li>
                                        <i class="far fa-times-circle"></i>
                                        <p>Téléphone filaire</p>
                                    </li>
                                    <li>
                                        <i class="far fa-times-circle"></i>
                                        <p>Téléphone DECT</p>
                                    </li>
                                    <li>
                                        <button class="btn-main btn-main--text" data-toggle="modal" data-target="#modal">+ Ajouter</button>
                                    </li>
                                </ul>
                            </div>
                            <div class="form-group col-4">
                                <ul>
                                    <li class="list-head">
                                        Communication
                                    </li>
                                    <li>
                                        <i class="far fa-times-circle"></i>
                                        <p>Téléphone filaire</p>
                                    </li>
                                    <li>
                                        <i class="far fa-times-circle"></i>
                                        <p>Téléphone DECT</p>
                                    </li>
                                    <li>
                                        <button class="btn-main btn-main--text" data-toggle="modal" data-target="#modal">+ Ajouter</button>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row pb-3 pt-3">
                    <div class="col-3">
                        <div class="form-group float-right">
                            <label>Engins</label>
                        </div>
                    </div>
                    <div class="col-9 ">
                        <div class="row d-flex justify-content-start">
                            <div class="form-group col-4">
                                <ul>
                                    <li class="list-head">
                                        Communication
                                    </li>
                                    <li>
                                        <i class="far fa-times-circle"></i>
                                        <p>Téléphone filaire</p>
                                    </li>
                                    <li>
                                        <i class="far fa-times-circle"></i>
                                        <p>Téléphone DECT</p>
                                    </li>
                                    <li>
                                        <button class="btn-main btn-main--text" data-toggle="modal" data-target="#modal">+ Ajouter</button>
                                    </li>
                                </ul>
                            </div>
                            <div class="form-group col-4">
                                <ul>
                                    <li class="list-head">
                                        Communication
                                    </li>
                                    <li>
                                        <i class="far fa-times-circle"></i>
                                        <p>Téléphone filaire</p>
                                    </li>
                                    <li>
                                        <i class="far fa-times-circle"></i>
                                        <p>Téléphone DECT</p>
                                    </li>
                                    <li>
                                        <button class="btn-main btn-main--text" data-toggle="modal" data-target="#modal">+ Ajouter</button>
                                    </li>
                                </ul>
                            </div>
                            <div class="form-group col-4">
                                <ul>
                                    <li class="list-head">
                                        Communication
                                    </li>
                                    <li>
                                        <i class="far fa-times-circle"></i>
                                        <p>Téléphone filaire</p>
                                    </li>
                                    <li>
                                        <i class="far fa-times-circle"></i>
                                        <p>Téléphone DECT</p>
                                    </li>
                                    <li>
                                        <button class="btn-main btn-main--text" data-toggle="modal" data-target="#modal">+ Ajouter</button>
                                    </li>
                                </ul>
                            </div>
                            <div class="form-group col-4">
                                <ul>
                                    <li class="list-head">
                                        Communication
                                    </li>
                                    <li>
                                        <i class="far fa-times-circle"></i>
                                        <p>Téléphone filaire</p>
                                    </li>
                                    <li>
                                        <i class="far fa-times-circle"></i>
                                        <p>Téléphone DECT</p>
                                    </li>
                                    <li>
                                        <button class="btn-main btn-main--text" data-toggle="modal" data-target="#modal">+ Ajouter</button>
                                    </li>
                                </ul>
                            </div>
                            <div class="form-group col-4">
                                <ul>
                                    <li class="list-head">
                                        Communication
                                    </li>
                                    <li>
                                        <i class="far fa-times-circle"></i>
                                        <p>Téléphone filaire</p>
                                    </li>
                                    <li>
                                        <i class="far fa-times-circle"></i>
                                        <p>Téléphone DECT</p>
                                    </li>
                                    <li>
                                        <button class="btn-main btn-main--text" data-toggle="modal" data-target="#modal">+ Ajouter</button>
                                    </li>
                                </ul>
                            </div>
                            <div class="form-group col-4">
                                <ul>
                                    <li class="list-head">
                                        Communication
                                    </li>
                                    <li>
                                        <i class="far fa-times-circle"></i>
                                        <p>Téléphone filaire</p>
                                    </li>
                                    <li>
                                        <i class="far fa-times-circle"></i>
                                        <p>Téléphone DECT</p>
                                    </li>
                                    <li>
                                        <button class="btn-main btn-main--text" data-toggle="modal" data-target="#modal">+ Ajouter</button>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row pb-3 pt-3 btn-foot">
                    <div class="col-12 d-flex justify-content-center">
                        <div class="form-group">
                            <button class="btn-main btn-main--green mr-3">Ajouter l’unité de travail</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection

@section('script')
@endsection
