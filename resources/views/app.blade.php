<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>OZA</title>

        <link rel="stylesheet" href="/css/lib/fontawesome.min.css">
        <link rel="stylesheet" href="/css/main.min.css">
    </head>
    <body>
        @include('utils.nav')

        <main>
            @include('utils.sidebar')

            <div class="container">

                @include('utils.header')

                @yield('content')
                {{-- <div class="body">
                    <form class="card card--general-infos" action="" method="POST">
                        <div class="card-header">
                            <h2 class="title">Informations générales</h2>
                            <button type="button" class="btn btn-edit-card">Modifier<i class="far fa-edit"></i></button>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="line">
                                    <div class="left">
                                        <label for="name_enterprise">Nom de l’entreprise</label>
                                    </div>
                                    <div class="right">
                                        <input type="text" name="name_enterprise" class="form-control" placeholder="Indiquer le nom de votre entreprise" value="Biocoop" disabled>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="line">
                                    <div class="left">
                                    </div>
                                    <div class="right">
                                        <h3>Adresse de l’entreprise</h3>
                                    </div>
                                </div>
                                <div class="line">
                                    <div class="left">
                                        <label for="adress">Adresse postale</label>
                                    </div>
                                    <div class="right">
                                        <input type="text" name="adress" class="form-control" placeholder="Ligne 1" disabled>
                                    </div>
                                </div>
                                <div class="line hidden"> <!-- add class 'hidden' if value null -->
                                    <div class="left">
                                    </div>
                                    <div class="right">
                                        <input type="text" name="additional_adress" class="form-control" placeholder="Ligne 2" disabled>
                                    </div>
                                </div>
                                <div class="line">
                                    <div class="left">
                                        <label for="city_zipcode">Code postal</label>
                                    </div>
                                    <div class="right right--small">
                                        <input type="text" name="city_zipcode" class="form-control form-control--small" placeholder="Code postal" disabled>
                                    </div>
                                </div>
                                <div class="line">
                                    <div class="left">
                                        <label for="city">Ville</label>
                                    </div>
                                    <div class="right">
                                        <input type="text" name="city" class="form-control form-control--small" placeholder="Ville" disabled>
                                    </div>
                                </div>
                            </div>

                            <div class="row row--submit">
                                <div class="line">
                                    <div class="left">
                                    </div>
                                    <div class="right">
                                        <button type="submit" class="btn btn-send">Enregistrer</button>
                                        <button type="button" class="btn btn-cancel">Annuler</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>

                    <form class="card card--company-activity" action="" method="POST">
                        <div class="card-header">
                            <h2 class="title">Activité de l'entreprise</h2>
                            <button type="button" class="btn btn-edit-card">Modifier<i class="far fa-edit"></i></button>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="line">
                                    <div class="left">
                                        <label for="name_enterprise">Description de l’entreprise</label>
                                    </div>
                                    <div class="right">
                                        <textarea type="text" name="name_enterprise" class="form-control" placeholder="Indiquer le nom de votre entreprise" disabled>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Earum voluptatibus voluptatem similique libero fugit placeat distinctio. Quisquam natus officiis praesentium minus dicta, consequuntur, veritatis eius, animi exercitationem voluptate quis voluptas.</textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="row row--submit">
                                <div class="line">
                                    <div class="left">
                                    </div>
                                    <div class="right">
                                        <button type="submit" class="btn btn-send">Enregistrer</button>
                                        <button type="button" class="btn btn-cancel">Annuler</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>

                    <form class="card card--responsible" action="" method="POST">
                        <div class="card-header">
                            <h2 class="title">Responsable du document au sein de l’entreprise</h2>
                            <button type="button" class="btn btn-edit-card">Modifier<i class="far fa-edit"></i></button>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="line">
                                    <div class="left">
                                        <label for="name_enterprise">Prénom</label>
                                    </div>
                                    <div class="right">
                                        <input type="text" name="firstname" class="form-control" placeholder="Prénom du responsable du DU" disabled>
                                    </div>
                                </div>
                                <div class="line">
                                    <div class="left">
                                        <label for="name_enterprise">Nom</label>
                                    </div>
                                    <div class="right">
                                        <input type="text" name="lastname" class="form-control" placeholder="Nom du responsable du DU" disabled>
                                    </div>
                                </div>
                                <div class="line">
                                    <div class="left">
                                        <label for="name_enterprise">Email</label>
                                    </div>
                                    <div class="right">
                                        <input type="email" name="email" class="form-control invalid" placeholder="Email" disabled>
                                        <p class="message-error">Le format de votre email est invalide</p>
                                    </div>
                                </div>
                                <div class="line">
                                    <div class="left">
                                        <label for="name_enterprise">Téléphone</label>
                                    </div>
                                    <div class="right">
                                        <input type="tel" name="phone" class="form-control" pattern="^(?:(?:(?:\+|00)33\D?(?:\D?\(0\)\D?)?)|0){1}[1-9]{1}(?:\D?\d{2}){4}$" placeholder="00 00 00 00 00" required disabled>
                                    </div>
                                </div>
                            </div>

                            <div class="row row--submit">
                                <div class="line">
                                    <div class="left">
                                    </div>
                                    <div class="right">
                                        <button type="submit" class="btn btn-send">Enregistrer</button>
                                        <button type="button" class="btn btn-cancel">Annuler</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>


                    <div class="card card--table-users">
                        <div class="card-header">
                            <div></div>
                            <button class="btn btn-add">+ AJOUTER UN UTILISATEUR</button>
                        </div>
                        <div class="card-body">
                            <table class=" table table-sortable" style="width:100%">
                                <thead>
                                    <tr>
                                        <th class="th-sort-desc" data-para="0">Nom</th>
                                        <th data-para="1">Prénom</th>
                                        <th data-para="2">Email</th>
                                        <th data-para="3">Accès</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>NOM</td>
                                        <td>Prénom</td>
                                        <td>nom.prénom@email.com</td>
                                        <td>Lecteur</td>
                                        <td><i class="fas fa-trash"></i><i class="far fa-edit"></i></td>
                                    </tr>
                                    <tr>
                                        <td>NOM</td>
                                        <td>Prénom</td>
                                        <td>nom.prénom@email.com</td>
                                        <td>Lecteur</td>
                                        <td><i class="fas fa-trash"></i><i class="far fa-edit"></i></td>
                                    </tr>
                                    <tr>
                                        <td>NOM</td>
                                        <td>Prénom</td>
                                        <td>nom.prénom@email.com</td>
                                        <td>Lecteur</td>
                                        <td><i class="fas fa-trash"></i><i class="far fa-edit"></i></td>
                                    </tr>
                                    <tr>
                                        <td>NOM</td>
                                        <td>Prénom</td>
                                        <td>nom.prénom@email.com</td>
                                        <td>Lecteur</td>
                                        <td><i class="fas fa-trash"></i><i class="far fa-edit"></i></td>
                                    </tr>
                                    <tr>
                                        <td>NOM</td>
                                        <td>Prénom</td>
                                        <td>nom.prénom@email.com</td>
                                        <td>Lecteur</td>
                                        <td><i class="fas fa-trash"></i><i class="far fa-edit"></i></td>
                                    </tr>
                                    <tr>
                                        <td>NOM</td>
                                        <td>Prénom</td>
                                        <td>nom.prénom@email.com</td>
                                        <td>Lecteur</td>
                                        <td><i class="fas fa-trash"></i><i class="far fa-edit"></i></td>
                                    </tr>
                                    <tr>
                                        <td>NOM</td>
                                        <td>Prénom</td>
                                        <td>nom.prénom@email.com</td>
                                        <td>Lecteur</td>
                                        <td><i class="fas fa-trash"></i><i class="far fa-edit"></i></td>
                                    </tr>
                                    <tr>
                                        <td>NOM</td>
                                        <td>Prénom</td>
                                        <td>nom.prénom@email.com</td>
                                        <td>Lecteur</td>
                                        <td><i class="fas fa-trash"></i><i class="far fa-edit"></i></td>
                                    </tr>
                                    <tr>
                                        <td>Michel</td>
                                        <td>Prénom</td>
                                        <td>nom.prénom@email.com</td>
                                        <td>Lecteur</td>
                                        <td><i class="fas fa-trash"></i><i class="far fa-edit"></i></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="card-footer">
                            <div></div>
                            <button class="btn btn-add">+ AJOUTER UN UTILISATEUR</button>
                        </div>
                    </div>

                    <div class="card card--table-works">
                        <div class="card-header">
                            <div></div>
                            <button class="btn btn-add">+ AJOUTER UN UTILISATEUR</button>
                        </div>
                        <div class="card-body">
                            
                        </div>
                    </div>
                </div>

                <div class="footer">
                    Footer
                </div> --}}
            </div>
        </main>


        <script src="/js/utils/main.js"></script>
        <script src="/js/utils/animations.js"></script>
        <script src="/js/utils/sidebar.js"></script>
        <script src="/js/app/dashboard.js"></script>
        @yield('script')
    </body>
</html>
