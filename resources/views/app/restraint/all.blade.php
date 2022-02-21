@extends('app')

@section('content')
    <div class="content">
        <div class="card card--work_units">
            <div class="card-body">
                <table class="table table--restraint table-sortable">
                    <thead>
                        <tr>
                            <th class="th_work_unit th-sort">Unité de travail</th>
                            <th class="th_danger th-sort">Danger</th>
                            <th class="th_risk th-sort">Risque</th>
                            <th class="th_restraint th-sort">Mesure</th>
                            <th class="th_date th-sort">Date</th>
                            <th class="th_rr th-sort">RR</th>
                            <th class="th_infos th-sort">Infos</th>
                            <th class="th_types th-sort">Types</th>
                            @if (!Auth::user()->hasPermission('READER'))
                                <th class="th_actions"></th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($sd_risks as $sd_risk)
                            @foreach ($sd_risk->sd_restraints as $sd_restraint)
                                <tr>
                                    <td class="td_work_unit">{{ $sd_risk->sd_work_unit ? $sd_risk->sd_work_unit->name : "UT Tous" }}</td>
                                    <td class="td_danger">{{ $sd_risk->sd_danger->danger->name }}</td>
                                    <td class="td_risk">{{ $sd_risk->name }}</td>
                                    <td class="td_restraint">
                                        {{ $sd_restraint->name }}
                                    </td>
                                    <td class="td_date">
                                        {{ $sd_restraint->date ?  : "Aucune données" }}
                                    </td>
                                    <td class="td_rr">
                                        <button class="btn {{ $sd_risk->color($sd_risk->totalRR($sd_risk->sd_restraints)) }} btn-small">{{ $sd_risk->totalRR($sd_risk->sd_restraints) }}</button>
                                    </td>
                                    <td class="td_infos">
                                        <ul>
                                            <li>T : {{ $sd_restraint->technical ?  : "Aucune données" }}</li>
                                            <li>O : {{ $sd_restraint->organizational ?  : "Aucune données" }}</li>
                                            <li>H : {{ $sd_restraint->human ?  : "Aucune données" }}</li>
                                        </ul>
                                    </td>
                                    <td>
                                        {{ $sd_restraint->exist === 1 ? "Mesure existante" : "Mesure proposée" }}
                                    </td>
                                    @if (!Auth::user()->hasPermission('READER'))
                                        <td class="td_actions">
                                            <a href="{{ route('risk.edit', [$single_document->id,$sd_risk->sd_danger->id,$sd_risk->id]) }}">
                                                <i class="far fa-eye"></i>
                                            </a>
                                        </td>
                                    @endif
                                </tr>
                            @endforeach
                        @endforeach

                        @if (count($sd_risks) == 0)
                            <tr class="no-data no-data--centered">
                                <td colspan="{{ !Auth::user()->hasPermission('READER') ? 6 : 5 }}">Aucun mesure</td>
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
    @if(old('id_restraint'))
        <script>
            let id = '{{ old('id_restraint') }}'
            $('a[data-id="'+id+'"]',document, 0).click();
        </script>
    @endif
@endsection
