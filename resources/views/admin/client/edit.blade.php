@extends('app')

@section('content')
    <div class="content client">
        <div class="nav-tabs-group">
            <div class="nav-tabs">
                <button class="btn btn-tabs active" data-tabs="infoGen">Informations générales</button>
            </div>
            <div class="nav-tabs">
                <button class="btn btn-tabs" data-tabs="du">DU associé</button>
            </div>
            <div class="nav-tabs">
                <button class="btn btn-tabs" data-tabs="admin">Administrateur</button>
            </div>
        </div>
        <div class="card card--add-client">
            <div class="card-body">
                <form id="infoGen" class="tabs-content" action="{{ route('admin.client.store') }}" method="POST" enctype="multipart/form-data">
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
                                        <option value="{{ $expert->id }}" {{ old('expert') ? (old('expert') == $expert->id ? 'selected' : '') : ('' == $expert->id ? 'selected' : '') }}>{{ $expert->firstname }} {{ $expert->lastname }} {{ $expert->role->name }}</option>
                                    @endforeach
                                </select>
                                @error('expert')
                                    <p class="message-error">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="line">
                            <div class="left">
                                <h3>Administrateur Responsable client</h3>
                            </div>
                            <div class="right"></div>
                        </div>
                        <div class="line">
                            <div class="left">
                                <label for="firstname">Prénom</label>
                            </div>
                            <div class="right">
                                <input type="text" name="firstname" id="firstname" class="form-control @error('firstname') invalid @enderror" placeholder="Prénom du responsable client" value="{{ old('firstname') ? old('firstname') : $client->firstname }}">
                                @error('firstname')
                                    <p class="message-error">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="line">
                            <div class="left">
                                <label for="lastname">Nom</label>
                            </div>
                            <div class="right">
                                <input type="text" name="lastname" id="lastname" class="form-control @error('lastname') invalid @enderror" placeholder="Nom du responsable client" value="{{ old('lastname') ? old('lastname') : $client->lastname }}">
                                @error('lastname')
                                    <p class="message-error">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="line">
                            <div class="left">
                                <label for="post">Poste</label>
                            </div>
                            <div class="right">
                                <input type="text" name="post" id="post" class="form-control @error('post') invalid @enderror" placeholder="Intitulé du poste" value="{{ old('post') ? old('post') : $client->post }}">
                                @error('post')
                                    <p class="message-error">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="line">
                            <div class="left">
                                <label for="phone">Téléphone</label>
                            </div>
                            <div class="right">
                                <input type="tel" name="phone" id="phone" class="form-control @error('phone') invalid @enderror" pattern="^(?:(?:(?:\+|00)33\D?(?:\D?\(0\)\D?)?)|0){1}[1-9]{1}(?:\D?\d{2}){4}$" placeholder="00 00 00 00 00" value="{{ old('phone') ? old('phone') : $client->phone }}">
                                @error('phone')
                                    <p class="message-error">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="line">
                            <div class="left">
                            </div>
                            <div class="right">
                                <h3>Accès à l’outil</h3>
                            </div>
                        </div>
                        <div class="line">
                            <div class="left">
                                <label for="email">Identifiant (email) </label>
                            </div>
                            <div class="right">
                                <input type="email" name="email" id="email" class="form-control @error('email') invalid @enderror" placeholder="Email" value="{{ old('email') ? old('email') : $client->email }}">
                                @error('email')
                                    <p class="message-error">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="line">
                            <div class="left">
                                <label for="password">Mot de passe</label>
                            </div>
                            <div class="right">
                                <input type="password" name="password" id="password" class="form-control @error('password') invalid @enderror" placeholder="">
                                @error('password')
                                    <p class="message-error">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="line">
                            <div class="left">
                                <label for="password_confirmation">Confirmation du mot de passe</label>
                            </div>
                            <div class="right">
                                <input type="password" name="password_confirmation" id="password_confirmation" class="form-control @error('password_confirmation') invalid @enderror" placeholder="">
                                @error('password_confirmation')
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

                <div id="du" class="tabs-content none">
                    <div class="row">
                        <h2>Document unique du compte</h2>
                    </div>
                    <table class="table table--users table-sortable" style="width:100%">
                        <thead>
                            <tr>
                                <th class="th_lastname th-sort" data-para="0">Intitulé</th>
                                <th class="th_firstname th-sort" data-para="1">Date de création</th>
                                <th class="th_email th-sort" data-para="2">Statut</th>
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

                <div id="admin" class="tabs-content none">
                    <div class="row">
                        <h2>Document unique du compte</h2>
                    </div>
                    <table class="table table--users table-sortable" style="width:100%">
                        <thead>
                        <tr>
                            <th class="th_lastname th-sort" data-para="0">Intitulé</th>
                            <th class="th_firstname th-sort" data-para="1">Date de création</th>
                            <th class="th_email th-sort" data-para="2">Statut</th>
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
    </div>
@endsection

@section('script')
@endsection
