@extends('app')

@section('content')
    <div class="content client">
        <div class="nav-tabs-group">
            <div class="nav-tabs">
                <button class="btn btn-tabs" data-tabs="tab-content-info">Informations générales</button>
            </div>
            <div class="nav-tabs">
                <button class="btn btn-tabs active" data-tabs="tab-content-du">DU associé</button>
            </div>
            <div class="nav-tabs">
                <button class="btn btn-tabs" data-tabs="tab-content-admin">Administrateur</button>
            </div>
        </div>
        <div class="card card--add-client">
            <form id="tab-content-info" class="card-body tabs-content none" action="{{ route('admin.client.update', [$client->id]) }}" method="POST" enctype="multipart/form-data">
                @csrf
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
                                    <option value="{{ $expert->id }}" {{ old('expert') ? (old('expert') == $expert->id ? 'selected' : '') : ($client->expert->id == $expert->id ? 'selected' : '') }}>{{ $expert->firstname }} {{ $expert->lastname }} {{ $expert->role->name }}</option>
                                @endforeach
                            </select>
                            @error('expert')
                                <p class="message-error">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row row--submit">
                    <button class="btn btn-success">Enregistrer</button>
                    <a href="{{ route('admin.client') }}" class="btn btn-danger btn-text">Annuler</a>
                </div>
            </form>

            <div id="tab-content-du" class="card-body tabs-content">
                <div class="row">
                    <h2 class="title">Document unique du compte</h2>
                </div>
                <div class="row">
                    <table class="table table--users table-sortable" style="width:100%">
                        <thead>
                            <tr>
                                <th class="th_name th-sort">Intitulé</th>
                                <th class="th_date th-sort">Date de création</th>
                                <th class="th_actions"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (count($single_documents) > 0)
                                @foreach ($single_documents as $du)
                                    <tr>
                                        <td class="td_name">{{ $du->name }}</td>
                                        <td class="td_date">{{ $du->created_at->format('d/m/Y') }}</td>
                                        <td class="td_actions">
                                            <i class="fas fa-trash"></i>
                                            <i class="far fa-edit"></i>
                                            <a href="{{ route('dashboard', [$du->id]) }}"><i class="far fa-eye"></i></a>
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
                                <input type="text" name="name_single_document" id="name_single_document" class="form-control @error('name_single_document') invalid @enderror" placeholder="Indiquer le nom du DU">
                                @error('name_single_document')
                                    <p class="message-error">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="line">
                            <div class="left">
                                <p>Liste des dangers associés</p>
                            </div>
                            <div class="right right--btn">
                                <button class="btn btn-yellow btn-text">Conformité</button>
                                <button class="btn btn-yellow btn-text">Tranquillité</button>
                                <button class="btn btn-yellow btn-text">Sérénité</button>
                                <button class="btn btn-yellow btn-text">Tout décocher</button>
                            </div>
                        </div>
                        <div class="line">
                            <div class="left">
                            </div>
                            <div class="right right--check">
                                @foreach ($dangers as $danger)
                                    <div>
                                        <input type="checkbox" class="radio-checkbox" id="danger_{{ $danger->id }}" name="danger_{{ $danger->id }}" value="{{ $danger->id }}">
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
            </div>

            <div id="tab-content-admin" class="card-body tabs-content none">
                <div class="row">
                    <h2>Document unique du compte</h2>
                </div>
                <table class="table table--users table-sortable" style="width:100%">
                    <thead>
                        <tr>
                            <th class="th_lastname th-sort">Intitulé</th>
                            <th class="th_firstname th-sort">Date de création</th>
                            <th class="th_email th-sort">Statut</th>
                            <th class="th_actions"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="td_lastname">Intitulé du DU 1</td>
                            <td class="td_firstname">12/12/2021</td>
                            <td class="td_email">En cours</td>
                            <td class="td_actions"><i class="fas fa-trash"></i><i class="far fa-edit"></i><i class="far fa-eye"></i></td>
                        </tr>
                        <tr>
                            <td class="td_lastname">Intitulé du DU 2</td>
                            <td class="td_firstname">12/12/2021</td>
                            <td class="td_email">En cours</td>
                            <td class="td_actions"><i class="fas fa-trash"></i><i class="far fa-edit"></i><i class="far fa-eye"></i></td>
                        </tr>
                        <tr>
                            <td class="td_lastname">Intitulé du DU 3</td>
                            <td class="td_firstname">12/12/2021</td>
                            <td class="td_email">En cours</td>
                            <td class="td_actions"><i class="fas fa-trash"></i><i class="far fa-edit"></i><i class="far fa-eye"></i></td>
                        </tr>
                        <tr>
                            <td class="td_lastname">Intitulé du DU 4</td>
                            <td class="td_firstname">12/12/2021</td>
                            <td class="td_email">En cours</td>
                            <td class="td_actions"><i class="fas fa-trash"></i><i class="far fa-edit"></i><i class="far fa-eye"></i></td>
                        </tr>
                        <tr>
                            <td class="td_lastname">Intitulé du DU 5</td>
                            <td class="td_firstname">12/12/2021</td>
                            <td class="td_email">En cours</td>
                            <td class="td_actions"><i class="fas fa-trash"></i><i class="far fa-edit"></i><i class="far fa-eye"></i></td>
                        </tr>
                    </tbody>
                </table>
                <div class="row">
                    <h2>Ajout d’un document unique</h2>
                </div>
                <div class="row">
                    <div class="line">
                        <div class="left">
                            <label for="client_oza">Intitulé du DU</label>
                        </div>
                        <div class="right">
                            <input type="text" name="client_oza" class="form-control" placeholder="Indiquer le nom du DU" >
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="line">
                        <div class="left">
                            <label for="client_oza">Liste des dangers associés</label>
                        </div>
                        <div class="right right--btn">
                            <button class="btn btn-yellow btn-text">Conformité</button>
                            <button class="btn btn-yellow btn-text">Tranquillité</button>
                            <button class="btn btn-yellow btn-text">Sérénité</button>
                            <button class="btn btn-yellow btn-text">Tout décocher</button>
                        </div>
                    </div>
                    <div class="line">
                        <div class="left">
                        </div>
                        <div class="right right--check">
                            <ul>
                                <li>
                                    <input type="checkbox" id="danger1">
                                    <label for="danger1">Danger 1</label>
                                </li>
                                <li>
                                    <input type="checkbox" id="danger2">
                                    <label for="danger2">Danger 2</label>
                                </li>
                                <li>
                                    <input type="checkbox" id="danger3">
                                    <label for="danger3">Danger 3</label>
                                </li>
                                <li>
                                    <input type="checkbox" id="danger4">
                                    <label for="danger4">Danger 4</label>
                                </li>
                                <li>
                                    <input type="checkbox" id="danger5">
                                    <label for="danger5">Danger 5</label>
                                </li>
                                <li>
                                    <input type="checkbox" id="danger6">
                                    <label for="danger6">Danger 6</label>
                                </li>
                                <li>
                                    <input type="checkbox" id="danger7">
                                    <label for="danger7">Danger 7</label>
                                </li>
                                <li>
                                    <input type="checkbox" id="danger8">
                                    <label for="danger8">Danger 8</label>
                                </li>
                                <li>
                                    <input type="checkbox" id="danger9">
                                    <label for="danger9">Danger 9</label>
                                </li>
                                <li>
                                    <input type="checkbox" id="danger10">
                                    <label for="danger10">Danger 10</label>
                                </li>
                                <li>
                                    <input type="checkbox" id="danger11">
                                    <label for="danger11">Danger 11</label>
                                </li>
                                <li>
                                    <input type="checkbox" id="danger12">
                                    <label for="danger12">Danger 12</label>
                                </li>
                                <li>
                                    <input type="checkbox" id="danger13">
                                    <label for="danger13">Danger 13</label>
                                </li>
                                <li>
                                    <input type="checkbox" id="danger14">
                                    <label for="danger14">Danger 14</label>
                                </li>
                                <li>
                                    <input type="checkbox" id="danger15">
                                    <label for="danger15">Danger 15</label>
                                </li>
                                <li>
                                    <input type="checkbox" id="danger16">
                                    <label for="danger16">Danger 16</label>
                                </li>
                                <li>
                                    <input type="checkbox" id="danger17">
                                    <label for="danger17">Danger 17</label>
                                </li>
                                <li>
                                    <input type="checkbox" id="danger18">
                                    <label for="danger18">Danger 18</label>
                                </li>
                                <li>
                                    <input type="checkbox" id="danger19">
                                    <label for="danger19">Danger 19</label>
                                </li>
                                <li>
                                    <input type="checkbox" id="danger20">
                                    <label for="danger20">Danger 20</label>
                                </li>
                                <li>
                                    <input type="checkbox" id="danger21">
                                    <label for="danger21">Danger 21</label>
                                </li>
                                <li>
                                    <input type="checkbox" id="danger22">
                                    <label for="danger22">Danger 22</label>
                                </li>
                                <li>
                                    <input type="checkbox" id="danger23">
                                    <label for="danger23">Danger 23</label>
                                </li>
                                <li>
                                    <input type="checkbox" id="danger24">
                                    <label for="danger24">Danger 24</label>
                                </li>
                                <li>
                                    <input type="checkbox" id="danger25">
                                    <label for="danger25">Danger 25</label>
                                </li>
                                <li>
                                    <input type="checkbox" id="danger26">
                                    <label for="danger26">Danger 26</label>
                                </li>
                                <li>
                                    <input type="checkbox" id="danger27">
                                    <label for="danger27">Danger 27</label>
                                </li>
                                <li>
                                    <input type="checkbox" id="danger28">
                                    <label for="danger28">Danger 28</label>
                                </li>
                                <li>
                                    <input type="checkbox" id="danger29">
                                    <label for="danger29">Danger 29</label>
                                </li>
                                <li>
                                    <input type="checkbox" id="danger30">
                                    <label for="danger30">Danger 30</label>
                                </li>
                                <li>
                                    <input type="checkbox" id="danger31">
                                    <label for="danger31">Danger 31</label>
                                </li>
                                <li>
                                    <input type="checkbox" id="danger32">
                                    <label for="danger32">Danger 32</label>
                                </li>
                                <li>
                                    <input type="checkbox" id="danger33">
                                    <label for="danger33">Danger 33</label>
                                </li>
                                <li>
                                    <input type="checkbox" id="danger34">
                                    <label for="danger34">Danger 34</label>
                                </li>
                                <li>
                                    <input type="checkbox" id="danger35">
                                    <label for="danger35">Danger 35</label>
                                </li>
                                <li>
                                    <input type="checkbox" id="danger36">
                                    <label for="danger36">Danger 36</label>
                                </li>
                                <li>
                                    <input type="checkbox" id="danger37">
                                    <label for="danger37">Danger 37</label>
                                </li>
                                <li>
                                    <input type="checkbox" id="danger38">
                                    <label for="danger38">Danger 38</label>
                                </li>
                                <li>
                                    <input type="checkbox" id="danger39">
                                    <label for="danger39">Danger 39</label>
                                </li>
                                <li>
                                    <input type="checkbox" id="danger40">
                                    <label for="danger40">Danger 40</label>
                                </li>
                                <li>
                                    <input type="checkbox" id="danger41">
                                    <label for="danger41">Danger 41</label>
                                </li>
                                <li>
                                    <input type="checkbox" id="danger42">
                                    <label for="danger42">Danger 42</label>
                                </li>
                                <li>
                                    <input type="checkbox" id="danger43">
                                    <label for="danger43">Danger 43</label>
                                </li>
                                <li>
                                    <input type="checkbox" id="danger44">
                                    <label for="danger44">Danger 44</label>
                                </li>
                                <li>
                                    <input type="checkbox" id="danger45">
                                    <label for="danger45">Danger 45</label>
                                </li>
                                <li>
                                    <input type="checkbox" id="danger46">
                                    <label for="danger46">Danger 46</label>
                                </li>
                                <li>
                                    <input type="checkbox" id="danger47">
                                    <label for="danger47">Danger 47</label>
                                </li>
                                <li>
                                    <input type="checkbox" id="danger48">
                                    <label for="danger48">Danger 48</label>
                                </li>
                                <li>
                                    <input type="checkbox" id="danger49">
                                    <label for="danger49">Danger 49</label>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="line">
                        <div class="left"></div>
                        <div class="right">
                            <button class="btn btn-yellow btn-inv">Ajouter le DU</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
@endsection
