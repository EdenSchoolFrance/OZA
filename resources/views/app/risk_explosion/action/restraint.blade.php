@extends('app')

@section('content')
    <div class="content">
        <div class="card card--add-risk">
            @csrf
            <div class="card-body">

                <table class="table table--work_units">
                    <thead>
                        <tr>
                            <th class="th_material_explosion" style="width: 15%">Matière explosible</th>
                            <th class="th_gas" style="width: 15%">Gaz</th>
                            <th class="th_dust" style="width: 10%">Poussière</th>
                            <th class="th_criticality" style="width: 10%">Criticité</th>
                            <th class="th_restraint" style="width: 20%">Mesures de prévention et de protection proposées</th>
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
                                    <td rowspan="{{ count($sd_risk->sd_restraints_exist) + 1 }}" class="td_material_explosion"> {{ $sd_risk->material_explosion }}</td>
                                    <td rowspan="{{ count($sd_risk->sd_restraints_exist) + 1 }}" class="td_gas">{{ $sd_risk->gas }}</td>
                                    <td rowspan="{{ count($sd_risk->sd_restraints_exist) + 1 }}" class="td_dust">{{ $sd_risk->dust }}</td>
                                    <td rowspan="{{ count($sd_risk->sd_restraints_exist) + 1 }}" class="td_criticality"><button class="btn {{ $sd_risk->criticality()['class'] }} btn-hidden">{{ $sd_risk->criticality()['text'] }}</button></td>
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
                                            <button type="button" data-modal=".modal--restraint" data-id="{{ $restraint->id }}" data-title="{{ $restraint->name }}" @if($restraint->date) data-date="{{ $restraint->date }}" data-decision="{{ $restraint->comment }}" @endif><i class="far fa-edit" data-tooltip=".tooltip--edit" data-placement="top" data-tooltable="true"></i></button>
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
                <form class="modal-content" action="{{ route('risk.explosion.action.store', [$single_document->id]) }}" method="POST">
                    @csrf
                    <input type="hidden" name="id" value="">
                    <div class="modal-header">
                        <p class="title">Mettre à jour le plan d’action</p>
                        <button type="button" class="btn-close" data-dismiss="modal"><i class="fas fa-times"></i></button>
                    </div>
                    <div class="modal-body">
                        <p style="margin: 25px 0"></p>
                        <div class="row">
                            <div class="line">
                                <div class="left">
                                    <label for="nameRisk">Date de mise en place</label>
                                </div>
                                <div class="right">
                                    <input type="date" class="form-control" name="date_restraint" placeholder="JJ/MM/AAAA" value="{{ old('date_restraint') }}">
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
                                    <textarea class="form-control auto-resize title-restraint" name="decision_restraint" placeholder="Commentaires"></textarea>
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
