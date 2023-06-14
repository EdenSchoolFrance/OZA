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
                            <th class="th_restraint">Mesure(s) réalisée(s)</th>
                            <th class="th_date">Date de réalisation</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($sd_restraints_archived as $sd_restraint_archived)
                            <tr>
                                <td class="td_work_unit">{{ $sd_restraint_archived->sd_work_unit_name }}</td>
                                <td class="td_danger">{{ $sd_restraint_archived->danger_name }}</td>
                                <td class="td_risk">{{ $sd_restraint_archived->sd_risk_name }}</td>
                                <td class="td_restraint">{{ $sd_restraint_archived->name }}</td>
                                <td class="td_date">{{ date("d/m/Y", strtotime($sd_restraint_archived->date)) }}</td>
                            </tr>
                        @endforeach

                        @if (count($sd_restraints_archived) == 0)
                            <tr class="no-data no-data--centered">
                                <td colspan="5">Aucune mesure archivée</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="/js/app/restraint.js"></script>
@endsection
