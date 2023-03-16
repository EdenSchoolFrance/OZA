@extends('app')

@section('content')

    <div class="content">
        <form action="{{ route('risk.explosion.store', [$single_document->id]) }}"
              class="card card--add-risk card--risk-chemical" method="post">
            @csrf
            <div class="card-body">
                <div class="row">
                    <div class="line">
                        <div class="left">
                            <h3>Zonage</h3>
                        </div>
                        <div class="right"></div>
                    </div>
                </div>
                <div class="row">
                    <div class="line">
                        <div class="left">
                            <label for="materialExplosion">Matière explosive</label>
                        </div>
                        <div class="right">
                            <input type="text" name="material_explosion" id="materialExplosion" class="form-control" placeholder="Matière explosive" value="{{ old('material_explosion') }}">
                        </div>
                    </div>
                    @error('material_explosion')
                        <div class="line">
                            <div class="left"></div>
                            <div class="right">
                                <p class="message-error">{{ $message }}</p>
                            </div>
                        </div>
                    @enderror

                    <div class="line">
                        <div class="left">
                            <label for="features">Caractèristique phases H</label>
                        </div>
                        <div class="right">
                            <input type="text" name="features" id="features" list="featuresList" class="form-control" placeholder="Caractèristique phases H" value="{{ old('features') }}">
                            <datalist id="featuresList">
                                <option value="Poussière explosible">
                                <option value="H200 Explosif instable.">
                                <option value="H201 Explosif ; danger d’explosion en masse">
                                <option value="H202 Explosif ; danger sérieux de projection">
                                <option value="H203 Explosif, danger d’incendie, d’effet de souffle ou de projection.">
                                <option value="H204 Danger d’incendie ou de projection.">
                                <option value="H205 Danger d’explosion en masse en cas d’incendie.">
                                <option value="H220 Gaz extrêmement inflammable.">
                                <option value="H221 Gaz inflammable.">
                                <option value="H222 Aérosol extrêmement inflammable.">
                                <option value="H223 Aérosol inflammable.">
                                <option value="H224 Liquide et vapeurs extrêmement inflammables.">
                                <option value="H225 Liquide et vapeurs très inflammables.">
                                <option value="H226 Liquide et vapeurs inflammables.">
                                <option value="H227 liquide combustible">
                                <option value="H228 Matière solide inflammable.">
                                <option value="H229 Récipient sous pression: peut éclater sous l'effet de la chaleur.">
                                <option value="H230 Peut exploser même an l'absence d'air.">
                                <option value="H231 Peut exploser même an l'absence d'air à une pression et/ou température élevée(s).">
                                <option value="H240 Peut exploser sous l'effet de la chaleur.">
                                <option value="H241 Peut s'enflammer ou exploser sous l'effet de la chaleur.">
                                <option value="H242 Peut s'enflammer sous l'effet de la chaleur.">
                                <option value="H250 S’enflamme spontanément au contact de l’air.">
                                <option value="H251 Matière auto-échauffante; peut s’enflammer.">
                                <option value="H252 Matière auto-échauffante en grandes quantités; peut s’enflammer.">
                                <option value="H260 Dégage au contact de l’eau des gaz inflammables qui peuvent s’enflammer spontanément.">
                                <option value="H261 Dégage au contact de l’eau des gaz inflammables.">
                                <option value="H270 Peut provoquer ou aggraver un incendie; comburant.">
                                <option value="H271 Peut provoquer un incendie ou une explosion; comburant puissant.">
                                <option value="H272 Peut aggraver un incendie; comburant.">
                                <option value="H280 Contient un gaz sous pression; peut exploser sous l’effet de la chaleur.">
                                <option value="H281 Contient un gaz réfrigéré; peut causer des brûlures ou blessures cryogéniques.">
                                <option value="H290 Peut être corrosif pour les métaux.">
                                <option value="EUH001 Explosif à l'état sec">
                                <option value="EUH006 Danger d'explosion en contact ou sans contact avec l'air">
                                <option value="EUH014 Réagit violemment au contact de l'eau">
                                <option value="EUH018 Lors de l'utilisation, formation possible de mélange vapeur-air inflammable/explosif">
                                <option value="EUH019 Peut former des peroxydes explosifs">
                                <option value="EUH029 Au contact de l'eau, dégage des gaz toxiques">
                                <option value="EUH031 Au contact d'un acide, dégage un gaz toxique">
                                <option value="EUH032 Au contact d'un acide, dégage un gaz très toxique">
                                <option value="EUH044 Risque d'explosion si chauffé en ambiance confinée">
                                <option value="EUH209 Peut devenir facilement inflammable en cours d'utilisation">
                                <option value="EUH209A Peut devenir inflammable en cours d'utilisation">
                            </datalist>
                        </div>
                    </div>
                    @error('features')
                        <div class="line">
                            <div class="left"></div>
                            <div class="right">
                                <p class="message-error">{{ $message }}</p>
                            </div>
                        </div>
                    @enderror

                    <div class="line">
                        <div class="left">
                            <label for="materialSetup">Matériel Installation</label>
                        </div>
                        <div class="right">
                            <input type="text" name="material_setup" id="materialSetup" class="form-control" placeholder="Matériel Installation" value="{{ old('material_setup') }}">
                        </div>
                    </div>
                    @error('material_setup')
                        <div class="line">
                            <div class="left"></div>
                            <div class="right">
                                <p class="message-error">{{ $message }}</p>
                            </div>
                        </div>
                    @enderror

                    <div class="line">
                        <div class="left">
                            <label for="sourceClean">Source de dégagement</label>
                        </div>
                        <div class="right">
                            <input type="text" name="source_clean" id="sourceClean" class="form-control" placeholder="Source de dégagement" value="{{ old('source_clean') }}">
                        </div>
                    </div>
                    @error('source_clean')
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
                            <label for="degreeClean">Degré de dégagement</label>
                        </div>
                        <div class="right">
                            <input type="text" name="degree_clean" id="degreeClean" list="degreeCleanList" class="form-control" placeholder="Degré de dégagement" value="{{ old('degree_clean') }}">
                            <datalist id="degreeCleanList">
                                <option value="Continu">
                                <option value="Premier degré">
                                <option value="Deuxième degré">
                                <option value="Non applicable">
                            </datalist>
                        </div>
                    </div>
                    @error('degree_clean')
                    <div class="line">
                        <div class="left"></div>
                        <div class="right">
                            <p class="message-error">{{ $message }}</p>
                        </div>
                    </div>
                    @enderror

                    <div class="line">
                        <div class="left">
                            <label for="degreeVentilation">Degré de ventilation</label>
                        </div>
                        <div class="right">
                            <input type="text" name="degree_ventilation" id="degreeVentilation" list="degreeVentilationList" class="form-control" placeholder="Degré de ventilation" value="{{ old('degree_ventilation') }}">
                            <datalist id="degreeCleanList">
                                <option value="Fort">
                                <option value="Moyen">
                                <option value="Faible">
                                <option value="Pas de ventilation">
                                <option value="Non applicable">
                            </datalist>
                        </div>
                    </div>
                    @error('degree_ventilation')
                        <div class="line">
                            <div class="left"></div>
                            <div class="right">
                                <p class="message-error">{{ $message }}</p>
                            </div>
                        </div>
                    @enderror

                    <div class="line">
                        <div class="left">
                            <label for="availabilityVentilation">Disponibilité de la ventilation</label>
                        </div>
                        <div class="right">
                            <input type="text" name="availability_ventilation" id="availabilityVentilation" list="availabilityVentilationList" class="form-control" placeholder="Disponibilité de la ventilation" value="{{ old('availability_ventilation') }}">
                            <datalist id="availabilityVentilationList">
                                <option value="Bonne">
                                <option value="Assez bonne">
                                <option value="Faible">
                                <option value="Pas de ventilation">
                                <option value="Non applicable">
                            </datalist>
                        </div>
                    </div>
                    @error('availability_ventilation')
                        <div class="line">
                            <div class="left"></div>
                            <div class="right">
                                <p class="message-error">{{ $message }}</p>
                            </div>
                        </div>
                    @enderror

                    <div class="line">
                        <div class="left">
                            <label for="sizeArea">Volume de la zone</label>
                        </div>
                        <div class="right">
                            <input type="text" name="size_area" id="sizeArea" list="sizeAreaList" class="form-control" placeholder="Volume de la zone" value="{{ old('size_area') }}">
                            <datalist id="sizeAreaList">
                                <option value="Tout le local">
                                <option value="Intérieur de la cuve">
                                <option value="Sphère de 50 cm autour de l'évent">
                                <option value="Sphère de 50 cm autour de la fuite ou de la flaque">
                                <option value="Néant">
                                <option value="Pas de zone : faible quantité">
                                <option value="Zone de 0,5 m autour des batteries et de l'emplacement de charge">
                                <option value="Rayon de 3 mètres autour du poste">
                                <option value="Cylindre de rayon 3m, sur 2 m de hauteur à partir des orifices de remplissage">
                                <option value="Cylindre de 3 m de rayon sur 3 m de hauteur à partir des soupapes">
                                <option value="Hors zone ATEX sous réserve de l'entretien et des contrôles périodiques du réseau gaz et de la chaudière.">
                            </datalist>
                        </div>
                    </div>
                    @error('size_area')
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
                            <h3>Type de zone</h3>
                        </div>
                        <div class="right"></div>
                    </div>

                    <div class="line">
                        <div class="left">
                            <label for="gas">Gaz</label>
                        </div>
                        <div class="right">
                            <input type="text" name="gas" id="gas" list="gasList" class="form-control" placeholder="Gaz" value="{{ old('gas') }}">
                            <datalist id="gasList">
                                <option value="END">
                                <option value="0">
                                <option value="1">
                                <option value="2">
                                <option value="NC">
                            </datalist>
                        </div>
                    </div>
                    @error('gas')
                        <div class="line">
                            <div class="left"></div>
                            <div class="right">
                                <p class="message-error">{{ $message }}</p>
                            </div>
                        </div>
                    @enderror

                    <div class="line">
                        <div class="left">
                            <label for="dust">Poussière</label>
                        </div>
                        <div class="right">
                            <input type="text" name="dust" id="dust" list="dustList" class="form-control" placeholder="Poussière" value="{{ old('dust') }}">
                            <datalist id="dustList">
                                <option value="END">
                                <option value="20">
                                <option value="21">
                                <option value="22">
                                <option value="NC">
                            </datalist>
                        </div>
                    </div>
                    @error('dust')
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
                            <h3>Ignition</h3>
                        </div>
                    </div>

                    <div class="line">
                        <div class="left">
                            <label for="spawnProbability">Probabilité d'apparition</label>
                        </div>
                        <div class="right">
                            <input type="text" name="spawn_probability" id="spawnProbability" list="spawnProbabilityList" class="form-control" placeholder="Probabilité d'apparition" value="{{ old('spawn_probability') }}">
                            <datalist id="spawnProbabilityList">
                                <option value="4">
                                <option value="3">
                                <option value="2">
                                <option value="1">
                            </datalist>
                        </div>
                    </div>
                    @error('spawn_probability')
                        <div class="line">
                            <div class="left"></div>
                            <div class="right">
                                <p class="message-error">{{ $message }}</p>
                            </div>
                        </div>
                    @enderror

                    <div class="line">
                        <div class="left">
                            <label for="preventionProbability">Probabilité avec prévention</label>
                        </div>
                        <div class="right">
                            <input type="text" name="prevention_probability" id="preventionProbability" list="preventionProbabilityList" class="form-control" placeholder="Probabilité avec prévention" value="{{ old('prevention_probability') }}">
                            <datalist id="preventionProbabilityList">
                                <option value="4">
                                <option value="3">
                                <option value="2">
                                <option value="1">
                            </datalist>
                        </div>
                    </div>
                    @error('prevention_probability')
                    <div class="line">
                        <div class="left"></div>
                        <div class="right">
                            <p class="message-error">{{ $message }}</p>
                        </div>
                    </div>
                    @enderror

                    <div class="line">
                        <div class="left">
                            <label for="">Moyens de prévention existants</label>
                        </div>
                        <div class="right"></div>
                    </div>
                </div>
                <div class="list-items">
                    <div class="row">
                        <div class="right">
                            <a class="btn-modal-check">Tout cocher</a>
                            <a class="btn-modal-uncheck">Tout décocher</a>
                            <div id="modal-list">
                                <div class="content-list" data-id="" style="">

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div>
                            <p>Ajouter de nouveaux EPI</p>
                            <div class="right right--inline modal-input">
                                <label for="name">Intitulé</label>
                                <div>
                                    <input type="text" id="modal-input" name="name" class="form-control" placeholder="EPI 1, EPI 2, ">
                                    <p class="info-input">Il est possible d’ajouter plusieurs matériels en les séparant
                                        par une virgule</p>
                                </div>
                                <button class="btn btn-text btn-yellow btn-modal-add" type="button">Ajouter</button>
                            </div>
                        </div>
                    </div>
                </div>

                <hr>

                <div class="row">
                    <div class="line">
                        <div class="left">
                            <label for="criticity">Criticité</label>
                        </div>
                        <div class="right">
                            <select name="criticity" id="criticity" class="form-control">
                                <option value="Acceptable" {{ old('criticity') === "Acceptable" ? 'selected' : '' }}>Acceptable</option>
                                <option value="A améliorer" {{ old('criticity') === "A améliorer" ? 'selected' : '' }}>A améliorer</option>
                                <option value="Agir vite" {{ old('criticity') === "Agir vite" ? 'selected' : '' }}>Agir vite</option>
                                <option value="Inacceptable" {{ old('criticity') === "Inacceptable" ? 'selected' : '' }}>Inacceptable</option>
                            </select>
                        </div>
                    </div>
                    @error('criticity')
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
                            <label for="">Mesures de prévention et de protection proposées</label>
                        </div>
                    </div>
                    <div class="line">
                        <div class="left">
                            <label for="">Mesures proposées</label>
                        </div>
                        <div class="right" style="display: block;">
                            <ul class="restraint-proposed">

                                @foreach($restraints_explosion as $restraint)
                                    <li class="res-pro">
                                        <input type="checkbox" class="btn-check" data-tab="none">
                                        <textarea class="form-control auto-resize" placeholder=""
                                                  name="restraint_proposed[not-checked][]">{{ $restraint->name }}</textarea>
                                    </li>
                                @endforeach

                                {{--
                                <li class="res-pro">
                                    <input type="checkbox" class="btn-check" data-id="{{ $response->id }}" {{$restraint->checked === 1 ? 'checked' : ''}} data-tab="{{ $restraint->id }}">
                                    <textarea class="form-control auto-resize" placeholder="" name="restraint_proposed_{{ $response->id }}[{{$restraint->checked === 1 ? 'checked' : 'not-checked'}}][{{ $restraint->id }}][]">{{ $restraint->text }}</textarea>
                                    <button type="button" class="btn btn-text btn-small btn-delete-restraint"><i class="far fa-times-circle"></i></button>
                                </li>
                                --}}
                                @error('restraint_proposed')
                                <li>
                                    <p class="message-error">{{ $message }}</p>
                                </li>
                                @enderror
                            </ul>
                            <button class="btn btn-yellow btn-text btn-add-restraint" data-id="" type="button">+ Ajouter
                                une mesure proposée
                            </button>
                        </div>
                    </div>
                </div>

                <hr>

                <div class="row row--submit">
                    <button class="btn btn-success">Valider le risque</button>
                </div>
            </div>
        </form>

    </div>
@endsection

@section('script')
    <script src="/js/app/risk_explosion.js"></script>
@endsection
