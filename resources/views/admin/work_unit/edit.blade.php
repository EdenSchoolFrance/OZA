@extends('app')

@section('content')
<div class="content">
    <form class="card card--add_work_unit" action="{{ route('admin.help.workunit.update', [$work->id]) }}" method="post" id="formWorkUnit">
        @csrf
        <div class="card-body">
            <div class="row">
                <div class="line">
                    <div class="left">
                        <label for="name_enterprise">Intitulé de l’unité de travail</label>
                    </div>
                    <div class="right">
                        <input type="text" name="name_enterprise" class="form-control" placeholder="Indiquer le nom de votre entreprise" value="{{ old('name_enterprise') ? old('name_enterprise') :$work->name }}">
                        @error('name_enterprise')
                        <p class="message-error">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="line line--activity">
                    <div class="left left-cancel">
                        <label for="number_employee">Activités associées</label>
                    </div>
                    <div class="right">
                        <ul class="ul-textarea">
                            @if(old('activities'))
                                @foreach(old('activities') as $activitie)
                                    <li>
                                        <button type="button" class="btn btn-text btn-small btn-delete"><i class="far fa-times-circle"></i></button>
                                        <textarea class="form-control auto-resize" placeholder="" name="activities[]">{{ $activitie }}</textarea>
                                    </li>
                                @endforeach
                            @else
                                @foreach($work->activitie as $activitie)
                                    <li>
                                        <button type="button" class="btn btn-text btn-small btn-delete"><i class="far fa-times-circle"></i></button>
                                        <textarea class="form-control auto-resize" placeholder="" name="activities[]">{{ $activitie->text }}</textarea>
                                    </li>
                                @endforeach
                            @endif
                            <li>
                                <button type="button" class="btn btn-text btn-yellow btn-add-activity"><i class="fas fa-plus"></i> Ajouter une activité</button>
                            </li>
                            <li>
                                @error('activities')
                                <p class="message-error">{{ $message }}</p>
                                @enderror
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="line">
                    <div class="left left-cancel">
                        <label for="sector_activitie">Activités associées</label>
                    </div>
                    <div class="right">
                        <select name="sector_activitie" id="sector_activitie" class="form-control">
                            @foreach($sectors_activities as $sector_activitie)
                                <option value="{{ $sector_activitie->id }}">{{ $sector_activitie->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                @foreach($items as $item)
                    <div class="line">
                        <div class="left left-cancel">
                            <label>{{ $item->name }}</label>
                        </div>
                        <div class="right right--wrap">
                            @foreach($item->sub_items as $subItem)
                                <div>
                                    <ul class="list-main">
                                        <li>
                                            <p>{{ $subItem->name }}</p>
                                        </li>
                                        <li>
                                            <ul class="list-content" data-list="{{ $item->id.'-'.$subItem->id }}">
                                                @if(old(($item->id.'-'.$subItem->id)))
                                                    @foreach(old(($item->id.'-'.$subItem->id)) as $child)
                                                        <li class="list-item">
                                                            <button type="button" class="btn btn-text btn-small btn-delete" data-value="{{ explode("|", $child)[0] }}"><i class="far fa-times-circle"></i></button>
                                                            <p>{{ explode("|", $child)[0] }}</p>
                                                            <input type="hidden" class="btn-item" name="{{ $item->id.'-'.$subItem->id }}[]" value="{{ explode("|", $child)[1] ? explode("|", $child)[0]."|".explode("|", $child)[1] : explode("|", $child)[0] }}" data-id="{{ explode("|", $child)[1] ?  : $child.now() }}">
                                                        </li>
                                                    @endforeach
                                                @else
                                                    @foreach($work->items->where('sub_item_id', $subItem->id) as $child)
                                                            <li class="list-item">
                                                                <button type="button" class="btn btn-text btn-small btn-delete" data-value="{{ $child->name }}"><i class="far fa-times-circle"></i></button>
                                                                <p>{{ $child->name }}</p>
                                                                <input type="hidden" class="btn-item" name="{{ $item->id.'-'.$subItem->id }}[]" value="{{ $child->name}}" data-id="{{ $child->id }}">
                                                            </li>
                                                    @endforeach
                                                @endif
                                            </ul>
                                        </li>
                                        <li class="list-item-btn">
                                            <button type="button" class="btn btn-text btn-yellow btn-add" data-modal=".modal--work_unit" data-list="{{ $item->id.'-'.$subItem->id }}" data-item="{{ $item->name }}" data-sub="{{ $subItem->name }}"><i class="fas fa-plus"></i> Ajouter</button>
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
                        <input type="hidden" name="type" id="inputTypeWorkUnit" value="true">
                        <button type="button" class="btn btn-success btn-send">Mettre à jour l’unité de travail</button>
                        <button type="button" class="btn btn-text btn-validate">Enregistrer le brouillon</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>


<div class="modal modal--work_unit">
    <div class="modal-dialog modal-dialog-large">
        <div class="modal-content">
            <div class="modal-header">
                <p class="title">Modifier la liste des matériels de communication</p>
                <button type="button" class="btn-close" data-dismiss="modal"><i class="fas fa-times"></i></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="right">
                        <a class="btn-modal-check">Tout cocher</a>
                        <a class="btn-modal-uncheck">Tout decocher</a>
                        <div id="modal-list">
                            @foreach($items as $item)
                                @foreach($item->sub_items as $subItem)
                                    <div data-id="{{ $item->id.'-'.$subItem->id }}" style="display: none">
                                        @foreach($subItem->child_sub_items as $child)
                                            @if(!in_array($child->name, $work->items->where('sub_item_id', $subItem->id)->pluck('name')->toArray()))
                                                <label class="contain">
                                                    <input type="checkbox" value="{{ $child->id }}" data-name="{{$child->name}}">
                                                    <span class="checkmark">{{ $child->name }}</span>
                                                </label>
                                            @endif
                                        @endforeach
                                        @foreach($work->items->where('sub_item_id', $subItem->id) as $child)
                                            <label class="contain">
                                                <input type="checkbox" value="{{ $child->id }}" data-name="{{$child->name}}" checked>
                                                <span class="checkmark">{{ $child->name }}</span>
                                            </label>
                                        @endforeach
                                    </div>
                                @endforeach
                            @endforeach
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row row--center">
                    <div>
                        <p>Ajouter des nouveaux matériels</p>
                        <div class="right right--inline modal-input">
                            <label for="name">Intitulé</label>
                            <div>
                                <input type="text" name="name" class="form-control" placeholder="matériel 1, matériel 2, ">
                                <p class="info-input">Il est possible d’ajouter plusieurs matériels en les séparant par une virgule</p>
                            </div>
                            <button class="btn btn-text btn-yellow btn-modal-add">Ajouter</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-text btn-yellow btn-modal-valid">Valider la liste</button>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
    <script src="/js/app/work_unit.js"></script>
@endsection
