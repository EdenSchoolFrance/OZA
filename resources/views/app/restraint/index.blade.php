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
                            <th class="th_evaluation th-sort th-sort-asc">Criticité</th>
                            <th class="th_restraint th-sort">Mesure(s) proposée(s)</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($sd_risks as $sd_risk)
                            <tr>
                                <td class="td_work_unit" data-sort="{{ $sd_risk->sd_work_unit ? $sd_risk->sd_work_unit->name : "UT Tous" }} {{ $sd_risk->sd_danger->danger->name }}">{{ $sd_risk->sd_work_unit ? $sd_risk->sd_work_unit->name : "UT Tous" }}</td>
                                <td class="td_danger">{{ $sd_risk->sd_danger->danger->name }}</td>
                                <td class="td_risk">{{ $sd_risk->name }}</td>
                                <td class="td_evaluation" data-sort="{{ isset($sd_risk->sd_restraints_exist[0]) ? $sd_risk->totalRR($sd_risk->sd_restraints_exist) : $sd_risk->total() }}">
                                    <div class="list list--text list--space">
                                        <div class="list-row">
                                            <p class="list-point list-point--text">RR</p>
                                            <button class="btn {{ $sd_risk->color( isset($sd_risk->sd_restraints_exist[0]) ? $sd_risk->totalRR($sd_risk->sd_restraints_exist) : $sd_risk->total(),false) }} btn-small">{{ isset($sd_risk->sd_restraints_exist[0]) ? ($sd_risk->totalRR($sd_risk->sd_restraints_exist) === 0 ? $sd_risk->total() : $sd_risk->totalRR($sd_risk->sd_restraints_exist)) : $sd_risk->total() }}</button>
                                        </div>
                                        <div class="list-row">
                                            <p class="list-point list-point--text">C</p>
                                            <button type="button" class="btn {{ $sd_risk->colorC(isset($sd_risk->sd_restraints_exist[0]) ? $sd_risk->totalRR($sd_risk->sd_restraints_exist) : $sd_risk->total(),false) }} btn-small">{{ isset($sd_risk->sd_restraints_exist[0]) ? $sd_risk->colorTotal($sd_risk->totalRR($sd_risk->sd_restraints),false) : $sd_risk->colorTotal($sd_risk->total(),true) }}</button>
                                        </div>
                                    </div>
                                </td>
                                <td class="td_restraint">
                                    @foreach ($sd_risk->sd_restraints_porposed as $sd_restraint)
                                        <div>
                                            {{ $sd_restraint->name }}
                                            @if (!Auth::user()->hasPermission('READER'))
                                                <a data-modal=".modal--restraint" data-id="{{ $sd_restraint->id }}" data-name="{{ $sd_restraint->name }}">
                                                    <i class="far fa-edit"></i>
                                                </a>
                                            @endif
                                        </div>
                                    @endforeach
                                </td>
                            </tr>
                        @endforeach

                        @if (count($sd_risks) == 0)
                            <tr class="no-data no-data--centered">
                                <td colspan="{{ !Auth::user()->hasPermission('READER') ? 6 : 5 }}">Aucun mesure à prendre</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>

        <div class="modal modal--restraint modal-add-risk @if(old('id_restraint') || old('date_restraint') || old('tech') || old('orga') || old('human'))  @endif">
            <div class="modal-dialog modal-dialog-large">
                <form action="{{ route('restraint.store', [$single_document->id]) }}" method="post" class="modal-content">
                    @csrf
                    <input type="hidden" name="id_restraint" value="">
                    <div class="modal-header">
                        <p class="title">Mettre à jour la mesure</p>
                        <button type="button" class="btn-close" data-dismiss="modal"><i class="fas fa-times"></i></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="line">
                                <div class="left">
                                    <label for="nameRisk">Rappel de la mesure</label>
                                </div>
                                <div class="right">
                                    <textarea id="nameRisk" class="form-control auto-resize title-restraint" name="name_restraint" placeholder="Décrire la mesure mise à jour"></textarea>
                                    @error('name_restraint')
                                        <p class="message-error">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="line">
                                <div class="left">
                                    <label for="nameRisk">Date de mise en place</label>
                                </div>
                                <div class="right">
                                    <input type="date" class="form-control" name="date_restraint" placeholder="JJ/MM/AAAA" value="{{ old('date_restraint') }}">
                                    @error('date_restraint')
                                        <p class="message-error">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="line">
                                <div class="left">
                                    <h3>Nouvelle évaluation de la mesure décrite</h3>
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
                                                <input type="radio" name="tech" value="null" @if(old('tech')){{ old('tech') === 'null' ? 'checked' : '' }}@endif>
                                                <span class="checkmark"></span>
                                            </label>
                                            <label class="con">
                                                <input type="radio" name="tech" value="medium" @if(old('tech')){{ old('tech') === 'medium' ? 'checked' : '' }}@endif>
                                                <span class="checkmark"></span>
                                            </label>
                                            <label class="con">
                                                <input type="radio" name="tech" value="good" @if(old('tech')){{ old('tech') === 'good' ? 'checked' : '' }}@endif>
                                                <span class="checkmark"></span>
                                            </label>
                                            <label class="con">
                                                <input type="radio" name="tech" value="very good" @if(old('tech')){{ old('tech') === 'very good' ? 'checked' : '' }}@endif>
                                                <span class="checkmark"></span>
                                            </label>
                                        </div>
                                        <div class="radio-title">
                                            <label>Inexistante</label>
                                            <label>Moyen</label>
                                            <label>Bon</label>
                                            <label>Très bon</label>
                                        </div>
                                        @error('tech')
                                            <p class="message-error">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <i class="far fa-question-circle" data-tooltip=".tooltip--restraint-tech" data-placement="left"></i>
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
                                                <input type="radio" name="orga" value="null" @if(old('orga')){{ old('orga') === 'null' ? 'checked' : '' }}@endif>
                                                <span class="checkmark"></span>
                                            </label>
                                            <label class="con">
                                                <input type="radio" name="orga" value="medium" @if(old('orga')){{ old('orga') === 'medium' ? 'checked' : '' }}@endif>
                                                <span class="checkmark"></span>
                                            </label>
                                            <label class="con">
                                                <input type="radio" name="orga" value="good" @if(old('orga')){{ old('orga') === 'good' ? 'checked' : '' }}@endif>
                                                <span class="checkmark"></span>
                                            </label>
                                            <label class="con">
                                                <input type="radio" name="orga" value="very good" @if(old('orga')){{ old('orga') === 'very good' ? 'checked' : '' }}@endif>
                                                <span class="checkmark"></span>
                                            </label>
                                        </div>
                                        <div class="radio-title">
                                            <label>Inexistante</label>
                                            <label>Moyen</label>
                                            <label>Bon</label>
                                            <label>Très bon</label>
                                        </div>
                                        @error('orga')
                                        <p class="message-error">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <i class="far fa-question-circle" data-tooltip=".tooltip--restraint-orga" data-placement="left"></i>
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
                                                <input type="radio" name="human" value="null" @if(old('human')){{ old('human') === 'null' ? 'checked' : '' }}@endif>
                                                <span class="checkmark"></span>
                                            </label>
                                            <label class="con">
                                                <input type="radio" name="human" value="medium" @if(old('human')){{ old('human') === 'medium' ? 'checked' : '' }}@endif>
                                                <span class="checkmark"></span>
                                            </label>
                                            <label class="con">
                                                <input type="radio" name="human" value="good" @if(old('human')){{ old('human') === 'good' ? 'checked' : '' }}@endif>
                                                <span class="checkmark"></span>
                                            </label>
                                            <label class="con">
                                                <input type="radio" name="human" value="very good" @if(old('human')){{ old('human') === 'very good' ? 'checked' : '' }}@endif>
                                                <span class="checkmark"></span>
                                            </label>
                                        </div>
                                        <div class="radio-title">
                                            <label>Inexistante</label>
                                            <label>Moyen</label>
                                            <label>Bon</label>
                                            <label>Très bon</label>
                                        </div>
                                        @error('human')
                                        <p class="message-error">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <i class="far fa-question-circle" data-tooltip=".tooltip--restraint-human" data-placement="left"></i>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="line">
                                <div class="left">
                                </div>
                                <div class="right">
                                    <button type="submit" class="btn btn-success">Mettre à jour</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tooltip tooltip--restraint-tech">
                        <p>Mesure de prévention technique comme par exemple : système de sécurité automatique, machine ou matériel conforme, ...</p>
                    </div>
                    <div class="tooltip tooltip--restraint-orga">
                        <p>Mesure de prévention organisationnelle comme par exemple : respect de la règlementation en vigueur, consigne formalisée, ...</p>
                    </div>
                    <div class="tooltip tooltip--restraint-human">
                        <p>Mesure de prévention humaine comme par exemple : information sensibilisation ou formation du personnel, protection collective et ou individuelle, ...</p>
                    </div>
                </form>
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
