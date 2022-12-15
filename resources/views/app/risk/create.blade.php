@extends('app')

@section('content')


<div class="content">
    <form action="{{ route('risk.store', [$single_document->id, $danger->id, $id_sd_work_unit]) }}" class="card card--add-risk" method="post">
        @csrf
        <div class="card-body">
            <div class="row">
                <div class="line">
                    <div class="left">
                        <label for="nameRisk">Intitulé du risque</label>
                    </div>
                    <div class="right">
                        <textarea type="text" class="form-control" name="name_risk" id="workName" placeholder="Préciser le risque">@if(old('name_risk')){{ old('name_risk') }}@else{{ isset($risk) ? $risk->name : '' }}@endif</textarea>
                    </div>
                </div>
                @error('name_risk')
                <div class="line">
                    <div class="left"></div>
                    <div class="right">
                        <p class="message-error">{{ $message }}</p>
                    </div>
                </div>
                @enderror
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

            <div class="row row--radio">
                <div class="line">
                    <div class="left">
                        <label>Fréquence</label>
                    </div>
                    <div class="right">
                        <div class="radio-bar-content">
                            <div class="radio-bar radio-bar-frequency">
                                <label class="con">
                                    <input type="radio" name="frequency" value="day" @if(old('frequency')){{ old('frequency') === 'day' ? 'checked' : '' }}@else{{ isset($risk) && $risk->frequency === 'day' ? 'checked' : '' }}@endif >
                                    <span class="checkmark"></span>
                                </label>
                                <label class="con">
                                    <input type="radio" name="frequency" value="week" @if(old('frequency')){{ old('frequency') === 'week' ? 'checked' : '' }}@else{{ isset($risk) && $risk->frequency === 'week' ? 'checked' : '' }}@endif>
                                    <span class="checkmark"></span>
                                </label>
                                <label class="con">
                                    <input type="radio"  name="frequency" value="month" @if(old('frequency')){{ old('frequency') === 'month' ? 'checked' : '' }}@else{{ isset($risk) && $risk->frequency === 'month' ? 'checked' : '' }}@endif>
                                    <span class="checkmark"></span>
                                </label>
                                <label class="con">
                                    <input type="radio"  name="frequency" value="year" @if(old('frequency')){{ old('frequency') === 'year' ? 'checked' : '' }}@else{{ isset($risk) && $risk->frequency === 'year' ? 'checked' : '' }}@endif>
                                    <span class="checkmark"></span>
                                </label>
                                <label class="con">
                                    <input type="radio" name="frequency" value="year+" @if(old('frequency')){{ old('frequency') === 'year+' ? 'checked' : '' }}@else{{ isset($risk) && $risk->frequency === 'year+' ? 'checked' : '' }}@endif>
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            <div class="radio-title">
                                <label>Jour</label>
                                <label>Semaine</label>
                                <label>Mois</label>
                                <label>An</label>
                                <label>&lt;An</label>
                            </div>
                            @error('frequency')
                                <p class="message-error">{{ $message }}</p>
                            @enderror
                        </div>
                        <i class="far fa-question-circle" data-tooltip=".tooltip--fre" data-placement="left"></i>
                    </div>
                </div>
            </div>
            <div class="row row--radio">
                <div class="line">
                    <div class="left">
                        <label>Probabilité</label>
                    </div>
                    <div class="right">
                        <div class="radio-bar-content">
                            <div class="radio-bar radio-bar-probability">
                                <label class="con">
                                    <input type="radio" name="probability" value="very high" @if(old('probability')){{ old('probability') === 'very high' ? 'checked' : '' }}@else{{ isset($risk) && $risk->probability === 'very high' ? 'checked' : '' }}@endif >
                                    <span class="checkmark"></span>
                                </label>
                                <label class="con">
                                    <input type="radio" name="probability" value="high" @if(old('probability')){{ old('probability') === 'high' ? 'checked' : '' }}@else{{ isset($risk) && $risk->probability === 'high' ? 'checked' : '' }}@endif>
                                    <span class="checkmark"></span>
                                </label>
                                <label class="con">
                                    <input type="radio" name="probability" value="medium" @if(old('probability')){{ old('probability') === 'medium' ? 'checked' : '' }}@else{{ isset($risk) && $risk->probability === 'medium' ? 'checked' : '' }}@endif>
                                    <span class="checkmark"></span>
                                </label>
                                <label class="con">
                                    <input type="radio" name="probability" value="weak" @if(old('probability')){{ old('probability') === 'weak' ? 'checked' : '' }}@else{{ isset($risk) && $risk->probability === 'weak' ? 'checked' : '' }}@endif>
                                    <span class="checkmark"></span>
                                </label>
                                <label class="con">
                                    <input type="radio" name="probability" value="very weak" @if(old('probability')){{ old('probability') === 'very weak' ? 'checked' : '' }}@else{{ isset($risk) && $risk->probability === 'very weak' ? 'checked' : '' }}@endif>
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
                            @error('probability')
                                <p class="message-error">{{ $message }}</p>
                            @enderror
                        </div>
                        <i class="far fa-question-circle" data-tooltip=".tooltip--pro" data-placement="left"></i>
                    </div>
                </div>
            </div>
            <div class="row row--radio">
                <div class="line">
                    <div class="left">
                        <label>Gravité potentielle</label>
                    </div>
                    <div class="right">
                        <div class="radio-bar-content">
                            <div class="radio-bar radio-bar-gravity">
                                <label class="con">
                                    <input type="radio" name="gravity" value="death" @if(old('gravity')){{ old('gravity') === 'death' ? 'checked' : '' }}@else{{ isset($risk) && $risk->gravity === 'death' ? 'checked' : '' }}@endif >
                                    <span class="checkmark"></span>
                                </label>
                                <label class="con">
                                    <input type="radio" name="gravity" value="ipp" @if(old('gravity')){{ old('gravity') === 'ipp' ? 'checked' : '' }}@else{{ isset($risk) && $risk->gravity === 'ipp' ? 'checked' : '' }}@endif>
                                    <span class="checkmark"></span>
                                </label>
                                <label class="con">
                                    <input type="radio" name="gravity" value="aaa" @if(old('gravity')){{ old('gravity') === 'aaa' ? 'checked' : '' }}@else{{ isset($risk) && $risk->gravity === 'aaa' ? 'checked' : '' }}@endif>
                                    <span class="checkmark"></span>
                                </label>
                                <label class="con">
                                    <input type="radio" name="gravity" value="asa" @if(old('gravity')){{ old('gravity') === 'asa' ? 'checked' : '' }}@else{{ isset($risk) && $risk->gravity === 'asa' ? 'checked' : '' }}@endif>
                                    <span class="checkmark"></span>
                                </label>
                                <label class="con">
                                    <input type="radio" name="gravity" value="weak impact" @if(old('gravity')){{ old('gravity') === 'weak impact' ? 'checked' : '' }}@else{{ isset($risk) && $risk->gravity === 'weak impact' ? 'checked' : '' }}@endif>
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
                            @error('gravity')
                                <p class="message-error">{{ $message }}</p>
                            @enderror
                        </div>
                        <i class="far fa-question-circle" data-tooltip=".tooltip--gp" data-placement="left"></i>
                    </div>
                </div>
            </div>

            <div class="row row--radio">
                <div class="line">
                    <div class="left">
                        <label>Impact différencié</label>
                    </div>
                    <div class="right ">
                        <div class="radio-bar-content">
                            <div class="radio-bar radio-bar--inv">
                                <label class="con"> Non
                                    <input type="radio" name="impact" value="null" @if(old('impact')){{ old('impact') === 'null' ? 'checked' : '' }}@else{{ isset($risk) && $risk->impact === 'null' ? 'checked' : '' }}@endif >
                                    <span class="checkmark"></span>
                                </label>
                                <label class="con"> Femme
                                    <input type="radio" name="impact" value="female" @if(old('impact')){{ old('impact') === 'female' ? 'checked' : '' }}@else{{ isset($risk) && $risk->impact === 'female' ? 'checked' : '' }}@endif>
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            @error('impact')
                                <p class="message-error">{{ $message }}</p>
                            @enderror
                        </div>
                        <i class="far fa-question-circle" data-tooltip=".tooltip--id" data-placement="left"></i>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="line">
                    <div class="left">
                    </div>
                    <div class="right">
                        <span class="bold">Valeur du risque brut évalué :&nbsp;</span> <button type="button" class="btn btn-success btn-small btn-calcul-risk">{{ isset($risk) ? $risk->total() : '0' }}</button>
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

            <div class="row">
                <div class="line">
                    <div class="left">
                        <label>Mesure existante</label>
                    </div>
                    <div class="right restraint">
                        <div class="row nothing_restraint_ex">
                            <ul>
                                <li>Aucune mesure existante</li>
                            </ul>
                        </div>
                    </div>
                </div>
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
                                <span class="bold">Valeur du risque résiduel évalué :&nbsp;</span> <button type="button" class="btn btn-success btn-small" data-id="status-number">0</button>
                            </li>
                            @error('restraint')
                                <li>
                                    <p class="message-error">{{ $message }}</p>
                                </li>
                            @enderror
                            <li class="none error-restraint">
                                <p class="message-error"></p>
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
                        <button type="button" class="btn btn-success" data-id="status">Acceptable</button>
                    </div>
                </div>
            </div>

            <hr>

            <div class="row">
                <div class="line line--activity">
                    <div class="left">
                        <label>Mesures proposées</label>
                    </div>
                    <div class="right right--cancel res-pro">
                        <ul class="nothing_restraint_pro">
                            <li>
                                Aucune mesure proposée
                            </li>
                        </ul>
                        <ul class="restraint-proposed">
                            <li>
                                <button class="btn btn-yellow btn-text btn-add-restraint" type="button">+ Ajouter une mesure proposée</button>
                            </li>
                            @error('restraint_proposed')
                                <li>
                                    <p class="message-error">{{ $message }}</p>
                                </li>
                            @enderror
                        </ul>
                    </div>
                </div>
            </div>

            <div class="row row--submit">
                <button class="btn btn-success">Valider le risque</button>
            </div>
        </div>
    </form>


    @if (Auth::user()->hasAccess('oza') && isset($risk))
        <div class="modal modal--risk-restraint-oza modal-add-risk" data-backdrop="static">
            <div class="modal-dialog modal-dialog-large">
                <div class="modal-content">
                    <div class="modal-header">
                        <p class="title">Mesure de prévention existante</p>
                        <button type="button" class="btn-close" data-dismiss="modal"><i class="fas fa-times"></i></button>
                    </div>
                    <div class="modal-body">
                        @foreach($risk->restraint as $restraint)
                            <div class="content-modal-oza">
                                <div class="row">
                                    <div class="line">
                                        <label class="con"> @stripTags($restraint->name)
                                            <input type="checkbox" class="btn-restraint-modal-oza" name="restraint_modal[]" value="{{ $restraint->id }}">
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                </div>
                                <div class="restraint-modal-content">
                                    <div class="row row--radio">
                                        <div class="line">
                                            <div class="left">
                                                <label>Technique</label>
                                            </div>
                                            <div class="right">
                                                <div class="radio-bar-content">
                                                    <div class="radio-bar radio-bar-tech">

                                                        <label class="con">
                                                            <input type="radio" name="tech-modal-oza-{{ $restraint->id }}" value="null">
                                                            <span class="checkmark"></span>
                                                        </label>
                                                        <label class="con">
                                                            <input type="radio" name="tech-modal-oza-{{ $restraint->id }}" value="medium">
                                                            <span class="checkmark"></span>
                                                        </label>
                                                        <label class="con">
                                                            <input type="radio" name="tech-modal-oza-{{ $restraint->id }}" value="good">
                                                            <span class="checkmark"></span>
                                                        </label>
                                                        <label class="con">
                                                            <input type="radio" name="tech-modal-oza-{{ $restraint->id }}" value="very good" checked>
                                                            <span class="checkmark"></span>
                                                        </label>
                                                    </div>
                                                    <div class="radio-title">
                                                        <label>Inexistante</label>
                                                        <label>Moyen</label>
                                                        <label>Bon</label>
                                                        <label>Très bon</label>
                                                    </div>
                                                </div>
                                                <i class="far fa-question-circle" data-tooltip=".tooltip--restraint-tech" data-placement="left"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row row--radio">
                                        <div class="line">
                                            <div class="left">
                                                <label>Organisationnelle</label>
                                            </div>
                                            <div class="right">
                                                <div class="radio-bar-content">
                                                    <div class="radio-bar radio-bar-orga">
                                                        <label class="con">
                                                            <input type="radio" name="orga-modal-oza-{{ $restraint->id }}" value="null">
                                                            <span class="checkmark"></span>
                                                        </label>
                                                        <label class="con">
                                                            <input type="radio" name="orga-modal-oza-{{ $restraint->id }}" value="medium">
                                                            <span class="checkmark"></span>
                                                        </label>
                                                        <label class="con">
                                                            <input type="radio" name="orga-modal-oza-{{ $restraint->id }}" value="good">
                                                            <span class="checkmark"></span>
                                                        </label>
                                                        <label class="con">
                                                            <input type="radio" name="orga-modal-oza-{{ $restraint->id }}" value="very good" checked>
                                                            <span class="checkmark"></span>
                                                        </label>
                                                    </div>
                                                    <div class="radio-title">
                                                        <label>Inexistante</label>
                                                        <label>Moyen</label>
                                                        <label>Bon</label>
                                                        <label>Très bon</label>
                                                    </div>
                                                </div>
                                                <i class="far fa-question-circle" data-tooltip=".tooltip--restraint-orga" data-placement="left"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row row--radio">
                                        <div class="line">
                                            <div class="left">
                                                <label>Humaine</label>
                                            </div>
                                            <div class="right">
                                                <div class="radio-bar-content">
                                                    <div class="radio-bar radio-bar-human">
                                                        <label class="con">
                                                            <input type="radio" name="human-modal-oza-{{ $restraint->id }}" value="null">
                                                            <span class="checkmark"></span>
                                                        </label>
                                                        <label class="con">
                                                            <input type="radio" name="human-modal-oza-{{ $restraint->id }}" value="medium">
                                                            <span class="checkmark"></span>
                                                        </label>
                                                        <label class="con">
                                                            <input type="radio" name="human-modal-oza-{{ $restraint->id }}" value="good">
                                                            <span class="checkmark"></span>
                                                        </label>
                                                        <label class="con">
                                                            <input type="radio" name="human-modal-oza-{{ $restraint->id }}" value="very good" checked>
                                                            <span class="checkmark"></span>
                                                        </label>
                                                    </div>
                                                    <div class="radio-title">
                                                        <label>Inexistante</label>
                                                        <label>Moyen</label>
                                                        <label>Bon</label>
                                                        <label>Très bon</label>
                                                    </div>
                                                </div>
                                                <i class="far fa-question-circle" data-tooltip=".tooltip--restraint-human" data-placement="left"></i>
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
                                    <button type="button" class="btn btn-danger btn-inv btn-modal-risk-oza-add-v2 btn-close" data-dismiss="modal" style="margin-left: 15px">Pas de mesure de prévention existante</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tooltip tooltip--restraint-tech">
                        <p>Mesure de prévention technique comme par exemple : système de sécurité automatique, machine ou matériel conforme, ...</p>
                    </div>
                    <div class="tooltip tooltip--restraint-orga">
                        <p>Mesure de prévention organisationnelle comme par exemple : respect de la règlementation en vigueur, consigne formalisée, ...</p>
                    </div>
                    <div class="tooltip tooltip--restraint-human">
                        <p>Mesure de prévention humaine comme par exemple : information sensibilisation ou formation du personnel, protection collective et ou individuelle, ...</p>
                    </div>
                </div>
            </div>
        </div>
    @endif

    <div class="modal modal--risk modal-add-risk">
        <div class="modal-dialog modal-dialog-large">
            <div class="modal-content">
                <div class="modal-header">
                    <p class="title">Mesure de prévention existante</p>
                    <button type="button" class="btn-close" data-dismiss="modal"><i class="fas fa-times"></i></button>
                </div>
                <div class="modal-body">

                    <div class="row">
                        <div class="line">
                            <div class="left">
                                <label for="nameRisk">Mesure</label>
                            </div>
                            <div class="right">
                                <textarea id="nameRisk" class="form-control auto-resize" placeholder="Décrire la mesure mise en place"></textarea>
                                <input type="hidden" id="dateRisk" value="">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="line">
                            <div class="left">
                                <h3>Evaluation de l'efficacité de la mesure en place</h3>
                            </div>
                            <div class="right">
                            </div>
                        </div>
                    </div>

                    <div class="row row--radio">
                        <div class="line">
                            <div class="left">
                                <label>Technique</label>
                            </div>
                            <div class="right">
                                <div class="radio-bar-content">
                                    <div class="radio-bar radio-bar-tech">
                                        <label class="con">
                                            <input type="radio" name="tech-modal" value="null">
                                            <span class="checkmark"></span>
                                        </label>
                                        <label class="con">
                                            <input type="radio" name="tech-modal" value="medium">
                                            <span class="checkmark"></span>
                                        </label>
                                        <label class="con">
                                            <input type="radio" name="tech-modal" value="good">
                                            <span class="checkmark"></span>
                                        </label>
                                        <label class="con">
                                            <input type="radio" name="tech-modal" value="very good" checked>
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                    <div class="radio-title">
                                        <label>Inexistante</label>
                                        <label>Moyenne</label>
                                        <label>Bonne</label>
                                        <label>Très bonne</label>
                                    </div>
                                </div>
                                <i class="far fa-question-circle" data-tooltip=".tooltip--restraint-tech" data-placement="left"></i>
                            </div>
                        </div>
                    </div>
                    <div class="row row--radio">
                        <div class="line">
                            <div class="left">
                                <label>Organisationnelle</label>
                            </div>
                            <div class="right">
                                <div class="radio-bar-content">
                                    <div class="radio-bar radio-bar-orga">
                                        <label class="con">
                                            <input type="radio" name="orga-modal" value="null">
                                            <span class="checkmark"></span>
                                        </label>
                                        <label class="con">
                                            <input type="radio" name="orga-modal" value="medium">
                                            <span class="checkmark"></span>
                                        </label>
                                        <label class="con">
                                            <input type="radio" name="orga-modal" value="good">
                                            <span class="checkmark"></span>
                                        </label>
                                        <label class="con">
                                            <input type="radio" name="orga-modal" value="very good" checked>
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                    <div class="radio-title">
                                        <label>Inexistante</label>
                                        <label>Moyenne</label>
                                        <label>Bonne</label>
                                        <label>Très bonne</label>
                                    </div>
                                </div>
                                <i class="far fa-question-circle" data-tooltip=".tooltip--restraint-orga" data-placement="left"></i>
                            </div>
                        </div>
                    </div>
                    <div class="row row--radio">
                        <div class="line">
                            <div class="left">
                                <label>Humaine</label>
                            </div>
                            <div class="right">
                                <div class="radio-bar-content">
                                    <div class="radio-bar radio-bar-human">
                                        <label class="con">
                                            <input type="radio" name="human-modal" value="null">
                                            <span class="checkmark"></span>
                                        </label>
                                        <label class="con">
                                            <input type="radio" name="human-modal" value="medium">
                                            <span class="checkmark"></span>
                                        </label>
                                        <label class="con">
                                            <input type="radio" name="human-modal" value="good">
                                            <span class="checkmark"></span>
                                        </label>
                                        <label class="con">
                                            <input type="radio" name="human-modal" value="very good" checked>
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                    <div class="radio-title">
                                        <label>Inexistante</label>
                                        <label>Moyenne</label>
                                        <label>Bonne</label>
                                        <label>Très bonne</label>
                                    </div>
                                </div>
                                <i class="far fa-question-circle" data-tooltip=".tooltip--restraint-human" data-placement="left"></i>
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
                <div class="tooltip tooltip--restraint-tech">
                    <p>Mesure de prévention technique comme par exemple : système de sécurité automatique, machine ou matériel conforme, ...</p>
                </div>
                <div class="tooltip tooltip--restraint-orga">
                    <p>Mesure de prévention organisationnelle comme par exemple : respect de la règlementation en vigueur, consigne formalisée, ...</p>
                </div>
                <div class="tooltip tooltip--restraint-human">
                    <p>Mesure de prévention humaine comme par exemple : information sensibilisation ou formation du personnel, protection collective et ou individuelle, ...</p>
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
                                @foreach($danger->danger->risks as $child)
                                    @if(isset($risk))
                                        @if($child->id === $risk->id)
                                            <li><a href="#" class="checked">{{ $child->name }}</a></li>
                                        @else
                                            <li><a href="{{ route('risk.create', [$single_document->id, $danger->id, $id_sd_work_unit, $child->id]) }}">{{ $child->name }}</a></li>
                                        @endif
                                    @else
                                        <li><a href="{{ route('risk.create', [$single_document->id, $danger->id, $id_sd_work_unit, $child->id]) }}">{{ $child->name }}</a></li>
                                    @endif
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif

    <div class="tooltip tooltip--fre">
        <p>&lt; An : exposition extrêmement rare de moins de une fois par an</p>
        <p>An : exposition rare de une à plusieurs fois par an</p>
        <p>Mois : exposition peu fréquente de une à plusieurs fois par mois</p>
        <p>Semaine : exposition fréquente de une à plusieurs fois par semaine</p>
        <p>Jour : exposition très fréquente, de une à plusieurs fois par jour</p>
    </div>

    <div class="tooltip tooltip--pro">
        <p>La probabilité de survenue d'un accident ou d'une atteinte à la santé.</p>
    </div>

    <div class="tooltip tooltip--gp">
        <p>La gravité potentielle des conséquences de l'exposition à un danger est évaluée selon une échelle à 5 niveaux :</p>
        <p>Impact faible : exposition sans conséquence sur la santé physique et mentale de la personne exposée</p>
        <p>ASA : Accident ou maladie professionnelle Sans Arrêt de travail</p>
        <p>AAA : Accident ou maladie professionnelle Avec Arrêt de travail, sans IPP (*Incapacité Permanente Partielle)</p>
        <p>IPP : accident ou maladie professionnelle avec arrêt de travail et avec IPP (*Incapacité Permanente Partielle)</p>
        <p>Décès : au moins une maladie professionnelle avec Incapacité Permanente Totale ou au moins un décès</p>
        <p>L'IPP est constatée lorsqu'il persiste des séquelles de l'accident du travail, alors que le salarié est déclaré apte.</p>
    </div>

    <div class="tooltip tooltip--id">
        <p>Non : pas d'impact différencié de l'exposition à ce risque en fonction du sexe.</p>
        <p>F : impact de ce risque plus grave sur le sexe Féminin.</p>
    </div>
</div>
@endsection

@section('script')
    <script>
        let pon = {!! $risk_cal !!};
    </script>
    <script src="/js/app/risk.js"></script>
    @if(old('res_title'))
        <script>
            // exemple text : t&#039;es
            @foreach(old('res_title') as $key => $res_title)
                createRestraint('{{ old("res_tech")[$key] }}','{{ old("res_orga")[$key] }}','{{ old("res_human")[$key] }}',`{!! strip_tags($res_title) !!}`)
            @endforeach
        </script>
    @endif
    @if(old('restraint_proposed'))
        <script>
            @foreach(old('restraint_proposed') as $restraint)
                createRestraintProposed(`@stripTags($restraint)`)
            @endforeach
        </script>
    @endif
    @if (Auth::user()->hasAccess('oza'))
        <script>

            let url = '{{ route('risk.filter', [$single_document->id, $danger->id]) }}';
            let single_document_id = '{{ $single_document->id }}';
            let danger = '{{ $danger->id }}';
            let workUnit = '{{ $id_sd_work_unit }}';

            let risk = '{{ isset($risk) ? $risk->id : "none" }}';

            document.getElementById('filter-sa').addEventListener('change', filterRisk);
            document.getElementById('filter-ut').addEventListener('keyup', filterRisk);

        </script>
    @endif
@endsection
