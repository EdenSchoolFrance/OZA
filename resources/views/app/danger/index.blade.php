@extends('app')

@section('content')
<div class="content">
    <div class="card card--reflection">
        <form class="card-body" action="" >
            @csrf
            <div class="row">
                <div class="line">
                    <div class="left">
                        <i class="far fa-question-circle"></i>
                        <div>
                            <p>Pistes de réflexion :</p>
                            <ul>
                                <li>Y-a-t-il des SST</li>
                                <li>Y-a-t-il une trousse de secours à disposition</li>
                                <li>Combien</li>
                                <li>Où est elle (sont-elles)</li>
                                <li>Est-elle vérifiée régulièrement</li>
                            </ul>
                        </div>
                    </div>
                    <div class="right">
                        <textarea type="text" name="comment" class="form-control" placeholder="Commentaire"></textarea>
                        <button class="btn" type="submit">Enregistrer le commentaire</button>
                    </div>
                </div>
            </div>
        </form>
        <form class="card-footer card-footer--exist" action="" method="POST">
            @csrf
            <input type="hidden" name="checked" value=""/>
            <p>Ce danger concerne quelqu’un au sein de l’entreprise ?</p>
            <button type="submit" data-value="true" class="btn btn-radio btn-radio--checked">Oui</button>
            <button type="submit" data-value="false" class="btn btn-radio">Non</button>
        </form>
    </div>


    <div class="card card--risk card--resizable card--risk-stretchable card--risk-opened">
        <div class="card-header">
            <h2 class="title">UT <span>TOUS</span></h2>
            <form class="form-risk-checked" action="">
                @csrf
                <input type="hidden" name="checked" value=""/>
                <p>Ce danger concerne quelqu’un au sein de l’entreprise ?</p>
                <button type="submit" data-value="true" class="btn btn-radio">Oui</button>
                <button type="submit" data-value="false" class="btn btn-radio">Non</button>
            </form>
        </div>
        <div class="card-body" style="display: block">
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
                    <tr>
                        <td class="td_risk">
                            <p>Exposition au sang de la victime en prodiguant des soins à un accidenté du travail.</p>
                            <p><span>Rappel engin :</span> Exposition au sang de la victime en prodiguant des soins à un accidenté du travail.</p>
                        </td>
                        <td class="td_rb">
                            <button class="btn btn-yellow btn-small">10</button>
                            <div class="list list--text">
                                <div class="list-row">
                                    <p class="list-point list-point--text">F</p>
                                    <p class="list-text">An</p>
                                </div>
                                <div class="list-row">
                                    <p class="list-point list-point--text">P</p>
                                    <p class="list-text">Faible</p>
                                </div>
                                <div class="list-row">
                                    <p class="list-point list-point--text">GP</p>
                                    <p class="list-text">ASA</p>
                                </div>
                                <div class="list-row">
                                    <p class="list-point list-point--text">ID</p>
                                    <p class="list-text">NON</p>
                                </div>
                            </div>
                        </td>
                        <td class="td_rr">
                            <button class="btn btn-success btn-small">10</button>
                        </td>
                        <td class="td_existing_measure">
                            <div class="list">
                                <div class="list-row">
                                    <div class="list-point list-point--success"></div>
                                    <p class="list-text">Pas d’antécédent connu d’accident du travail et / ou de maladie professionnelle généré par le CO2.</p>
                                </div>
                            </div>
                        </td>
                        <td class="td_proposed_measure">
                            <div class="list">
                                <div class="list-row">
                                    <div class="list-point list-point--yellow"></div>
                                    <p class="list-text">Obligation réglementaire : Mettre en place une ventilation mécanique assurant en permanence un débit de 25 m3/h/occupant dans les bureaux et de 30 m3/h/occupant dans les salles de réunion</p>
                                </div>
                                <div class="list-row">
                                    <div class="list-point list-point--yellow"></div>
                                    <p class="list-text">Réaliser l’évaluation détaillée du risque chimique selon les prescriptions réglementaires.</p>
                                </div>
                            </div>
                        </td>
                        <td class="td_criticality">
                            <button type="button" class="btn btn-success btn-small">Acceptable</button>
                        </td>
                        <td class="td_actions"><i class="far fa-edit"></i><i class="fas fa-trash"></i></td>
                    </tr>

                    <tr>
                        <td class="td_risk">
                            <p>Activités au cours de la crise sanitaire liée à la pandémie de COVID-19.
                                Toutes les activités professionnelles au contact d’autres personnes (collègues, collaborateurs, clients, public) pouvant être atteintes de la COVID-19, et, ou, tous les contacts avec des surfaces et ou matières infectées par le virus de la COVID-19.</p>
                        </td>
                        <td class="td_rb">
                            <button class="btn btn-yellow btn-small">10</button>
                            <div class="list list--text">
                                <div class="list-row">
                                    <p class="list-point list-point--text">F</p>
                                    <p class="list-text">An</p>
                                </div>
                                <div class="list-row">
                                    <p class="list-point list-point--text">P</p>
                                    <p class="list-text">Faible</p>
                                </div>
                                <div class="list-row">
                                    <p class="list-point list-point--text">GP</p>
                                    <p class="list-text">ASA</p>
                                </div>
                                <div class="list-row">
                                    <p class="list-point list-point--text">ID</p>
                                    <p class="list-text">NON</p>
                                </div>
                            </div>
                        </td>
                        <td class="td_rr">
                            <button class="btn btn-danger btn-small">24</button>
                        </td>
                        <td class="td_existing_measure">
                            <div class="list">
                                <div class="list-row">
                                    <div class="list-point list-point--text">X</div>
                                    <p class="list-text">Absence de mesure mises en place</p>
                                </div>
                            </div>
                        </td>
                        <td class="td_proposed_measure">
                            <div class="list">
                                <div class="list-row">
                                    <div class="list-point list-point--yellow"></div>
                                    <p class="list-text">Obligation réglementaire : Mettre en place une ventilation mécanique assurant en permanence un débit de 25 m3/h/occupant dans les bureaux et de 30 m3/h/occupant dans les salles de réunion</p>
                                </div>
                                <div class="list-row">
                                    <div class="list-point list-point--yellow"></div>
                                    <p class="list-text">Réaliser l’évaluation détaillée du risque chimique selon les prescriptions réglementaires.</p>
                                </div>
                            </div>
                        </td>
                        <td class="td_criticality">
                            <button type="button" class="btn btn-danger btn-small">Stop</button>
                        </td>
                        <td class="td_actions"><i class="far fa-edit"></i><i class="fas fa-trash"></i></td>
                    </tr>
                </tbody>
                <tfoot>
                    <tr class="no-data">
                        <td colspan="7"><a href="{{route('risk.create', [$single_document->id, $danger->id, 'all'])}}" class="btn btn-inv btn-yellow"><i class="fas fa-plus"></i> AJOUTER UN RISQUE</a></td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>

    @foreach($single_document->work_unit as $sd_work_unit)

        @if($sd_work_unit->validated === 1)
            <div class="card card--risk {{ $sd_work_unit->sd_danger($danger->id) ? ($sd_work_unit->sd_danger($danger->id)->pivot->exist ? 'card--risk-stretchable card--risk-opened' : '') : '' }}" >
                <div class="card-header">
                    <h2 class="title">UT <span>{{ $sd_work_unit->name }}</span></h2>
                    <form class="form-risk-checked" action="{{ route('danger.validated', [$single_document->id, $danger->id, $sd_work_unit->id]) }}">
                        @csrf

                        <input type="hidden" name="checked" value=""/>
                        <p>Ce danger concerne quelqu’un au sein de l’entreprise ?</p>

                        <button type="button" data-value="true" class="btn btn-radio btn-check-work-unit {{ $sd_work_unit->sd_danger($danger->id) ? ($sd_work_unit->sd_danger($danger->id)->pivot->exist === 1 ? 'btn-radio--checked' : '') : '' }}">Oui</button>
                        <button type="button" data-value="false" class="btn btn-radio btn-check-work-unit {{ $sd_work_unit->sd_danger($danger->id) ? ($sd_work_unit->sd_danger($danger->id)->pivot->exist === 0 ? 'btn-radio--checked' : '') : '' }}">Non</button>
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
                                            <button class="btn {{ $risk->color($risk->total($risk->frequency,$risk->probability,$risk->gravity)) }} btn-small">{{ $risk->total($risk->frequency,$risk->probability,$risk->gravity) }}</button>
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

    <div class="card card--submit">
        <form class="card-body" action="">
            @csrf
            <button class="btn btn-success">Valider le danger</button>
        </form>
    </div>

</div>
@endsection

@section('script')
    <script src="/js/app/risk.js"></script>
@endsection
