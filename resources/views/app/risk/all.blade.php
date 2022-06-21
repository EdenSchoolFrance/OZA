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
                            <th class="th_risk th-sort">Risque identifié</th>
                            <th class="th_rb th-sort">RB</th>
                            <th class="th_existing_measure th-sort">Mesure existante</th>
                            <th class="th_rr th-sort">RR</th>
                            <th class="th_criticality th-sort">Criticité</th>
                            <th class="th_proposed_measure th-sort">Mesure proposée</th>
                            @if (!Auth::user()->hasPermission('READER'))
                                <th class="th_actions"></th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($sd_risks as $sd_risk)
                            <tr>
                                <td class="td_work_unit">{{ $sd_risk->sd_work_unit ? $sd_risk->sd_work_unit->name : "UT Tous" }}</td>
                                <td class="td_danger">{{ $sd_risk->sd_danger->danger->name }}</td>
                                <td class="td_risk">
                                    <p>{{ $sd_risk->name }}</p>
                                </td>
                                <td class="td_rb" data-sort="{{ floor($sd_risk->total()) }}">
                                    <button class="btn {{ $sd_risk->color($sd_risk->total()) }} btn-small">{{ $sd_risk->total() }}</button>
                                    <div class="list list--text">
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
                                        <div class="list-row">
                                            <p class="list-point list-point--text">ID</p>
                                            <p class="list-text">{{ $sd_risk->translate($sd_risk->impact,'impact') }}</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="td_existing_measure">
                                    <div class="list">
                                        @foreach($sd_risk->sd_restraints_exist as $restraint)
                                            <div class="list-row">
                                                <div class="list-point list-point--success"></div>
                                                <p class="list-text">{{ $restraint->name }}</p>
                                            </div>
                                        @endforeach
                                    </div>
                                </td>
                                <td class="td_rr" data-sort="{{ $sd_risk->totalRR($sd_risk->sd_restraints) }}">
                                    <button class="btn {{ $sd_risk->color($sd_risk->totalRR($sd_risk->sd_restraints)) }} btn-small">{{ $sd_risk->totalRR($sd_risk->sd_restraints) }}</button>
                                </td>
                                <td class="td_criticality" data-sort="{{ $sd_risk->totalRR($sd_risk->sd_restraints) }}">
                                    <button type="button" class="btn {{ $sd_risk->color(($sd_risk->totalRR($sd_risk->sd_restraints))) }} btn-small">{{ $sd_risk->colorTotal($sd_risk->totalRR($sd_risk->sd_restraints)) }}</button>
                                </td>
                                <td class="td_proposed_measure">
                                    <div class="list">
                                        @foreach($sd_risk->sd_restraints_porposed as $restraint)
                                            <div class="list-row">
                                                <div class="list-point list-point--yellow"></div>
                                                <p class="list-text">{{ $restraint->name }}</p>
                                            </div>
                                        @endforeach
                                    </div>
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

                        @if (count($sd_risks) == 0)
                            <tr class="no-data no-data--centered">
                                <td colspan="{{ !Auth::user()->hasPermission('READER') ? 9 : 8 }}">Aucun mesure</td>
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
