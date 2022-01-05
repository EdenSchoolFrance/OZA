<div class="sidebar">
    <ul class="nav-sidebar">
        {{-- <li class="sidebar-nav-item">
            <a href="{{ route('dashboard.home') }}" class="sidebar-nav-link"><i class="fas fa-table"></i><span>Tableau de bord</span></a>
        </li> --}}

        @if (Auth::user()->oza && !isset($sd))
            <li class="sidebar-nav-item {{ $page['sidebar'] == "users" ? 'active' : '' }}">
                <a href="#" class="sidebar-nav-link"><i class="fas fa-info-circle"></i><span>Utilisateurs</span></a>
                <ul class="sub-group-menu" style="{{ $page['sidebar'] == "users" ? 'display: block' : '' }}">
                    <li class="sidebar-nav-item {{ $page['sidebar'] == "users" && $page['sub_sidebar'] == "create" ? 'active' : '' }}">
                        <a href="{{ route('admin.user.create') }}" class="sidebar-nav-link"><i class="fas fa-angle-right"></i>Ajouter un utilisateur</a>
                    </li>
                    <li class="sidebar-nav-item {{ $page['sidebar'] == "users" && $page['sub_sidebar'] == "list" ? 'active' : '' }}">
                        <a href="{{route('admin.user')}}" class="sidebar-nav-link"><i class="fas fa-angle-right"></i>Liste des utilisateurs</a>
                    </li>
                </ul>
            </li>
            <li class="sidebar-nav-item {{ $page['sidebar'] == "clients" ? 'active' : '' }}">
                <a class="sidebar-nav-link"><i class="fas fa-info-circle"></i><span>Clients</span></a>
                <ul class="sub-group-menu" style="{{ $page['sidebar'] == "clients" ? 'display: block' : '' }}">
                    <li class="sidebar-nav-item {{ $page['sidebar'] == "clients" && $page['sub_sidebar'] == "create" ? 'active' : '' }}">
                        <a href="{{route('admin.client.create')}}" class="sidebar-nav-link"><i class="fas fa-angle-right"></i>Ajouter un client</a>
                    </li>
                    <li class="sidebar-nav-item {{ $page['sidebar'] == "clients" && $page['sub_sidebar'] == "list" ? 'active' : '' }}">
                        <a href="{{route('admin.client')}}" class="sidebar-nav-link"><i class="fas fa-angle-right"></i>Liste des clients</a>
                    </li>
                    <li class="sidebar-nav-item {{ $page['sidebar'] == "clients" && $page['sub_sidebar'] == "single_document" ? 'active' : '' }}">
                        <a href="{{route('admin.client.single_document')}}" class="sidebar-nav-link"><i class="fas fa-angle-right"></i>Liste des DU</a>
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

        @isset($sd)
            @if($page['sidebar'] !== 'home')
                <li class="sidebar-nav-item {{ $page['sidebar'] == "dashboard" ? 'active' : '' }}">
                    <a href="{{route('dashboard', [$sd->id])}}" class="sidebar-nav-link"><i class="fas fa-table"></i><span>Tableau de bord</span></a>
                </li>
                <li class="sidebar-nav-item {{ $page['sidebar'] == "structure" ? 'active' : '' }}">
                    <a href="#" class="sidebar-nav-link"><i class="fas fa-info-circle"></i><span>Structure</span></a>
                    <ul class="sub-group-menu" style="{{ $page['sidebar'] == "structure" ? 'display: block' : '' }}">
                        <li class="sidebar-nav-item {{ $page['sub_sidebar'] == "presentation" ? 'active' : '' }}">
                            <a href="{{route('presentation', [$sd->id])}}" class="sidebar-nav-link"><i class="fas fa-angle-right"></i>Présentation</a>
                        </li>
                        <li class="sidebar-nav-item {{ $page['sub_sidebar'] == "work_units" ? 'active' : '' }}">
                            <a href="{{route('work.index',[$sd->id])}}" class="sidebar-nav-link"><i class="fas fa-angle-right"></i>Unité de travail</a>
                        </li>
                        <li class="sidebar-nav-item {{ $page['sub_sidebar'] == "users" ? 'active' : '' }}">
                            <a href="{{route('user.client.index',[$sd->id])}}" class="sidebar-nav-link"><i class="fas fa-angle-right"></i>Utilisateurs</a>
                        </li>
                    </ul>
                </li>
                <li class="sidebar-nav-item {{ $page['sidebar'] == "risk_pro" ? 'active' : '' }}">
                    <a href="#" class="sidebar-nav-link"><i class="fas fa-info-circle"></i><span>Risques professionnels</span></a>
                    <ul class="sub-group-menu" style="{{ $page['sidebar'] == "risk_pro" ? 'display: block' : '' }}">
                        {{-- @if($sousSidebar === "comp") {{ 'active' }}@endif --}}
                        <li class="sidebar-nav-item">
                            <a href="#" class="sidebar-nav-link"><i class="fas fa-angle-right"></i>Compétence</a>
                            <i class="fas fa-check unchecked"></i>
                        </li>
                        {{-- @if($sousSidebar === "accident") {{ 'active' }}@endif --}}
                        <li class="sidebar-nav-item {{ $page['sub_sidebar'] == "accident" ? 'active' : '' }}">
                            <a href="{{route('risk.accident',[$sd->id])}}" class="sidebar-nav-link"><i class="fas fa-angle-right"></i>Accident</a>
                            <i class="fas fa-check checked"></i>
                        </li>
                        {{-- @if($sousSidebar === "agent-bio") {{ 'active' }}@endif --}}
                        <li class="sidebar-nav-item">
                            <a href="#" class="sidebar-nav-link"><i class="fas fa-angle-right"></i>Agent biologiques</a>
                            <i class="fas fa-check unchecked"></i>
                        </li>
                        {{-- @if($sousSidebar === "agent-chi") {{ 'active' }}@endif --}}
                        <li class="sidebar-nav-item">
                            <a href="#" class="sidebar-nav-link"><i class="fas fa-angle-right"></i>Agents chimiques</a>
                            <i class="fas fa-check unchecked"></i>
                        </li>
                        {{-- @if($sousSidebar === "agression") {{ 'active' }}@endif --}}
                        <li class="sidebar-nav-item">
                            <a href="#" class="sidebar-nav-link"><i class="fas fa-angle-right"></i>Agression</a>
                            <i class="fas fa-check unchecked"></i>
                        </li>
                        {{-- @if($sousSidebar === "ambiances-ther") {{ 'active' }}@endif --}}
                        <li class="sidebar-nav-item">
                            <a href="#" class="sidebar-nav-link"><i class="fas fa-angle-right"></i>Ambiances thermiques</a>
                            <i class="fas fa-check unchecked"></i>
                        </li>
                        {{-- @if($sousSidebar === "amiamte") {{ 'active' }}@endif --}}
                        <li class="sidebar-nav-item">
                            <a href="#" class="sidebar-nav-link"><i class="fas fa-angle-right"></i>Amiante</a>
                            <i class="fas fa-check unchecked"></i>
                        </li>
                        {{-- @if($sousSidebar === "apti-work") {{ 'active' }}@endif --}}
                        <li class="sidebar-nav-item">
                            <a href="#" class="sidebar-nav-link"><i class="fas fa-angle-right"></i>Aptitude au travail</a>
                            <i class="fas fa-check unchecked"></i>
                        </li>
                        {{-- @if($sousSidebar === "song") {{ 'active' }}@endif --}}
                        <li class="sidebar-nav-item">
                            <a href="#" class="sidebar-nav-link"><i class="fas fa-angle-right"></i>Bruit</a>
                            <i class="fas fa-check unchecked"></i>
                        </li>
                        {{-- @if($sousSidebar === "champ-electo") {{ 'active' }}@endif --}}
                        <li class="sidebar-nav-item">
                            <a href="#" class="sidebar-nav-link"><i class="fas fa-angle-right"></i>Champs électromagnétiques</a>
                            <i class="fas fa-check unchecked"></i>
                        </li>
                    </ul>
                </li>
                <li class="sidebar-nav-item">
                    <a href="#" class="sidebar-nav-link"><i class="fas fa-info-circle"></i><span>Risques psychosociaux</span></a>
                </li>
            @endif
        @endisset

        <li class="sidebar-nav-item">
            <a href="#" class="sidebar-nav-link"><i class="fas fa-info-circle"></i><span>Rappels règlementaires</span></a>
        </li>
        <li class="sidebar-nav-item">
            <a href="#" class="sidebar-nav-link"><i class="far fa-file"></i><span>Documentations</span></a>
        </li>
    </ul>
</div>
