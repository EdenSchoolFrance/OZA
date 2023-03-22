@extends('app')

@section('content')
    <div class="content">
        <div class="card card--add-risk">
            @csrf
            <div class="card-body">

                <table class="table table--work_units">
                    <thead>
                    <tr>
                        <th class="td_work_unit" style="width: 15%">Unité de travail</th>
                        <th class="th_name" style="width: 15%">Nom commercial ou dénomination</th>
                        <th class="th_ir" style="width: 10%">IR</th>
                        <th class="th_rr" style="width: 10%">RR</th>
                        <th class="th_restraint" style="width: 20%">Mesure proposée</th>
                        <th class="th_comment" style="width: 15%">Décision</th>
                        <th class="th_date" style="width: 15%">Date de réalisation</th>
                        <th class="th_actions"></th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(count($sd_risks) === 0)
                        <tr class="no-data no-data--centered">
                            <td colspan="{{ 8 }}">
                                Aucune donnée
                            </td>
                        </tr>
                    @endif
                    @foreach($sd_risks as $sd_risk)
                        @if(isset($sd_risk->sd_restraints_exist[0]))
                            <tr>
                                <td rowspan="{{ count($sd_risk->sd_restraints_exist) + 1 }}"
                                    class="td_work_unit"> {{ $sd_risk->sd_work_unit->name }}</td>
                                <td rowspan="{{ count($sd_risk->sd_restraints_exist) + 1 }}"
                                    class="td_name">{{ $sd_risk->name }}</td>
                                <td rowspan="{{ count($sd_risk->sd_restraints_exist) + 1 }}"
                                    class="td_ir">{{ $sd_risk->IR() }}</td>
                                <td rowspan="{{ count($sd_risk->sd_restraints_exist) + 1 }}" class="td_rr">
                                    <button
                                        class="btn {{ $sd_risk->criticality()['class'] }}">{{ $sd_risk->criticality()['text'] }}</button>
                                </td>
                            </tr>
                            @foreach($sd_risk->sd_restraints_exist as $key => $restraint)
                                @php
                                    $key++;
                                @endphp
                                <tr>
                                    <td class="td_restraint">{{ $restraint->name }}</td>
                                    <td class="td_decision">{{ $restraint->comment }}</td>
                                    <td class="td_date">{{ $restraint->date ? date("d/m/Y", strtotime($restraint->date)) : "" }}</td>
                                    <td class="td_actions">
                                        <button type="button" data-modal=".modal--restraint"
                                                data-id="{{ $restraint->id }}" data-title="{{ $restraint->name }}"
                                                @if($restraint->date) data-date="{{ $restraint->date }}"
                                                data-decision="{{ $restraint->comment }}" @endif><i class="far fa-edit"
                                                                                                    data-tooltip=".tooltip--edit"
                                                                                                    data-placement="top"
                                                                                                    data-tooltable="true"></i>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div class="modal modal--restraint modal-add-risk">
            <div class="modal-dialog modal-dialog-large">
                <form class="modal-content" action="{{ route('risk.chemical.action.store', [$single_document->id]) }}"
                      method="POST">
                    @csrf
                    <input type="hidden" name="id" value="">
                    <div class="modal-header">
                        <p class="title">Mettre à jour le plan d’action</p>
                        <button type="button" class="btn-close" data-dismiss="modal"><i class="fas fa-times"></i>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p style="margin: 25px 0"></p>
                        <div class="row">
                            <div class="line">
                                <div class="left">
                                    <label for="nameRisk">Date de mise en place</label>
                                </div>
                                <div class="right">
                                    <input type="date" class="form-control" name="date_restraint"
                                           placeholder="JJ/MM/AAAA" value="{{ old('date_restraint') }}">
                                    @error('date_restraint')
                                    <p class="message-error">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="line">
                                <div class="left">
                                    <label for="nameRisk">Décisions</label>
                                </div>
                                <div class="right">
                                    <textarea class="form-control auto-resize title-restraint" name="decision_restraint"
                                              placeholder="Commentaires"></textarea>
                                    @error('decision_restraint')
                                    <p class="message-error">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="line">
                                <div class="left">
                                </div>
                                <div class="right">
                                    <button type="submit" class="btn btn-success">Valider la mise à jour</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="tooltip tooltip--edit">
            <p>Modifier la mesure</p>
        </div>
    </div>

@endsection

@section('script')
    <script src="/js/app/risk_psycho.js"></script>
@endsection
