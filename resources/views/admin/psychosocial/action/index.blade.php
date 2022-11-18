@extends('app')

@section('content')
    <div class="content">
        {{--{{ route('risk_psycho.action.store', [$single_document->id, $psychosocial_group->id]) }}--}}
        <form action="#"  method="post">
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
                                        Aucune données
                                    </td>
                                </tr>
                            @endif
                            @foreach($responses as $response)
                                <tr data-order="{{ $response->question->order }}">
                                    <td rowspan="{{ count($response->restraints) + 1 }}" class="td_question">{{ $response->question->order }}. {{ $response->question->info }}</td>
                                    <td rowspan="{{ count($response->restraints) + 1 }}" class="td_priority"><button type="button" class="btn btn-small {{ $response->priority()["class"] }}">{{ $response->priority()["text"] }}</button></td>
                                    <td class="td_restraint">{{ $response->restraints[0]->text }}</td>
                                    <td class="td_decision"></td>
                                    <td class="td_date"></td>
                                </tr>
                                @foreach($response->restraints as $key => $restraint)
                                    @php
                                        $key++;
                                    @endphp
                                    <tr>
                                        <td class="td_restraint">{{ $restraint->text }}</td>
                                        <td class="td_decision"></td>
                                        <td class="td_date"></td>
                                    </tr>
                                @endforeach
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card card--submit card--submit-danger">
                <div class="card-body">
                    <button type="submit" data-value="true" class="btn btn-success btn-submit">VALIDER LE QUESTIONNAIRE</button>
                    <button type="submit" data-value="false" class="btn btn-text btn-submit">Enregistrer le brouillon</button>
                </div>
            </div>
        </form>
    </div>

@endsection

@section('script')
    <script src="/js/app/risk_psycho.js"></script>
@endsection
