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
                            <th class="th_restraint">Mesure(s) proposée(s)</th>
                            <th class="th_date">Date de réalisation</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($sd_risks as $sd_risk)
                            @foreach ($sd_risk->sd_restraints_archived as $sd_restraint)
                                @if ($sd_restraint->id === $sd_risk->sd_restraints_archived[0]->id)
                                    <tr>
                                        <td class="td_work_unit">{{ $sd_risk->sd_work_unit ? $sd_risk->sd_work_unit->name : 'UT Tous' }}</td>
                                        <td class="td_danger">{{ $sd_risk->sd_danger->danger->name }}</td>
                                        <td class="td_risk">{{ $sd_risk->name }}</td>
                                        <td class="td_restraint">{{ $sd_restraint->name }}</td>
                                        <td class="td_date">{{ date("d/m/Y", strtotime($sd_restraint->date)) }}</td>
                                    </tr>
                                @else
                                    <tr>
                                        <td class="td_none"></td>
                                        <td class="td_none"></td>
                                        <td class="td_none"></td>
                                        <td class="td_restraint">{{ $sd_restraint->name }}</td>
                                        <td class="td_date">{{ date("d/m/Y", strtotime($sd_restraint->date)) }}</td>
                                    </tr>
                                @endif
                            @endforeach
                        @endforeach

                        @if (count($sd_risks) == 0)
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
