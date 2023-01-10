@extends('app')

@section('content')
    @if ($psychosocial_group->validated)
        <div class="card card--psychosocial-evaluation">
            <div class="card-body">
                <div>
                    <p>Nombre de questionnaires exploités : <span>{{ $psychosocial_group->number_quiz }}</span></p>
                </div>
                <div>
                    <p>Niveau de stress moyen (de 0 à 100) : <span>{{ $psychosocial_group->stress_level }}</span></p>
                </div>
            </div>
        </div>

        <div class="card card--psychosocial-evaluation-quiz">
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

                                $never = $response->never;
                                $sometimes = $response->sometimes;
                                $often = $response->often;
                                $always = $response->always;

                                $total = $never + $sometimes + $often + $always;

                                if ($question->order < 13) {
                                    $intensity = ($sometimes * 3.3333) + ($often * 6.6666) + ($always * 10);
                                } else {
                                    $intensity = ($never * 10) + ($sometimes * 6.6666) + ($often * 3.3333);
                                }

                                if ($psychosocial_group->number_quiz > 0) $intensity = ($intensity / $psychosocial_group->number_quiz);

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

                                if ($question->order < 13) {
                                    $extreme = $always;
                                } else {
                                    $extreme = $never;
                                }

                                $extreme_all += $extreme;
                            @endphp
                            <tr data-order="{{ $question->order }}">
                                <td class="td_order">{{ $question->order }}</td>
                                <td class="td_question">{{ $question->info }}</td>
                                <td class="td_never">{{ $never }}</td>
                                <td class="td_sometimes">{{ $sometimes }}</td>
                                <td class="td_often">{{ $often }}</td>
                                <td class="td_always">{{ $always }}</td>
                                <td class="td_total success {{ $psychosocial_group->number_quiz == $total ? 'success' : 'danger' }}">= <span>{{ $total }}</span></td>
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
    @else
        <div class="card">
            <div class="card-body">
                <p>Le tableau n’est pas encore disponible</p>
            </div>
        </div>
    @endif
@endsection

@section('script')
@endsection
