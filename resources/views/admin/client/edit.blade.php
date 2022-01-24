@extends('app')

@section('content')
    <div class="content client">
        <div class="nav-tabs-group">
            <div class="nav-tabs">
                <button class="btn btn-tabs @if($tab == 'info') active @endif" data-url="info" data-tabs="tab-content-info">Informations générales</button>
            </div>
            <div class="nav-tabs">
                <button class="btn btn-tabs @if($tab == 'du') active @endif" data-url="du" data-tabs="tab-content-du">DU associé</button>
            </div>
        </div>
        <div class="card card--add-client">
            <form id="tab-content-info" class="card-body tabs-content @if($tab != 'info') none @endif" action="{{ route('admin.client.update', [$client->id]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @if (Auth::user()->hasPermission('ADMIN'))
                    <div class="row">
                        <div class="line">
                            <div class="left"></div>
                            <div class="right">
                                <button type="button" class="btn btn-danger" data-modal=".modal--delete">Supprimer le Client</button>
                            </div>
                        </div>
                    </div>
                @endif
                <div class="row">
                    <div class="line">
                        <div class="left">
                            <label for="name_enterprise">Nom de l’entreprise</label>
                        </div>
                        <div class="right">
                            <input type="text" name="name_enterprise" id="name_enterprise" class="form-control @error('name_enterprise') invalid @enderror" placeholder="Indiquer le nom de votre entreprise" value="{{ old('name_enterprise') ? old('name_enterprise') : $client->name }}">
                            @error('name_enterprise')
                                <p class="message-error">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="line">
                        <div class="left">
                            <label for="logo">Logo</label>
                        </div>
                        <div class="right">
                            <label for="logo" class="form-control form-control--file @error('logo') invalid @enderror">
                                <span>Choisir une image</span>
                                <span>
                                    Parcourir
                                    <input type="file" name="logo" id="logo" class="inputLogo" placeholder="Choisir une image">
                                </span>
                            </label>
                            @error('logo')
                                <p class="message-error">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="line">
                        <div class="left">
                            <label for="client_number">N° client OZA</label>
                        </div>
                        <div class="right">
                            <input type="text" name="client_number" id="client_number" class="form-control @error('client_number') invalid @enderror" placeholder="Indiquer le numéro" value="{{ old('client_number') ? old('client_number') : $client->client_number }}">
                            @error('client_number')
                                <p class="message-error">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="line">
                        <div class="left">
                            <h3>Adresse de l’entreprise</h3>
                        </div>
                        <div class="right"></div>
                    </div>
                    <div class="line">
                        <div class="left">
                            <label for="adress">Adresse postale</label>
                        </div>
                        <div class="right">
                            <input type="text" name="adress" id="adress" class="form-control @error('adress') invalid @enderror" placeholder="Ligne 1" value="{{ old('adress') ? old('adress') : $client->adress }}">
                            @error('adress')
                                <p class="message-error">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="line">
                        <div class="left">
                        </div>
                        <div class="right">
                            <input type="text" name="additional_adress" class="form-control @error('additional_adress') invalid @enderror" placeholder="Ligne 2" value="{{ old('additional_adress') ? old('additional_adress') : $client->additional_adress }}">
                            @error('additional_adress')
                                <p class="message-error">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="line">
                        <div class="left">
                            <label for="city_zipcode">Code postal</label>
                        </div>
                        <div class="right">
                            <input type="text" name="city_zipcode" id="city_zipcode" class="form-control form-control--small @error('city_zipcode') invalid @enderror" placeholder="Code postal" value="{{ old('city_zipcode') ? old('city_zipcode') : $client->city_zipcode }}">
                            @error('city_zipcode')
                                <p class="message-error">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="line">
                        <div class="left">
                            <label for="city">Ville</label>
                        </div>
                        <div class="right">
                            <input type="text" name="city" id="city" class="form-control form-control--small @error('city') invalid @enderror" placeholder="Ville" value="{{ old('city') ? old('city') : $client->city }}">
                            @error('city')
                                <p class="message-error">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="line">
                        <div class="left">
                            <label for="expert">Expert OZA dédié</label>
                        </div>
                        <div class="right">
                            <select name="expert" id="expert" class="form-control">
                                <option>Sélectionner un expert</option>
                                @foreach($experts as $expert)
                                    <option value="{{ $expert->id }}" {{ old('expert') ? (old('expert') == $expert->id ? 'selected' : '') : ($client->expert && $client->expert->id == $expert->id ? 'selected' : '') }}>{{ $expert->firstname }} {{ $expert->lastname }} {{ $expert->role->name }}</option>
                                @endforeach
                            </select>
                            @error('expert')
                                <p class="message-error">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row row--submit">
                    <button class="btn btn-success">Mettre à jour</button>
                    <a href="{{ route('admin.clients') }}" class="btn btn-danger btn-text">Annuler</a>
                </div>
            </form>

            <div id="tab-content-du" class="card-body tabs-content @if($tab != 'du') none @endif">
                <div class="row">
                    <h2 class="title">Document unique du compte</h2>
                </div>
                <div class="row">
                    <table class="table table--users table-sortable" style="width:100%">
                        <thead>
                            <tr>
                                <th class="th_name th-sort">Intitulé</th>
                                <th class="th_date th-sort">Date de création</th>
                                <th class="th_status th-sort">Status</th>
                                <th class="th_actions"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (count($single_documents) > 0)
                                @foreach ($single_documents as $sd)
                                    <tr>
                                        <td class="td_name">{{ $sd->name }}</td>
                                        <td class="td_date">{{ $sd->created_at->format('d/m/Y') }}</td>
                                        <td class="td_status">{{ $sd->archived ? 'Archivé' : 'En cours' }}</td>
                                        <td class="td_actions">
                                            @if (Auth::user()->hasPermission('ADMIN'))
                                                @if ($sd->archived)
                                                    <button data-modal=".modal--unarchive" data-id="{{ $sd->id }}"><i class="fas fa-box-open"></i></button>
                                                @else
                                                    <button data-modal=".modal--archive" data-id="{{ $sd->id }}"><i class="fas fa-archive"></i></button>
                                                @endif
                                            @endif
                                            <a href="{{ route('admin.single_document.edit', [$client->id, $sd->id]) }}"><i class="far fa-edit"></i></a>
                                            <a href="{{ route('dashboard', [$sd->id]) }}"><i class="far fa-eye"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr class="no-data no-data--centered">
                                    <td colspan="4">Aucun document unique</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                    {{ $single_documents->links() }}
                </div>
                @if (Auth::user()->hasPermission('ADMIN'))
                    <form action="{{ route('admin.single_document.store', [$client->id]) }}" method="post">
                        @csrf
                        <div class="row">
                            <h2 class="title">Ajout d’un document unique</h2>
                        </div>
                        <div class="row">
                            <div class="line">
                                <div class="left">
                                    <label for="name_single_document">Intitulé du DU</label>
                                </div>
                                <div class="right">
                                    <input type="text" name="name_single_document" id="name_single_document" class="form-control @error('name_single_document') invalid @enderror" value="{{ old('name_single_document') }}" placeholder="Indiquer le nom du DU">
                                    @error('name_single_document')
                                        <p class="message-error">{{ $message }}</p>
                                    @enderror
                                    @error('dangers')
                                        <p class="message-error">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="line">
                                <div class="left">
                                    <p>Liste des dangers associés</p>
                                </div>
                                <div class="right right--btn">
                                    @foreach ($packs as $pack)
                                        <button type="button" class="btn btn-yellow btn-text select-pack" data-pack="{{ $pack->id }}">{{ $pack->name }}</button>
                                    @endforeach
                                    <button type="button" class="btn btn-yellow btn-text uncheck-pack">Tout décocher</button>
                                </div>
                            </div>
                            <div class="line">
                                <div class="left">
                                </div>
                                <div class="right right--check">
                                    @foreach ($dangers as $danger)
                                        <div>
                                            <input type="checkbox" class="radio-checkbox item-pack" data-pack="{{ $danger->packs->pluck('id')->implode(',') }}" id="danger_{{ $danger->id }}" name="dangers[{{ $danger->id }}]" value="{{ $danger->id }}" {{ old('dangers.'. $danger->id) ? 'checked' : '' }}>
                                            <label for="danger_{{ $danger->id }}">{{ $danger->name }}</label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="line">
                                <div class="left"></div>
                                <div class="right">
                                    <button class="btn btn-yellow btn-inv">Ajouter le DU</button>
                                </div>
                            </div>
                        </div>
                    </form>
                @endif
            </div>
        </div>

        <div class="modal modal--archive">
            <div class="modal-dialog">
                <form class="modal-content" action="{{ route('admin.single_document.archive', [$client->id]) }}" method="POST">
                    @csrf
                    <input type="hidden" name="id" value="">
                    <div class="modal-header">
                        <p class="title">Confirmer l'archivage</p>
                        <button type="button" class="btn-close" data-dismiss="modal"><i class="fas fa-times"></i></button>
                    </div>
                    <div class="modal-body">
                        <p>Êtes-vous sûr du vouloir archiver ce document unique ?</p>
                        <div>
                            <button type="submit" class="btn btn-danger btn-text">Archiver</button>
                            <button type="button" class="btn btn-inv btn-yellow btn-small" data-dismiss="modal"> Annuler</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="modal modal--unarchive">
            <div class="modal-dialog">
                <form class="modal-content" action="{{ route('admin.single_document.unarchive', [$client->id]) }}" method="POST">
                    @csrf
                    <input type="hidden" name="id" value="">
                    <div class="modal-header">
                        <p class="title">Confirmer le désarchivage</p>
                        <button type="button" class="btn-close" data-dismiss="modal"><i class="fas fa-times"></i></button>
                    </div>
                    <div class="modal-body">
                        <p>Êtes-vous sûr du vouloir désarchiver ce document unique ?</p>
                        <div>
                            <button type="submit" class="btn btn-danger btn-text">Désarchiver</button>
                            <button type="button" class="btn btn-inv btn-yellow btn-small" data-dismiss="modal"> Annuler</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        @if (Auth::user()->hasPermission('ADMIN'))
            <div class="modal modal--delete">
                <div class="modal-dialog">
                    <form class="modal-content" action="{{ route('admin.client.delete', [$client->id]) }}" method="POST">
                        @csrf
                        <div class="modal-header">
                            <p class="title">Confirmer la suppression</p>
                            <button type="button" class="btn-close" data-dismiss="modal"><i class="fas fa-times"></i></button>
                        </div>
                        <div class="modal-body">
                            <p>Êtes-vous sûr du vouloir supprimer ce client ?</p>
                            <div>
                                <button type="submit" class="btn btn-danger btn-text">Supprimer</button>
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
    <script src="/js/app/client.js"></script>
@endsection
