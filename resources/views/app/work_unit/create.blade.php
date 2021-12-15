@extends('app')

@section('content')
<div class="content">
    <form class="card card--add_work_unit" action="{{ route('test') }}" method="post">
        @csrf
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
                            <ul class="list-ve-1 list-main">
                                <li>
                                    <p>Activité 1</p>
                                </li>
                                <li class="list-item">
                                    <button type="button" class="btn btn-text btn-small btn-delete" data-value="Ford"><i class="far fa-times-circle"></i></button>
                                    <p>Ford</p>
                                    <input type="hidden" class="btn-item" name="vehicule[]" value="Ford" data-id="abc1">
                                </li>
                                <li class="list-item">
                                    <button type="button" class="btn btn-text btn-small btn-delete" data-value="Ford-1"><i class="far fa-times-circle"></i></button>
                                    <p>Ford-2</p>
                                    <input type="hidden" class="btn-item" name="vehicule[]" value="Ford-2" data-id="abc2">
                                </li>
                                <li class="list-item">
                                    <button type="button" class="btn btn-text btn-small btn-delete" data-value="Ford-2"><i class="far fa-times-circle"></i></button>
                                    <p>Ford-3</p>
                                    <input type="hidden" class="btn-item" name="vehicule[]" value="Ford-3" data-id="abc3">
                                </li>
                                <li class="list-item-btn">
                                    <button type="button" class="btn btn-text btn-yellow btn-add"><i class="fas fa-plus"></i> Ajouter</button>
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
    <div class="card modal-work-unit">
        <div class="card-header">
            <h2 class="title">Modifier la liste des matériels de communication</h2>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="line">
                    <div class="left"></div>
                    <div class="right">
                        <a class="btn-modal-check">Tout cocher</a>
                        <a class="btn-modal-uncheck">Tout decocher</a>
                        <div id="modal-list">
                            <label class="contain">
                                <input type="checkbox" value="abc1">
                                <span class="checkmark">Ford</span>
                            </label>
                            <label class="contain">
                                <input type="checkbox" value="abc2">
                                <span class="checkmark">Ford-2</span>
                            </label>
                            <label class="contain">
                                <input type="checkbox" value="abc3">
                                <span class="checkmark">Ford-3</span>
                            </label>
                            @for($i = 0; $i < 10; $i++)
                                <label class="contain">
                                    <input type="checkbox">
                                    <span class="checkmark">Item</span>
                                </label>
                            @endfor
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="line">
                    <div class="left"></div>
                    <div class="right">
                        <p>Ajouter des nouveaux matériels</p>
                    </div>
                </div>
                <div class="line">
                    <div class="left"></div>
                    <div class="right right--inline">
                        <label for="name">Intitulé</label>
                        <div>
                            <input type="text" name="name" class="form-control" placeholder="matériel 1, matériel 2, ">
                            <p class="info-input">Il est possible d’ajouter plusieurs matériels en les séparant par une virgule</p>
                        </div>
                        <button class="btn btn-text btn-yellow">Ajouter</button>
                    </div>
                </div>
                <div class="line">
                    <div class="left"></div>
                    <div class="right">
                        <button class="btn btn-text btn-yellow"></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
    <script src="/js/app/work_unit.js"></script>
@endsection
