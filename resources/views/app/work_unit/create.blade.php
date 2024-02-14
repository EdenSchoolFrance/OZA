@extends('app')

@section('content')
    <div class="content">
        <form class="card card--add_work_unit" action="{{ route('work.store', [$single_document->id]) }}" method="post" id="formWorkUnit">
            @csrf
            <div class="card-body">
                <div class="row">
                    <div class="line">
                        <div class="left">
                            <label for="work_unit_entitled">Intitulé de l’unité de travail</label>
                        </div>
                        <div class="right">
                            <input type="text" name="work_unit_entitled" class="form-control" placeholder="Indiquer le nom de votre unité de travail" value="@if(isset($workUnit)){{ old('work_unit_entitled') ? old('work_unit_entitled') : $workUnit->name }}@else{{ old('work_unit_entitled') ? old('work_unit_entitled') : "" }}@endif">
                            @error('work_unit_entitled')
                                <p class="message-error">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    @if (Auth::user()->hasAccess('oza'))
                        <div class="line">
                            <div class="left"></div>
                            <div class="right">
                                <button type="button" class="btn btn-text" data-modal=".modal--work_unit--oza"><i class="fas fa-search"></i> Rechercher une unité existante</button>
                            </div>
                        </div>
                    @endif
                </div>

                <div class="row">
                    <div class="line">
                        <div class="left">
                            <label for="number_employee">Nombre de salariés de l’unité de travail</label>
                        </div>
                        <div class="right">
                            <div class="btn-group-number">
                                <button type="button" class="btn btn-text btn-num" data-value="less"><i class="fas fa-minus"></i></button>
                                <input type="number" class="form-control" id="numberSal" placeholder="" value="{{ old('number_employee') ? old('number_employee') : '0' }}" name="number_employee" min="0">
                                <button type="button" class="btn btn-text btn-num" data-value="more"><i class="fas fa-plus"></i></button>
                            </div>
                            @error('number_employee')
                                <p class="message-error">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="line line--activity">
                        <div class="left left-cancel">
                            <label for="number_employee">Principales activités</label>
                        </div>
                        <div class="right">
                            <ul class="ul-textarea">
                                @if(old('activities'))
                                    @foreach(old('activities') as $activitie)
                                        <li>
                                            <button type="button" class="btn btn-text btn-small btn-delete"><i class="far fa-times-circle"></i></button>
                                            <textarea class="form-control auto-resize" placeholder="" name="activities[]">@stripTags($activitie)</textarea>
                                        </li>
                                    @endforeach
                                @elseif(isset($workUnit))
                                    @foreach($workUnit->activitie as $activitie)
                                        <li>
                                            <button type="button" class="btn btn-text btn-small btn-delete"><i class="far fa-times-circle"></i></button>
                                            <textarea class="form-control auto-resize" placeholder="" name="activities[]">@stripTags($activitie->text)</textarea>
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
                                                    @if(old($item->id.'-'.$subItem->id))
                                                        @if (count(old($item->id.'-'.$subItem->id)) > 0)
                                                            @foreach(old($item->id.'-'.$subItem->id) as $sd_item)
                                                                <li class="list-item">
                                                                    <button type="button" class="btn btn-text btn-small btn-delete" data-value="{{ $sd_item }}"><i class="far fa-times-circle"></i></button>
                                                                    <p>{{ $sd_item }}</p>
                                                                    <input type="hidden" class="btn-item" name="{{ $item->id.'-'.$subItem->id }}[{{ $sd_item->id }}]" value="{{ $sd_item }}" data-id="{{ $sd_item.now() }}">
                                                                </li>
                                                            @endforeach
                                                        @elseif (count(old($item->id.'-'.$subItem->id)) === 0)
                                                            <li>
                                                                <p class="nothing">Néant</p>
                                                            </li>
                                                        @endif
                                                    @elseif(isset($workUnit))
                                                        @if (count($workUnit->sub_item_items($subItem->id)) > 0)
                                                            @foreach($workUnit->sub_item_items($subItem->id) as $childSubItem)
                                                                <li class="list-item">
                                                                    <button type="button" class="btn btn-text btn-small btn-delete" data-value="{{ $childSubItem->name }}"><i class="far fa-times-circle"></i></button>
                                                                    <p>{{ $childSubItem->name }}</p>
                                                                    <input type="hidden" class="btn-item" name="{{ $item->id.'-'.$subItem->id }}[{{ $childSubItem->id }}]" value="{{ $childSubItem->name }}" data-id="{{ $childSubItem->id }}">
                                                                </li>
                                                            @endforeach
                                                        @else
                                                            <li>
                                                                <p class="nothing">Néant</p>
                                                            </li>
                                                        @endif
                                                    @else
                                                        <li>
                                                            <p class="nothing">Néant</p>
                                                        </li>
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
                            <button type="button" class="btn btn-success btn-send">Valider l’unité de travail</button>
                            <button type="button" class="btn btn-text btn-validate">Enregistrer le brouillon</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <div class="modal modal--work_unit" data-backdrop="static">
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
                                                <label class="contain">
                                                    <input type="checkbox" value="{{ $child->id }}" data-name="{{$child->name}}" >
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
                    <button class="btn btn-text btn-yellow btn-modal-valid" data-dismiss="modal">Valider la liste</button>
                </div>
            </div>
        </div>
    </div>

    @if (Auth::user()->oza === 1)
        <div class="modal modal--work_unit--oza modal--oza">
            <div class="modal-dialog modal-dialog-large">
                <div class="modal-content">
                    <div class="modal-header">
                        <p class="title">Liste des unités de travail existantes</p>
                        <button type="button" class="btn-close" data-dismiss="modal"><i class="fas fa-times"></i></button>
                    </div>
                    <div class="modal-body">
                        <div class="row row--ut">
                            <div class="group-form">
                                <label for="filter-ut">Recherche par intitulé</label>
                                <input type="text" name="filter[ut]" id="filter-ut" class="form-control" placeholder="Taper les premières lettres de l’unité">
                            </div>
                            <div class="group-form">
                                <label for="filter-sa">Filtrer les unités de travail</label>
                                <select name="filter[sa]" id="filter-sa" class="form-control">
                                    <option value="none" selected>Sélectionner un secteur d’activité</option>
                                    @foreach($sectors as $sector)
                                        <option value="{{ $sector->id }}">{{ $sector->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <ul class="list-ut-template">
                                @foreach($works as $work)
                                    @if(isset($workUnit))
                                        @if($work->id === $workUnit->id)
                                            <li><a href="#" class="checked">{{ $work->name }}</a></li>
                                        @else
                                            <li><a href="{{ route('work.create', [$single_document->id, $work->id]) }}">{{ $work->name }}</a></li>
                                        @endif
                                    @else
                                        <li><a href="{{ route('work.create', [$single_document->id, $work->id]) }}">{{ $work->name }}</a></li>
                                    @endif
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
@endsection

@section('script')
    <script src="/js/app/work_unit.js"></script>
    @if (Auth::user()->oza === 1)
        <script>
            let url = '{{ route('work.filter', [$single_document->id]) }}';
            let single_document_id = '{{ $single_document->id }}';
            let workUnit = '{{ isset($workUnit) ? $workUnit->id : null }}'
        </script>
    @endif
@endsection
