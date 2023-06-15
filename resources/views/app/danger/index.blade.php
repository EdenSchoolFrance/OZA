@extends('app')

@section('content')
    @if(count($single_document->work_unit) > 0)
        <div class="content">
            <div class="card card--reflection">
                @if(Auth::user()->hasAccess('oza'))
                    <form class="card-body" action="{{ route('danger.comment', [$single_document->id, $danger->id]) }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="line">
                                <div class="left">
                                    <i class="far fa-question-circle"></i>
                                    <div>
                                        <p>Questions :</p>
                                        <ul>
                                            @foreach ($danger->danger->reflections as $reflection)
                                                <li>{{ $reflection->name }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                                <div class="right">
                                    <textarea name="comment" class="form-control" placeholder="Commentaire">{{ $danger->comment }}</textarea>
                                    <button class="btn" type="submit">Enregistrer le commentaire</button>
                                </div>
                            </div>
                        </div>
                    </form>
                @endif
                <form class="card-footer card-footer--exist" action="{{ route('danger.work_unit.exist', [$single_document->id, $danger->id, 'global']) }}" method="POST">
                    @csrf
                    <input type="hidden" name="checked" value=""/>
                    <p>Ce danger concerne quelqu’un au sein de l’entreprise ?</p>
                    <button type="button" data-value="true" class="btn btn-radio btn-check-work-unit {{ $danger->exist === 1 ? 'btn-radio--checked' : '' }}">Oui</button>
                    <button type="button" data-value="false" class="btn btn-radio btn-check-work-unit {{ $danger->exist === 0 ? 'btn-radio--checked' : '' }}">Non</button>
                </form>
            </div>

            @if($danger->exist === 1)
                @if ($danger->danger->exposition)
                    <div class="card card--exposition-info">
                        <div class="card-body">
                            <div class="left">
                                <i class="fas fa-exclamation-circle"></i>
                            </div>
                            <div class="right">
                                <p class="title title-red">Exposition aux facteurs de risques professionnels</p>
                                <p class="title title-green">Rappel du seuil règlementaire :</p>
                                <p class="info">{!! $danger->danger->exposition->info !!}</p>
                            </div>
                        </div>
                    </div>
                @endif

                @if(count($single_document->work_unit) > 1)
                    <div class="card card--risk card--risk-all {{ $danger->ut_all ? 'card--risk-stretchable card--risk-opened' : '' }}">
                        <div class="card-header">
                            <h2 class="title">UT <span>TOUS</span></h2>
                            <form class="form-risk-checked" action="{{ route('danger.work_unit.exist', [$single_document->id, $danger->id, 'all']) }}" method="post">
                                @csrf
                                <input type="hidden" name="checked" value=""/>
                                <p>Ce danger concerne quelqu'un au sein de toutes les unités de travail ?</p>
                                <button type="button" data-value="true" class="btn btn-radio btn-check-work-unit {{ $danger->ut_all === 1 && $danger->exist === 1 ? 'btn-radio--checked' : '' }}" {{ $danger->exist === 0 || $danger->exist === null ? 'disabled' : ''}}>Oui</button>
                                <button type="button" data-value="false" class="btn btn-radio btn-check-work-unit {{ $danger->ut_all === 0 && $danger->exist === 1 ? 'btn-radio--checked' : '' }}" {{ $danger->exist === 0 || $danger->exist === null ? 'disabled' : ''}}>Non</button>
                            </form>
                        </div>
                        <div class="card-body" style="{{ $danger->ut_all ? 'display: block' : '' }}">
                            @if(count($risks_all) > 0)
                                <table class="table table--risks">
                                    <thead>
                                        <tr>
                                            <th class="th_risk">Risque identifié</th>
                                            <th class="th_rb">RB</th>
                                            <th class="th_existing_measure">Mesure existante</th>
                                            <th class="th_rr">RR</th>
                                            <th class="th_criticality">Criticité</th>
                                            <th class="th_proposed_measure">Mesure proposée</th>
                                            <th class="th_actions"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($risks_all as $risk)
                                            <tr>
                                                <td class="td_risk">
                                                    <p>@stripTags($risk->name)</p>
                                                </td>
                                                <td class="td_rb">
                                                    <button class="btn {{ $risk->color($risk->total(),true) }} btn-small">{{ $risk->total() }}</button>
                                                    <div class="list list--text">
                                                        <div class="list-row">
                                                            <p class="list-point list-point--text">F</p>
                                                            <p class="list-text">{{ $risk->translate($risk->frequency,'frequency') }}</p>
                                                        </div>
                                                        <div class="list-row">
                                                            <p class="list-point list-point--text">P</p>
                                                            <p class="list-text">{{ $risk->translate($risk->probability,'probability') }}</p>
                                                        </div>
                                                        <div class="list-row">
                                                            <p class="list-point list-point--text">GP</p>
                                                            <p class="list-text">{{ $risk->translate($risk->gravity,'gravity') }}</p>
                                                        </div>
                                                        <div class="list-row">
                                                            <p class="list-point list-point--text">ID</p>
                                                            <p class="list-text">{{ $risk->translate($risk->impact,'impact') }}</p>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="td_existing_measure">
                                                    <div class="list">
                                                        @foreach($risk->sd_restraints as $restraint)
                                                            @if($restraint->exist === 1)
                                                                <div class="list-row">
                                                                    <div class="list-point list-point--success"></div>
                                                                    <p class="list-text">@stripTags($restraint->name)</p>
                                                                </div>
                                                            @endif
                                                        @endforeach
                                                    </div>
                                                </td>
                                                <td class="td_rr">
                                                    <button class="btn {{ $risk->color( isset($risk->sd_restraints_exist[0]) ? $risk->totalRR($risk->sd_restraints_exist) : $risk->total(),false) }} btn-small">{{ isset($risk->sd_restraints_exist[0]) ? ($risk->totalRR($risk->sd_restraints_exist) === 0 ? $risk->total() : $risk->totalRR($risk->sd_restraints_exist)) : $risk->total() }}</button>
                                                </td>
                                                <td class="td_criticality">
                                                    <button type="button" class="btn {{ $risk->colorC(isset($risk->sd_restraints_exist[0]) ? $risk->totalRR($risk->sd_restraints_exist) : $risk->total(),false) }} btn-small">{{ $risk->colorTotal(isset($risk->sd_restraints_exist[0]) ? $risk->totalRR($risk->sd_restraints_exist) : $risk->total(),false) }}</button>
                                                </td>
                                                <td class="td_proposed_measure">
                                                    <div class="list">
                                                        @foreach($risk->sd_restraints as $restraint)
                                                            @if($restraint->exist === 0)
                                                                <div class="list-row">
                                                                    <div class="list-point list-point--yellow"></div>
                                                                    <p class="list-text">@stripTags($restraint->name)</p>
                                                                </div>
                                                            @endif
                                                        @endforeach
                                                    </div>
                                                </td>
                                                <td class="td_actions">
                                                    <div>
                                                        <a href="{{ route('risk.edit', [$single_document->id, $danger->id, $risk->id]) }}"><i class="far fa-edit"></i></a>
                                                        <a data-modal=".modal--duplicate" data-risk="{{ $risk->id }}" ><i class="far fa-clone"></i></a>
                                                        <a data-modal=".modal--delete" data-risk="{{ $risk->id }}"><i class="fas fa-trash"></i></a>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach

                                    </tbody>
                                    <tfoot>
                                        <tr class="no-data">
                                            <td colspan="7"><a href="{{route('risk.create', [$single_document->id, $danger->id, 'all'])}}" class="btn btn-yellow"><i class="fas fa-plus"></i> AJOUTER UN RISQUE</a></td>
                                        </tr>
                                    </tfoot>
                                </table>
                            @else
                                <table class="table table--accident">
                                    <tbody>
                                    <tr class="no-data">
                                        <td colspan="7">Aucun risque identifié</td>
                                    </tr>
                                    </tbody>
                                    <tfoot>
                                    <tr class="no-data">
                                        <td colspan="7"><a href="{{ route('risk.create', [$single_document->id, $danger->id, 'all']) }}" class="btn btn-yellow"><i class="fas fa-plus"></i> AJOUTER UN RISQUE</a></td>
                                    </tr>
                                    </tfoot>
                                </table>
                            @endif
                        </div>
                    </div>
                @endif

                @foreach($single_document->work_unit->sortBy('name', SORT_NATURAL|SORT_FLAG_CASE) as $sd_work_unit)
                    @if($sd_work_unit->validated === 1)
                        <div class="card card--risk card--risk-{{ $sd_work_unit->id }} {{ $sd_work_unit->sd_danger($danger->id) ? ($sd_work_unit->sd_danger($danger->id)->pivot->exist ? 'card--risk-stretchable card--risk-opened' : '') : '' }}" >
                            <div class="card-header">
                                <h2 class="title">UT <span>{{ $sd_work_unit->name }}</span></h2>
                                <form class="form-risk-checked" action="{{ route('danger.work_unit.exist', [$single_document->id, $danger->id, $sd_work_unit->id]) }}" method="post">
                                    @csrf

                                    <input type="hidden" name="checked" value=""/>
                                    <p>Ce danger concerne quelqu’un au sein de cette unité de travail</p>

                                    <button type="button" data-value="true" class="btn btn-radio btn-check-work-unit {{ $sd_work_unit->sd_danger($danger->id) ? ($sd_work_unit->sd_danger($danger->id)->pivot->exist === 1 && $danger->exist === 1 ? 'btn-radio--checked' : '') : '' }}" {{ $danger->exist === 0 || $danger->exist === null ? 'disabled' : ''}}>Oui</button>
                                    <button type="button" data-value="false" class="btn btn-radio btn-check-work-unit {{ $sd_work_unit->sd_danger($danger->id) ? ($sd_work_unit->sd_danger($danger->id)->pivot->exist === 0 && $danger->exist === 1 ? 'btn-radio--checked' : '') : '' }}" {{ $danger->exist === 0 || $danger->exist === null ? 'disabled' : ''}}>Non</button>
                                </form>
                            </div>
                            @if($sd_work_unit->sd_danger($danger->id) && $sd_work_unit->sd_danger($danger->id)->pivot->exist)
                                <div class="card-body" style="{{ $sd_work_unit->sd_danger($danger->id) ? ($sd_work_unit->sd_danger($danger->id)->pivot->exist ? 'display : block;' : '') : '' }}">
                                    @if(count($sd_work_unit->sd_danger_risks($danger->id)) > 0)
                                        <table class="table table--risks">
                                            <thead>
                                            <tr>
                                                <th class="th_risk">Risque identifié</th>
                                                <th class="th_rb">RB</th>
                                                <th class="th_existing_measure">Mesure existante</th>
                                                <th class="th_rr">RR</th>
                                                <th class="th_criticality">Criticité</th>
                                                <th class="th_proposed_measure">Mesure proposée</th>
                                                <th class="th_actions"></th>
                                            </tr>
                                            </thead>
                                            <tbody>

                                            @foreach($sd_work_unit->sd_danger_risks($danger->id) as $risk)
                                                <tr>
                                                    <td class="td_risk">
                                                        <p>@stripTags($risk->name)</p>
                                                    </td>
                                                    <td class="td_rb">
                                                        <button class="btn {{ $risk->color($risk->total(),true) }} btn-small">{{ $risk->total() }}</button>
                                                        <div class="list list--text">
                                                            <div class="list-row">
                                                                <p class="list-point list-point--text">F</p>
                                                                <p class="list-text">{{ $risk->translate($risk->frequency,'frequency') }}</p>
                                                            </div>
                                                            <div class="list-row">
                                                                <p class="list-point list-point--text">P</p>
                                                                <p class="list-text">{{ $risk->translate($risk->probability,'probability') }}</p>
                                                            </div>
                                                            <div class="list-row">
                                                                <p class="list-point list-point--text">GP</p>
                                                                <p class="list-text">{{ $risk->translate($risk->gravity,'gravity') }}</p>
                                                            </div>
                                                            <div class="list-row">
                                                                <p class="list-point list-point--text">ID</p>
                                                                <p class="list-text">{{ $risk->translate($risk->impact,'impact') }}</p>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td class="td_existing_measure">
                                                        <div class="list">
                                                            @foreach($risk->sd_restraints as $restraint)
                                                                @if($restraint->exist === 1)
                                                                    <div class="list-row">
                                                                        <div class="list-point list-point--success"></div>
                                                                        <p class="list-text">@stripTags($restraint->name)</p>
                                                                    </div>
                                                                @endif
                                                            @endforeach
                                                        </div>
                                                    </td>
                                                    <td class="td_rr">
                                                        <button class="btn {{ $risk->color( isset($risk->sd_restraints_exist[0]) ? $risk->totalRR($risk->sd_restraints_exist) : $risk->total(),false) }} btn-small">{{ isset($risk->sd_restraints_exist[0]) ? $risk->totalRR($risk->sd_restraints_exist) : $risk->total() }}</button>
                                                    </td>
                                                    <td class="td_criticality">
                                                        <button type="button" class="btn {{ $risk->colorC(isset($risk->sd_restraints_exist[0]) ? $risk->totalRR($risk->sd_restraints_exist) : $risk->total(),false) }} btn-small">{{ $risk->colorTotal(isset($risk->sd_restraints_exist[0]) ? $risk->totalRR($risk->sd_restraints_exist) : $risk->total(), false) }}</button>
                                                    </td>
                                                    <td class="td_proposed_measure">
                                                        <div class="list">
                                                        @foreach($risk->sd_restraints as $restraint)
                                                            @if($restraint->exist === 0)
                                                                <div class="list-row">
                                                                    <div class="list-point list-point--yellow"></div>
                                                                    <p class="list-text">@stripTags($restraint->name)</p>
                                                                </div>
                                                            @endif
                                                        @endforeach
                                                        </div>
                                                    </td>
                                                    <td class="td_actions">
                                                        <div>
                                                            <a href="{{ route('risk.edit', [$single_document->id, $danger->id, $risk->id]) }}"><i class="far fa-edit"></i></a>
                                                            <a data-modal=".modal--duplicate" data-risk="{{ $risk->id }}" ><i class="far fa-clone"></i></a>
                                                            <a data-modal=".modal--delete" data-risk="{{ $risk->id }}"><i class="fas fa-trash"></i></a>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                            <tfoot>
                                            <tr class="no-data">
                                                <td colspan="7"><a href="{{ route('risk.create', [$single_document->id, $danger->id, $sd_work_unit->id]) }}" class="btn btn-yellow"><i class="fas fa-plus"></i> AJOUTER UN RISQUE</a></td>
                                            </tr>
                                            </tfoot>
                                        </table>
                                    @else
                                        <table class="table table--accident">
                                            <tbody>
                                            <tr class="no-data">
                                                <td colspan="7">Aucun risque identifié</td>
                                            </tr>
                                            </tbody>
                                            <tfoot>
                                            <tr class="no-data">
                                                <td colspan="7"><a href="{{ route('risk.create', [$single_document->id, $danger->id, $sd_work_unit->id]) }}" class="btn btn-yellow"><i class="fas fa-plus"></i> AJOUTER UN RISQUE</a></td>
                                            </tr>
                                            </tfoot>
                                        </table>
                                    @endif

                                    @if ($danger->danger->exposition)
                                        <div class="card card--exposition card--exposition-{{ $sd_work_unit->id }}">
                                            <div class="card-header">
                                                <div class="row">
                                                    <p class="title">Evaluation de l'exposition aux facteurs de risques professionnels</p>
                                                    <p class="subtitle">appréciée après application des mesures de protection collective et individuelle</p>
                                                </div>
                                                <form class="row" action="{{ route('danger.exposition.exist', [$single_document->id, $danger->id, $sd_work_unit->id, $danger->danger->exposition->id]) }}" method="post">
                                                    @csrf
                                                    <input type="hidden" name="checked" value=""/>
                                                    <p>Après mesure de protection collective et individuelle, l’UT est-elle exposée à ce facteur de risque ?</p>

                                                    <button type="button" data-value="true" class="btn btn-radio btn-check-work-unit {{ $sd_work_unit->sd_danger($danger->id)->pivot->exposition === 1 ? "btn-radio--checked" : "" }}" {{ $sd_work_unit->sd_danger($danger->id)->pivot->exposition === 1 ? "disabled" : ""  }}>Oui</button>
                                                    <button type="button" data-value="false" class="btn btn-radio btn-check-work-unit {{ $sd_work_unit->sd_danger($danger->id)->pivot->exposition === 0 ? "btn-radio--checked" : "" }}" {{ $sd_work_unit->sd_danger($danger->id)->pivot->exposition === 0 ? "disabled" : ""  }}>Non</button>
                                                </form>
                                            </div>

                                            @if ($sd_work_unit->sd_danger($danger->id)->pivot->exposition)
                                                <form action="{{ route('exposition.store', [$single_document->id, $danger->id, $sd_work_unit->id, $danger->danger->exposition->id]) }}" method="POST">
                                                    @csrf
                                                    <div class="card-body">
                                                        <div class="info info--warning">
                                                            <p class="info">A lire avant l’évaluation :</p>
                                                            <p class="info">La durée annuelle d’exposition considérée est de 220 jours. Si la durée est différente, veuillez calculer l’exposition au prorata.</p>
                                                        </div>
                                                        @foreach ($danger->danger->exposition->exposition_groups as $key => $exposition_group)
                                                            @if ($key > 0)
                                                                <hr class="separation">
                                                            @endif
                                                            <table class="table table--exposition" data-calculation="{{ json_encode(unserialize($exposition_group->calculation)) }}">
                                                                <thead>
                                                                    <tr>
                                                                        <th></th>
                                                                        <th>
                                                                            {{ $exposition_group->intervention_type_label }}
                                                                        </th>
                                                                        <th>
                                                                            Nombre de personnes concernées
                                                                        </th>
                                                                        @if ($exposition_group->type == "default")
                                                                            <th>
                                                                                {{ $exposition_group->value_label }}
                                                                            </th>
                                                                        @else
                                                                            <th>
                                                                                Durée en mm/j
                                                                            </th>
                                                                            <th>
                                                                                Durée en h/an
                                                                            </th>
                                                                        @endif
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    @foreach ($exposition_group->exposition_questions as $key => $exposition_question)
                                                                        @php
                                                                            $sd_exposition_question = $exposition_question->sd_work_unit_exposition_question($sd_work_unit->id);
                                                                        @endphp
                                                                        <tr class="{{ $key > 0 ? "no-border" : "" }}">
                                                                            @if ($exposition_group->type == "duration" && count($exposition_group->exposition_questions) > 1)
                                                                                <td class="custom">{{ $exposition_question->intensity }}</td>
                                                                            @else
                                                                                <td></td>
                                                                            @endif
                                                                            <td>
                                                                                @if (!$exposition_question->options)
                                                                                    <input type="text" class="form-control" name="exposition_intervention_type[{{ $exposition_group->id }}_{{ $exposition_question->id }}]" value="{{ old('exposition_intervention_type.' . $exposition_group->id . '_' . $exposition_question->id) ? old('exposition_intervention_type.' . $exposition_group->id . '_' . $exposition_question->id) : ($sd_exposition_question ? $sd_exposition_question->intervention_type : "") }}" placeholder="Préciser le type d’intervention ou de travaux">
                                                                                @else
                                                                                    <div class="list-container">
                                                                                        <div>
                                                                                            <input type="radio" id="exposition_intervention_type[{{ $exposition_group->id }}_{{ $exposition_question->id }}]_nothing" name="exposition_intervention_type[{{ $exposition_group->id }}_{{ $exposition_question->id }}]" value="" {{ (old('exposition_intervention_type.' . $exposition_group->id . '_' . $exposition_question->id) == null) || !$sd_exposition_question ? "checked" : "" }}>
                                                                                            <label for="exposition_intervention_type[{{ $exposition_group->id }}_{{ $exposition_question->id }}]_nothing">Néant</label>
                                                                                        </div>
                                                                                        @foreach (unserialize($exposition_question->options) as $key => $option)
                                                                                            <div>
                                                                                                <input type="radio" id="exposition_intervention_type[{{ $exposition_group->id }}_{{ $exposition_question->id }}]_{{ $key }}" name="exposition_intervention_type[{{ $exposition_group->id }}_{{ $exposition_question->id }}]" value="{{ $key }}" {{ old('exposition_intervention_type.' . $exposition_group->id . '_' . $exposition_question->id) != null ? (old('exposition_intervention_type.' . $exposition_group->id . '_' . $exposition_question->id) == $key ? "checked" : "") : ($sd_exposition_question ? ($sd_exposition_question->intervention_type == $option ? "checked" : "") : "") }}>
                                                                                                <label for="exposition_intervention_type[{{ $exposition_group->id }}_{{ $exposition_question->id }}]_{{ $key }}">{{ $option }}</label>
                                                                                            </div>
                                                                                        @endforeach
                                                                                    </div>
                                                                                @endif
                                                                                @if ($exposition_group->type != "duration" || count($exposition_group->exposition_questions) == 1)
                                                                                    <p class="info info--success">{{ $exposition_question->intensity }}</p>
                                                                                @endif
                                                                            </td>
                                                                            <td>
                                                                                <input type="number" class="form-control" name="exposition_number_employee[{{ $exposition_group->id }}_{{ $exposition_question->id }}]" value="{{ old('exposition_number_employee.' . $exposition_group->id . '_' . $exposition_question->id) ? old('exposition_number_employee.' . $exposition_group->id . '_' . $exposition_question->id) : ($sd_exposition_question ? $sd_exposition_question->number_employee : "") }}" min="0">
                                                                            </td>
                                                                            @if ($exposition_group->type == "duration")
                                                                                <td>
                                                                                    <input type="number" class="form-control input_exposition_minutes exposition_convert" name="exposition_minutes[{{ $exposition_group->id }}_{{ $exposition_question->id }}]" value="{{ old('exposition_minutes.' . $exposition_group->id . '_' . $exposition_question->id) ? old('exposition_minutes.' . $exposition_group->id . '_' . $exposition_question->id) : ($sd_exposition_question ? $sd_exposition_question->minutes : "") }}" min="0">
                                                                                </td>
                                                                            @endif
                                                                            <td>
                                                                                <input type="number" class="form-control exposition_calculation {{ $exposition_group->type == "duration" ? "input_exposition_hours" : "" }} {{ $exposition_group->type == "duration" && count($exposition_group->exposition_questions) > 1 ? "exposition_total" : "" }}" name="exposition_value[{{ $exposition_group->id }}_{{ $exposition_question->id }}]" value="{{ old('exposition_value.' . $exposition_group->id . '_' . $exposition_question->id) ? old('exposition_value.' . $exposition_group->id . '_' . $exposition_question->id) : ($sd_exposition_question ? $sd_exposition_question->value : "") }}" min="0">
                                                                                @if ($exposition_group->type != "duration" || count($exposition_group->exposition_questions) == 1)
                                                                                    <p class="info">{{ $exposition_group->duration }}</p>
                                                                                @endif
                                                                            </td>
                                                                        </tr>
                                                                    @endforeach
                                                                    @if ($exposition_group->type == "duration" && count($exposition_group->exposition_questions) > 1)
                                                                        <tr class="result no-border">
                                                                            <td colspan="5">
                                                                                <p>TOTAL h/an : <span class="total">0</span> h/an</p>
                                                                                <p class="info">{{ $exposition_group->duration }}</p>
                                                                            </td>
                                                                        </tr>
                                                                    @endif
                                                                    <tr class="result nothing">
                                                                        <td colspan="{{ $exposition_group->type == "duration" ? "5" : "4" }}">
                                                                            <div class="criticity">
                                                                                <p>Criticité de la situation actuelle : <span></span></p>
                                                                                <button type="button" class="btn btn-small btn-criticity"></button>
                                                                            </div>
                                                                            <div class="info info--danger">
                                                                                <i class="fas fa-exclamation-circle"></i>
                                                                                <p class="info">{{ $danger->danger->exposition->info }}</p>
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        @endforeach
                                                        @error('exposition_intervention_type.*')
                                                            <p class="message-error">{{ $message }}</p>
                                                        @enderror
                                                        @error('exposition_number_employee.*')
                                                            <p class="message-error">{{ $message }}</p>
                                                        @enderror
                                                        @error('exposition_minutes.*')
                                                            <p class="message-error">{{ $message }}</p>
                                                        @enderror
                                                        @error('exposition_value.*')
                                                            <p class="message-error">{{ $message }}</p>
                                                        @enderror
                                                        @error('exposition')
                                                            <p class="message-error">{{ $message }}</p>
                                                        @enderror
                                                    </div>

                                                    <div class="card-footer">
                                                        <button type="submit" class="btn btn-success">Enregistrer l’exposition</button>
                                                    </div>
                                                </form>
                                            @endif
                                        </div>
                                    @endif
                                </div>
                            @endif
                        </div>
                    @else
                        <div class="card card--risk">
                            <div class="card-header">
                                <h2 class="title">UT <span>{{ $sd_work_unit->name }}</span></h2>
                                <p class="message-alert">Attention unité de travail non validée</p>
                            </div>
                        </div>
                    @endif

                @endforeach
            @endif

            <div class="card card--submit card--submit-danger">
                <form class="card-body" action="{{ route('danger.store', [$single_document->id, $danger->id]) }}" method="post">
                    @csrf
                    <input type="hidden" name="checked" value=""/>
                    <button type="button" data-value="true" class="btn btn-success btn-check-work-unit">Valider le danger</button>
                    <button type="button" data-value="false" class="btn btn-text btn-check-work-unit">Enregistrer le brouillon</button>
                </form>
            </div>

            <div class="modal modal--duplicate">
                <div class="modal-dialog">
                    <form class="modal-content" action="{{ route('risk.duplicate', [$single_document->id, $danger->id]) }}" method="POST">
                        @csrf
                        <input type="hidden" name="id_risk" value="">
                        <div class="modal-header">
                            <p class="title">Dupliquer le risque</p>
                            <button type="button" class="btn-close" data-dismiss="modal"><i class="fas fa-times"></i></button>
                        </div>
                        <div class="modal-body">
                            <p>Sélectionner une unité de travail</p>
                            <select name="work_unit" class="form-control">
                                <option value="all">Tous</option>
                                @foreach($sd_works_units as $sd_work_unit)
                                    <option value="{{ $sd_work_unit->id }}">{{ $sd_work_unit->name }}</option>
                                @endforeach
                            </select>
                            <div>
                                <button type="submit" class="btn btn-yellow">Dupliquer</button>
                                <button type="button" class="btn btn-danger btn-text" data-dismiss="modal">Annuler</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="modal modal--delete">
                <div class="modal-dialog">
                    <form class="modal-content" action="{{ route('risk.delete', [$single_document->id, $danger->id]) }}" method="POST">
                        @csrf
                        <input type="hidden" name="id_risk" value="">
                        <div class="modal-header">
                            <p class="title">Confirmer la suppression</p>
                            <button type="button" class="btn-close" data-dismiss="modal"><i class="fas fa-times"></i></button>
                        </div>
                        <div class="modal-body">
                            <p>Êtes-vous sûr.e de vouloir supprimer ce risque ?</p>
                            <div>
                                <button type="submit" class="btn btn-yellow">Supprimer</button>
                                <button type="button" class="btn btn-inv btn-yellow btn-small" data-dismiss="modal"> Annuler</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    @else
        <div class="card card--no-work-unit">
            <div class="card-body">
                <div class="row row--center">
                    <h1 class="text-color-yellow">Ce DU ne contient aucune unité de travail.</h1>
                </div>
            </div>
            <div class="card-body">
                <div class="row row--center">
                    <a href="{{ route('work.index', [$single_document->id]) }}" class="btn btn-yellow">Unité de travail</a>
                </div>
            </div>
        </div>
    @endif
@endsection

@section('script')
    <script src="/js/app/risk.js"></script>
    @if ($danger->danger->exposition)
        <script>
            $('.card--exposition input.exposition_calculation').forEach(el => {
                expositionCalculation(el);
            });
        </script>
    @endif
@endsection
