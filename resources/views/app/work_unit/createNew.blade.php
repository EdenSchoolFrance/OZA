@extends('app')

@section('content')

    <div class="content">

        <form class="card card--add_work_unit" action="{{ route('work.store', [$sd->id]) }}" method="post" id="formWorkUnit">
            @csrf
            <div class="card-body">
                <div class="row">
                    <div class="line">
                        <div class="left">
                            <label for="name_enterprise">Intitulé de l’unité de travail</label>
                        </div>
                        <div class="right">
                            <input type="text" name="name_enterprise" class="form-control" placeholder="Indiquer le nom de votre entreprise" @if(isset($workUnit)) value="{{ $workUnit->name }}" @endif>
                        </div>
                    </div>
                    @if (Auth::user()->oza === 1)
                        <div class="line">
                            <div class="left"></div>
                            <div class="right">
                                <button type="button" class="btn btn-text btn-open-modal-oza"><i class="fas fa-search"></i> Rechercher une unité existante</button>
                            </div>
                        </div>
                    @endif
                </div>

                <div class="row">
                    <div class="line">
                        <div class="left">
                            <label for="number_employee">Nombre de salariés concernés</label>
                        </div>
                        <div class="right">
                            <div class="btn-group-number">
                                <button type="button" class="btn btn-text btn-num" data-value="less"><i class="fas fa-minus"></i></button>
                                <input type="number" class="form-control" id="numberSal" placeholder="" value="0" name="number_employee">
                                <button type="button" class="btn btn-text btn-num" data-value="more"><i class="fas fa-plus"></i></button>
                            </div>
                        </div>
                    </div>
                    <div class="line line--activity">
                        <div class="left left-cancel">
                            <label for="number_employee">Activités associées</label>
                        </div>
                        <div class="right">
                            <ul class="ul-textarea">
                                @if(isset($workUnit))
                                    @foreach($workUnit->activitie as $activitie)
                                        <li>
                                            <button type="button" class="btn btn-text btn-small btn-delete"><i class="far fa-times-circle"></i></button>
                                            <textarea class="form-control auto-resize" placeholder="" name="activitie[]">{{ $activitie->text }}</textarea>
                                        </li>
                                    @endforeach
                                @endif

                                <li>
                                    <button type="button" class="btn btn-text btn-yellow btn-add-activity"><i class="fas fa-plus"></i> Ajouter une activité</button>
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
                                                    @if(isset($workUnit))
                                                        @foreach($workUnit->child as $child)
                                                            @if($child->sub_item->id === $subItem->id)
                                                                <li class="list-item">
                                                                    <button type="button" class="btn btn-text btn-small btn-delete" data-value="{{ $child->name }}"><i class="far fa-times-circle"></i></button>
                                                                    <p>{{ $child->name }}</p>
                                                                    <input type="hidden" class="btn-item" name="{{ $item->id.'-'.$subItem->id }}[]" value="{{ $child->name }}" data-id="{{ $child->id }}">
                                                                </li>
                                                            @endif
                                                        @endforeach
                                                    @endif
                                                </ul>
                                            </li>
                                            <li class="list-item-btn">
                                                <button type="button" class="btn btn-text btn-yellow btn-add" data-list="{{ $item->id.'-'.$subItem->id }}" data-item="{{ $item->name }}" data-sub="{{ $subItem->name }}"><i class="fas fa-plus"></i> Ajouter</button>
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

    <div class="modal modal--work_unit">
        <div class="card modal-content">
            <div class="card-header">
                <h2 class="title">Modifier la liste des matériels de communication</h2>
                <button class="btn btn-text btn-modal-close"><i class="fas fa-times"></i></button>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="right">
                        <a class="btn-modal-check">Tout cocher</a>
                        <a class="btn-modal-uncheck">Tout decocher</a>
                        <div id="modal-list">
                            @foreach($items as $item)
                                @foreach($item->sub_items as $subItem)
                                    <div data-id="{{ $item->id.'-'.$subItem->id }}" style="display: none">
                                        @if(isset($workUnit))
                                            @foreach($workUnit->child as $child)
                                                @if($child->sub_item->id === $subItem->id)
                                                    <label class="contain">
                                                        <input type="checkbox" value="{{ $child->id }}" data-name="{{$child->name}}">
                                                        <span class="checkmark">{{ $child->name }}</span>
                                                    </label>
                                                @endif
                                            @endforeach
                                        @endif
                                    </div>
                                @endforeach
                            @endforeach
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row">
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
            <div class="card-footer">
                <button class="btn btn-text btn-yellow btn-modal-valid">Valider la liste</button>
            </div>
        </div>
    </div>
    @if (Auth::user()->oza === 1)
    <div class="modal modal--work_unit modal--oza">
        <div class="card modal-content">
            <div class="card-header">
                <h2 class="title">Liste des unités de travail existantes</h2>
                <button class="btn btn-text btn-modal-close"><i class="fas fa-times"></i></button>
            </div>
            <div class="card-body">
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
                            <li><a href="{{ route('work.create', ['id' => $sd->id, 'id_work' => $work->id]) }}">{{ $work->name }}</a></li>
                        @endforeach
                    </ul>
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

        document.getElementById('filter-sa').addEventListener('change', filter);
        document.getElementById('filter-ut').addEventListener('keyup', filter);

        function filter(){
            let filterSelect = $('#filter-sa')[0].value
            let filterInput = $('#filter-ut')[0].value

            fetch('{{ route('work.filter', [$sd->id]) }}', {
                headers: {
                    "Content-Type": "application/json",
                    "X-Requested-With": "XMLHttpRequest",
                    "X-CSRF-Token": document.head.querySelector("[name=csrf-token][content]").content
                },
                method: 'post',
                body: JSON.stringify ({
                    filterSa: filterSelect,
                    filterUt: filterInput
                })
            }).then(response => {
                return response.json()
            }).then(json => {
                let list = $('.list-ut-template', document, 0)
                list.innerHTML = "";
                if (json.length === 0){
                    let li = document.createElement('li');
                    let content = '<a href="#">Aucune données trouvé</a>'
                    li.innerHTML = content;
                    list.appendChild(li);
                }else{
                    for (let i = 0; i < json.length ; i++) {
                        let li = document.createElement('li');
                        let content = '<a href="/{{ $sd->id }}/work/create/'+json[i].id+'">'+json[i].name+'</a>'
                        li.innerHTML = content;
                        list.appendChild(li);
                    }
                }
            });
        }

    </script>
    @endif
@endsection
