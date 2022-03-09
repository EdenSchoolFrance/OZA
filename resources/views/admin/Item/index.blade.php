@extends('app')

@section('content')
    <div class="content">
        <form class="card card--add_work_unit" action="{{ route('admin.help.item.update') }}" method="post" id="formWorkUnit">
            @csrf
            <div class="card-body">
                <div class="row">
                    @foreach($items as $item)
                        <div class="line line--items">
                            <div class="left left-cancel">
                                <label for="">{{ $item->name }}</label>
                            </div>
                            <div class="right right--wrap">
                                @foreach($item->sub_items as $subItem)
                                    <div>
                                        <ul class="list-main">
                                            <li>
                                                <p>{{ $subItem->name }}</p>
                                            </li>
                                            <li>
                                                <ul class="list-content">
                                                    @foreach($child_sub_items as $child)
                                                        @if($child->sub_item->id === $subItem->id)
                                                            <li class="list-item">
                                                                <button type="button" class="btn btn-text btn-small btn-delete"><i class="far fa-times-circle"></i></button>
                                                                <textarea class="form-control auto-resize" placeholder="" name="{{ "child[".$child->id."]" }}">{{ $child->name }}</textarea>
                                                            </li>
                                                        @endif
                                                    @endforeach
                                                </ul>
                                            </li>
                                            <li class="list-item-btn">
                                                <button type="button" class="btn btn-text btn-yellow btn-add-item" data-id="{{ $subItem->id }}"><i class="fas fa-plus"></i> Ajouter</button>
                                            </li>
                                        </ul>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="row row--submit">
                    <div class="line">
                        <div class="left">
                        </div>
                        <div class="right">
                            <button type="submit" class="btn btn-success">Valider les items</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection

@section('script')
    <script src="/js/app/work_unit.js"></script>
    @if (Auth::user()->oza === 1)
        <script>
            let url = 'none';
            let single_document_id = 'none';
            let workUnit = '{{ isset($workUnit) ? $workUnit->id : null }}'
        </script>
    @endif
@endsection
