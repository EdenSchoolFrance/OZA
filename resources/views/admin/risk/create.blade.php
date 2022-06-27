@extends('app')

@section('content')


<div class="content">
    <form action="{{ route('admin.help.risk.store') }}" class="card card--add-risk" method="post">
        @csrf
        <div class="card-body">
            <div class="row">
                <div class="line">
                    <div class="left">
                        <label for="dangerRisk">Danger</label>
                    </div>
                    <div class="right">
                        <select name="danger_risk" id="dangerRisk" class="form-control">
                            @foreach($dangers as $danger)
                                <option value="{{ $danger->id }}">{{ $danger->name }}</option>
                            @endforeach

                        </select>
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
            <div class="row">
                <div class="line">
                    <div class="left">
                        <label for="nameRisk">Intitulé du risque</label>
                    </div>
                    <div class="right">
                        <input type="text" class="form-control" name="name_risk" id="workName" placeholder="Vente - Boulangerie pâtisserie" value="{{ old('name_risk') ?  : "" }}">
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
            <div class="row">
                <div class="line">
                    <div class="left">
                        <label for="domainRisk">Domaine d'activité</label>
                    </div>
                    <div class="right">
                        <select name="domain_risk" id="domainRisk" class="form-control">
                            @foreach($domains as $domain)
                                <option value="{{ $domain->id }}">{{ $domain->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                @error('domain_risk')
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
                                    <input type="radio" name="frequency" value="day" @if(old('frequency')){{ old('frequency') === 'day' ? 'checked' : '' }}@endif >
                                    <span class="checkmark"></span>
                                </label>
                                <label class="con">
                                    <input type="radio" name="frequency" value="week" @if(old('frequency')){{ old('frequency') === 'week' ? 'checked' : '' }}@endif>
                                    <span class="checkmark"></span>
                                </label>
                                <label class="con">
                                    <input type="radio"  name="frequency" value="month" @if(old('frequency')){{ old('frequency') === 'mouth' ? 'checked' : '' }}@endif>
                                    <span class="checkmark"></span>
                                </label>
                                <label class="con">
                                    <input type="radio"  name="frequency" value="year" @if(old('frequency')){{ old('frequency') === 'year' ? 'checked' : '' }}@endif>
                                    <span class="checkmark"></span>
                                </label>
                                <label class="con">
                                    <input type="radio" name="frequency" value="year+" @if(old('frequency')){{ old('frequency') === 'year+' ? 'checked' : '' }}@endif>
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
                            @error('frequency')
                                <p class="message-error">{{ $message }}</p>
                            @enderror
                        </div>
                        <i class="far fa-question-circle" data-tooltip=".tooltip--fre" data-placement="right"></i>
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
                                    <input type="radio" name="probability" value="very high" @if(old('probability')){{ old('probability') === 'very high' ? 'checked' : '' }}@endif >
                                    <span class="checkmark"></span>
                                </label>
                                <label class="con">
                                    <input type="radio" name="probability" value="high" @if(old('probability')){{ old('probability') === 'high' ? 'checked' : '' }}@endif>
                                    <span class="checkmark"></span>
                                </label>
                                <label class="con">
                                    <input type="radio" name="probability" value="medium" @if(old('probability')){{ old('probability') === 'medium' ? 'checked' : '' }}@endif>
                                    <span class="checkmark"></span>
                                </label>
                                <label class="con">
                                    <input type="radio" name="probability" value="weak" @if(old('probability')){{ old('probability') === 'weak' ? 'checked' : '' }}@endif>
                                    <span class="checkmark"></span>
                                </label>
                                <label class="con">
                                    <input type="radio" name="probability" value="very weak" @if(old('probability')){{ old('probability') === 'very weak' ? 'checked' : '' }}@endif>
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
                        <i class="far fa-question-circle" data-tooltip=".tooltip--pro" data-placement="right"></i>
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
                                    <input type="radio" name="gravity" value="death" @if(old('gravity')){{ old('gravity') === 'death' ? 'checked' : '' }}@endif >
                                    <span class="checkmark"></span>
                                </label>
                                <label class="con">
                                    <input type="radio" name="gravity" value="ipp" @if(old('gravity')){{ old('gravity') === 'ipp' ? 'checked' : '' }}@endif>
                                    <span class="checkmark"></span>
                                </label>
                                <label class="con">
                                    <input type="radio" name="gravity" value="aaa" @if(old('gravity')){{ old('gravity') === 'aaa' ? 'checked' : '' }}@endif>
                                    <span class="checkmark"></span>
                                </label>
                                <label class="con">
                                    <input type="radio" name="gravity" value="asa" @if(old('gravity')){{ old('gravity') === 'asa' ? 'checked' : '' }}@endif>
                                    <span class="checkmark"></span>
                                </label>
                                <label class="con">
                                    <input type="radio" name="gravity" value="weak impact" @if(old('gravity')){{ old('gravity') === 'weak impact' ? 'checked' : '' }}@endif>
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
                        <i class="far fa-question-circle" data-tooltip=".tooltip--gp" data-placement="right"></i>
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
                                    <input type="radio" name="impact" value="null" @if(old('impact')){{ old('impact') === 'null' ? 'checked' : '' }}@endif >
                                    <span class="checkmark"></span>
                                </label>
                                <label class="con"> Femme
                                    <input type="radio" name="impact" value="female" @if(old('impact')){{ old('impact') === 'female' ? 'checked' : '' }}@endif>
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            @error('impact')
                                <p class="message-error">{{ $message }}</p>
                            @enderror
                        </div>
                        <i class="far fa-question-circle" data-tooltip=".tooltip--id" data-placement="right"></i>
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
                <div class="line line--activity">
                    <div class="left"></div>
                    <div class="right right--cancel">
                        <ul class="restraint">
                            <li>
                                <button class="btn btn-yellow btn-text btn-add-restraint-exist" type="button">+ Ajouter une mesure</button>
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

            <div class="row row--submit">
                <button class="btn btn-success">Mettre à jour le risque</button>
            </div>
        </div>
    </form>

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
@endsection
