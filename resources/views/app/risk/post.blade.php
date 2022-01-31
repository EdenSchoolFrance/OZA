@extends('app')

@section('content')
    <div class="content">
        <div class="card card--work_units">
            <div class="card-body">
                <table class="table table--restraint">
                    <thead>
                        <tr>
                            <th class="th_work_unit">Unité de travail</th>
                            <th class="th_danger">Danger</th>
                            <th class="th_risk">Risque</th>
                            <th class="th_evaluation">Évaluations</th>
                            <th class="th_restraint">RB</th>
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
                                    <button class="btn {{ $sd_risk->color($sd_risk->total()) }} btn-small">{{ $sd_risk->total() }}</button>
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
