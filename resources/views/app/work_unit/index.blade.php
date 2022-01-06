@extends('app')

@section('content')
    <div class="content">
        <div class="card card--work_units">
            <div class="card-header">
                <button class="btn-resize-all btn btn-text"><i class="far fa-minus-square"></i> Afficher/cacher tous les détails</button>
                <a href="{{ route('work.create', [$single_document->id]) }}" class="btn btn-yellow"><i class="fas fa-plus"></i> AJOUTER UNE UNITE DE TRAVAIL</a>
            </div>
            <div class="card-body">
                <table class="table table--work_units table--resizable">
                    <thead>
                        <tr>
                            <th class="th_status"></th>
                            <th class="th_number_employee"><i class="fas fa-user"></i></th>
                            <th class="th_work_unit">Unité de travail</th>
                            <th class="th_activity">Activité</th>
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
                                    <i class="fas fa-check {{ $work->validated === 1 ? 'fa-check-checked' : '' }}"></i>
                                </td>
                                <td class="td_number_employee">{{ $work->number_employee }}</td>
                                <td class="td_work_unit">
                                    <div class="table-resizable">
                                        <p>{{ $work->name }}</p>
                                    </div>
                                </td>
                                <td class="td_activity">
                                    <div class="table-resizable">
                                        @foreach($work->activities as $activitie)
                                            <p>► {{ $activitie->text }}</p>
                                        @endforeach
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
                                    <a href="{{ route('work.edit', ['id' => $single_document->id, 'id_work'=> $work->id]) }}">
                                        <i class="far fa-edit"></i>
                                    </a>
                                    <a href="{{ route('work.delete', ['id' => $single_document->id, 'id_work'=> $work->id]) }}">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <td></td>
                            <td colspan="6" class="content">
                                <div>
                                    <div>
                                        <p class="title">TOTAL</p>
                                        <div>
                                            <button type="button" class="btn btn-small btn-dark-purple">{{ array_sum($works->pluck('number_employee')->toArray()) }}</button>
                                            <p>salarié(s) inscrit(s) sur le registre du personnel</p>
                                        </div>
                                    </div>
                                    <a href="{{route('work.create', [$single_document->id])}}" class="btn btn-yellow"><i class="fas fa-plus"></i> AJOUTER UNE UNITE DE TRAVAIL</a>
                                </div>
                            </td>
                            <td></td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="/js/app/work.js"></script>
@endsection
