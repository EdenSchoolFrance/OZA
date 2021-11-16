@extends('app')

@section('content')
<div class="body">
    <div class="card card--reflection">
        <form class="card-body" action="" method="POST">
            @csrf
            <div class="row">
                <div class="line">
                    <div class="left">
                        <i class="far fa-question-circle"></i>
                        <div>
                            <p>Pistes de réflexion :</p>
                            <ul>
                                <li>Y-a-t-il des SST</li>
                                <li>Y-a-t-il une trousse de secours à disposition</li>
                                <li>Combien</li>
                                <li>Où est elle (sont-elles)</li>
                                <li>Est-elle vérifiée régulièrement</li>
                            </ul>
                        </div>
                    </div>
                    <div class="right">
                        <textarea type="text" name="comment" class="form-control" placeholder="Commentaire"></textarea>
                        <button class="btn" type="submit">Enregistrer le commentaire</button>
                    </div>
                </div>
            </div>
        </form>
        <form class="card-footer card-footer--exist" action="" method="POST">
            @csrf
            <input type="hidden" name="checked" value=""/>
            <p>Ce danger concerne quelqu’un au sein de l’entreprise ?</p>
            <button type="submit" data-value="true" class="btn btn-radio btn-radio--checked">Oui</button>
            <button type="submit" data-value="false" class="btn btn-radio">Non</button>
        </form>
    </div>


    <div class="card card--risk card--risk-stretchable card--risk-opened">
        <div class="card-header">
            <h2 class="title">UT <span>TOUS</span></h2>
            <form class="form-risk-checked" action="" method="POST">
                @csrf
                <input type="hidden" name="checked" value=""/>
                <p>Ce danger concerne quelqu’un au sein de l’entreprise ?</p>
                <button type="submit" data-value="true" class="btn btn-radio">Oui</button>
                <button type="submit" data-value="false" class="btn btn-radio">Non</button>
            </form>
        </div>
        <div class="card-body" style="display: block">
            <table class="table table--risks">
                <thead>
                    <tr>
                        <th>Risque identifié</th>
                        <th>RB</th>
                        <th>RR</th>
                        <th>Mesure  existante</th>
                        <th>Mesure proposée</th>
                        <th>Criticité</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <p>Exposition au sang de la victime en prodiguant des soins à un accidenté du travail.</p>
                            <p>Rappel engin : Exposition au sang de la victime en prodiguant des soins à un accidenté du travail.</p>
                        </td>
                        <td>
                            <button class="btn btn-yellow btn-small">10</button>
                            <ul>
                                <li><span class="light-grey">F</span> An</li>
                                <li><span class="light-grey">P</span> Faible</li>
                                <li><span class="light-grey">GP</span> ASA</li>
                                <li><span class="light-grey">ID</span> NON</li>
                            </ul>
                        </td>
                        <td>
                            <button class="btn btn-success btn-small">10</button>
                        </td>
                        <td>
                            <div>
                                <div class="list-point list-point--green"></div>
                                <p>Pas d’antécédent connu d’accident du travail et / ou de maladie professionnelle généré par le CO2.</p>
                            </div>
                        </td>
                        <td>
                            <div>
                                <div class="list-point list-point--yellow"></div>
                                <p>Obligation réglementaire : Mettre en place une ventilation mécanique assurant en permanence un débit de 25 m3/h/occupant dans les bureaux et de 30 m3/h/occupant dans les salles de réunion</p>
                            </div>
                            <div>
                                <div class="list-point list-point--yellow"></div>
                                <p>Réaliser l’évaluation détaillée du risque chimique selon les prescriptions réglementaires.</p>
                            </div>
                        </td>
                        <td>
                            <button type="button" class="btn btn-success btn-small">Acceptable</button>
                        </td>
                        <td><i class="far fa-edit"></i><i class="fas fa-trash"></i></td>
                    </tr>

                    <tr>
                        <td>
                            <p>Exposition au sang de la victime en prodiguant des soins à un accidenté du travail.</p>
                            <p>Rappel engin : Exposition au sang de la victime en prodiguant des soins à un accidenté du travail.</p>
                        </td>
                        <td>
                            <button class="btn btn-yellow btn-small">10</button>
                            <ul>
                                <li><span class="light-grey">F</span> An</li>
                                <li><span class="light-grey">P</span> Faible</li>
                                <li><span class="light-grey">GP</span> ASA</li>
                                <li><span class="light-grey">ID</span> NON</li>
                            </ul>
                        </td>
                        <td>
                            <button class="btn btn-success btn-small">10</button>
                        </td>
                        <td>
                            <div>
                                <div class="list-point list-point--green"></div>
                                <p>Pas d’antécédent connu d’accident du travail et / ou de maladie professionnelle généré par le CO2.</p>
                            </div>
                        </td>
                        <td>
                            <div>
                                <div class="list-point list-point--yellow"></div>
                                <p>Obligation réglementaire : Mettre en place une ventilation mécanique assurant en permanence un débit de 25 m3/h/occupant dans les bureaux et de 30 m3/h/occupant dans les salles de réunion</p>
                            </div>
                            <div>
                                <div class="list-point list-point--yellow"></div>
                                <p>Réaliser l’évaluation détaillée du risque chimique selon les prescriptions réglementaires.</p>
                            </div>
                        </td>
                        <td>
                            <button type="button" class="btn btn-success btn-small">Acceptable</button>
                        </td>
                        <td><i class="far fa-edit"></i><i class="fas fa-trash"></i></td>
                    </tr>
                </tbody>
                <tfoot>
                    <tr class="no-data">
                        <td colspan="7"><a href="/risk/accident/create" class="btn btn-inv btn-yellow"><i class="fas fa-plus"></i> AJOUTER UN RISQUE</a></td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>

    <div class="card card--risk card--risk-stretchable">
        <div class="card-header">
            <h2 class="title">UT <span>TEST 1</span></h2>
            <form class="form-risk-checked" action="" method="POST">
                @csrf
                <input type="hidden" name="checked" value=""/>
                <p>Ce danger concerne quelqu’un au sein de l’entreprise ?</p>
                <button type="submit" data-value="true" class="btn btn-radio">Oui</button>
                <button type="submit" data-value="false" class="btn btn-radio">Non</button>
            </form>
        </div>
        <div class="card-body">
            <table class="table table--accident">
                <tbody>
                    <tr class="no-data">
                        <td colspan="7">Aucun risque identifié</td>
                    </tr>
                </tbody>
                <tfoot>
                    <tr class="no-data">
                        <td colspan="7"><a href="/risk/accident/create" class="btn btn-add-inv"><i class="fas fa-plus"></i> AJOUTER UN RISQUE</a></td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>

    <div class="card card--risk">
        <div class="card-header">
            <h2 class="title">UT <span>TEST 2</span></h2>
            <p class="message-alert">Attention unité de travail non validée</p>
        </div>
    </div>

    <div class="card card--validate-risk">
        <form class="card-body" action="" method="POST">
            @csrf
            <button class="btn btn-send" disabled>Valider le danger</button>
        </div>
    </div>
</div>
@endsection

@section('script')
    <script src="/js/app/risk.js"></script>
@endsection
