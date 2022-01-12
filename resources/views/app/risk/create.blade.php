@extends('app')

@section('content')


<div class="content">
    <form action="{{ route('risk.store', [$single_document->id, $danger->id]) }}" class="card card--add-risk" method="post">
        @csrf
        <div class="card-body">
            <div class="row">
                <div class="line">
                    <div class="left">
                        <label for="nameRisk">Intitulé du risque</label>
                    </div>
                    <div class="right">
                        <input type="text" class="form-control" name="name_risk" id="workName" placeholder="Vente - Boulangerie pâtisserie" value="{{ isset($risk) ? $risk->name : '' }}">
                    </div>
                </div>
                @if (Auth::user()->hasAccess('oza'))
                    <div class="line">
                        <div class="left"></div>
                        <div class="right">
                            <button type="button" class="btn btn-text" data-modal=".modal--risk--oza"><i class="fas fa-search"></i> Rechercher une unité existante</button>
                        </div>
                    </div>
                @endif
            </div>
            <hr>
            <div class="row">
                <div class="line">
                    <div class="left">
                        <h3>Evaluation du risque identifié</h3>
                    </div>
                    <div class="right">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="line">
                    <div class="left">
                        <label>Fréquence</label>
                    </div>
                    <div class="right">
                        <div class="radio-bar-content">
                            <div class="radio-bar radio-bar-frequency">
                                <label class="con">
                                    <input type="radio" name="frequency" value="day" {{ isset($risk) && $risk->frequency === 'day' ? 'checked' : '' }}>
                                    <span class="checkmark"></span>
                                </label>
                                <label class="con">
                                    <input type="radio" name="frequency" value="week" {{ isset($risk) && $risk->frequency === 'week' ? 'checked' : '' }}>
                                    <span class="checkmark"></span>
                                </label>
                                <label class="con">
                                    <input type="radio"  name="frequency" value="month" {{ isset($risk) && $risk->frequency === 'mouth' ? 'checked' : '' }}>
                                    <span class="checkmark"></span>
                                </label>
                                <label class="con">
                                    <input type="radio"  name="frequency" value="year" {{ isset($risk) && $risk->frequency === 'year' ? 'checked' : '' }}>
                                    <span class="checkmark"></span>
                                </label>
                                <label class="con">
                                    <input type="radio" name="frequency" value="year+" {{ isset($risk) && $risk->frequency === 'year+' ? 'checked' : '' }}>
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            <div class="radio-title">
                                <label>Jour</label>
                                <label>Semaine</label>
                                <label>Mois</label>
                                <label>Années</label>
                                <label>>Années</label>
                            </div>
                        </div>
                        <i class="far fa-question-circle" data-toggle="toolHelp" data-placement="top" title="Vivamus sagittis lacus vel augue laoreet rutrum faucibus."></i>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="line">
                    <div class="left">
                        <label>Probabilité</label>
                    </div>
                    <div class="right">
                        <div class="radio-bar-content">
                            <div class="radio-bar radio-bar-probability">
                                <label class="con">
                                    <input type="radio" name="probability" value="very high" {{ isset($risk) && $risk->probability === 'very high' ? 'checked' : '' }}>
                                    <span class="checkmark"></span>
                                </label>
                                <label class="con">
                                    <input type="radio" name="probability" value="high" {{ isset($risk) && $risk->probability === 'high' ? 'checked' : '' }}>
                                    <span class="checkmark"></span>
                                </label>
                                <label class="con">
                                    <input type="radio" name="probability" value="medium" {{ isset($risk) && $risk->probability === 'medium' ? 'checked' : '' }}>
                                    <span class="checkmark"></span>
                                </label>
                                <label class="con">
                                    <input type="radio" name="probability" value="weak" {{ isset($risk) && $risk->probability === 'weak' ? 'checked' : '' }}>
                                    <span class="checkmark"></span>
                                </label>
                                <label class="con">
                                    <input type="radio" name="probability" value="very weak" {{ isset($risk) && $risk->probability === 'very weak' ? 'checked' : '' }}>
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            <div class="radio-title">
                                <label>Très élevée</label>
                                <label>Élevée</label>
                                <label>Non faible</label>
                                <label>Faible</label>
                                <label>Très faible</label>
                            </div>
                        </div>
                        <i class="far fa-question-circle" data-toggle="toolHelp" data-placement="top" title="Vivamus sagittis lacus vel augue laoreet rutrum faucibus."></i>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="line">
                    <div class="left">
                        <label>Gravité potentiel</label>
                    </div>
                    <div class="right">
                        <div class="radio-bar-content">
                            <div class="radio-bar radio-bar-gravity">
                                <label class="con">
                                    <input type="radio" name="gravity" value="death" {{ isset($risk) && $risk->gravity === 'death' ? 'checked' : '' }}>
                                    <span class="checkmark"></span>
                                </label>
                                <label class="con">
                                    <input type="radio" name="gravity" value="ipp" {{ isset($risk) && $risk->gravity === 'ipp' ? 'checked' : '' }}>
                                    <span class="checkmark"></span>
                                </label>
                                <label class="con">
                                    <input type="radio" name="gravity" value="aaa" {{ isset($risk) && $risk->gravity === 'aaa' ? 'checked' : '' }}>
                                    <span class="checkmark"></span>
                                </label>
                                <label class="con">
                                    <input type="radio" name="gravity" value="asa" {{ isset($risk) && $risk->gravity === 'asa' ? 'checked' : '' }}>
                                    <span class="checkmark"></span>
                                </label>
                                <label class="con">
                                    <input type="radio" name="gravity" value="weak impact" {{ isset($risk) && $risk->gravity === 'weak impact' ? 'checked' : '' }}>
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            <div class="radio-title">
                                <label>Décès</label>
                                <label>IPP</label>
                                <label>AAA</label>
                                <label>ASA</label>
                                <label>Impact faible</label>
                            </div>
                        </div>
                        <i class="far fa-question-circle" data-toggle="toolHelp" data-placement="top" title="Vivamus sagittis lacus vel augue laoreet rutrum faucibus."></i>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="line">
                    <div class="left">
                        <label>Gravité potentiel</label>
                    </div>
                    <div class="right ">
                        <div class="radio-bar-content">
                            <div class="radio-bar radio-bar--inv">
                                <label class="con"> Non
                                    <input type="radio" name="gender" value="null" {{ isset($risk) && $risk->impact === 'null' ? 'checked' : '' }}>
                                    <span class="checkmark"></span>
                                </label>
                                <label class="con"> Homme
                                    <input type="radio" name="gender" value="male" {{ isset($risk) && $risk->impact === 'male' ? 'checked' : '' }}>
                                    <span class="checkmark"></span>
                                </label>
                                <label class="con"> Femme
                                    <input type="radio" name="gender" value="female" {{ isset($risk) && $risk->impact === 'female' ? 'checked' : '' }}>
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="line">
                    <div class="left">
                    </div>
                    <div class="right">
                        <span class="bold">Valeur du risque brut évaluée :&nbsp;</span> <button type="button" class="btn btn-success btn-small btn-calcul-risk">10</button>
                    </div>
                </div>
            </div>

            <hr>

            <div class="row">
                <div class="line">
                    <div class="left">
                        <h3>Définition des mesures de prévention et de protection existantes</h3>
                    </div>
                    <div class="right">
                    </div>
                </div>
            </div>

            <div class="restraint">

            </div>

            <div class="row">
                <div class="line">
                    <div class="left">
                    </div>
                    <div class="right">
                        <ul>
                            <li>
                                <button data-modal="{{ Auth::user()->hasAccess('oza') && isset($risk) ? '.modal--risk-restraint-oza' : '.modal--risk' }}" data-id="" type="button" class="btn btn-yellow btn-text {{ Auth::user()->hasAccess('oza') && isset($risk) ? 'btn-open-risk-restraint-oza' : 'btn-open-risk' }}">+ Ajouter une mesure existante</button>
                            </li>
                            <li>
                                <span class="bold">Valeur du risque résiduel évaluée :&nbsp;</span> <button type="button" class="btn btn-danger btn-small">24</button>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <hr>

            <div class="row">
                <div class="line line--activity">
                    <div class="left">
                        <label>Mesures proposées</label>
                    </div>
                    <div class="right right--cancel">
                        <ul class="restraint-proposed">
                            <li>
                                <button class="btn btn-yellow btn-text btn-add-restraint" type="button">+ Ajouter une mesure proposée</button>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="line">
                    <div class="left">
                        <span class="bold">Criticité de la situation actuelle</span>
                    </div>
                    <div class="right">
                        <button type="button" class="btn btn-danger">STOP</button>
                    </div>
                </div>
            </div>
            <div class="row row--submit">
                <button class="btn btn-success">Valider le danger</button>
            </div>
        </div>
    </form>





@if (Auth::user()->hasAccess('oza') && isset($risk))
    <div class="modal modal--risk-restraint-oza modal-add-risk">
        <div class="modal-dialog modal-dialog-large">
            <div class="modal-content">
                <div class="modal-header">
                    <p class="title">Ajouter une nouvelle mesure déjà mise en place</p>
                    <button type="button" class="btn-close" data-dismiss="modal"><i class="fas fa-times"></i></button>
                </div>
                <div class="modal-body">
                    @foreach($risk->restraint as $restraint)
                        <div class="content-modal-oza">
                            <div class="row">
                                <div class="line">
                                    <div class="left">
                                        <label class="con"> {{ $restraint->name }}
                                            <input type="checkbox" class="btn-restraint-modal-oza" name="restraint_modal[]" value="{{ $restraint->id }}">
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                    <div class="right"></div>
                                </div>
                            </div>
                            <div class="restraint-modal-content">
                                <div class="row">
                                    <div class="line">
                                        <div class="left">
                                            <label>Technique</label>
                                        </div>
                                        <div class="right">
                                            <div class="radio-bar-content">
                                                <div class="radio-bar radio-bar-tech">
                                                    <label class="con">
                                                        <input type="radio" name="tech-modal-oza-{{ $restraint->id }}" value="very good" checked>
                                                        <span class="checkmark"></span>
                                                    </label>
                                                    <label class="con">
                                                        <input type="radio" name="tech-modal-oza-{{ $restraint->id }}" value="good">
                                                        <span class="checkmark"></span>
                                                    </label>
                                                    <label class="con">
                                                        <input type="radio" name="tech-modal-oza-{{ $restraint->id }}" value="medium">
                                                        <span class="checkmark"></span>
                                                    </label>
                                                    <label class="con">
                                                        <input type="radio" name="tech-modal-oza-{{ $restraint->id }}" value="null">
                                                        <span class="checkmark"></span>
                                                    </label>
                                                </div>
                                                <div class="radio-title">
                                                    <label>Très bon</label>
                                                    <label>Bon</label>
                                                    <label>Moyen</label>
                                                    <label>Nulle</label>
                                                </div>
                                            </div>
                                            <i class="far fa-question-circle" data-toggle="toolHelp" data-placement="top" title="Vivamus sagittis lacus vel augue laoreet rutrum faucibus."></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="line">
                                        <div class="left">
                                            <label>Organisationnelle</label>
                                        </div>
                                        <div class="right">
                                            <div class="radio-bar-content">
                                                <div class="radio-bar radio-bar-orga">
                                                    <label class="con">
                                                        <input type="radio" name="orga-modal-oza-{{ $restraint->id }}" value="very good" checked>
                                                        <span class="checkmark"></span>
                                                    </label>
                                                    <label class="con">
                                                        <input type="radio" name="orga-modal-oza-{{ $restraint->id }}" value="good">
                                                        <span class="checkmark"></span>
                                                    </label>
                                                    <label class="con">
                                                        <input type="radio" name="orga-modal-oza-{{ $restraint->id }}" value="medium">
                                                        <span class="checkmark"></span>
                                                    </label>
                                                    <label class="con">
                                                        <input type="radio" name="orga-modal-oza-{{ $restraint->id }}" value="null">
                                                        <span class="checkmark"></span>
                                                    </label>
                                                </div>
                                                <div class="radio-title">
                                                    <label>Très bon</label>
                                                    <label>Bon</label>
                                                    <label>Moyen</label>
                                                    <label>Nulle</label>
                                                </div>
                                            </div>
                                            <i class="far fa-question-circle" data-toggle="toolHelp" data-placement="top" title="Vivamus sagittis lacus vel augue laoreet rutrum faucibus."></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="line">
                                        <div class="left">
                                            <label>Humaine</label>
                                        </div>
                                        <div class="right">
                                            <div class="radio-bar-content">
                                                <div class="radio-bar radio-bar-human">
                                                    <label class="con">
                                                        <input type="radio" name="human-modal-oza-{{ $restraint->id }}" value="very good" checked>
                                                        <span class="checkmark"></span>
                                                    </label>
                                                    <label class="con">
                                                        <input type="radio" name="human-modal-oza-{{ $restraint->id }}" value="good">
                                                        <span class="checkmark"></span>
                                                    </label>
                                                    <label class="con">
                                                        <input type="radio" name="human-modal-oza-{{ $restraint->id }}" value="medium">
                                                        <span class="checkmark"></span>
                                                    </label>
                                                    <label class="con">
                                                        <input type="radio" name="human-modal-oza-{{ $restraint->id }}" value="null">
                                                        <span class="checkmark"></span>
                                                    </label>
                                                </div>
                                                <div class="radio-title">
                                                    <label>Très bon</label>
                                                    <label>Bon</label>
                                                    <label>Moyen</label>
                                                    <label>Nulle</label>
                                                </div>
                                            </div>
                                            <i class="far fa-question-circle" data-toggle="toolHelp" data-placement="top" title="Vivamus sagittis lacus vel augue laoreet rutrum faucibus."></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                    <div class="row">
                        <div class="line">
                            <div class="left">
                            </div>
                            <div class="right">
                                <button type="button" class="btn btn-success btn-modal-risk-oza-add btn-close" data-dismiss="modal">Ajouter</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif

    <div class="modal modal--risk modal-add-risk">
        <div class="modal-dialog modal-dialog-large">
            <div class="modal-content">
                <div class="modal-header">
                    <p class="title">Ajouter une nouvelle mesure déjà mise en place</p>
                    <button type="button" class="btn-close" data-dismiss="modal"><i class="fas fa-times"></i></button>
                </div>
                <div class="modal-body">

                    <div class="row">
                        <div class="line">
                            <div class="left">
                                <label for="nameRisk">Intitulé du risque</label>
                            </div>
                            <div class="right">
                                <input type="email" class="form-control" id="nameRisk" placeholder="Vente - Boulangerie pâtisserie">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="line">
                            <div class="left">
                                <h3>Evaluation du risque identifié</h3>
                            </div>
                            <div class="right">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="line">
                            <div class="left">
                                <label>Technique</label>
                            </div>
                            <div class="right">
                                <div class="radio-bar-content">
                                    <div class="radio-bar radio-bar-tech">
                                        <label class="con">
                                            <input type="radio" name="tech-modal" value="very good" checked>
                                            <span class="checkmark"></span>
                                        </label>
                                        <label class="con">
                                            <input type="radio" name="tech-modal" value="good">
                                            <span class="checkmark"></span>
                                        </label>
                                        <label class="con">
                                            <input type="radio" name="tech-modal" value="medium">
                                            <span class="checkmark"></span>
                                        </label>
                                        <label class="con">
                                            <input type="radio" name="tech-modal" value="null">
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                    <div class="radio-title">
                                        <label>Très bon</label>
                                        <label>Bon</label>
                                        <label>Moyen</label>
                                        <label>Nulle</label>
                                    </div>
                                </div>
                                <i class="far fa-question-circle" data-toggle="toolHelp" data-placement="top" title="Vivamus sagittis lacus vel augue laoreet rutrum faucibus."></i>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="line">
                            <div class="left">
                                <label>Organisationnelle</label>
                            </div>
                            <div class="right">
                                <div class="radio-bar-content">
                                    <div class="radio-bar radio-bar-orga">
                                        <label class="con">
                                            <input type="radio" name="orga-modal" value="very good" checked>
                                            <span class="checkmark"></span>
                                        </label>
                                        <label class="con">
                                            <input type="radio" name="orga-modal" value="good">
                                            <span class="checkmark"></span>
                                        </label>
                                        <label class="con">
                                            <input type="radio" name="orga-modal" value="medium">
                                            <span class="checkmark"></span>
                                        </label>
                                        <label class="con">
                                            <input type="radio" name="orga-modal" value="null">
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                    <div class="radio-title">
                                        <label>Très bon</label>
                                        <label>Bon</label>
                                        <label>Moyen</label>
                                        <label>Nulle</label>
                                    </div>
                                </div>
                                <i class="far fa-question-circle" data-toggle="toolHelp" data-placement="top" title="Vivamus sagittis lacus vel augue laoreet rutrum faucibus."></i>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="line">
                            <div class="left">
                                <label>Humaine</label>
                            </div>
                            <div class="right">
                                <div class="radio-bar-content">
                                    <div class="radio-bar radio-bar-human">
                                        <label class="con">
                                            <input type="radio" name="human-modal" value="very good" checked>
                                            <span class="checkmark"></span>
                                        </label>
                                        <label class="con">
                                            <input type="radio" name="human-modal" value="good">
                                            <span class="checkmark"></span>
                                        </label>
                                        <label class="con">
                                            <input type="radio" name="human-modal" value="medium">
                                            <span class="checkmark"></span>
                                        </label>
                                        <label class="con">
                                            <input type="radio" name="human-modal" value="null">
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                    <div class="radio-title">
                                        <label>Très bon</label>
                                        <label>Bon</label>
                                        <label>Moyen</label>
                                        <label>Nulle</label>
                                    </div>
                                </div>
                                <i class="far fa-question-circle" data-toggle="toolHelp" data-placement="top" title="Vivamus sagittis lacus vel augue laoreet rutrum faucibus."></i>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="line">
                            <div class="left">
                            </div>
                            <div class="right">
                                <button type="button" class="btn btn-success btn-modal-risk-add btn-close" data-dismiss="modal">Ajouter</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if (Auth::user()->hasAccess('oza'))
        <div class="modal modal--risk--oza modal--oza modal-add-risk " data-backdrop="static">
            <div class="modal-dialog modal-dialog-large">
                <div class="modal-content">
                    <div class="modal-header">
                        <p class="title">Liste des risques</p>
                        <button type="button" class="btn-close" data-dismiss="modal"><i class="fas fa-times"></i></button>
                    </div>
                    <div class="modal-body">
                        <div class="row row--ut">
                            <div class="group-form">
                                <label for="filter-ut">Recherche par intitulé</label>
                                <input type="text" name="filter[ut]" id="filter-ut" class="form-control" placeholder="Taper les premières lettres de l’unité">
                            </div>
                            <div class="group-form">
                                <label for="filter-sa">Filtrer les risques</label>
                                <select name="filter[sa]" id="filter-sa" class="form-control">
                                    <option value="none" selected>Sélectionner un domaine d’activité</option>
                                    @foreach($domaine_activities as $domaine)
                                        <option value="{{ $domaine->id }}">{{ $domaine->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <ul class="list-ut-template">
                                @foreach($danger->danger->risk as $child)
                                    @if(isset($risk))
                                        @if($child->id === $risk->id)
                                            <li><a href="#" class="checked">{{ $child->name }}</a></li>
                                        @else
                                            <li><a href="{{ route('risk.create', [$single_document->id, $danger->id, isset($sd_work_unit) ? $sd_work_unit->id : 'all', $child->id]) }}">{{ $child->name }}</a></li>
                                        @endif
                                    @else
                                        <li><a href="{{ route('risk.create', [$single_document->id, $danger->id, isset($sd_work_unit) ? $sd_work_unit->id : 'all', $child->id]) }}">{{ $child->name }}</a></li>
                                    @endif
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif

</div>

@endsection

@section('script')
    <script src="/js/app/risk.js"></script>
    @if (Auth::user()->hasAccess('oza'))
        <script>

            let url = '{{ route('risk.filter', [$single_document->id, $danger->id]) }}';
            let single_document_id = '{{ $single_document->id }}';
            let risk = '{{ isset($risk) ? $risk->id : null }}';
            let workUnit = '{{ isset($sd_work_unit) ? $sd_work_unit->id : 'all' }}';

            document.getElementById('filter-sa').addEventListener('change', filterRisk);
            document.getElementById('filter-ut').addEventListener('keyup', filterRisk);

        </script>
    @endif
@endsection
