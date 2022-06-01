@extends('app')

@section('content')
    <div class="content">
        <div class="card card--work_units">
            <div class="card-header">
                <a href=""></a>
            </div>
            <div class="card-body">
                <table class="table table--work_units">
                    <thead>
                        <tr>
                            <th class="th_danger">Danger</th>
                            <th class="th_info">Info</th>
                            <th class="th_reflection">Questions</th>
                            <th class="th_actions"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(count($dangers) === 0)
                            <tr class="no-data no-data--centered">
                                <td colspan="{{ 4 }}">
                                    Aucune unité de travail
                                </td>
                            </tr>
                        @endif
                        @foreach($dangers as $danger)
                            <tr>
                                <td class="td_danger">
                                    <div class="table-resizable">
                                        <p>{{ $danger->name }}</p>
                                    </div>
                                </td>
                                <td class="td_info">
                                    <div class="table-resizable">
                                        {{ $danger->info }}
                                    </div>
                                </td>
                                <td class="td_reflection">
                                    <div class="table-resizable">
                                        @foreach($danger->reflections as $reflection)
                                            {{ $reflection->name }} <br>
                                        @endforeach
                                    </div>
                                </td>
                                <td class="td_actions">
                                    @if (Auth::user()->hasPermission(['ADMIN']))
                                        <a href="{{ route('admin.help.danger.edit', [$danger->id]) }}">
                                            <i class="far fa-edit"></i>
                                        </a>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="/js/app/work.js"></script>
@endsection
