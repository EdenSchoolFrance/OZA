@extends('app')

@section('content')
    <div class="content">
        <form action="{{ route('admin.help.risk_psycho.store') }}" class="card card--work_units" method="post">
            @csrf
            <div class="card-header"></div>
            <div class="card-body">

                <table class="table table--work_units">
                    <thead>
                        <tr>
                            <th class="td_question">Famille de facteurs</th>
                            <th class="th_restraint">Mesure(s) de prévention et de protection à mettre en place</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(count($questions) === 0)
                            <tr class="no-data no-data--centered">
                                <td colspan="{{ 3 }}">
                                    Aucun risque
                                </td>
                            </tr>
                        @endif
                        @foreach($questions as $question)
                            <tr data-order="{{ $question->order }}">
                                <td class="td_question">{{ $question->order }}. {{ $question->info }}</td>
                                <td class="td_restraint res-pro">
                                    @if(count($question->restraint) === 0)
                                        <ul class="nothing_restraint_pro">
                                            <li>
                                                Aucune mesure proposée
                                            </li>
                                        </ul>
                                    @endif
                                    <ul class="restraint-proposed">
                                        @foreach($question->restraints as $restraint)
                                            <li>
                                                <button type="button" class="btn btn-text btn-small btn-delete-restraint"><i class="far fa-times-circle"></i></button>
                                                <textarea class="form-control auto-resize" placeholder="" name="restraint_proposed_{{ $question->id }}[]">{{ $restraint->text }}</textarea>
                                            </li>
                                        @endforeach
                                        <li>
                                            <button class="btn btn-yellow btn-text btn-add-restraint" data-list="" type="button">+ Ajouter une mesure proposée</button>
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
        </form>
    </div>

@endsection

@section('script')
    <script src="/js/app/risk_psycho.js"></script>
@endsection
