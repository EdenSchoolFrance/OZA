@extends('app')

@section('content')


    <div class="content">
        <form action="{{ route('risk.chemical.update', [$single_document->id, $sd_risk->id]) }}" class="card card--add-risk card--risk-chemical" method="post">
            @csrf
            <div class="card-body">

                {{-- CLIENT SECTION --}}

                <div class="row">
                    <h3 class="section-client">Section à remplir par le client</h3>
                    <div class="line">
                        <div class="left">
                            <label for="workUnit">Unité de travail</label>
                        </div>
                        <div class="right">
                            <select name="work_unit" id="workUnit" class="form-control">
                                @if(old("work_unit"))
                                    @foreach($works_units as $work)
                                        <option value="{{ $work->id }}" {{ old('work_unit') == $work->id ? 'selected' : '' }}>{{ $work->name }}</option>
                                    @endforeach
                                @else
                                    @foreach($works_units as $work)
                                        @if($work->id === $sd_risk->sd_work_unit->id)
                                            <option value="{{ $work->id }}" selected>{{ $work->name }}</option>
                                        @else
                                            <option value="{{ $work->id }}">{{ $work->name }}</option>
                                        @endif
                                    @endforeach
                                @endif
                            </select>
                        </div>
                    </div>
                    @error('work_unit')
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
                            <label for="nameRisk">Produit concerné</label>
                        </div>
                        <div class="right">
                            <textarea type="text" class="form-control" name="name_risk_chemical" id="nameRisk" placeholder="Nom commercial ou dénomination">@if(old('name_risk_chemical')) {{ old('name_risk_chemical')  }}@else{{ $sd_risk->name }}@endif</textarea>
                        </div>
                    </div>
                    @error('name_risk_chemical')
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
                            <label for="activity">Utilisation activité</label>
                        </div>
                        <div class="right">
                            <textarea type="text" class="form-control" name="activity" id="activity" placeholder="Utilisation du produit / Activité qui génère le produit">@if(old('activity')) {{ old('activity') }}@else{{ $sd_risk->activity }}@endif</textarea>
                        </div>
                    </div>
                    @error('activity')
                    <div class="line">
                        <div class="left"></div>
                        <div class="right">
                            <p class="message-error">{{ $message }}</p>
                        </div>
                    </div>
                    @enderror
                </div>

                <hr>

                {{-- OZA SECTION --}}

                <div class="row">
                    <h3 class="section-admin">Section à remplir par l'expert OZA</h3>
                    <div class="line">
                        <div class="left">
                            <h3>Catégories et phrases de Danger</h3>
                        </div>
                        <div class="right">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="cat-danger">
                        <div class="item">
                            <label for="n1">n1</label>
                            <select id="n1" class="form-control level" disabled>
                                <option data-value="0" value="NC">NC</option>
                                @foreach($danger_level as $item)
                                    @if($item->name === $sd_risk->n1)
                                        <option data-value="{{ $item->value }}" value="{{ $item->name}}" selected>{{ $item->name}}</option>
                                    @else
                                        <option data-value="{{ $item->value }}" value="{{ $item->name}}">{{ $item->name}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="item">
                            <label for="n2">n2</label>
                            <select id="n2" class="form-control level" disabled>
                                <option data-value="0" value="NC">NC</option>
                                @foreach($danger_level as $item)
                                    @if($item->name === $sd_risk->n2)
                                        <option data-value="{{ $item->value }}" value="{{ $item->name}}" selected>{{ $item->name}}</option>
                                    @else
                                        <option data-value="{{ $item->value }}" value="{{ $item->name}}">{{ $item->name}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="item">
                            <label for="n3">n3</label>
                            <select id="n3" class="form-control level" disabled>
                                <option data-value="0" value="NC">NC</option>
                                @foreach($danger_level as $item)
                                    @if($item->name === $sd_risk->n3)
                                        <option data-value="{{ $item->value }}" value="{{ $item->name}}" selected>{{ $item->name}}</option>
                                    @else
                                        <option data-value="{{ $item->value }}" value="{{ $item->name}}">{{ $item->name}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="item">
                            <label for="n4">n4</label>
                            <select id="n4" class="form-control level" disabled>
                                <option data-value="0" value="NC">NC</option>
                                @foreach($danger_level as $item)
                                    @if($item->name === $sd_risk->n4)
                                        <option data-value="{{ $item->value }}" value="{{ $item->name}}" selected>{{ $item->name}}</option>
                                    @else
                                        <option data-value="{{ $item->value }}" value="{{ $item->name}}">{{ $item->name}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="item">
                            <label for="n5">n5</label>
                            <select id="n5" class="form-control level" disabled>
                                <option data-value="0" value="NC">NC</option>
                                @foreach($danger_level as $item)
                                    @if($item->name === $sd_risk->n5)
                                        <option data-value="{{ $item->value }}" value="{{ $item->name}}" selected>{{ $item->name}}</option>
                                    @else
                                        <option data-value="{{ $item->value }}" value="{{ $item->name}}">{{ $item->name}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="item">
                            <label for="n6">n6</label>
                            <select id="n6" class="form-control level" disabled>
                                <option data-value="0" value="NC">NC</option>
                                @foreach($danger_level as $item)
                                    @if($item->name === $sd_risk->n6)
                                        <option data-value="{{ $item->value }}" value="{{ $item->name}}" selected>{{ $item->name}}</option>
                                    @else
                                        <option data-value="{{ $item->value }}" value="{{ $item->name}}">{{ $item->name}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="item">
                            <label for="n7">n7</label>
                            <select id="n7" class="form-control level" disabled>
                                <option data-value="0" value="NC">NC</option>
                                @foreach($danger_level as $item)
                                    @if($item->name === $sd_risk->n7)
                                        <option data-value="{{ $item->value }}" value="{{ $item->name}}" selected>{{ $item->name}}</option>
                                    @else
                                        <option data-value="{{ $item->value }}" value="{{ $item->name}}">{{ $item->name}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="item">
                            <label for="n8">n8</label>
                            <select id="n8" class="form-control level" disabled>
                                <option data-value="0" value="NC">NC</option>
                                @foreach($danger_level as $item)
                                    @if($item->name === $sd_risk->n8)
                                        <option data-value="{{ $item->value }}" value="{{ $item->name}}" selected>{{ $item->name}}</option>
                                    @else
                                        <option data-value="{{ $item->value }}" value="{{ $item->name}}">{{ $item->name}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="item">
                            <label for="n9">n9</label>
                            <select id="n9" class="form-control level" disabled>
                                <option data-value="0" value="NC">NC</option>
                                @foreach($danger_level as $item)
                                    @if($item->name === $sd_risk->n9)
                                        <option data-value="{{ $item->value }}" value="{{ $item->name}}" selected>{{ $item->name}}</option>
                                    @else
                                        <option data-value="{{ $item->value }}" value="{{ $item->name}}">{{ $item->name}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="item">
                            <label for="n10">n10</label>
                            <select id="n10" class="form-control level" disabled>
                                <option data-value="0" value="NC">NC</option>
                                @foreach($danger_level as $item)
                                    @if($item->name === $sd_risk->n10)
                                        <option data-value="{{ $item->value }}" value="{{ $item->name}}" selected>{{ $item->name}}</option>
                                    @else
                                        <option data-value="{{ $item->value }}" value="{{ $item->name}}">{{ $item->name}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="line nd">
                        <label for="nd">Niveau de Danger associé au produit (ND)</label>
                        <input type="text" id="nd" class="form-control" placeholder="valeur" value="{{ $sd_risk->ND()['value'] }}" disabled>
                        <input type="hidden" id="nd_hidden" value="{{ $sd_risk->ND()['value'] }}">
                    </div>
                </div>

                <hr>

                <div class="row">
                    <div class="line">
                        <div class="left">
                            <label for="date-fds">Date d'élaboration ou de révision de la FDS</label>
                        </div>
                        <div class="right">
                            <input type="date" name="date_fds" id="date-fds" class="form-control" value="{{ old('date_fds') ? old('date_fds') : $sd_risk->date }}" disabled>
                        </div>
                    </div>
                </div>

                <hr>

                {{-- CLIENT SECTION --}}

                <div class="row">
                    <h3 class="section-client">Section à remplir par le client</h3>
                    <div class="line">
                        <div class="left">
                            <label for="">Caractéristiques de l'exposition</label>
                        </div>
                        <div class="right"></div>
                    </div>
                    <div class="line">
                        <div class="left">
                            <label for="ventilation">Ventilation Confinement</label>
                        </div>
                        <div class="right">
                            <select name="ventilation" id="ventilation" class="form-control">
                                @if(old('ventilation'))
                                    <option value="0" {{ old('ventilation') === "0" ? 'selected' : '' }}>Sans ou dans un local</option>
                                    <option value="1" {{ old('ventilation') === "1" ? 'selected' : '' }}>Médiocre ou travail à l'extérieur</option>
                                    <option value="2" {{ old('ventilation') === "2" ? 'selected' : '' }}>Efficace</option>
                                    <option value="3" {{ old('ventilation') === "3" ? 'selected' : '' }}>Aspiration localisée</option>
                                    <option value="4" {{ old('ventilation') === "4" ? 'selected' : '' }}>Sorbonne de laboratoire</option>
                                @else
                                    <option value="0" @if($sd_risk->ventilation === "0") selected @endif>Sans ou dans un local</option>
                                    <option value="1" @if($sd_risk->ventilation === "1") selected @endif>Médiocre ou travail à l'extérieur</option>
                                    <option value="2" @if($sd_risk->ventilation === "2") selected @endif>Efficace</option>
                                    <option value="3" @if($sd_risk->ventilation === "3") selected @endif>Aspiration localisée</option>
                                    <option value="4" @if($sd_risk->ventilation === "4") selected @endif>Sorbonne de laboratoire</option>
                                @endif
                            </select>
                        </div>
                    </div>
                    @error('ventilation')
                    <div class="line">
                        <div class="left"></div>
                        <div class="right">
                            <p class="message-error">{{ $message }}</p>
                        </div>
                    </div>
                    @enderror
                    <div class="line">
                        <div class="left">
                            <label for="concentration">Concentration</label>
                        </div>
                        <div class="right">
                            <select name="concentration" id="concentration" class="form-control">
                                @if(old('concentration'))
                                    <option value="0" {{ old('concentration') === "0" ? 'selected' : '' }}>10 à pur</option>
                                    <option value="2" {{ old('concentration') === "2" ? 'selected' : '' }}>1 à 10%</option>
                                    <option value="4" {{ old('concentration') === "4" ? 'selected' : '' }}>< 1%</option>
                                @else
                                    <option value="0" @if($sd_risk->concentration === "0") selected @endif>10 à pur</option>
                                    <option value="2" @if($sd_risk->concentration === "2") selected @endif>1 à 10%</option>
                                    <option value="4" @if($sd_risk->concentration === "4") selected @endif>< 1%</option>
                                @endif
                            </select>
                        </div>
                    </div>
                    @error('concentration')
                    <div class="line">
                        <div class="left"></div>
                        <div class="right">
                            <p class="message-error">{{ $message }}</p>
                        </div>
                    </div>
                    @enderror
                    <div class="line">
                        <div class="left">
                            <label for="time">Durée utilisation jour</label>
                        </div>
                        <div class="right">
                            <select name="time" id="time" class="form-control">
                                @if(old('time'))
                                    <option value="0" {{ old('time') === "0" ? 'selected' : '' }}>45mn à 8h</option>
                                    <option value="2" {{ old('time') === "2" ? 'selected' : '' }}>5 à 45mn</option>
                                    <option value="4" {{ old('time') === "4" ? 'selected' : '' }}>< 5mn</option>
                                @else
                                    <option value="0" @if($sd_risk->time === "0") selected @endif>45mn à 8h</option>
                                    <option value="2" @if($sd_risk->time === "2") selected @endif>5 à 45mn</option>
                                    <option value="4" @if($sd_risk->time === "4") selected @endif>< 5mn</option>
                                @endif
                            </select>
                        </div>
                    </div>
                    @error('time')
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
                            <label for="">Equipements de protection individuelle</label>
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
                                    @if(count($sd_risk->sd_equipements) > 0)
                                        @foreach($sd_risk->sd_equipements as $item)
                                            <label class="contain">
                                                <input type="checkbox" value="{{ $item->name }}" data-name="{{ $item->name }}" name="list_items[]" checked>
                                                <span class="checkmark">{{ $item->name }}</span>
                                            </label>
                                        @endforeach
                                    @else
                                        <label class="contain">
                                            <input type="checkbox" value="Gant" data-name="Gant" name="list_items[]">
                                            <span class="checkmark">Gant</span>
                                        </label>
                                        <label class="contain">
                                            <input type="checkbox" value="Gant étanche au produit"
                                                   data-name="Gant étanche au produit" name="list_items[]">
                                            <span class="checkmark">Gant étanche au produit</span>
                                        </label>
                                        <label class="contain">
                                            <input type="checkbox" value="Lunette de sécurité"
                                                   data-name="Lunette de sécurité" name="list_items[]">
                                            <span class="checkmark">Lunette de sécurité</span>
                                        </label>
                                        <label class="contain">
                                            <input type="checkbox" value="Lunette de sécurité étanche"
                                                   data-name="Lunette de sécurité étanche" name="list_items[]">
                                            <span class="checkmark">Lunette de sécurité étanche</span>
                                        </label>
                                        <label class="contain">
                                            <input type="checkbox" value="Vêtement de travail"
                                                   data-name="Vêtement de travail" name="list_items[]">
                                            <span class="checkmark">Vêtement de travail</span>
                                        </label>
                                        <label class="contain">
                                            <input type="checkbox" value="Combinaison étanche au produit"
                                                   data-name="Combinaison étanche au produit" name="list_items[]">
                                            <span class="checkmark">Combinaison étanche au produit</span>
                                        </label>
                                        <label class="contain">
                                            <input type="checkbox" value="Masque anti-poussières FFP2"
                                                   data-name="Masque anti-poussières FFP2" name="list_items[]">
                                            <span class="checkmark">Masque anti-poussières FFP2</span>
                                        </label>
                                        <label class="contain">
                                            <input type="checkbox" value="Masque anti-poussières FFP3"
                                                   data-name="Masque anti-poussières FFP3" name="list_items[]">
                                            <span class="checkmark">Masque anti-poussières FFP3</span>
                                        </label>
                                        <label class="contain">
                                            <input type="checkbox" value="Masque à gaz et vapeur adapté au produit"
                                                   data-name="Masque à gaz et vapeur adapté au produit" name="list_items[]">
                                            <span class="checkmark">Masque à gaz et vapeur adapté au produit</span>
                                        </label>
                                        <label class="contain">
                                            <input type="checkbox" value="Masque ventilé adapté au produit"
                                                   data-name="Masque ventilé adapté au produit" name="list_items[]">
                                            <span class="checkmark">Masque ventilé adapté au produit</span>
                                        </label>
                                        <label class="contain">
                                            <input type="checkbox" value="Masque à adduction d’air"
                                                   data-name="Masque à adduction d’air" name="list_items[]">
                                            <span class="checkmark">Masque à adduction d’air</span>
                                        </label>
                                        <label class="contain">
                                            <input type="checkbox" value="ARI" data-name="ARI" name="list_items[]">
                                            <span class="checkmark">ARI</span>
                                        </label>
                                    @endif
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
                                    <p class="info-input">Il est possible d’ajouter plusieurs matériels en les séparant par une virgule</p>
                                </div>
                                <button class="btn btn-text btn-yellow btn-modal-add" type="button">Ajouter</button>
                            </div>
                        </div>
                    </div>
                </div>

                <hr>

                {{-- OZA SECTION --}}

                <div class="row">
                    <h3 class="section-admin">Section à remplir par l'expert OZA</h3>
                    <div class="line">
                        <div class="left">
                            <label for="protection">Protection</label>
                        </div>
                        <div class="right">
                            <select id="protection" class="form-control" disabled>
                                <option value="0" @if($sd_risk->protection === "0") selected @endif>Aucune</option>
                                <option value="1" @if($sd_risk->protection === "1") selected @endif>Une seule</option>
                                <option value="2" @if($sd_risk->protection === "2") selected @endif>Au moins une adaptée au risque principal</option>
                                <option value="4" @if($sd_risk->protection === "4") selected @endif>Toutes celles nécessaires</option>
                            </select>
                        </div>
                    </div>
                    <div class="line">
                        <div class="left">
                            <label for="ir">Indice de Risque (IR)</label>
                        </div>
                        <div class="right">
                            <input type="text" id="ir" class="form-control" placeholder="valeur" value="{{ $sd_risk->IR() }}" disabled>
                        </div>
                    </div>
                    <div class="line">
                        <div class="left">
                            <label for="">Risque Résiduel (RR)</label>
                        </div>
                        <div class="right">
                            <button class="btn {{ $sd_risk->criticality()['class'] }} btn-hidden" id="rr" type="button">{{ $sd_risk->criticality()['text'] }}</button>
                        </div>
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

                                <li>Cette section n'est disponible uniquement que pour les experts OZA.</li>

                                @foreach($sd_risk->sd_restraints_exist as $restraint)
                                    <li class="res-pro">
                                        <input type="checkbox" class="btn-check" data-id="none" checked data-tab="{{ $restraint->id }}" disabled>
                                        <textarea class="form-control auto-resize" placeholder="" name="restraint_proposed_[checked][]" disabled>{{ $restraint->name }}</textarea>
                                    </li>
                                @endforeach

                                @error('restraint_proposed')
                                <li>
                                    <p class="message-error">{{ $message }}</p>
                                </li>
                                @enderror
                            </ul>
                            <button class="btn btn-yellow btn-text" type="button">+ Ajouter une mesure proposée</button>
                        </div>
                    </div>
                </div>

                <hr>

                <div class="row row--submit">
                    <input type="hidden" name="id_risk" value="{{ $sd_risk->id }}">
                    <button class="btn btn-success">Valider le risque</button>
                </div>
            </div>
        </form>

    </div>
@endsection

@section('script')
    <script src="/js/app/risk_chemical.js"></script>
    <script>
        dateCheck();
    </script>
@endsection
