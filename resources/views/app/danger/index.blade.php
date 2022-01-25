@extends('app')

@section('content')

    @if( isset($single_document->work_unit[0]))
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
                                        <p>Pistes de réflexion :</p>
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
                <form class="card-footer card-footer--exist" action="{{ route('danger.validated', [$single_document->id, $danger->id, 'global']) }}" method="POST">
                    @csrf
                    <input type="hidden" name="checked" value=""/>
                    <p>Ce danger concerne quelqu’un au sein de l’entreprise ?</p>
                    <button type="button" data-value="true" class="btn btn-radio btn-check-work-unit {{ $danger->exist === 1 ? 'btn-radio--checked' : '' }}">Oui</button>
                    <button type="button" data-value="false" class="btn btn-radio btn-check-work-unit {{ $danger->exist === 0 ? 'btn-radio--checked' : '' }}">Non</button>
                </form>
            </div>

            <div class="card card--risk  {{ $danger->ut_all ? 'card--risk-stretchable card--risk-opened' : '' }}">
                <div class="card-header">
                    <h2 class="title">UT <span>TOUS</span></h2>
                    <form class="form-risk-checked" action="{{ route('danger.validated', [$single_document->id, $danger->id, 'all']) }}" method="post">
                        @csrf
                        <input type="hidden" name="checked" value=""/>
                        <p>Ce danger concerne quelqu’un au sein de l’entreprise ?</p>
                        <button type="button" data-value="true" class="btn btn-radio btn-check-work-unit {{ $danger->ut_all === 1 && $danger->exist === 1 ? 'btn-radio--checked' : '' }}" {{ $danger->exist === 0 ? 'disabled' : ''}}>Oui</button>
                        <button type="button" data-value="false" class="btn btn-radio btn-check-work-unit {{ $danger->ut_all === 0 && $danger->exist === 1 ? 'btn-radio--checked' : '' }}" {{ $danger->exist === 0 ? 'disabled' : ''}}>Non</button>
                    </form>
                </div>
                <div class="card-body" style="{{ $danger->ut_all ? 'display: block' : '' }}">
                    @if(count($risks_all) > 0)
                        <table class="table table--risks">
                            <thead>
                                <tr>
                                    <th class="th_risk">Risque identifié</th>
                                    <th class="th_rb">RB</th>
                                    <th class="th_rr">RR</th>
                                    <th class="th_existing_measure">Mesure existante</th>
                                    <th class="th_proposed_measure">Mesure proposée</th>
                                    <th class="th_criticality">Criticité</th>
                                    <th class="th_actions"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($risks_all as $risk)
                                    <tr>
                                        <td class="td_risk">
                                            <p>{{ $risk->name }}</p>
                                        </td>
                                        <td class="td_rb">
                                            <button class="btn {{ $risk->color($risk->total($risk->frequency,$risk->probability,$risk->gravity)) }} btn-small">{{ $risk->total($risk->frequency,$risk->probability,$risk->gravity) }}</button>
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
                                        <td class="td_rr">
                                            <button class="btn {{ $risk->color($risk->totalRR($risk->sd_restraint)) }} btn-small">{{ $risk->totalRR($risk->sd_restraint) }}</button>
                                        </td>
                                        <td class="td_existing_measure">
                                            <div class="list">
                                                @foreach($risk->sd_restraint as $restraint)
                                                    @if($restraint->exist === 1)
                                                        <div class="list-row">
                                                            <div class="list-point list-point--success"></div>
                                                            <p class="list-text">{{ $restraint->name }}</p>
                                                        </div>
                                                    @endif
                                                @endforeach
                                            </div>
                                        </td>
                                        <td class="td_proposed_measure">
                                            <div class="list">
                                                @foreach($risk->sd_restraint as $restraint)
                                                    @if($restraint->exist === 0)
                                                        <div class="list-row">
                                                            <div class="list-point list-point--yellow"></div>
                                                            <p class="list-text">{{ $restraint->name }}</p>
                                                        </div>
                                                    @endif
                                                @endforeach
                                            </div>
                                        </td>
                                        <td class="td_criticality">
                                            <button type="button" class="btn btn-success btn-small">Acceptable</button>
                                        </td>
                                        <td class="td_actions">
                                            <div>
                                                <a href="{{ route('risk.edit', [$single_document->id, $danger->id, $risk->id]) }}"><i class="far fa-edit"></i></a>
                                                <form action="{{ route('risk.delete', [$single_document->id, $danger->id, $risk->id]) }}" method="post">@csrf<i class="fas fa-trash"></i></form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                            <tfoot>
                                <tr class="no-data">
                                    <td colspan="7"><a href="{{route('risk.create', [$single_document->id, $danger->id, 'all'])}}" class="btn btn-inv btn-yellow"><i class="fas fa-plus"></i> AJOUTER UN RISQUE</a></td>
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
                                <td colspan="7"><a href="{{ route('risk.create', [$single_document->id, $danger->id, 'all']) }}" class="btn btn-inv btn-yellow"><i class="fas fa-plus"></i> AJOUTER UN RISQUE</a></td>
                            </tr>
                            </tfoot>
                        </table>
                    @endif
                </div>
            </div>

            @foreach($single_document->work_unit as $sd_work_unit)
                @if($sd_work_unit->validated === 1)
                    <div class="card card--risk {{ $sd_work_unit->sd_danger($danger->id) ? ($sd_work_unit->sd_danger($danger->id)->pivot->exist ? 'card--risk-stretchable card--risk-opened' : '') : '' }}" >
                        <div class="card-header">
                            <h2 class="title">UT <span>{{ $sd_work_unit->name }}</span></h2>
                            <form class="form-risk-checked" action="{{ route('danger.validated', [$single_document->id, $danger->id, $sd_work_unit->id]) }}" method="post">
                                @csrf

                                <input type="hidden" name="checked" value=""/>
                                <p>Ce danger concerne quelqu’un au sein de l’entreprise ?</p>

                                <button type="button" data-value="true" class="btn btn-radio btn-check-work-unit {{ $sd_work_unit->sd_danger($danger->id) ? ($sd_work_unit->sd_danger($danger->id)->pivot->exist === 1 && $danger->exist === 1 ? 'btn-radio--checked' : '') : '' }}" {{ $danger->exist === 0 ? 'disabled' : ''}}>Oui</button>
                                <button type="button" data-value="false" class="btn btn-radio btn-check-work-unit {{ $sd_work_unit->sd_danger($danger->id) ? ($sd_work_unit->sd_danger($danger->id)->pivot->exist === 0 && $danger->exist === 1 ? 'btn-radio--checked' : '') : '' }}" {{ $danger->exist === 0 ? 'disabled' : ''}}>Non</button>
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
                                            <th class="th_rr">RR</th>
                                            <th class="th_existing_measure">Mesure existante</th>
                                            <th class="th_proposed_measure">Mesure proposée</th>
                                            <th class="th_criticality">Criticité</th>
                                            <th class="th_actions"></th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                        @foreach($sd_work_unit->sd_risks as $risk)
                                            <tr>
                                                <td class="td_risk">
                                                    <p>{{ $risk->name }}</p>
                                                </td>
                                                <td class="td_rb">
                                                    <button class="btn {{ $risk->color($risk->total($risk->frequency,$risk->probability,$risk->gravity)) }} btn-small">{{ $risk->total($risk->frequency,$risk->probability,$risk->gravity) }}</button>
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
                                                <td class="td_rr">
                                                    <button class="btn {{ $risk->color($risk->totalRR($risk->sd_restraint)) }} btn-small">{{ $risk->totalRR($risk->sd_restraint) }}</button>
                                                </td>
                                                <td class="td_existing_measure">
                                                    <div class="list">
                                                        @foreach($risk->sd_restraint as $restraint)
                                                            @if($restraint->exist === 1)
                                                                <div class="list-row">
                                                                    <div class="list-point list-point--success"></div>
                                                                    <p class="list-text">{{ $restraint->name }}</p>
                                                                </div>
                                                            @endif
                                                        @endforeach
                                                    </div>
                                                </td>
                                                <td class="td_proposed_measure">
                                                    <div class="list">
                                                    @foreach($risk->sd_restraint as $restraint)
                                                        @if($restraint->exist === 0)
                                                            <div class="list-row">
                                                                <div class="list-point list-point--yellow"></div>
                                                                <p class="list-text">{{ $restraint->name }}</p>
                                                            </div>
                                                        @endif
                                                    @endforeach
                                                    </div>
                                                </td>
                                                <td class="td_criticality">
                                                    <button type="button" class="btn {{ $risk->color(($risk->totalRR($risk->sd_restraint)+$risk->total($risk->frequency,$risk->probability,$risk->gravity))) }} btn-small">{{ $risk->colorTotal(($risk->totalRR($risk->sd_restraint)+$risk->total($risk->frequency,$risk->probability,$risk->gravity))) }}</button>
                                                </td>
                                                <td class="td_actions">
                                                    <div>
                                                        <a href="{{ route('risk.edit', [$single_document->id, $danger->id, $risk->id]) }}"><i class="far fa-edit"></i></a>
                                                        <form action="{{ route('risk.delete', [$single_document->id, $danger->id, $risk->id]) }}" method="post">@csrf<i class="fas fa-trash"></i></form>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                        <tfoot>
                                        <tr class="no-data">
                                            <td colspan="7"><a href="{{ route('risk.create', [$single_document->id, $danger->id, $sd_work_unit->id]) }}" class="btn btn-inv btn-yellow"><i class="fas fa-plus"></i> AJOUTER UN RISQUE</a></td>
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
                                            <td colspan="7"><a href="{{ route('risk.create', [$single_document->id, $danger->id, $sd_work_unit->id]) }}" class="btn btn-inv btn-yellow"><i class="fas fa-plus"></i> AJOUTER UN RISQUE</a></td>
                                        </tr>
                                        </tfoot>
                                    </table>
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

            <div class="card card--submit card--submit-danger">
                <form class="card-body" action="{{ route('danger.store', [$single_document->id, $danger->id]) }}" method="post">
                    @csrf
                    <input type="hidden" name="checked" value=""/>
                    <button type="button" data-value="true" class="btn btn-success btn-check-work-unit">Valider le danger</button>
                    <button type="button" data-value="false" class="btn btn-text btn-check-work-unit">Enregistrer le brouillon</button>
                </form>
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
@endsection
