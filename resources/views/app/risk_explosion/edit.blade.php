@extends('app')

@section('content')

    <div class="content">
        <form action="{{ route('risk.explosion.update', [$single_document->id, $sd_risk->id]) }}"
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
                            <input type="text" name="material_explosion" id="materialExplosion" class="form-control" placeholder="Matière explosive" value="{{ old('material_explosion') ? old('material_explosion') : $sd_risk->material_explosion }}">
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
                            <input type="text" name="features" id="features" list="featuresList" class="form-control" placeholder="Caractèristique phases H" value="{{ old('features') ? old('features') : $sd_risk->features }}">
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
                            <input type="text" name="material_setup" id="materialSetup" class="form-control" placeholder="Matériel Installation" value="{{ old('material_setup') ? old('material_setup') : $sd_risk->material_setup }}">
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
                            <input type="text" name="source_clean" id="sourceClean" class="form-control" placeholder="Source de dégagement" value="{{ old('source_clean') ? old('source_clean') : $sd_risk->source_clean }}">
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
                            <select name="degree_clean" id="gas" class="form-control">
                                @if(old('degree_clean'))
                                    <option value="Continu" {{ old('degree_clean') === "Continu" ? 'selected' : '' }}>Continu</option>
                                    <option value="Premier degré" {{ old('degree_clean') === "Premier degré" ? 'selected' : '' }}>Premier degré</option>
                                    <option value="Deuxième degré" {{ old('degree_clean') === "Deuxième degré" ? 'selected' : '' }}>Deuxième degré</option>
                                    <option value="Non applicable" {{ old('degree_clean') === "Non applicable" ? 'selected' : '' }}>Non applicable</option>
                                @else
                                    <option value="Continu" @if($sd_risk->degree_clean === "Continu") selected @endif>Continu</option>
                                    <option value="Premier degré" @if($sd_risk->degree_clean === "Premier degré") selected @endif>Premier degré</option>
                                    <option value="Deuxième degré" @if($sd_risk->degree_clean === "Deuxième degré") selected @endif>Deuxième degré</option>
                                    <option value="Non applicable" @if($sd_risk->degree_clean === "Non applicable") selected @endif>Non applicable</option>
                                @endif
                            </select>
                            <i class="far fa-question-circle" data-tooltip=".tooltip--dc" data-placement="left"></i>
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
                            <select name="degree_ventilation" id="degreeVentilation" class="form-control">
                                @if(old('degree_ventilation'))
                                    <option value="Fort" {{ old('degree_ventilation') === "Fort" ? 'selected' : '' }}>Fort</option>
                                    <option value="Moyen" {{ old('degree_ventilation') === "Moyen" ? 'selected' : '' }}>Moyen</option>
                                    <option value="Faible" {{ old('degree_ventilation') === "Faible" ? 'selected' : '' }}>Faible</option>
                                    <option value="Pas de ventilation" {{ old('degree_ventilation') === "Pas de ventilation" ? 'selected' : '' }}>Pas de ventilation</option>
                                    <option value="Non applicable" {{ old('degree_ventilation') === "Non applicable" ? 'selected' : '' }}>Non applicable</option>
                                @else
                                    <option value="Fort" @if($sd_risk->degree_ventilation === "Fort") selected @endif>Fort</option>
                                    <option value="Moyen" @if($sd_risk->degree_ventilation === "Moyen") selected @endif>Moyen</option>
                                    <option value="Faible" @if($sd_risk->degree_ventilation === "Faible") selected @endif>Faible</option>
                                    <option value="Pas de ventilation" @if($sd_risk->degree_ventilation === "Pas de ventilation") selected @endif>Pas de ventilation</option>
                                    <option value="Non applicable" @if($sd_risk->degree_ventilation === "Non applicable") selected @endif>Non applicable</option>
                                @endif
                            </select>
                            <i class="far fa-question-circle" data-tooltip=".tooltip--dv" data-placement="left"></i>
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
                            <select name="availability_ventilation" id="availabilityVentilation" class="form-control">
                                @if(old('availability_ventilation'))
                                    <option value="Bonne" {{ old('availability_ventilation') === "Bonne" ? 'selected' : '' }}>Bonne</option>
                                    <option value="Assez bonne" {{ old('availability_ventilation') === "Assez bonne" ? 'selected' : '' }}>Assez bonne</option>
                                    <option value="Faible" {{ old('availability_ventilation') === "Faible" ? 'selected' : '' }}>Faible</option>
                                    <option value="Pas de ventilation" {{ old('availability_ventilation') === "Pas de ventilation" ? 'selected' : '' }}>Pas de ventilation</option>
                                    <option value="Non applicable" {{ old('availability_ventilation') === "Non applicable" ? 'selected' : '' }}>Non applicable</option>
                                @else
                                    <option value="Bonne" @if($sd_risk->availability_ventilation === "Bonne") selected @endif>Bonne</option>
                                    <option value="Assez bonne" @if($sd_risk->availability_ventilation === "Assez bonne") selected @endif>Assez bonne</option>
                                    <option value="Faible" @if($sd_risk->availability_ventilation === "Faible") selected @endif>Faible</option>
                                    <option value="Pas de ventilation" @if($sd_risk->availability_ventilation === "Pas de ventilation") selected @endif>Pas de ventilation</option>
                                    <option value="Non applicable" @if($sd_risk->availability_ventilation === "Non applicable") selected @endif>Non applicable</option>
                                @endif
                            </select>
                            <i class="far fa-question-circle" data-tooltip=".tooltip--disv" data-placement="left"></i>
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
                            <input type="text" name="size_area" id="sizeArea" list="sizeAreaList" class="form-control" placeholder="Volume de la zone" value="{{ old('size_area') ? old('size_area') : $sd_risk->size_area }}">
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
                            <select name="gas" id="gas" class="form-control">
                                @if(old('gas'))
                                    <option value="END" {{ old('gas') === "END" ? 'selected' : '' }}>END</option>
                                    <option value="20" {{ old('gas') === "20" ? 'selected' : '' }}>20</option>
                                    <option value="21" {{ old('gas') === "21" ? 'selected' : '' }}>21</option>
                                    <option value="22" {{ old('gas') === "22" ? 'selected' : '' }}>22</option>
                                    <option value="NC" {{ old('gas') === "NC" ? 'selected' : '' }}>NC</option>
                                @else
                                    <option value="END" @if($sd_risk->gas === "END") selected @endif>END</option>
                                    <option value="20" @if($sd_risk->gas === "20") selected @endif>20</option>
                                    <option value="21" @if($sd_risk->gas === "21") selected @endif>21</option>
                                    <option value="22" @if($sd_risk->gas === "22") selected @endif>22</option>
                                    <option value="NC" @if($sd_risk->gas === "NC") selected @endif>NC</option>
                                @endif
                            </select>
                            <i class="far fa-question-circle" data-tooltip=".tooltip--gas" data-placement="left"></i>
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
                            <select name="dust" id="dust" class="form-control">
                                @if(old('dust'))
                                    <option value="END" {{ old('dust') === "END" ? 'selected' : '' }}>END</option>
                                    <option value="20" {{ old('dust') === "20" ? 'selected' : '' }}>20</option>
                                    <option value="21" {{ old('dust') === "21" ? 'selected' : '' }}>21</option>
                                    <option value="22" {{ old('dust') === "22" ? 'selected' : '' }}>22</option>
                                    <option value="NC" {{ old('dust') === "NC" ? 'selected' : '' }}>NC</option>
                                @else
                                    <option value="END" @if($sd_risk->dust === "END") selected @endif>END</option>
                                    <option value="20" @if($sd_risk->dust === "20") selected @endif>20</option>
                                    <option value="21" @if($sd_risk->dust === "21") selected @endif>21</option>
                                    <option value="22" @if($sd_risk->dust === "22") selected @endif>22</option>
                                    <option value="NC" @if($sd_risk->dust === "NC") selected @endif>NC</option>
                                @endif
                            </select>
                            <i class="far fa-question-circle" data-tooltip=".tooltip--dust" data-placement="left"></i>
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
                            <select name="spawn_probability" id="spawnProbability" class="form-control">
                                @if(old('spawn_probability'))
                                    <option value="4" {{ old('spawn_probability') === "4" ? 'selected' : '' }}>4</option>
                                    <option value="3" {{ old('spawn_probability') === "3" ? 'selected' : '' }}>3</option>
                                    <option value="2" {{ old('spawn_probability') === "2" ? 'selected' : '' }}>2</option>
                                    <option value="1" {{ old('spawn_probability') === "1" ? 'selected' : '' }}>1</option>
                                @else
                                    <option value="4" @if($sd_risk->spawn_probability === "4") selected @endif>4</option>
                                    <option value="3" @if($sd_risk->spawn_probability === "3") selected @endif>3</option>
                                    <option value="2" @if($sd_risk->spawn_probability === "2") selected @endif>2</option>
                                    <option value="1" @if($sd_risk->spawn_probability === "1") selected @endif>1</option>
                                @endif
                            </select>
                            <i class="far fa-question-circle" data-tooltip=".tooltip--pa" data-placement="left"></i>
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
                            <select name="prevention_probability" id="preventionProbability" class="form-control">
                                @if(old('prevention_probability'))
                                    <option value="4" {{ old('prevention_probability') === "4" ? 'selected' : '' }}>4</option>
                                    <option value="3" {{ old('prevention_probability') === "3" ? 'selected' : '' }}>3</option>
                                    <option value="2" {{ old('prevention_probability') === "2" ? 'selected' : '' }}>2</option>
                                    <option value="1" {{ old('prevention_probability') === "1" ? 'selected' : '' }}>1</option>
                                @else
                                    <option value="4" @if($sd_risk->prevention_probability === "4") selected @endif>4</option>
                                    <option value="3" @if($sd_risk->prevention_probability === "3") selected @endif>3</option>
                                    <option value="2" @if($sd_risk->prevention_probability === "2") selected @endif>2</option>
                                    <option value="1" @if($sd_risk->prevention_probability === "1") selected @endif>1</option>
                                @endif
                            </select>
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
                </div>

                <div class="row">
                    <div class="line">
                        <div class="left">
                            <label for="">Moyens de prévention existants</label>
                        </div>
                    </div>
                    <div class="line">
                        <div class="left">
                            <label for="">Prévention existants</label>
                        </div>
                        <div class="right" style="display: block;">
                            <ul class="restraint-proposed">
                                @if(count($sd_risk->sd_preventions) > 0)
                                    @foreach($sd_risk->sd_preventions as $sd_prevention)
                                        <li class="res-pro">
                                            <input type="checkbox" class="btn-check-prevention-edit" data-id="{{ $sd_risk->id }}" checked data-tab="{{ $sd_prevention->id }}">
                                            <textarea class="form-control auto-resize" placeholder="" name="prevention_proposed_{{ $sd_risk->id }}[checked][{{ $sd_prevention->id }}][]">{{ $sd_prevention->name }}</textarea>
                                        </li>
                                    @endforeach
                                @else
                                    @foreach($preventions_explosion as $prevention)
                                        <li class="res-pro">
                                            <input type="checkbox" class="btn-check-prevention-edit" data-id="{{ $sd_risk->id }}" data-tab="new">
                                            <textarea class="form-control auto-resize" placeholder="" name="prevention_proposed_[{{ $sd_risk->id }}not-checked][new][]">{{ $prevention->name }}</textarea>
                                        </li>
                                    @endforeach
                                @endif

                                @error('preventions_explosion')
                                <li>
                                    <p class="message-error">{{ $message }}</p>
                                </li>
                                @enderror
                            </ul>
                            <button class="btn btn-yellow btn-text btn-add-prevention-edit" data-id="" type="button">+ Ajouter une prévention existants</button>
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
                                @if(old('criticity'))
                                    <option value="Acceptable" {{ old('criticity') === "Acceptable" ? 'selected' : '' }}>Acceptable</option>
                                    <option value="A améliorer" {{ old('criticity') === "A améliorer" ? 'selected' : '' }}>A améliorer</option>
                                    <option value="Agir vite" {{ old('criticity') === "Agir vite" ? 'selected' : '' }}>Agir vite</option>
                                    <option value="Inacceptable" {{ old('criticity') === "Inacceptable" ? 'selected' : '' }}>Inacceptable</option>
                                @else
                                    <option value="Acceptable" @if($sd_risk->criticity === "Acceptable") selected @endif>Acceptable</option>
                                    <option value="A améliorer" @if($sd_risk->criticity === "A améliorer") selected @endif>A améliorer</option>
                                    <option value="Agir vite" @if($sd_risk->criticity === "Agir vite") selected @endif>Agir vite</option>
                                    <option value="Inacceptable" @if($sd_risk->criticity === "Inacceptable") selected @endif>Inacceptable</option>
                                @endif
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

                <div class="row">
                    <div class="line">
                        <table class="table table--chemical">

                            <thead>
                            <tr>
                                <th></th>
                                <th>END</th>
                                <th>2</th>
                                <th>22</th>
                                <th>1</th>
                                <th>21</th>
                                <th>0</th>
                                <th>20</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>4</td>
                                <td><button class="btn btn-success btn-hidden" type="button">Acceptable</button></td>
                                <td><button class="btn btn-yellow btn-hidden" type="button">A améliorer</button></td>
                                <td><button class="btn btn-yellow btn-hidden" type="button">A améliorer</button></td>
                                <td><button class="btn btn-warn btn-hidden" type="button">Agir vite</button></td>
                                <td><button class="btn btn-warn btn-hidden" type="button">Agir vite</button></td>
                                <td><button class="btn btn-danger btn-hidden" type="button">STOP</button></td>
                                <td><button class="btn btn-danger btn-hidden" type="button">STOP</button></td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td><button class="btn btn-success btn-hidden" type="button">Acceptable</button></td>
                                <td><button class="btn btn-success btn-hidden" type="button">Acceptable</button></td>
                                <td><button class="btn btn-success btn-hidden" type="button">Acceptable</button></td>
                                <td><button class="btn btn-yellow btn-hidden" type="button">A améliorer</button></td>
                                <td><button class="btn btn-yellow btn-hidden" type="button">A améliorer</button></td>
                                <td><button class="btn btn-warn btn-hidden" type="button">Agir vite</button></td>
                                <td><button class="btn btn-warn btn-hidden" type="button">Agir vite</button></td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td><button class="btn btn-success btn-hidden" type="button">Acceptable</button></td>
                                <td><button class="btn btn-success btn-hidden" type="button">Acceptable</button></td>
                                <td><button class="btn btn-success btn-hidden" type="button">Acceptable</button></td>
                                <td><button class="btn btn-success btn-hidden" type="button">Acceptable</button></td>
                                <td><button class="btn btn-success btn-hidden" type="button">Acceptable</button></td>
                                <td><button class="btn btn-yellow btn-hidden" type="button">A améliorer</button></td>
                                <td><button class="btn btn-yellow btn-hidden" type="button">A améliorer</button></td>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td><button class="btn btn-success btn-hidden" type="button">Acceptable</button></td>
                                <td><button class="btn btn-success btn-hidden" type="button">Acceptable</button></td>
                                <td><button class="btn btn-success btn-hidden" type="button">Acceptable</button></td>
                                <td><button class="btn btn-success btn-hidden" type="button">Acceptable</button></td>
                                <td><button class="btn btn-success btn-hidden" type="button">Acceptable</button></td>
                                <td><button class="btn btn-success btn-hidden" type="button">Acceptable</button></td>
                                <td><button class="btn btn-success btn-hidden" type="button">Acceptable</button></td>
                            </tr>
                            </tbody>

                        </table>
                    </div>
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
                                @if(count($sd_risk->sd_restraints_exist) > 0)
                                    @foreach($sd_risk->sd_restraints_exist as $sd_restraint)
                                        <li class="res-pro">
                                            <input type="checkbox" class="btn-check-edit" data-id="{{ $sd_risk->id }}" checked data-tab="{{ $sd_restraint->id }}">
                                            <textarea class="form-control auto-resize" placeholder="" name="restraint_proposed_{{ $sd_risk->id }}[checked][{{ $sd_restraint->id }}][]">{{ $sd_restraint->name }}</textarea>
                                        </li>
                                    @endforeach
                                @else
                                    @foreach($restraints_explosion as $restraint)
                                        <li class="res-pro">
                                            <input type="checkbox" class="btn-check-edit" data-id="{{ $sd_risk->id }}" data-tab="new">
                                            <textarea class="form-control auto-resize" placeholder="" name="restraint_proposed_{{ $sd_risk->id }}[not-checked][new][]">{{ $restraint->name }}</textarea>
                                        </li>
                                    @endforeach
                                @endif

                                @error('restraint_proposed')
                                <li>
                                    <p class="message-error">{{ $message }}</p>
                                </li>
                                @enderror
                            </ul>
                            <button class="btn btn-yellow btn-text btn-add-restraint-edit" data-id="{{ $sd_risk->id }}" type="button">+ Ajouter
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

        <div class="tooltip tooltip--dc">
            <p>Continu : normal : > 1000 h par an.</p>
            <p>Premier degré : périodique ou occasionnel : 10 à 1000 h par an.</p>
            <p>Deuxième degré : accidentel : < 10 h par an.</p>
        </div>

        <div class="tooltip tooltip--dv">
            <p>- Ventilation forte : réduit la concentration de façon pratiquement instantanée sous la limite inférieure d’explosivité = zone d’étendue négligeable.</p>
            <p>- Ventilation moyenne : maîtrise la concentration = situation stable dans la limite de la zone pendant que le dégagement est en cours, et dans laquelle l’atmosphère explosible ne persiste pas de façon indue après la fin du dégagement.</p>
            <p>- Ventilation faible : ne peut maîtriser la concentration pendant que le dégagement est en cours et/ou ne peut empêcher que l’atmosphère explosible persiste de façon indue après la fin du dégagement.</p>
        </div>

        <div class="tooltip tooltip--disv">
            <p>- Bonne : la ventilation existe pratiquement en permanence comme à l'extérieur.</p>
            <p>- Assez bonne : on s’attend à ce que la ventilation existe pendant le fonctionnement normal. Des interruptions sont permises, pourvu qu’elles se produisent de façon peu fréquente et pour de courtes périodes.</p>
            <p>- Faible : la ventilation ne satisfait pas aux critères d’une ventilation bonne ou assez bonne, toutefois, on ne prévoit pas qu’il y ait des interruptions prolongées.</p>
        </div>

        <div class="tooltip tooltip--gas">
            <p>END : Emplacement Non Dangereux trop faible quantité.</p>
            <p>0 gaz - 20 poussières : permanent.</p>
            <p>1 gaz - 21 poussières : occasionnel en fonctionnement normal.</p>
            <p>2 gaz - 22 poussières : accidentel.</p>
            <p>NC : Non Concerné.</p>
        </div>

        <div class="tooltip tooltip--dust">
            <p>END : Emplacement Non Dangereux trop faible quantité.</p>
            <p>0 gaz - 20 poussières : permanent.</p>
            <p>1 gaz - 21 poussières : occasionnel en fonctionnement normal.</p>
            <p>2 gaz - 22 poussières : accidentel.</p>
            <p>NC : Non Concerné.</p>
        </div>

        <div class="tooltip tooltip--pa">
            <p>Probabilité 4 : source présente constamment ou fréquemment, Ex : four.</p>
            <p>Probabilité 3 : pas présente constamment ou fréquemment, Ex : électricité statique, point chaud lié à un véhicule, choc métal/métal.</p>
            <p>Probabilité 2 : présente dans des circonstances rares, Ex : foudre.</p>
            <p>Probabilité 1 : présente dans des circonstances très rares, Ex : défaillance sur un équipement.</p>
        </div>

    </div>
@endsection

@section('script')
    <script src="/js/app/risk_explosion.js"></script>
@endsection
