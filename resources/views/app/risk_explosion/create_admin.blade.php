@extends('app')

@section('content')

    <div class="content">
        <form action="{{ route('risk.explosion.store', [$single_document->id]) }}"
              class="card card--add-risk card--risk-chemical" method="post">
            @csrf
            <div class="card-body">
                <div class="row">
                    <h3 class="section-admin">Section à remplir par l'expert OZA</h3>
                    <div class="line">
                        <div class="left">
                            <h3>Zonage</h3>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="line">
                        <label for="">Matière explosive</label>
                        <input type="text" id="" class="form-control" placeholder="valeur" value="">
                    </div>
                    <div class="line">
                        <div class="left">
                            <label for="">Caractèristique phases H</label>
                        </div>
                        <div class="right">
                            <select name="" id="" class="form-control">
                                <option value="0"></option>
                                <option value="1"></option>
                                <option value="2"></option>
                                <option value="3"></option>
                                <option value="4"></option>
                            </select>
                        </div>
                    </div>
                    <div class="line">
                        <label for="">Matériel Installation</label>
                        <input type="text" id="" class="form-control" placeholder="valeur" value="">
                    </div>
                    <div class="line">
                        <label for="">Source de dégagement</label>
                        <input type="text" id="" class="form-control" placeholder="valeur" value="">
                    </div>
                    <div class="line">
                        <div class="left">
                            <label for="">Degré de dégagement</label>
                        </div>
                        <div class="right">
                            <select name="" id="" class="form-control">
                                <option value="0"></option>
                                <option value="1"></option>
                                <option value="2"></option>
                                <option value="3"></option>
                                <option value="4"></option>
                            </select>
                        </div>
                    </div>
                    <div class="line">
                        <div class="left">
                            <label for="">Degré de ventilation</label>
                        </div>
                        <div class="right">
                            <select name="" id="" class="form-control">
                                <option value="0"></option>
                                <option value="1"></option>
                                <option value="2"></option>
                                <option value="3"></option>
                                <option value="4"></option>
                            </select>
                        </div>
                    </div>
                    <div class="line">
                        <div class="left">
                            <label for="">Disponibilité de la ventilation</label>
                        </div>
                        <div class="right">
                            <select name="" id="" class="form-control">
                                <option value="0"></option>
                                <option value="1"></option>
                                <option value="2"></option>
                                <option value="3"></option>
                                <option value="4"></option>
                            </select>
                        </div>
                    </div>
                    <div class="line">
                        <div class="left">
                            <label for="">Volume de la zone</label>
                        </div>
                        <div class="right">
                            <select name="" id="" class="form-control">
                                <option value="0">Hors zone ATEX sous réserve de l'entretien et des contrôles périodiques.</option>
                                <option value="1"></option>
                                <option value="2"></option>
                                <option value="3"></option>
                                <option value="4"></option>
                            </select>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="cat-danger">
                        <div class="item">
                            <label for="">Gaz</label>
                            <select name="" id="" class="form-control level">
                                <option data-value="0" value="NC">NC</option>
                            </select>
                        </div>
                        <div class="item">
                            <label for="">Poussière</label>
                            <select name="" id="" class="form-control level">
                                <option data-value="0" value="NC">NC</option>
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

                <hr>

                <div class="row">
                    <div class="line">
                        <div class="left">
                            <h3>Ignition</h3>
                        </div>
                    </div>

                </div>

                <hr>

                <div class="row">
                    <div class="line">
                        <div class="left">
                            <label for="date-fds">Date d'élaboration ou de révision de la FDS</label>
                        </div>
                        <div class="right">
                            <input type="date" name="date_fds" id="date-fds" class="form-control">
                        </div>
                    </div>
                    @error('date_fds')
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
                                <option value="0">Sans ou dans un local</option>
                                <option value="1">Médiocre ou travail à l'extérieur</option>
                                <option value="2">Efficace</option>
                                <option value="3">Aspiration localisée</option>
                                <option value="4">Sorbonne de laboratoire</option>
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
                                <option value="0">10 à pur</option>
                                <option value="2">1 à 10%</option>
                                <option value="4">< 1%</option>
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
                                <option value="0">45mn à 8h</option>
                                <option value="2">5 à 45mn</option>
                                <option value="4">< 5mn</option>
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
                                <div data-id="" style="">
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

                <div class="row">
                    <h3 class="section-admin">Section à remplir par l'expert OZA</h3>
                    <div class="line">
                        <div class="left">
                            <label for="protection">Protection</label>
                        </div>
                        <div class="right">
                            <select name="protection" id="protection" class="form-control">
                                <option value="0">Aucune</option>
                                <option value="1">Une seule</option>
                                <option value="2">Au moins une adaptée au risque principal</option>
                                <option value="4">Toutes celles nécessaires</option>
                            </select>
                        </div>
                    </div>
                    @error('protection')
                    <div class="line">
                        <div class="left"></div>
                        <div class="right">
                            <p class="message-error">{{ $message }}</p>
                        </div>
                    </div>
                    @enderror
                    <div class="line">
                        <div class="left">
                            <label for="ir">Indice de Risque (IR)</label>
                        </div>
                        <div class="right">
                            <input type="text" id="ir" class="form-control" placeholder="valeur">
                        </div>
                    </div>
                    <div class="line">
                        <div class="left">
                            <label for="">Risque Résiduel (RR)</label>
                        </div>
                        <div class="right">
                            <button class="btn btn-success" id="rr" type="button">Acceptable</button>
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
    <script src="/js/app/risk_chemical.js"></script>
@endsection
