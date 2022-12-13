@extends('app')

@section('content')
    <div class="content">
        <form action="{{ route('risk_psycho.restraint.store', [$single_document->id, $psychosocial_group->id]) }}"  method="post">
            <div class="card card--add-risk">
                @csrf
                <div class="card-body">

                    <table class="table table--work_units">
                        <thead>
                            <tr>
                                <th class="td_question" style="width: 30%">Famille de facteurs</th>
                                <th class="th_intensity_level" style="width: 10%">Niveau <br> d’intensité</th>
                                <th class="th_extreme" style="width: 10%">Réponses <br> extrêmes</th>
                                <th class="th_priority" style="width: 10%">Priorité <br> d’action</th>
                                <th class="th_restraint" style="width: 40%">Mesure(s) de prévention et de protection à mettre en place</th>
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
                            @php
                                $help = true;
                                foreach ($responses as $response){
                                    if (isset($response->restraints[0])) $help = false;
                                }
                            @endphp
                            @foreach($responses as $response)
                                <tr data-order="{{ $response->question->order }}">
                                    <td class="td_question">{{ $response->question->order }}. {{ $response->question->info }}</td>
                                    <td class="td_intensity_level">{{ $response->intensity() }}</td>
                                    <td class="td_extreme">{{ $response->extreme() }}</td>
                                    <td class="td_priority"><button type="button" class="btn btn-small {{ $response->priority()["class"] }}">{{ $response->priority()["text"] }}</button></td>
                                    <td class="td_restraint">
                                        @if(count($response->question->restraints) === 0)
                                            <ul class="nothing_restraint_pro">
                                                <li>
                                                    Aucune mesure proposée
                                                </li>
                                            </ul>
                                        @endif
                                        <ul class="restraint-proposed">
                                            @if($help === true)
                                                @foreach($response->question->restraints as $restraint)
                                                    <li class="res-pro">
                                                        <input type="checkbox" class="btn-check" data-id="{{ $response->id }}" data-tab="{{ $restraint->id }}">
                                                        <textarea class="form-control auto-resize" placeholder="" name="restraint_proposed_{{ $response->id }}[not-checked][{{ $restraint->id }}][]">{{ $restraint->text }}</textarea>
                                                    </li>
                                                @endforeach
                                            @endif
                                            @foreach($response->restraints as $restraint)
                                                <li class="res-pro">
                                                    <input type="checkbox" class="btn-check" data-id="{{ $response->id }}" {{$restraint->checked === 1 ? 'checked' : ''}} data-tab="{{ $restraint->id }}">
                                                    <textarea class="form-control auto-resize" placeholder="" name="restraint_proposed_{{ $response->id }}[{{$restraint->checked === 1 ? 'checked' : 'not-checked'}}][{{ $restraint->id }}][]">{{ $restraint->text }}</textarea>
                                                    <button type="button" class="btn btn-text btn-small btn-delete-restraint"><i class="far fa-times-circle"></i></button>
                                                </li>
                                            @endforeach
                                            <li>
                                                <button class="btn btn-yellow btn-text btn-add-restraint" data-id="{{ $response->id }}" type="button">+ Ajouter une mesure proposée</button>
                                            </li>
                                            @error('restraint_proposed')
                                            <li>
                                                <p class="message-error">{{ $message }}</p>
                                            </li>
                                            @enderror
                                        </ul>
                                    </td>
                                </tr>
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
