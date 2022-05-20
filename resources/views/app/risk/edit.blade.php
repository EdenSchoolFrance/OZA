@extends('app')

@section('content')


<div class="content">
    <form action="{{ route('risk.update', [$single_document->id, $danger->id, $risk->sd_work_unit ?? 'all', $risk->id]) }}" class="card card--add-risk" method="post">
        @csrf
        <div class="card-body">
            <div class="row">
                <div class="line">
                    <div class="left">
                        <label for="nameRisk">Intitulé du risque</label>
                    </div>
                    <div class="right">
                        <input type="text" class="form-control" name="name_risk" id="workName" placeholder="Vente - Boulangerie pâtisserie" value="@if(old('name_risk')){{ old('name_risk') }}@else{{ isset($risk) ? $risk->name : '' }}@endif">
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
                                    <input type="radio"  name="frequency" value="month" @if(old('frequency')){{ old('frequency') === 'mouth' ? 'checked' : '' }}@else{{ isset($risk) && $risk->frequency === 'mouth' ? 'checked' : '' }}@endif>
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
                                <label>>An</label>
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
                    <div class="right">
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
                        <span class="bold">Valeur du risque brut évalué :&nbsp;</span> <button type="button" class="btn {{ $risk->color($risk->total()) }} btn-small btn-calcul-risk">{{ $risk->total() }}</button>
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
                                <button data-modal=".modal--risk" data-id="" type="button" class="btn btn-yellow btn-text btn-open-risk">+ Ajouter une mesure existante</button>
                            </li>
                            <li>
                                <span class="bold">Valeur du risque résiduel évalué :&nbsp;</span> <button type="button" class="btn {{ $risk->color(isset($risk->sd_restraints_exist[0]) ? $risk->totalRR($risk->sd_restraints_exist) : $risk->total()) }} btn-small" data-id="status-number">{{ isset($risk->sd_restraints_exist[0]) ? $risk->totalRR($risk->sd_restraints_exist) : $risk->total() }}</button>
                            </li>
                            @error('restraint')
                                <li>
                                    <p class="message-error">{{ $message }}</p>
                                </li>
                            @enderror
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
                            @error('restraint_proposed')
                                <li>
                                    <p class="message-error">{{ $message }}</p>
                                </li>
                            @enderror
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
                        <button type="button" class="btn {{ $risk->color(isset($risk->sd_restraints_exist[0]) ? $risk->totalRR($risk->sd_restraints_exist) : $risk->total()) }}" data-id="status">{{ $risk->colorTotal(isset($risk->sd_restraints_exist[0]) ? $risk->totalRR($risk->sd_restraints_exist) : $risk->total()) }}</button>
                    </div>
                </div>
            </div>
            <div class="row row--submit">
                <button class="btn btn-success">Mettre à jour le risque</button>
            </div>
        </div>
    </form>

    {{--
        Modal
    --}}

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
                                        <label>Moyen</label>
                                        <label>Bon</label>
                                        <label>Très bon</label>
                                    </div>
                                </div>
                                <i class="far fa-question-circle" data-tooltip=".tooltip--restraint" data-placement="left"></i>
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
                                        <label>Moyen</label>
                                        <label>Bon</label>
                                        <label>Très bon</label>
                                    </div>
                                </div>
                                <i class="far fa-question-circle" data-tooltip=".tooltip--restraint" data-placement="left"></i>
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
                                        <label>Moyen</label>
                                        <label>Bon</label>
                                        <label>Très bon</label>
                                    </div>
                                </div>
                                <i class="far fa-question-circle" data-tooltip=".tooltip--restraint" data-placement="left"></i>
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
                <div class="tooltip tooltip--restraint">
                    <p>Très bonne = mesure existante très efficace</p>
                    <p>Bonne = mesure existante de bonne efficacité</p>
                    <p>Moyenne = mesure existante d'efficacité moyenne</p>
                    <p>Nulle = mesure non existante</p>
                </div>
            </div>
        </div>
    </div>

    <div class="tooltip tooltip--fre">
        <p>La fréquence d'exposition est évaluée selon une échelle à 5 niveaux :</p>
        <p>> An : exposition extrêmement rare de moins de une fois par an</p>
        <p>An : exposition rare de une à plusieurs fois par an</p>
        <p>Mois : exposition peu fréquente de une à plusieurs fois par mois</p>
        <p>Semaine : exposition fréquente de une à plusieurs fois par semaine</p>
        <p>Jour : exposition très fréquente, de une à plusieurs fois par jour</p>
    </div>

    <div class="tooltip tooltip--pro">
        <p>
            La probabilité de survenue d'un accident ou d'une atteinte à la santé doit être également évaluée,
            car la fréquence d'exposition à un danger n'est pas le seul paramètre qui influence la survenue
            d'un accident ou d'une atteinte à la santé.<br>
            Par exemple, une personne emprunte plusieurs fois par jour un escalier en se tenant à la rampe.
            La fréquence d'exposition est maximale, mais cela ne signifie pas que cette personne aura un accident chaque jour dans cet escalier.
            La probabilité qu'elle chute dans cet escalier est "faible" ou "très faible".
        </p>
    </div>

    <div class="tooltip tooltip--gp">
        <p>La gravité potentielle des conséquences de l'exposition à un danger est évaluée selon une échelle à 5 niveaux :</p>
        <p>Impact faible : exposition sans conséquence sur la santé physique et mentale de la personne exposée</p>
        <p>ASA : Accident ou maladie professionnelle Sans Arrêt de travail</p>
        <p>AAA : Accident ou maladie professionnelle Avec Arrêt de travail, sans IPP (Incapacité Permanente Partielle*)</p>
        <p>IPP : accident ou maladie professionnelle avec arrêt de travail et avec IPP (Incapacité Permanente Partielle*)</p>
        <p>Décès : au moins une maladie professionnelle avec Incapacité Permanente Totale ou au moins un décès</p>
        <p>L'IPP est constatée lorsqu'il persiste des séquelles de l'accident du travail, alors que le salarié est déclaré apte.</p>
    </div>

    <div class="tooltip tooltip--id">
        <p>
            Non : égale pour les deux sexes
            L'impact différencié permet d'identifier le cas échéant le sexe pour lequel la gravité est potentiellement la plus importante.
            L'évaluation de l'impact différencié de l'exposition aux risques en fonction du sexe est en effet une exigence réglementaire.
        </p>
        <p>F : Femme</p>
    </div>
</div>

@endsection

@section('script')
    <script src="/js/app/risk.js"></script>
    @if(old('restraint'))
        <script>
            @foreach(old('restraint') as $restraint)
                createRestraint('{{ explode('|',$restraint)[0] }}','{{ explode('|',$restraint)[1] }}','{{ explode('|',$restraint)[2] }}','{{ explode('|',$restraint)[3] }}','{{ explode('|',$restraint)[4] }}'  )
            @endforeach
        </script>
    @elseif(isset($risk))
        <script>
            @foreach($risk->sd_restraints as $restraint)
                @if($restraint->exist === 1)
                    createRestraint('{{ $restraint->technical }}','{{ $restraint->organizational }}','{{ $restraint->human }}',"{!! $restraint->name !!}",'{{ $restraint->id }}')
                @endif
            @endforeach
        </script>
    @endif
    @if(old('restraint_proposed'))
        <script>
            @foreach(old('restraint_proposed') as $restraint)
                createRestraintProposed('{{ $restraint }}')
            @endforeach
        </script>
    @elseif(isset($risk))
        <script>
            @foreach($risk->sd_restraints as $restraint)
                @if($restraint->exist === 0)
                    createRestraintProposed('{{ $restraint->name }}')
                @endif
            @endforeach
        </script>
    @endif
@endsection
