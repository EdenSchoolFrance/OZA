@extends('app')

@section('content')
    <form action="{{ route('risk_psycho.evaluation.store', [$single_document->id, $psychosocial_group->id]) }}" method="POST">
        <input type="hidden" name="checked" value=""/>
        @csrf
        @php
            $number_quiz = old('number_quiz', $psychosocial_group->number_quiz);
            $stress_level = old('stress_level', $psychosocial_group->stress_level);
        @endphp
        <div class="card card--psychosocial-evaluation">
            <div class="card-body">
                <div>
                    <p>Nombre de questionnaires exploités :</p>
                    <div class="btn-group-number">
                        <button type="button" class="btn btn-text btn-num" data-value="less"><i class="fas fa-minus"></i></button>
                        <input type="number" class="form-control" id="number_quiz" name="number_quiz" value="{{ $number_quiz }}" min="0">
                        <button type="button" class="btn btn-text btn-num" data-value="more"><i class="fas fa-plus"></i></button>
                    </div>
                </div>
                @error('number_quiz')
                    <p class="message-error">{{ $message }}</p>
                @enderror
                <div>
                    <p>Niveau de stress moyen (de 0 à 100) :</p>
                    <div class="btn-group-number">
                        <button type="button" class="btn btn-text btn-num" data-value="less"><i class="fas fa-minus"></i></button>
                        <input type="number" class="form-control" id="stress_level" name="stress_level" value="{{ $stress_level }}" min="0" max="100">
                        <button type="button" class="btn btn-text btn-num" data-value="more"><i class="fas fa-plus"></i></button>
                    </div>
                </div>
                @error('stress_level')
                    <p class="message-error">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <div class="card card--psychosocial-evaluation-quiz card--psychosocial-evaluation-quiz-edit">
            <div class="card-body">
                @php
                    $extreme_all = 0;
                @endphp
                <table class="table">
                    <thead>
                        <tr>
                            <th class="th_order"></th>
                            <th class="th_question">Questions</th>
                            <th class="th_never">Jamais <br> Non</th>
                            <th class="th_sometimes">Parfois <br> Plutôt non</th>
                            <th class="th_often">Souvent <br> Plutôt oui</th>
                            <th class="th_always">Toujours <br> Oui</th>
                            <th class="th_total"></th>
                            <th class="th_intensity_level">Niveau <br> d’intensité</th>
                            <th class="th_priority">Priorité <br> d’action</th>
                            <th class="th_extreme">Réponses <br> extrêmes</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($questions as $question)
                            @php
                                $response = $question->response($psychosocial_group->id);

                                $never = old('questions.' . $question->id . '.never', ($response ? $response->never : 0));
                                $sometimes = old('questions.' . $question->id . '.sometimes', ($response ? $response->sometimes : 0));
                                $often = old('questions.' . $question->id . '.often', ($response ? $response->often : 0));
                                $always = old('questions.' . $question->id . '.always', ($response ? $response->always : 0));

                                $total = $never + $sometimes + $often + $always;

                                if ($question->order <= 13) {
                                    $intensity = ($sometimes * 3.3333) + ($often * 6.6666) + ($always * 10);
                                } else {
                                    $intensity = ($never * 10) + ($sometimes * 6.6666) + ($often * 3.3333);
                                }

                                $intensity = number_format($intensity, 1);

                                if ($intensity < 2.5) {
                                    $priority = [
                                        "class" => "btn-success",
                                        "text" => "Non concerné"
                                    ];
                                } elseif ($intensity >= 2.5 && $intensity < 5) {
                                    $priority = [
                                        "class" => "btn-yellow",
                                        "text" => "Faible"
                                    ];
                                } elseif ($intensity >= 5 && $intensity < 7.5) {
                                    $priority = [
                                        "class" => "btn-warning",
                                        "text" => "Modéré"
                                    ];
                                } elseif ($intensity >= 7.5) {
                                    $priority = [
                                        "class" => "btn-danger",
                                        "text" => "Elevé"
                                    ];
                                }

                                if ($question->order <= 13) {
                                    $extreme = $always;
                                } else {
                                    $extreme = $never;
                                }

                                $extreme_all += $extreme;
                            @endphp
                            <tr data-order="{{ $question->order }}">
                                <td class="td_order">{{ $question->order }}</td>
                                <td class="td_question">{{ $question->info }}</td>
                                <td class="td_never">
                                    <input type="number" class="form-control" name="questions[{{ $question->id }}][never]" value="{{ $never }}" min="0">
                                    @error('questions.*.never')
                                        <p class="message-error">{{ $message }}</p>
                                    @enderror
                                </td>
                                <td class="td_sometimes">
                                    <input type="number" class="form-control" name="questions[{{ $question->id }}][sometimes]" value="{{ $sometimes }}" min="0">
                                    @error('questions.*.sometimes')
                                        <p class="message-error">{{ $message }}</p>
                                    @enderror
                                </td>
                                <td class="td_often">
                                    <input type="number" class="form-control" name="questions[{{ $question->id }}][often]" value="{{ $often }}" min="0">
                                    @error('questions.*.often')
                                        <p class="message-error">{{ $message }}</p>
                                    @enderror
                                </td>
                                <td class="td_always">
                                    <input type="number" class="form-control" name="questions[{{ $question->id }}][always]" value="{{ $always }}" min="0">
                                    @error('questions.*.always')
                                        <p class="message-error">{{ $message }}</p>
                                    @enderror
                                </td>
                                <td class="td_total success {{ $number_quiz == $total ? 'success' : 'danger' }}">= <span>{{ $total }}</span></td>
                                <td class="td_intensity_level">{{ $intensity }}</td>
                                <td class="td_priority"><button type="button" class="btn btn-small {{ $priority["class"] }}">{{ $priority["text"] }}</button></td>
                                <td class="td_extreme">{{ $extreme }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="9">Nombre de salariés en souffrance</td>
                            <td class="td_extreme_all">{{ $extreme_all }}</td>
                        </tr>
                    </tfoot>
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
@endsection

@section('script')
    <script src="/js/app/psychosocial/evaluation.js"></script>
@endsection
