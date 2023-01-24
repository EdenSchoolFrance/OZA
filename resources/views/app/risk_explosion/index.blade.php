@extends('app')

@section('content')
    <div class="content">
        <div class="card card--work_units">
            <div class="card-body">
                <table class="table table--risk-explosion">
                    <thead>
                        <tr>
                            <th class="th_material_explosion"></th>
                            <th class="th_features"></th>
                            <th class="th_material_setup"></th>
                            <th class="th_source_clean"></th>
                            <th class="th_degree_clean"></th>
                            <th class="th_degree_ventilation"></th>
                            <th class="th_availability_ventilation"></th>
                            <th class="th_size_area"></th>
                            <th class="th_gas"></th>
                            <th class="th_dust"></th>
                            <th class="th_spawn_probability"></th>
                            <th class="th_restraint_exist"></th>
                            <th class="th_prevention_probability"></th>
                            <th class="th_criticality"></th>
                            <th class="th_restraint"></th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="/js/app/risk.js"></script>
@endsection
