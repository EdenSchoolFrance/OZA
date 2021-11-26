@extends('app')

@section('content')
<div class="content">
    <form class="card card--add_work_unit" action="">
        <div class="card-body">
            <div class="row">
                <div class="line">
                    <div class="left">
                        <label for="name_enterprise">Intitulé de l’unité de travail</label>
                    </div>
                    <div class="right">
                        <input type="text" name="name_enterprise" class="form-control" placeholder="Indiquer le nom de votre entreprise">

                    </div>
                </div>
                <div class="line">
                    <div class="left"></div>
                    <div class="right">
                        <button type="button" class="btn btn-text"><i class="fas fa-search"></i> Rechercher une unité existante</button>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="line">
                    <div class="left">
                        <label for="number_employee">Nombre de salariés concernés</label>
                    </div>
                    <div class="right">
                        <div class="btn-group-number">
                            <button type="button" class="btn btn-text btn-num" data-value="less"><i class="fas fa-minus"></i></button>
                            <input type="number" class="form-control" id="numberSal" placeholder="" value="0">
                            <button type="button" class="btn btn-text btn-num" data-value="more"><i class="fas fa-plus"></i></button>
                        </div>
                    </div>
                </div>
                <div class="line line--activity">
                    <div class="left left-cancel">
                        <label for="number_employee">Activités associées</label>
                    </div>
                    <div class="right">
                        <ul class="ul-textarea">
                            <li>
                                <button type="button" class="btn btn-text btn-small"><i class="far fa-times-circle"></i></button>
                                <textarea type="text" class="form-control auto-resize" placeholder="">Activité 1</textarea>
                            </li>
                            <li>
                                <button type="button" class="btn btn-text btn-small"><i class="far fa-times-circle"></i></button>
                                <textarea type="text" class="form-control auto-resize" placeholder="">Activité 1</textarea>
                            </li>
                            <li>
                                <button type="button" class="btn btn-text btn-small"><i class="far fa-times-circle"></i></button>
                                <textarea type="text" class="form-control auto-resize" placeholder="">Activité 1</textarea>
                            </li>
                            <li>
                                <button type="button" class="btn btn-text btn-yellow"><i class="fas fa-plus"></i> Ajouter une activité</button>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="line">
                    <div class="left left-cancel">
                        <label for="number_employee">Matériels</label>
                    </div>
                    <div class="right right--wrap">
                        <div>
                            <ul>
                                <li>
                                    <label>Activité 1</label>
                                </li>
                                <li>
                                    <button type="button" class="btn btn-text btn-small"><i class="far fa-times-circle"></i></button>
                                    <label>Activité 1</label>
                                </li>
                                <li>
                                    <button type="button" class="btn btn-text btn-small"><i class="far fa-times-circle"></i></button>
                                    <label>Activité 1</label>
                                </li>
                                <li>
                                    <button type="button" class="btn btn-text btn-small"><i class="far fa-times-circle"></i></button>
                                    <label>Activité 1</label>
                                </li>
                                <li>
                                    <button type="button" class="btn btn-text btn-yellow"><i class="fas fa-plus"></i> Ajouter</button>
                                </li>
                            </ul>
                        </div>
                        <div>
                            <ul>
                                <li>
                                    <label>Activité 1</label>
                                </li>
                                <li>
                                    <button type="button" class="btn btn-text btn-small"><i class="far fa-times-circle"></i></button>
                                    <label>Activité 1</label>
                                </li>
                                <li>
                                    <button type="button" class="btn btn-text btn-small"><i class="far fa-times-circle"></i></button>
                                    <label>Activité 1</label>
                                </li>
                                <li>
                                    <button type="button" class="btn btn-text btn-small"><i class="far fa-times-circle"></i></button>
                                    <label>Activité 1</label>
                                </li>
                                <li>
                                    <button type="button" class="btn btn-text btn-yellow"><i class="fas fa-plus"></i> Ajouter</button>
                                </li>
                            </ul>
                        </div>
                        <div>
                            <ul>
                                <li>
                                    <label>Activité 1</label>
                                </li>
                                <li>
                                    <button type="button" class="btn btn-text btn-small"><i class="far fa-times-circle"></i></button>
                                    <label>Activité 1</label>
                                </li>
                                <li>
                                    <button type="button" class="btn btn-text btn-small"><i class="far fa-times-circle"></i></button>
                                    <label>Activité 1</label>
                                </li>
                                <li>
                                    <button type="button" class="btn btn-text btn-small"><i class="far fa-times-circle"></i></button>
                                    <label>Activité 1</label>
                                </li>
                                <li>
                                    <button type="button" class="btn btn-text btn-yellow"><i class="fas fa-plus"></i> Ajouter</button>
                                </li>
                            </ul>
                        </div>
                        <div>
                            <ul>
                                <li>
                                    <label>Activité 1</label>
                                </li>
                                <li>
                                    <button type="button" class="btn btn-text btn-small"><i class="far fa-times-circle"></i></button>
                                    <label>Activité 1</label>
                                </li>
                                <li>
                                    <button type="button" class="btn btn-text btn-small"><i class="far fa-times-circle"></i></button>
                                    <label>Activité 1</label>
                                </li>
                                <li>
                                    <button type="button" class="btn btn-text btn-small"><i class="far fa-times-circle"></i></button>
                                    <label>Activité 1</label>
                                </li>
                                <li>
                                    <button type="button" class="btn btn-text btn-yellow"><i class="fas fa-plus"></i> Ajouter</button>
                                </li>
                            </ul>
                        </div>
                        <div>
                            <ul>
                                <li>
                                    <label>Activité 1</label>
                                </li>
                                <li>
                                    <button type="button" class="btn btn-text btn-small"><i class="far fa-times-circle"></i></button>
                                    <label>Activité 1</label>
                                </li>
                                <li>
                                    <button type="button" class="btn btn-text btn-small"><i class="far fa-times-circle"></i></button>
                                    <label>Activité 1</label>
                                </li>
                                <li>
                                    <button type="button" class="btn btn-text btn-small"><i class="far fa-times-circle"></i></button>
                                    <label>Activité 1</label>
                                </li>
                                <li>
                                    <button type="button" class="btn btn-text btn-yellow"><i class="fas fa-plus"></i> Ajouter</button>
                                </li>
                            </ul>
                        </div>
                        <div>
                            <ul>
                                <li>
                                    <label>Activité 1</label>
                                </li>
                                <li>
                                    <button type="button" class="btn btn-text btn-small"><i class="far fa-times-circle"></i></button>
                                    <label>Activité 1</label>
                                </li>
                                <li>
                                    <button type="button" class="btn btn-text btn-small"><i class="far fa-times-circle"></i></button>
                                    <label>Activité 1</label>
                                </li>
                                <li>
                                    <button type="button" class="btn btn-text btn-small"><i class="far fa-times-circle"></i></button>
                                    <label>Activité 1</label>
                                </li>
                                <li>
                                    <button type="button" class="btn btn-text btn-yellow"><i class="fas fa-plus"></i> Ajouter</button>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="line">
                    <div class="left left-cancel">
                        <label for="number_employee">Véhicules</label>
                    </div>
                    <div class="right right--wrap">
                        <div>
                            <ul>
                                <li>
                                    <label>Activité 1</label>
                                </li>
                                <li>
                                    <button type="button" class="btn btn-text btn-small"><i class="far fa-times-circle"></i></button>
                                    <label>Activité 1</label>
                                </li>
                                <li>
                                    <button type="button" class="btn btn-text btn-small"><i class="far fa-times-circle"></i></button>
                                    <label>Activité 1</label>
                                </li>
                                <li>
                                    <button type="button" class="btn btn-text btn-small"><i class="far fa-times-circle"></i></button>
                                    <label>Activité 1</label>
                                </li>
                                <li>
                                    <button type="button" class="btn btn-text btn-yellow"><i class="fas fa-plus"></i> Ajouter</button>
                                </li>
                            </ul>
                        </div>
                        <div>
                            <ul>
                                <li>
                                    <label>Activité 1</label>
                                </li>
                                <li>
                                    <button type="button" class="btn btn-text btn-small"><i class="far fa-times-circle"></i></button>
                                    <label>Activité 1</label>
                                </li>
                                <li>
                                    <button type="button" class="btn btn-text btn-small"><i class="far fa-times-circle"></i></button>
                                    <label>Activité 1</label>
                                </li>
                                <li>
                                    <button type="button" class="btn btn-text btn-small"><i class="far fa-times-circle"></i></button>
                                    <label>Activité 1</label>
                                </li>
                                <li>
                                    <button type="button" class="btn btn-text btn-yellow"><i class="fas fa-plus"></i> Ajouter</button>
                                </li>
                            </ul>
                        </div>
                        <div>
                            <ul>
                                <li>
                                    <label>Activité 1</label>
                                </li>
                                <li>
                                    <button type="button" class="btn btn-text btn-small"><i class="far fa-times-circle"></i></button>
                                    <label>Activité 1</label>
                                </li>
                                <li>
                                    <button type="button" class="btn btn-text btn-small"><i class="far fa-times-circle"></i></button>
                                    <label>Activité 1</label>
                                </li>
                                <li>
                                    <button type="button" class="btn btn-text btn-small"><i class="far fa-times-circle"></i></button>
                                    <label>Activité 1</label>
                                </li>
                                <li>
                                    <button type="button" class="btn btn-text btn-yellow"><i class="fas fa-plus"></i> Ajouter</button>
                                </li>
                            </ul>
                        </div>
                        <div>
                            <ul>
                                <li>
                                    <label>Activité 1</label>
                                </li>
                                <li>
                                    <button type="button" class="btn btn-text btn-small"><i class="far fa-times-circle"></i></button>
                                    <label>Activité 1</label>
                                </li>
                                <li>
                                    <button type="button" class="btn btn-text btn-small"><i class="far fa-times-circle"></i></button>
                                    <label>Activité 1</label>
                                </li>
                                <li>
                                    <button type="button" class="btn btn-text btn-small"><i class="far fa-times-circle"></i></button>
                                    <label>Activité 1</label>
                                </li>
                                <li>
                                    <button type="button" class="btn btn-text btn-yellow"><i class="fas fa-plus"></i> Ajouter</button>
                                </li>
                            </ul>
                        </div>
                        <div>
                            <ul>
                                <li>
                                    <label>Activité 1</label>
                                </li>
                                <li>
                                    <button type="button" class="btn btn-text btn-small"><i class="far fa-times-circle"></i></button>
                                    <label>Activité 1</label>
                                </li>
                                <li>
                                    <button type="button" class="btn btn-text btn-small"><i class="far fa-times-circle"></i></button>
                                    <label>Activité 1</label>
                                </li>
                                <li>
                                    <button type="button" class="btn btn-text btn-small"><i class="far fa-times-circle"></i></button>
                                    <label>Activité 1</label>
                                </li>
                                <li>
                                    <button type="button" class="btn btn-text btn-yellow"><i class="fas fa-plus"></i> Ajouter</button>
                                </li>
                            </ul>
                        </div>
                        <div>
                            <ul>
                                <li>
                                    <label>Activité 1</label>
                                </li>
                                <li>
                                    <button type="button" class="btn btn-text btn-small"><i class="far fa-times-circle"></i></button>
                                    <label>Activité 1</label>
                                </li>
                                <li>
                                    <button type="button" class="btn btn-text btn-small"><i class="far fa-times-circle"></i></button>
                                    <label>Activité 1</label>
                                </li>
                                <li>
                                    <button type="button" class="btn btn-text btn-small"><i class="far fa-times-circle"></i></button>
                                    <label>Activité 1</label>
                                </li>
                                <li>
                                    <button type="button" class="btn btn-text btn-yellow"><i class="fas fa-plus"></i> Ajouter</button>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="line">
                    <div class="left left-cancel">
                        <label for="number_employee">Engins</label>
                    </div>
                    <div class="right right--wrap">
                        <div>
                            <ul>
                                <li>
                                    <label>Activité 1</label>
                                </li>
                                <li>
                                    <button type="button" class="btn btn-text btn-small"><i class="far fa-times-circle"></i></button>
                                    <label>Activité 1</label>
                                </li>
                                <li>
                                    <button type="button" class="btn btn-text btn-small"><i class="far fa-times-circle"></i></button>
                                    <label>Activité 1</label>
                                </li>
                                <li>
                                    <button type="button" class="btn btn-text btn-small"><i class="far fa-times-circle"></i></button>
                                    <label>Activité 1</label>
                                </li>
                                <li>
                                    <button type="button" class="btn btn-text btn-yellow"><i class="fas fa-plus"></i> Ajouter</button>
                                </li>
                            </ul>
                        </div>
                        <div>
                            <ul>
                                <li>
                                    <label>Activité 1</label>
                                </li>
                                <li>
                                    <button type="button" class="btn btn-text btn-small"><i class="far fa-times-circle"></i></button>
                                    <label>Activité 1</label>
                                </li>
                                <li>
                                    <button type="button" class="btn btn-text btn-small"><i class="far fa-times-circle"></i></button>
                                    <label>Activité 1</label>
                                </li>
                                <li>
                                    <button type="button" class="btn btn-text btn-small"><i class="far fa-times-circle"></i></button>
                                    <label>Activité 1</label>
                                </li>
                                <li>
                                    <button type="button" class="btn btn-text btn-yellow"><i class="fas fa-plus"></i> Ajouter</button>
                                </li>
                            </ul>
                        </div>
                        <div>
                            <ul>
                                <li>
                                    <label>Activité 1</label>
                                </li>
                                <li>
                                    <button type="button" class="btn btn-text btn-small"><i class="far fa-times-circle"></i></button>
                                    <label>Activité 1</label>
                                </li>
                                <li>
                                    <button type="button" class="btn btn-text btn-small"><i class="far fa-times-circle"></i></button>
                                    <label>Activité 1</label>
                                </li>
                                <li>
                                    <button type="button" class="btn btn-text btn-small"><i class="far fa-times-circle"></i></button>
                                    <label>Activité 1</label>
                                </li>
                                <li>
                                    <button type="button" class="btn btn-text btn-yellow"><i class="fas fa-plus"></i> Ajouter</button>
                                </li>
                            </ul>
                        </div>
                        <div>
                            <ul>
                                <li>
                                    <label>Activité 1</label>
                                </li>
                                <li>
                                    <button type="button" class="btn btn-text btn-small"><i class="far fa-times-circle"></i></button>
                                    <label>Activité 1</label>
                                </li>
                                <li>
                                    <button type="button" class="btn btn-text btn-small"><i class="far fa-times-circle"></i></button>
                                    <label>Activité 1</label>
                                </li>
                                <li>
                                    <button type="button" class="btn btn-text btn-small"><i class="far fa-times-circle"></i></button>
                                    <label>Activité 1</label>
                                </li>
                                <li>
                                    <button type="button" class="btn btn-text btn-yellow"><i class="fas fa-plus"></i> Ajouter</button>
                                </li>
                            </ul>
                        </div>
                        <div>
                            <ul>
                                <li>
                                    <label>Activité 1</label>
                                </li>
                                <li>
                                    <button type="button" class="btn btn-text btn-small"><i class="far fa-times-circle"></i></button>
                                    <label>Activité 1</label>
                                </li>
                                <li>
                                    <button type="button" class="btn btn-text btn-small"><i class="far fa-times-circle"></i></button>
                                    <label>Activité 1</label>
                                </li>
                                <li>
                                    <button type="button" class="btn btn-text btn-small"><i class="far fa-times-circle"></i></button>
                                    <label>Activité 1</label>
                                </li>
                                <li>
                                    <button type="button" class="btn btn-text btn-yellow"><i class="fas fa-plus"></i> Ajouter</button>
                                </li>
                            </ul>
                        </div>
                        <div>
                            <ul>
                                <li>
                                    <label>Activité 1</label>
                                </li>
                                <li>
                                    <button type="button" class="btn btn-text btn-small"><i class="far fa-times-circle"></i></button>
                                    <label>Activité 1</label>
                                </li>
                                <li>
                                    <button type="button" class="btn btn-text btn-small"><i class="far fa-times-circle"></i></button>
                                    <label>Activité 1</label>
                                </li>
                                <li>
                                    <button type="button" class="btn btn-text btn-small"><i class="far fa-times-circle"></i></button>
                                    <label>Activité 1</label>
                                </li>
                                <li>
                                    <button type="button" class="btn btn-text btn-yellow"><i class="fas fa-plus"></i> Ajouter</button>
                                </li>
                            </ul>
                        </div>
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
