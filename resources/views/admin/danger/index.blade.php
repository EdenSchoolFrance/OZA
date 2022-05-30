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
                                        <button data-modal=".modal--delete" data-id="{{ $danger->id }}"><i class="fas fa-trash"></i></button>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        @if (Auth::user()->hasPermission(['ADMIN']))
            <div class="modal modal--delete">
                <div class="modal-dialog">
                    <form class="modal-content" action="{{ route('admin.help.danger.delete') }}" method="POST">
                        @csrf
                        <input type="hidden" name="id" value="">
                        <div class="modal-header">
                            <p class="title">Confirmer la suppression</p>
                            <button type="button" class="btn-close" data-dismiss="modal"><i class="fas fa-times"></i></button>
                        </div>
                        <div class="modal-body">
                            <p>Êtes-vous sûr.e du vouloir supprimer cette unité de travail (complétion) ?</p>
                            <div>
                                <button type="submit" class="btn btn-yellow">Supprimer</button>
                                <button type="button" class="btn btn-inv btn-yellow btn-small" data-dismiss="modal"> Annuler</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        @endif
    </div>
@endsection

@section('script')
    <script src="/js/app/work.js"></script>
@endsection
