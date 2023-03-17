@extends('app')

@section('content')

    <div class="content">
        <form action="{{ route('risk.chemical.store', [$single_document->id]) }}"
              class="card card--add-risk card--risk-chemical" method="post">
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
                                @foreach($works_units as $work)
                                    <option value="{{ $work->id }}" {{ old('work_unit') == $work->id ? 'selected' : '' }}>{{ $work->name }}</option>
                                @endforeach
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
                            <textarea type="text" class="form-control" name="name_risk_chemical" id="nameRisk" placeholder="Nom commercial ou dénomination" required>{{ old('name_risk_chemical') }}</textarea>
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
                            <textarea type="text" class="form-control" name="activity" id="activity" placeholder="Utilisation du produit / Activité qui génère le produit" required>{{ old('activity') }}</textarea>
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
                            </select>
                        </div>
                        <div class="item">
                            <label for="n2">n2</label>
                            <select id="n2" class="form-control level" disabled>
                                <option data-value="0" value="NC">NC</option>
                            </select>
                        </div>
                        <div class="item">
                            <label for="n3">n3</label>
                            <select id="n3" class="form-control level" disabled>
                                <option data-value="0" value="NC">NC</option>
                            </select>
                        </div>
                        <div class="item">
                            <label for="n4">n4</label>
                            <select id="n4" class="form-control level" disabled>
                                <option data-value="0" value="NC">NC</option>
                            </select>
                        </div>
                        <div class="item">
                            <label for="n5">n5</label>
                            <select id="n5" class="form-control level" disabled>
                                <option data-value="0" value="NC">NC</option>
                            </select>
                        </div>
                        <div class="item">
                            <label for="n6">n6</label>
                            <select id="n6" class="form-control level" disabled>
                                <option data-value="0" value="NC">NC</option>
                            </select>
                        </div>
                        <div class="item">
                            <label for="n7">n7</label>
                            <select id="n7" class="form-control level" disabled>
                                <option data-value="0" value="NC">NC</option>
                            </select>
                        </div>
                        <div class="item">
                            <label for="n8">n8</label>
                            <select id="n8" class="form-control level" disabled>
                                <option data-value="0" value="NC">NC</option>
                            </select>
                        </div>
                        <div class="item">
                            <label for="n9">n9</label>
                            <select id="n9" class="form-control level" disabled>
                                <option data-value="0" value="NC">NC</option>
                            </select>
                        </div>
                        <div class="item">
                            <label for="n10">n10</label>
                            <select id="n10" class="form-control level" disabled>
                                <option data-value="0" value="NC">NC</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="line nd">
                        <label for="nd">Niveau de Danger associé au produit (ND)</label>
                        <input type="text" id="nd" class="form-control" placeholder="valeur" value="" disabled>
                        <input type="hidden" id="nd_hidden" value="0">
                    </div>
                </div>

                <hr>

                <div class="row">
                    <div class="line">
                        <div class="left">
                            <label for="date-fds">Date d'élaboration ou de révision de la FDS</label>
                        </div>
                        <div class="right">
                            <input type="date" id="date-fds" class="form-control" disabled>
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
                                <option value="0" {{ old('ventilation') == 0 ? 'selected' : '' }}>Sans ou dans un local</option>
                                <option value="1" {{ old('ventilation') == 1 ? 'selected' : '' }}>Médiocre ou travail à l'extérieur</option>
                                <option value="2" {{ old('ventilation') == 2 ? 'selected' : '' }}>Efficace</option>
                                <option value="3" {{ old('ventilation') == 3 ? 'selected' : '' }}>Aspiration localisée</option>
                                <option value="4" {{ old('ventilation') == 4 ? 'selected' : '' }}>Sorbonne de laboratoire</option>
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
                                <option value="0" {{ old('concentration') == 0 ? 'selected' : '' }}>10 à pur</option>
                                <option value="2" {{ old('concentration') == 2 ? 'selected' : '' }}>1 à 10%</option>
                                <option value="4" {{ old('concentration') == 4 ? 'selected' : '' }}>< 1%</option>
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
                                <option value="0" {{ old('time') == 0 ? 'selected' : '' }}>45mn à 8h</option>
                                <option value="2" {{ old('time') == 2 ? 'selected' : '' }}>5 à 45mn</option>
                                <option value="4" {{ old('time') == 4 ? 'selected' : '' }}>< 5mn</option>
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
                                    <input type="text" id="modal-input" name="name" class="form-control"
                                           placeholder="EPI 1, EPI 2, ">
                                    <p class="info-input">Il est possible d’ajouter plusieurs matériels en les séparant
                                        par une virgule</p>
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
                                <option value="0">Aucune</option>
                            </select>
                        </div>
                    </div>
                    <div class="line">
                        <div class="left">
                            <label for="ir">Indice de Risque (IR)</label>
                        </div>
                        <div class="right">
                            <input type="text" id="ir" class="form-control" placeholder="valeur" disabled>
                        </div>
                    </div>
                    <div class="line">
                        <div class="left">
                            <label for="">Risque Résiduel (RR)</label>
                        </div>
                        <div class="right">
                            <button class="btn btn-hidden" id="rr" type="button">-</button>
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

                                <li>Aucune messure proposée</li>

                                @error('restraint_proposed')
                                <li>
                                    <p class="message-error">{{ $message }}</p>
                                </li>
                                @enderror
                            </ul>
                            <button class="btn btn-yellow btn-text" data-id="" type="button">+ Ajouter une mesure proposée</button>
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
    <script src="/js/app/risk_chemical.js"></script>
@endsection
