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
                        @foreach($sd_works_units as $sd_work_unit)
                            @foreach($sd_work_unit->sd_dangers as $sd_danger)
                                @foreach($sd_danger->sd_risk as $sd_risk)
                                    @if(count($sd_risk->sd_restraint_porposed) > 0)
                                        @foreach($sd_risk->sd_restraint_porposed as $sd_restraint)
                                            @if($sd_restraint->id === $sd_risk->sd_restraint_porposed[0]->id)
                                                <tr>
                                                    <td class="td_work_unit">{{ $sd_work_unit->name }}</td>
                                                    <td class="td_danger">{{ $sd_danger->danger->name }}</td>
                                                    <td class="td_risk">{{ $sd_risk->name }}</td>
                                                    <td class="td_evaluation">
                                                        <div class="list list--text list--space">
                                                            <div class="list-row">
                                                                <p class="list-point list-point--text">RR</p>
                                                                <button class="btn {{ $sd_risk->color($sd_risk->totalRR($sd_risk->sd_restraint)) }} btn-small">{{ $sd_risk->totalRR($sd_risk->sd_restraint) }}</button></li>
                                                            </div>
                                                            <div class="list-row">
                                                                <p class="list-point list-point--text">C</p>
                                                                <button type="button" class="btn {{ $sd_risk->color(($sd_risk->totalRR($sd_risk->sd_restraint)+$sd_risk->total($sd_risk->frequency,$sd_risk->probability,$sd_risk->gravity))) }} btn-small">{{ $sd_risk->colorTotal(($sd_risk->totalRR($sd_risk->sd_restraint)+$sd_risk->total($sd_risk->frequency,$sd_risk->probability,$sd_risk->gravity))) }}</button></li>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td class="td_restraint">
                                                        {{ $sd_restraint->name }}
                                                    </td>
                                                    <td class="td_actions">
                                                        <a href="#" data-modal=".modal--restraint" data-id="{{ $sd_restraint->id }}" data-name="{{ $sd_restraint->name }}">
                                                            <i class="far fa-edit"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                            @else
                                                <tr>
                                                    <td class="td_none"></td>
                                                    <td class="td_none"></td>
                                                    <td class="td_none"></td>
                                                    <td class="td_none"></td>
                                                    <td class="td_restraint">
                                                        {{ $sd_restraint->name }}
                                                    </td>
                                                    <td class="td_actions">
                                                        <a href="#" data-modal=".modal--restraint" data-id="{{ $sd_restraint->id }}" data-name="{{ $sd_restraint->name }}">
                                                            <i class="far fa-edit"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                            @endif
                                        @endforeach
                                    @endif
                                @endforeach
                            @endforeach
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div class="modal modal--restraint modal-add-risk">
            <div class="modal-dialog modal-dialog-large">
                <form action="{{ route('restraint.store', [$single_document->id]) }}" method="post" class="modal-content">
                    @csrf
                    <input type="hidden" name="id_restraint" value="">
                    <div class="modal-header">
                        <p class="title">Ajouter une nouvelle mesure déjà mise en place</p>
                        <button type="button" class="btn-close" data-dismiss="modal"><i class="fas fa-times"></i></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="line title-restraint">
                                {{--Line for title, set in restraint.js--}}
                            </div>
                        </div>
                        <div class="row">
                            <div class="line">
                                <div class="left">
                                    <label for="nameRisk">Date de mise en place</label>
                                </div>
                                <div class="right">
                                    <input type="date" class="form-control" name="date_restraint" placeholder="JJ/MM/AAAA">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="line">
                                <div class="left">
                                    <h3>Evaluation de la mesure décrite</h3>
                                </div>
                                <div class="right">
                                </div>
                            </div>
                        </div>

                        <div class="row row--radio">
                            <div class="line">
                                <div class="left">
                                    <label>Technique</label>
                                </div>
                                <div class="right">
                                    <div class="radio-bar-content">
                                        <div class="radio-bar radio-bar-tech">
                                            <label class="con">
                                                <input type="radio" name="tech_modal" value="very good" checked>
                                                <span class="checkmark"></span>
                                            </label>
                                            <label class="con">
                                                <input type="radio" name="tech_modal" value="good">
                                                <span class="checkmark"></span>
                                            </label>
                                            <label class="con">
                                                <input type="radio" name="tech_modal" value="medium">
                                                <span class="checkmark"></span>
                                            </label>
                                            <label class="con">
                                                <input type="radio" name="tech_modal" value="null">
                                                <span class="checkmark"></span>
                                            </label>
                                        </div>
                                        <div class="radio-title">
                                            <label>Très bon</label>
                                            <label>Bon</label>
                                            <label>Moyen</label>
                                            <label>Nulle</label>
                                        </div>
                                    </div>
                                    <i class="far fa-question-circle" data-toggle="toolHelp" data-placement="top" title="Vivamus sagittis lacus vel augue laoreet rutrum faucibus."></i>
                                </div>
                            </div>
                        </div>
                        <div class="row row--radio">
                            <div class="line">
                                <div class="left">
                                    <label>Organisationnelle</label>
                                </div>
                                <div class="right">
                                    <div class="radio-bar-content">
                                        <div class="radio-bar radio-bar-orga">
                                            <label class="con">
                                                <input type="radio" name="orga_modal" value="very good" checked>
                                                <span class="checkmark"></span>
                                            </label>
                                            <label class="con">
                                                <input type="radio" name="orga_modal" value="good">
                                                <span class="checkmark"></span>
                                            </label>
                                            <label class="con">
                                                <input type="radio" name="orga_modal" value="medium">
                                                <span class="checkmark"></span>
                                            </label>
                                            <label class="con">
                                                <input type="radio" name="orga_modal" value="null">
                                                <span class="checkmark"></span>
                                            </label>
                                        </div>
                                        <div class="radio-title">
                                            <label>Très bon</label>
                                            <label>Bon</label>
                                            <label>Moyen</label>
                                            <label>Nulle</label>
                                        </div>
                                    </div>
                                    <i class="far fa-question-circle" data-toggle="toolHelp" data-placement="top" title="Vivamus sagittis lacus vel augue laoreet rutrum faucibus."></i>
                                </div>
                            </div>
                        </div>
                        <div class="row row--radio">
                            <div class="line">
                                <div class="left">
                                    <label>Humaine</label>
                                </div>
                                <div class="right">
                                    <div class="radio-bar-content">
                                        <div class="radio-bar radio-bar-human">
                                            <label class="con">
                                                <input type="radio" name="human_modal" value="very good" checked>
                                                <span class="checkmark"></span>
                                            </label>
                                            <label class="con">
                                                <input type="radio" name="human_modal" value="good">
                                                <span class="checkmark"></span>
                                            </label>
                                            <label class="con">
                                                <input type="radio" name="human_modal" value="medium">
                                                <span class="checkmark"></span>
                                            </label>
                                            <label class="con">
                                                <input type="radio" name="human_modal" value="null">
                                                <span class="checkmark"></span>
                                            </label>
                                        </div>
                                        <div class="radio-title">
                                            <label>Très bon</label>
                                            <label>Bon</label>
                                            <label>Moyen</label>
                                            <label>Nulle</label>
                                        </div>
                                    </div>
                                    <i class="far fa-question-circle" data-toggle="toolHelp" data-placement="top" title="Vivamus sagittis lacus vel augue laoreet rutrum faucibus."></i>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="line">
                                <div class="left">
                                </div>
                                <div class="right">
                                    <button type="submit" class="btn btn-success">Ajouter</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>
@endsection

@section('script')
    <script src="/js/app/restraint.js"></script>
@endsection
