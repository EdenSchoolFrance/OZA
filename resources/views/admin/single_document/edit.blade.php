@extends('app')

@section('content')
    @if(isset($excelErrors))
        <div class="alert alert-danger">
            <p>
                @foreach($excelErrors as $error)
                    {{ $error->error . ", à la ligne : ". $error->line }} <br>
                @endforeach
            </p>
            <button type="button" data-dismiss="alert" class="btn-close"><i class="fas fa-times"></i></button>
        </div>
        @php
            foreach ($excelErrors as $error){
                $error->delete();
            }
        @endphp
    @endif

    <div class="content client">
        <div class="link--right">
            <a href="{{ route('dashboard', [$sd->id]) }}" class="btn btn-yellow"><i class="far fa-eye"></i>Visualiser le DU</a>
        </div>
        <div class="card card--add-client">
            <form class="card-body" action="{{ route('admin.single_document.update', [$sd->client->id, $sd->id]) }}" method="post">
                @csrf
                <div class="row">
                    <div class="line">
                        <div class="left">
                            <label for="name_single_document">Intitulé du DU</label>
                        </div>
                        <div class="right">
                            <input type="text" name="name_single_document" id="name_single_document" class="form-control @error('name_single_document') invalid @enderror" value="{{ old('name_single_document') ? old('name_single_document') : $sd->name }}" placeholder="Indiquer le nom du DU">
                            @error('name_single_document')
                                <p class="message-error">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="line">
                        <div class="left"></div>
                        <div class="right">
                            <hr class="separation">
                        </div>
                    </div>
                    <div class="line">
                        <div class="left">
                            <h3>Evaluation des risques professionnels</h3>
                        </div>
                        <div class="right"></div>
                    </div>
                    <div class="line">
                        <div class="left">
                            <label for="number_ut">Nombre d'UT maximum (0 = illimité)</label>
                        </div>
                        <div class="right">
                            <input type="number" name="number_ut" id="number_ut" class="form-control @error('number_ut') invalid @enderror" value="{{ old('number_ut') ? old('number_ut') : $sd->work_unit_limit }}" placeholder="Nombre d'UT maximum (0 = illimité)">
                            @error('number_ut')
                                <p class="message-error">{{ $message }}</p>
                            @enderror
                            @error('dangers')
                                <p class="message-error">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="line">
                        <div class="left">
                            <p>Liste des dangers associés</p>
                        </div>
                        <div class="right right--btn">
                            @foreach ($packs as $pack)
                                <button type="button" class="btn btn-yellow btn-text select-pack" data-pack="{{ $pack->id }}">{{ $pack->translate() }}</button>
                            @endforeach
                            <button type="button" class="btn btn-yellow btn-text uncheck-pack">Tout décocher</button>
                        </div>
                    </div>
                    <div class="line">
                        <div class="left">
                        </div>
                        <div class="right right--check">
                            @foreach ($dangers as $danger)
                                <div>
                                    <input type="checkbox" class="radio-checkbox item-pack" data-pack="{{ $danger->packs->pluck('id')->implode(',') }}" id="danger_{{ $danger->id }}" name="dangers[{{ $danger->id }}]" value="{{ $danger->id }}" {{ old('dangers.'. $danger->id) ? 'checked' : '' }} {{ in_array($danger->id, $sd->dangers->pluck('danger_id')->toArray()) ? 'checked' : '' }}>
                                    <label for="danger_{{ $danger->id }}">{{ $danger->name }}</label>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="line">
                        <div class="left"></div>
                        <div class="right">
                            <hr class="separation">
                        </div>
                    </div>
                    <div class="line">
                        <div class="left">
                            <h3>Evaluation des risques psychosociaux</h3>
                        </div>
                        <div class="right"></div>
                    </div>
                    <div class="line">
                        <div class="left">
                            <p>Option souscrite</p>
                        </div>
                        <div class="right">
                            <div>
                                <input type="radio" id="risk_psycho_yes" name="risk_psycho" value="yes" {{ old('risk_psycho') ? (old('risk_psycho') == "yes" ? 'checked' : '') : ($sd->risk_psycho ? 'checked' : '') }}>
                                <label for="risk_psycho_yes">Oui</label>
                            </div>
                            <div>
                                <input type="radio" id="risk_psycho_no" name="risk_psycho" value="no" {{ old('risk_psycho') ? (old('risk_psycho') == "no" ? 'checked' : '') : (!$sd->risk_psycho ? 'checked' : '') }}>
                                <label for="risk_psycho_no">Non</label>
                            </div>
                            @error('risk_psycho')
                                <p class="message-error">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="line">
                        <div class="left">
                            <p>Définition des groupes d'expositions homogènes</p>
                        </div>
                        <div class="right">
                            <ul class="list-content list-content--exposition">
                                @if (old('risk_psycho_exposition_groups'))
                                    @foreach (old('risk_psycho_exposition_groups') as $key => $item)
                                        <li class="list-item">
                                            <button type="button" class="btn btn-text btn-small btn-delete"><i class="far fa-times-circle"></i></button>
                                            <input type="text" class="form-control" name="risk_psycho_exposition_groups[]" placeholder="Nom du groupe d'expositions homogènes" value="{{ $item }}">
                                        </li>
                                    @endforeach
                                @else
                                    @if (count($sd->psychosocial_groups) > 0)
                                        @foreach ($sd->psychosocial_groups as $key => $item)
                                            <li class="list-item">
                                                <button type="button" class="btn btn-text btn-small btn-delete"><i class="far fa-times-circle"></i></button>
                                                <input type="text" class="form-control" name="risk_psycho_exposition_groups[{{ $item->id }}]" placeholder="Nom du groupe d'expositions homogènes" value="{{ $item->name }}">
                                            </li>
                                        @endforeach
                                    @else
                                        <li class="list-item">
                                            <button type="button" class="btn btn-text btn-small btn-delete"><i class="far fa-times-circle"></i></button>
                                            <input type="text" class="form-control" name="risk_psycho_exposition_groups[]" placeholder="Nom du groupe d'expositions homogènes" value="">
                                        </li>
                                    @endif
                                @endif
                            </ul>
                            <button type="button" class="btn btn-text btn-yellow btn-add-exposition"><i class="fas fa-plus"></i> Ajouter</button>
                            @error('risk_psycho_exposition_groups')
                                <p class="message-error">{{ $message }}</p>
                            @enderror
                            @error('risk_psycho_exposition_groups.*')
                                <p class="message-error">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="line">
                        <div class="left"></div>
                        <div class="right">
                            <button class="btn btn-yellow btn-inv">Mettre à jour le DU</button>
                        </div>
                    </div>
                </div>
                @if (Auth::user()->hasPermission('ADMIN'))
                    <div class="row">
                        <div class="line">
                            <div class="left"></div>
                            <div class="right">
                                <button type="button" class="btn btn-danger" data-modal=".modal--delete">Supprimer le document unique</button>
                            </div>
                        </div>
                    </div>
                @endif
            </form>
            @if ($import === true)
                <hr>
                <form class="card-body" action="{{ route('admin.single_document.import', [$sd->client->id, $sd->id]) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="line">
                            <div class="left">
                                <label for="import">Fichier excel</label>
                            </div>
                            <div class="right">
                                <label for="excel" class="form-control form-control--file @error('excel') invalid @enderror">
                                    <span>Choisir un fichier excel</span>
                                    <span>
                                        Parcourir
                                        <input type="file" name="excel" id="excel" class="inputLogo" placeholder="Choisir un fichier excel">
                                    </span>
                                </label>
                                @error('excel')
                                    <p class="message-error">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="line">
                            <div class="left"></div>
                            <div class="right">
                                <button type="submit" class="btn btn-success">Importer</button>
                            </div>
                        </div>
                    </div>
                </form>
            @endif
        </div>

        @if (Auth::user()->hasPermission('ADMIN'))
            <div class="modal modal--delete">
                <div class="modal-dialog">
                    <form class="modal-content" action="{{ route('admin.single_document.delete', [$sd->client->id, $sd->id]) }}" method="POST">
                        @csrf
                        <div class="modal-header">
                            <p class="title">Confirmer la suppression</p>
                            <button type="button" class="btn-close" data-dismiss="modal"><i class="fas fa-times"></i></button>
                        </div>
                        <div class="modal-body">
                            <p>Êtes-vous sûr.e du vouloir supprimer ce document unique ?</p>
                            <div>
                                <button type="submit" class="btn btn-yellow">Supprimer</button>
                                <button type="button" class="btn btn-inv btn-yellow btn-small" data-dismiss="modal"> Annuler</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        @endif


{{--            <div>--}}
{{--                <h1>CECI EST UNE PARTIE DÉVELOPPEMENT UNIQUEMENT VISIBLE PAR LES MEMBRES OZA ET LES DÉVELOPPEURS, CETTE PARTIE EST TEMPORAIRE.</h1>--}}
{{--                <p> Nombre de risque : {{ count($sd->temp()) }}</p>--}}
{{--                <p> Danger | Nom du risque | RB | RR | Work Unit </p>--}}
{{--                @foreach($sd->temp() as $sd_risk)--}}
{{--                    <p>--}}
{{--                        {{ $sd_risk->sd_danger->danger->name }} | {{ $sd_risk->name }} | {{ $sd_risk->total() }} | {{ isset($sd_risk->sd_restraints_exist[0]) ? $sd_risk->totalRR($sd_risk->sd_restraints_exist) : $sd_risk->total() }} | {{ $sd_risk->sd_work_unit ? $sd_risk->sd_work_unit->name : "Tous" }}--}}
{{--                    </p>--}}
{{--                @endforeach--}}
{{--                <h3>NOM DU RISQUE</h3>--}}
{{--                @foreach($sd->temp() as $sd_risk)--}}
{{--                    <p>--}}
{{--                        {{ $sd_risk->name }}--}}
{{--                    </p>--}}
{{--                @endforeach--}}
{{--            </div>--}}


    </div>
@endsection

@section('script')
    <script src="/js/app/client.js"></script>
@endsection
