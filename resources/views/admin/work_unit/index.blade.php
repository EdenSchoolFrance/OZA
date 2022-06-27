@extends('app')

@section('content')
    <div class="content">
        <div class="card card--work_units">
            <div class="card-header">
                <button class="btn-resize-all btn btn-text"><i class="far fa-minus-square"></i> Afficher/cacher tous les détails</button>
                <a href="{{ route('admin.help.workunit.create') }}" class="btn btn-yellow"><i class="fas fa-plus"></i> AJOUTER UNE UNITE DE TRAVAIL</a>
            </div>
            <div class="card-body">
                <table class="table table--work_units table--resizable">
                    <thead>
                        <tr>
                            <th class="th_status"></th>
                            <th class="th_work_unit">Unité de travail</th>
                            <th class="th_activity">Activité</th>
                            <th class="th_sector">Secteur d'activité</th>
                            @foreach($items as $item)
                                <th class="th_{{ $item->id }}">{{ $item->name }}</th>
                            @endforeach
                            <th class="th_actions"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(count($works) === 0)
                            <tr class="no-data no-data--centered">
                                <td colspan="{{ count($items) + 5 }}" >
                                    Aucune unité de travail
                                </td>
                            </tr>
                        @endif
                        @foreach($works as $work)
                            <tr>
                                <td class="td_status">
                                    <button class="btn-resize-row btn btn-text"><i class="far fa-minus-square"></i></button>
                                </td>
                                <td class="td_work_unit">
                                    <div class="table-resizable">
                                        <p>{{ $work->name }}</p>
                                    </div>
                                </td>
                                <td class="td_activity">
                                    <div class="table-resizable">
                                        @foreach($work->activitie as $activitie)
                                            <p>► @stripTags($activitie->text)</p>
                                        @endforeach
                                    </div>
                                </td>
                                <td class="td_sector">
                                    <div class="table-resizable">
                                        {{ $work->sector_activitie->name }}
                                    </div>
                                </td>
                                @foreach($items as $item)
                                    <td class="td_{{ $item->id }}">
                                        <div class="table-resizable">
                                            @foreach($item->sub_items as $sub_item)
                                                @if(count($work->items->where('sub_item_id', $sub_item->id)) !== 0)
                                                    <div class="list_group">
                                                        <p class="title">{{ $sub_item->name }}</p>
                                                        <p class="content">
                                                            {{ $work->items->where('sub_item_id', $sub_item->id)->pluck('name')->implode(', ') }}
                                                        </p>
                                                    </div>
                                                @endif
                                            @endforeach
                                        </div>
                                    </td>
                                @endforeach
                                <td class="td_actions">
                                    @if (Auth::user()->hasPermission(['ADMIN']))
                                        <a href="{{ route('admin.help.workunit.edit', [$work->id]) }}">
                                            <i class="far fa-edit"></i>
                                        </a>
                                        <button data-modal=".modal--delete" data-id="{{ $work->id }}"><i class="fas fa-trash"></i></button>
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
                    <form class="modal-content" action="{{ route('admin.help.workunit.delete') }}" method="POST">
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
