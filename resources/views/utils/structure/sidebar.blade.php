<div class="sidebar">
    <ul class="nav-sidebar">
        @if (Auth::user()->hasAccess('oza') && !isset($single_document))
            @if (Auth::user()->hasPermission('ADMIN'))
                <li class="sidebar-nav-item {{ $page['sidebar'] == "users" ? 'active' : '' }}">
                    <a href="#" class="sidebar-nav-link"><i class="fas fa-info-circle"></i><span>Utilisateurs</span></a>
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
                <a class="sidebar-nav-link"><i class="fas fa-info-circle"></i><span>Clients</span></a>
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
            <li class="sidebar-nav-item">
                <a href="#" class="sidebar-nav-link"><i class="fas fa-info-circle"></i><span>Aide à la complétion</span></a>
            </li>
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
                <a href="#" class="sidebar-nav-link"><i class="fas fa-info-circle"></i><span>Risques professionnels</span></a>
                <ul class="sub-group-menu" style="{{ $page['sidebar'] == "risk_pro" ? 'display: block' : '' }}">
                    <li class="sidebar-nav-item {{ $page['sub_sidebar'] == "accident" ? 'active' : '' }}">
                        <a href="{{route('risk.accident', [$single_document->id])}}" class="sidebar-nav-link"><i class="fas fa-angle-right"></i>Accident</a>
                        <i class="fas fa-check checked"></i>
                    </li>
                    @foreach ($single_document->dangers as $danger)
                        <li class="sidebar-nav-item {{ $page['sidebar'] == "structure" && $page['sub_sidebar'] == "danger_" . $danger->id ? 'active' : '' }}">
                            <a href="{{ route('risk.accident', [$single_document->id]) }}" class="sidebar-nav-link"><i class="fas fa-angle-right"></i>{{ $danger->danger->name }}</a>
                            <i class="fas fa-check {{ $danger->validated ? 'checked' : 'unchecked' }}"></i>
                        </li>
                    @endforeach
                </ul>
            </li>
            <li class="sidebar-nav-item">
                <a href="#" class="sidebar-nav-link"><i class="fas fa-info-circle"></i><span>Risques psychosociaux</span></a>
            </li>
        @endisset

        <li class="sidebar-nav-item {{ $page['sidebar'] == "regulatory_reminders" ? 'active' : '' }}">
            <a href="{{ route('documentation', ['regulatory_reminders']) }}" class="sidebar-nav-link"><i class="fas fa-info-circle"></i><span>Rappels règlementaires</span></a>
        </li>
        <li class="sidebar-nav-item {{ $page['sidebar'] == "documentations" ? 'active' : '' }}">
            <a href="{{ route('documentation', ['documentations']) }}" class="sidebar-nav-link"><i class="far fa-file"></i><span>Documentations</span></a>
        </li>
    </ul>
</div>