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
                            <th class="th_restraint">Mesure proposée</th>
                            <th class="th_actions"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($sd_risks as $sd_risk)
                            @if($sd_risk->total2() > 23)
                                <tr>
                                    <td class="td_work_unit">{{ $sd_risk->sd_danger->sd_works_units[0]->name }}</td>
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
                                        <button class="btn {{ $sd_risk->color($sd_risk->total2()) }} btn-small">{{ $sd_risk->total2() }}</button>
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('script')
@endsection
