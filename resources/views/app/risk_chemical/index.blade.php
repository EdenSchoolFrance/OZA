@extends('app')

@section('content')
    <div class="content">
        <div class="card card--work_units">
            <div class="card-body">
                <div class="container-table-risk-explosion">
                    <table class="table table--risk-explosion">
                        <thead>
                            <tr>
                                <th class="th_work_unit">Unité de travail</th>
                                <th class="th_name">Nom commercial ou dénomination</th>
                                <th class="th_activity">Utilisation Activité</th>
                                <th class="th_n1">n°1</th>
                                <th class="th_n2">n°2</th>
                                <th class="th_n3">n°3</th>
                                <th class="th_n4">n°4</th>
                                <th class="th_n5">n°5</th>
                                <th class="th_n6">n°6</th>
                                <th class="th_n7">n°7</th>
                                <th class="th_n8">n°8</th>
                                <th class="th_n9">n°9</th>
                                <th class="th_n10">n°10</th>
                                <th class="th_nd">ND</th>
                                <th class="th_ventilation">Ventilation Confinement</th>
                                <th class="th_concentration">Concentration</th>
                                <th class="th_time">Durée utilisation jour</th>
                                <th class="th_protection">Protection</th>
                                <th class="th_ir">IR</th>
                                <th class="th_equipement">Equipements de Protection Individuels</th>
                                <th class="th_rr">Risque résiduel</th>
                                <th class="th_criticality">Criticité</th>
                                <th class="th_restraint">Mesures proposées</th>
                                <th class="th_actions"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($sd_risks_chemical as $sd_risk)
                                <tr>
                                    <td class="td_work_unit">{{ $sd_risk->sd_work_unit->name }}</td>
                                    <td class="td_name">{{ $sd_risk->name }}</td>
                                    <td class="td_activity">{{ $sd_risk->activity }}</td>
                                    <td class="td_n1">{{ $sd_risk->n1 }}</td>
                                    <td class="td_n2">{{ $sd_risk->n2 }}</td>
                                    <td class="td_n3">{{ $sd_risk->n3 }}</td>
                                    <td class="td_n4">{{ $sd_risk->n4 }}</td>
                                    <td class="td_n5">{{ $sd_risk->n5 }}</td>
                                    <td class="td_n6">{{ $sd_risk->n6 }}</td>
                                    <td class="td_n7">{{ $sd_risk->n7 }}</td>
                                    <td class="td_n8">{{ $sd_risk->n8 }}</td>
                                    <td class="td_n9">{{ $sd_risk->n9 }}</td>
                                    <td class="td_n10">{{ $sd_risk->n10 }}</td>
                                    <td class="td_nd">{{ $sd_risk->ND() }}</td>
                                    <td class="td_ventilation">{{ $sd_risk->ventilation }}</td>
                                    <td class="td_concentration">{{ $sd_risk->concentration }}</td>
                                    <td class="td_time">{{ $sd_risk->time }}</td>
                                    <td class="td_protection">{{ $sd_risk->protection }}</td>
                                    <td class="td_ir">{{ $sd_risk->IR() }}</td>
                                    <td class="td_equipement">
                                        <ul>
                                            @foreach($sd_risk->sd_restraints_exist as $sd_restraint)
                                                <li>{{ $sd_restraint->name }}</li>
                                            @endforeach
                                            @if(count($sd_risk->sd_restraints_exist) === 0)
                                                <li>Néant</li>
                                            @endif
                                        </ul>
                                    </td>
                                    <td class="td_RR">{{ $sd_risk->RR() }}</td>
                                    <td class="td_criticality">{{ $sd_risk->criticality() }}</td>
                                    <td class="td_restraint_exist">
                                        <ul>
                                            @foreach($sd_risk->sd_restraints_exist as $sd_restraint)
                                                <li>{{ $sd_restraint->name }}</li>
                                            @endforeach
                                            @if(count($sd_risk->sd_restraints_exist) === 0)
                                                <li>Néant</li>
                                            @endif
                                        </ul>
                                    </td>
                                    <td class="td_actions"></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="/js/app/risk.js"></script>
@endsection
