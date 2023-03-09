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
                                    <td class="td_material_explosion"><input type="text" value="{{$sd_risk->material_explosion}}" disabled style="border: none; background-color: #fff"></td>
                                    <td class="td_features">
                                        <select disabled style="border: none; color: #000">
                                            <option>{{$sd_risk->features}}</option>
                                        </select>
                                    </td>
                                    <td class="td_material_setup"><textarea disabled style="border: none; resize: none">{{$sd_risk->material_setup}}</textarea></td>
                                    <td class="td_source_clean"><input type="text" value="{{$sd_risk->source_clean}}" disabled style="border: none; background-color: #fff"></td>
                                    <td class="td_degree_clean">
                                        <select disabled style="border: none; color: #000">
                                            <option>{{$sd_risk->degree_clean}}</option>
                                        </select>
                                    </td>
                                    <td class="td_deree_ventilation">
                                        <select disabled style="border: none; color: #000">
                                            <option>{{$sd_risk->degree_ventilation}}</option>
                                        </select>
                                    </td>
                                    <td class="td_availability_ventilation">
                                        <select disabled style="border: none; color: #000">
                                            <option>{{$sd_risk->availability_ventilation}}</option>
                                        </select>
                                    </td>
                                    <td class="td_size_area">
                                        <select  style="color: #000; width: 100px;">
                                            <option>{{$sd_risk->size_area}}</option>
                                        </select>
                                    </td>
                                    <td class="td_gas">
                                        <select disabled style="color: #000;">
                                            <option>{{$sd_risk->gas}}</option>
                                        </select>
                                    </td>
                                    <td class="td_dust">
                                        <select disabled style="color: #000;">
                                            <option>{{$sd_risk->dust}}</option>
                                        </select>
                                    </td>
                                    <td class="td_spawn_probability">
                                        <select disabled style="color: #000;">
                                            <option>{{$sd_risk->spawn_probability}}</option>
                                        </select>
                                    </td>
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
                                    <td class="td_prevention_probability">
                                        <select disabled style="color: #000;">
                                            <option style="line-height: 100px">{{$sd_risk->prevention_probability}}</option>
                                        </select>
                                    </td>
                                    <td></td>
                                    <td class="td_actions">
                                        <div>
                                            <a data-modal=".modal--delete" data-risk="{{ $sd_risk->id }}"><i class="fas fa-trash"></i></a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <a href="#" class="btn btn-yellow" style="margin-top: 10px;"><i class="fas fa-plus"></i> AJOUTER UN RISQUE</a>
            </div>
        </div>
        <div class="modal modal--delete">
            <div class="modal-dialog">
                <form class="modal-content" action="{{ route('risk.explosion.delete', [$single_document->id]) }}" method="POST">
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
@endsection

@section('script')
    <script src="/js/app/risk.js"></script>
@endsection
