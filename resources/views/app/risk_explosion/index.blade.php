@extends('app')

@section('content')
    <div class="content">
        <div class="card card--work_units">
            <div class="card-body">
                <div class="container-table-risk-explosion">
                    <table class="table table--risk-explosion">
                        <thead>
                            <tr>
                                <th class="th_material_explosion">Matière explosible</th>
                                <th class="th_features">Caractéristiques phases H</th>
                                <th class="th_material_setup">Matériel Installation</th>
                                <th class="th_source_clean">Source de dégagement</th>
                                <th class="th_degree_clean">Degré de dégagement</th>
                                <th class="th_degree_ventilation">Degré de ventilation</th>
                                <th class="th_availability_ventilation">Disponibilité de la ventilation</th>
                                <th class="th_size_area">Volume de la zone</th>
                                <th class="th_gas">Gaz</th>
                                <th class="th_dust">Poussière</th>
                                <th class="th_spawn_probability">Probabilité d'apparition</th>
                                <th class="th_restraint_exist">Moyens de prévention existants</th>
                                <th class="th_prevention_probability">Probabilité avec prévention</th>
                                <th class="th_criticality">Criticité</th>
                                <th class="th_restraint">Mesures de prévention et de protection proposées</th>
                                <th class="th_actions"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($sd_risks as $sd_risk)
                                <tr>
                                    <td class="td_material_explosion"></td>
                                    <td class="td_features"></td>
                                    <td class="td_material_setup"></td>
                                    <td class="td_source_clean"></td>
                                    <td class="td_degree_clean"></td>
                                    <td class="td_deree_ventilation"></td>
                                    <td class="td_availability_ventilation"></td>
                                    <td class="td_size_area"></td>
                                    <td class="td_gas"></td>
                                    <td class="td_dust"></td>
                                    <td class="td_spawn_probability"></td>
                                    <td class="td_restraint_exist">
                                        <ul>
                                            @foreach($sd_risk->sd_restraints_exist as $sd_restraint)
                                                <li>{{ $sd_restraint->name }}</li>
                                            @endforeach
                                            @if(count($sd_risk->sd_restraints_exist) === 0)
                                                <li>Néant</li>
                                            @endif
                                            <li class="add-restraint">
                                                <button type="button" class="btn-add-restraint">+ Ajouter</button>
                                            </li>
                                        </ul>
                                    </td>
                                    <td class="td_prevention_probability"></td>
                                    <td class="td_restraint"></td>
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
