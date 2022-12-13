@extends('app')

@section('content')
    <div class="content">
        {{--{{ route('risk_psycho.action.store', [$single_document->id, $psychosocial_group->id]) }}--}}
        @if($psychosocial_group->validated === 1)
            <div class="card card--add-risk">
                @csrf
                <div class="card-body">

                    <table class="table table--work_units">
                        <thead>
                            <tr>
                                <th class="td_question" style="width: 25%">Famille de facteurs</th>
                                <th class="th_priority" style="width: 10%">Priorité <br> d’action</th>
                                <th class="th_restraint" style="width: 40%">Mesure(s) de prévention et de protection à mettre en place</th>
                                <th class="th_decision" style="width: 10%">Décision</th>
                                <th class="th_date" style="width: 10%">Date de réalisation</th>
                                <th class="th_actions"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(count($responses) === 0)
                                <tr class="no-data no-data--centered">
                                    <td colspan="{{ 6 }}">
                                        Aucune donnée
                                    </td>
                                </tr>
                            @endif
                            @foreach($responses as $response)
                                @php
                                    $pass = true;
                                    if ($response->priority()['text'] === "Non concerné" || $response->priority()['text'] === "Faible"){
                                        $response->restraints()->delete();
                                        $pass = false;
                                    }
                                @endphp
                                @if($pass)
                                    <tr data-order="{{ $response->question->order }}">
                                        <td rowspan="{{ count($response->restraints) + 1 }}" class="td_question">{{ $response->question->order }}. {{ $response->question->info }}</td>
                                        <td rowspan="{{ count($response->restraints) + 1 }}" class="td_priority"><button type="button" class="btn btn-small {{ $response->priority()["class"] }}">{{ $response->priority()["text"] }}</button></td>
                                    </tr>
                                    @foreach($response->restraints as $key => $restraint)
                                        @php
                                            $key++;
                                        @endphp
                                        <tr>
                                            <td class="td_restraint">{{ $restraint->text }}</td>
                                            <td class="td_decision">{{ $restraint->decision }}</td>
                                            <td class="td_date">{{ $restraint->date ? date("d/m/Y", strtotime($restraint->date)) : "" }}</td>
                                            <td class="td_actions">
                                                <button type="button" data-modal=".modal--restraint" data-id="{{ $restraint->id }}" data-title="{{ $restraint->text }}" @if($restraint->date) data-date="{{ $restraint->date }}" data-decision="{{ $restraint->decision }}" @endif><i class="far fa-edit" data-tooltip=".tooltip--edit" data-placement="top" data-tooltable="true"></i></button>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                            @endforeach
                            @if($psychosocial_group->employee > 0)
                                <tr>
                                    <td class="td_question" colspan="2">Présence de salariés en souffrance</td>
                                    <td class="td_restraint" colspan="3">Informer le médecin du travail de cette situation afin qu'il puisse intégrer cette problématique dans ses actions de prévention.</td>
                                    <td class="td_actions"></td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        @else
            <div class="card card--no-work-unit">
                <div class="card-body">
                    <div class="row row--center">
                        <h1 class="text-color-yellow">Le plan d’action n’est pas encore disponible.</h1>
                    </div>
                </div>
{{--                <div class="card-body">--}}
{{--                    <div class="row row--center">--}}
{{--                        <a href="{{ route('work.index', [$single_document->id]) }}" class="btn btn-yellow">Unité de travail</a>--}}
{{--                    </div>--}}
{{--                </div>--}}
            </div>
        @endif

        <div class="modal modal--restraint modal-add-risk">
            <div class="modal-dialog modal-dialog-large">
                <form class="modal-content" action="{{ route('risk_psycho.action.store', [$single_document->id, $psychosocial_group->id]) }}" method="POST">
                    @csrf
                    <input type="hidden" name="id" value="">
                    <div class="modal-header">
                        <p class="title">Mettre à jour le plan d’action</p>
                        <button type="button" class="btn-close" data-dismiss="modal"><i class="fas fa-times"></i></button>
                    </div>
                    <div class="modal-body">
                        <p style="margin: 25px 0"></p>
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
                            <div class="line">
                                <div class="left">
                                    <label for="nameRisk">Décisions</label>
                                </div>
                                <div class="right">
                                    <textarea class="form-control auto-resize title-restraint" name="decision_restraint" placeholder="Commentaires"></textarea>
                                    @error('decision_restraint')
                                        <p class="message-error">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="line">
                                <div class="left">
                                </div>
                                <div class="right">
                                    <button type="submit" class="btn btn-success">Valider la mise à jour</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="tooltip tooltip--edit">
            <p>Modifier la mesure</p>
        </div>
    </div>

@endsection

@section('script')
    <script src="/js/app/risk_psycho.js"></script>
@endsection
