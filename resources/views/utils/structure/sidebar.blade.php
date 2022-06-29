<div class="sidebar">
    <ul class="nav-sidebar">
        @if (Auth::user()->hasAccess('oza') && !isset($single_document))
            @if (Auth::user()->hasPermission('ADMIN'))
                <li class="sidebar-nav-item {{ $page['sidebar'] == "users" ? 'active' : '' }}">
                    <a href="#" class="sidebar-nav-link"><i class="fas fa-user"></i><span>Utilisateurs</span></a>
                    <ul class="sub-group-menu" style="{{ $page['sidebar'] == "users" ? 'display: block' : '' }}">
                        @if (Auth::user()->hasPermission('ADMIN'))
                            <li class="sidebar-nav-item {{ $page['sidebar'] == "users" && $page['sub_sidebar'] == "create" ? 'active' : '' }}">
                                <a href="{{ route('admin.user.create') }}" class="sidebar-nav-link"><i class="fas fa-angle-right"></i>Ajouter un utilisateur</a>
                            </li>
                        @endif
                        <li class="sidebar-nav-item {{ $page['sidebar'] == "users" && $page['sub_sidebar'] == "list" ? 'active' : '' }}">
                            <a href="{{route('admin.users')}}" class="sidebar-nav-link"><i class="fas fa-angle-right"></i>Liste des utilisateurs</a>
                        </li>
                    </ul>
                </li>
            @endif
            <li class="sidebar-nav-item {{ $page['sidebar'] == "clients" ? 'active' : '' }}">
                <a class="sidebar-nav-link"><i class="fas fa-building"></i><span>Clients</span></a>
                <ul class="sub-group-menu" style="{{ $page['sidebar'] == "clients" ? 'display: block' : '' }}">
                    @if (Auth::user()->hasPermission('ADMIN'))
                        <li class="sidebar-nav-item {{ $page['sidebar'] == "clients" && $page['sub_sidebar'] == "create" ? 'active' : '' }}">
                            <a href="{{ route('admin.client.create') }}" class="sidebar-nav-link"><i class="fas fa-angle-right"></i>Ajouter un client</a>
                        </li>
                    @endif
                    <li class="sidebar-nav-item {{ $page['sidebar'] == "clients" && $page['sub_sidebar'] == "list" ? 'active' : '' }}">
                        <a href="{{ route('admin.clients') }}" class="sidebar-nav-link"><i class="fas fa-angle-right"></i>Liste des clients</a>
                    </li>
                    <li class="sidebar-nav-item {{ $page['sidebar'] == "clients" && $page['sub_sidebar'] == "single_document" ? 'active' : '' }}">
                        <a href="{{ route('admin.single_documents') }}" class="sidebar-nav-link"><i class="fas fa-angle-right"></i>Liste des DU</a>
                    </li>
                </ul>
            </li>
            @if (Auth::user()->hasPermission('ADMIN'))
            <li class="sidebar-nav-item {{ $page['sidebar'] == "help" ? 'active' : '' }}">
                <a class="sidebar-nav-link"><i class="fas fa-database"></i><span>Aide à la complétion</span></a>
                <ul class="sub-group-menu" style="{{ $page['sidebar'] == "help" ? 'display: block' : '' }}">
                    <li class="sidebar-nav-item {{ $page['sidebar'] == "help" && $page['sub_sidebar'] == "work_unit" ? 'active' : '' }}">
                        <a href="{{ route('admin.help.workunit') }}" class="sidebar-nav-link"><i class="fas fa-angle-right"></i>Unité de travail</a>
                    </li>
                    <li class="sidebar-nav-item {{ $page['sidebar'] == "help" && $page['sub_sidebar'] == "item" ? 'active' : '' }}">
                        <a href="{{ route('admin.help.item') }}" class="sidebar-nav-link"><i class="fas fa-angle-right"></i>Items des UT</a>
                    </li>
                    <li class="sidebar-nav-item {{ $page['sidebar'] == "help" && $page['sub_sidebar'] == "danger" ? 'active' : '' }}">
                        <a href="{{ route('admin.help.danger') }}" class="sidebar-nav-link"><i class="fas fa-angle-right"></i>Danger</a>
                    </li>
                    <li class="sidebar-nav-item {{ $page['sidebar'] == "help" && $page['sub_sidebar'] == "risk" ? 'active' : '' }}">
                        <a href="{{ route('admin.help.risk') }}" class="sidebar-nav-link"><i class="fas fa-angle-right"></i>Risque</a>
                    </li>
                </ul>
            </li>
            @endif
            <li class="sidebar-nav-item">
                <a href="#" class="sidebar-nav-link"><i class="fas fa-info-circle"></i><span>Liste des risques</span></a>
            </li>
        @endif

        @isset($single_document)
            <li class="sidebar-nav-item {{ $page['sidebar'] == "dashboard" ? 'active' : '' }}">
                <a href="{{route('dashboard', [$single_document->id])}}" class="sidebar-nav-link"><i class="fas fa-table"></i><span>Tableau de bord</span></a>
            </li>
            <li class="sidebar-nav-item {{ $page['sidebar'] == "structure" ? 'active' : '' }}">
                <a href="#" class="sidebar-nav-link"><i class="fas fa-info-circle"></i><span>Structure</span></a>
                <ul class="sub-group-menu" style="{{ $page['sidebar'] == "structure" ? 'display: block' : '' }}">
                    <li class="sidebar-nav-item {{ $page['sidebar'] == "structure" && $page['sub_sidebar'] == "presentation" ? 'active' : '' }}">
                        <a href="{{route('presentation', [$single_document->id])}}" class="sidebar-nav-link"><i class="fas fa-angle-right"></i>Présentation</a>
                    </li>
                    <li class="sidebar-nav-item {{ $page['sidebar'] == "structure" && $page['sub_sidebar'] == "work_units" ? 'active' : '' }}">
                        <a href="{{route('work.index',[$single_document->id])}}" class="sidebar-nav-link"><i class="fas fa-angle-right"></i>Unité de travail</a>
                    </li>
                    @if (Auth::user()->hasPermission(['ADMIN', 'EXPERT', 'MANAGER']))
                        <li class="sidebar-nav-item {{ $page['sidebar'] == "structure" && $page['sub_sidebar'] == "users" ? 'active' : '' }}">
                            <a href="{{route('user.client.index',[$single_document->id])}}" class="sidebar-nav-link"><i class="fas fa-angle-right"></i>Utilisateurs</a>
                        </li>
                    @endif
                </ul>
            </li>
            <li class="sidebar-nav-item {{ $page['sidebar'] == "risk_pro" ? 'active' : '' }}">
                <a href="#" class="sidebar-nav-link"><i class="fas fa-exclamation-triangle"></i><span>Evaluation des risques</span></a>
                <ul class="sub-group-menu" style="{{ $page['sidebar'] == "risk_pro" ? 'display: block' : '' }}">
                    <li class="sidebar-nav-item {{ $page['sidebar'] == "risk_pro" && $page['sub_sidebar'] == "risk_all" ? 'active' : '' }}">
                        <a href="{{route('risk.all',[$single_document->id])}}" class="sidebar-nav-link"><i class="fas fa-angle-right"></i>Tous les risques</a>
                    </li>
                    @foreach ($single_document->dangers as $danger)
                        <li class="sidebar-nav-item {{ $page['sidebar'] == "risk_pro" && $page['sub_sidebar'] == "danger_" . $danger->id ? 'active' : '' }}">
                            <a href="{{ route('danger.index', [$single_document->id, $danger->id]) }}" class="sidebar-nav-link"><i class="fas fa-angle-right"></i>{{ $danger->danger->name }}</a>
                            <i class="fas fa-check {{ $danger->validated ? 'checked' : 'unchecked' }}"></i>
                        </li>
                    @endforeach
                </ul>
            </li>
            <li class="sidebar-nav-item {{ $page['sidebar'] == "risk_post" ? 'active' : '' }}">
                <a href="{{ route('risk.post',[$single_document->id]) }}" class="sidebar-nav-link"><i class="fas fa-info-circle"></i><span>Postes à risque</span></a>
            </li>
            <li class="sidebar-nav-item {{ $page['sidebar'] == "action_plan" ? 'active' : '' }}">
                <a href="#" class="sidebar-nav-link"><i class="fas fa-info-circle"></i><span>Plan d'action</span></a>
                <ul class="sub-group-menu" style="{{ $page['sidebar'] == "action_plan" ? 'display: block' : '' }}">
                    <li class="sidebar-nav-item {{ $page['sidebar'] == "action_plan" && $page['sub_sidebar'] == "restraint_porposed" ? 'active' : '' }}">
                        <a href="{{route('restraint.index', [$single_document->id])}}" class="sidebar-nav-link"><i class="fas fa-angle-right"></i>Mesures à prendre</a>
                    </li>
                    <li class="sidebar-nav-item {{ $page['sidebar'] == "action_plan" && $page['sub_sidebar'] == "restraint_archived" ? 'active' : '' }}">
                        <a href="{{route('restraint.archived',[$single_document->id])}}" class="sidebar-nav-link"><i class="fas fa-angle-right"></i>Mesures archivées</a>
                    </li>
                </ul>
            </li>
            @if ($single_document->risk_psycho)
                <li class="sidebar-nav-item {{ $page['sidebar'] == "risk_psycho" ? 'active' : '' }}">
                    <a href="#" class="sidebar-nav-link"><i class="fas fa-info-circle"></i><span>Risques psychosociaux</span></a>
                    <ul class="sub-group-menu" style="{{ $page['sidebar'] == "risk_psycho" ? 'display: block' : '' }}">
                        @foreach ($single_document->psychosocial_groups as $psychosocial_group)
                            <li class="sidebar-nav-item {{ $page['sidebar'] == "risk_psycho" && ($page['sub_sidebar'] == $psychosocial_group->id . ".evaluation" || $page['sub_sidebar'] == $psychosocial_group->id . ".restraint") ? 'active' : '' }}">
                                <p class="sidebar-nav-link">{{ $psychosocial_group->name }}</p>
                            </li>
                            <li class="sidebar-nav-item {{ $page['sidebar'] == "risk_psycho" && $page['sub_sidebar'] == $psychosocial_group->id . ".evaluation" ? 'active' : '' }}">
                                <a href="{{ route('risk_psycho.evaluation', [$single_document->id, $psychosocial_group->id]) }}" class="sidebar-nav-link"><i class="fas fa-angle-right"></i>Evaluations</a>
                            </li>
                            <li class="sidebar-nav-item {{ $page['sidebar'] == "risk_psycho" && $page['sub_sidebar'] == $psychosocial_group->id . ".restraint" ? 'active' : '' }}">
                                <a href="#" class="sidebar-nav-link"><i class="fas fa-angle-right"></i>Mesures</a>
                            </li>
                        @endforeach
                    </ul>
                </li>
            @endif
        @endisset

        <li class="sidebar-nav-item {{ $page['sidebar'] == "regulatory_reminders" ? 'active' : '' }}">
            <a href="{{ route('documentation', isset($single_document) ? [$single_document->id, 'regulatory_reminders'] : ['regulatory_reminders']) }}" class="sidebar-nav-link"><i class="fas fa-info-circle"></i><span>Rappels règlementaires</span></a>
        </li>
        <li class="sidebar-nav-item {{ $page['sidebar'] == "documentations" ? 'active' : '' }}">
            <a href="{{ route('documentation', isset($single_document) ? [$single_document->id, 'documentations'] : ['documentations']) }}" class="sidebar-nav-link"><i class="far fa-file"></i><span>Documentations</span></a>
        </li>
    </ul>
</div>
