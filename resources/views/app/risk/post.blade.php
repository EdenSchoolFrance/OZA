@extends('app')

@section('content')
    <div class="content">
        <div class="card card--work_units">
            <div class="card-body">
                <table class="table table--restraint">
                    <thead>
                        <tr>
                            <th class="th_work_unit" style="width: 20%">Unité de travail</th>
                            <th class="th_danger" style="width: 15%">Danger</th>
                            <th class="th_risk" style="width: 40%">Risque</th>
                            <th class="th_evaluation" style="width: 15%">Évaluations</th>
                            <th class="th_restraint" style="width: 10%">RB</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($sd_risks as $sd_risk)
                            <tr>
                                <td class="td_work_unit">{{ $sd_risk->sd_work_unit ? $sd_risk->sd_work_unit->name : "UT Tous" }}</td>
                                <td class="td_danger">{{ $sd_risk->sd_danger->danger->name }}</td>
                                <td class="td_risk">{{ $sd_risk->name }}</td>
                                <td class="td_evaluation">
                                    <div class="list list--text list--space">
                                        <div class="list-row">
                                            <p class="list-point list-point--text">F</p>
                                            <p class="list-text">{{ $sd_risk->translate($sd_risk->frequency,'frequency') }}</p>
                                        </div>
                                        <div class="list-row">
                                            <p class="list-point list-point--text">P</p>
                                            <p class="list-text">{{ $sd_risk->translate($sd_risk->probability,'probability') }}</p>
                                        </div>
                                        <div class="list-row">
                                            <p class="list-point list-point--text">GP</p>
                                            <p class="list-text">{{ $sd_risk->translate($sd_risk->gravity,'gravity') }}</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="td_restraint">
                                    <button class="btn {{ $sd_risk->colorPost($sd_risk->total(),true) }} btn-small">{{ $sd_risk->total() }}</button>
                                </td>
                            </tr>
                        @endforeach

                        @if (count($sd_risks) == 0)
                            <tr class="no-data no-data--centered">
                                <td colspan="5">Aucun poste à risque</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('script')
@endsection
