# OZA


### Page système
$page possède plusieurs options :

- title : titre de votre page.
- infos : text juste en dessous du titre.
- dangers : text juste en dessous du titre spécialement pour les pages de danger.
- link_back : lien pour le button retour au-dessus du titre.
- text_back : text du button back.
- sidebar : le nom de la section de la sidebar dans la quelle vous vous trouver.
- sub_sidebar : le nom de la sous section de la sidebar dans la quelle vous vous trouver.
- nav : définis l'affichage de la nav.
- oza : définis quelle sidebar afficher.

Architecture le la sidebar :

- home
- structure
    - presentation
    - work_units
    - users
- risk_pro
    - accident
- users (admin dashboard)
    - addUser
    - listUser
- clients (admin dashboard)
    - addClient
    - listClient
    - listDu
