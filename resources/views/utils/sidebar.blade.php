<div class="sidebar">
    <ul class="nav-sidebar">
        @if($page['sidebar'] !== 'home')
        <li class="sidebar-nav-item">
            <a href="#" class="sidebar-nav-link"><i class="fas fa-table"></i><span>Tableau de bord</span></a>
        </li>
        <li class="sidebar-nav-item {{ $page['sidebar'] == "structure" ? 'active' : '' }}">
            <a href="#" class="sidebar-nav-link"><i class="fas fa-info-circle"></i><span>Structure</span></a>
            <ul class="sub-group-menu" style="{{ $page['sidebar'] == "structure" ? 'display: block' : '' }}">
                <li class="sidebar-nav-item {{ $page['sub_sidebar'] == "presentation" ? 'active' : '' }}">
                    <a href="/dashboard" class="sidebar-nav-link"><i class="fas fa-angle-right"></i>Présentation</a>
                </li>
                <li class="sidebar-nav-item {{ $page['sub_sidebar'] == "work_units" ? 'active' : '' }}">
                    <a href="/work" class="sidebar-nav-link"><i class="fas fa-angle-right"></i>Unité de travail</a>
                </li>
                <li class="sidebar-nav-item {{ $page['sub_sidebar'] == "users" ? 'active' : '' }}">
                    <a href="/user" class="sidebar-nav-link"><i class="fas fa-angle-right"></i>Utilisateurs</a>
                </li>
            </ul>
        </li>
        <li class="sidebar-nav-item {{ $page['sidebar'] == "risk_pro" ? 'active' : '' }}">
            <a href="#" class="sidebar-nav-link"><i class="fas fa-info-circle"></i><span>Risques professionnels</span></a>
            <ul class="sub-group-menu" style="{{ $page['sidebar'] == "risk_pro" ? 'display: block' : '' }}">
                {{-- @if($sousSidebar === "comp") {{ 'active' }}@endif --}}
                <li class="sidebar-nav-item">
                    <a href="/risk/" class="sidebar-nav-link"><i class="fas fa-angle-right"></i>Compétence</a>
                    <i class="fas fa-check"></i>
                </li>
                {{-- @if($sousSidebar === "accident") {{ 'active' }}@endif --}}
                <li class="sidebar-nav-item {{ $page['sub_sidebar'] == "accident" ? 'active' : '' }}">
                    <a href="/risk/accident" class="sidebar-nav-link"><i class="fas fa-angle-right"></i>Accident</a>
                    <i class="fas fa-check checked"></i>
                </li>
                {{-- @if($sousSidebar === "agent-bio") {{ 'active' }}@endif --}}
                <li class="sidebar-nav-item">
                    <a href="/risk/accident" class="sidebar-nav-link"><i class="fas fa-angle-right"></i>Agent biologiques</a>
                    <i class="fas fa-check"></i>
                </li>
                {{-- @if($sousSidebar === "agent-chi") {{ 'active' }}@endif --}}
                <li class="sidebar-nav-item">
                    <a href="/risk/accident" class="sidebar-nav-link"><i class="fas fa-angle-right"></i>Agents chimiques</a>
                    <i class="fas fa-check"></i>
                </li>
                {{-- @if($sousSidebar === "agression") {{ 'active' }}@endif --}}
                <li class="sidebar-nav-item">
                    <a href="/risk/accident" class="sidebar-nav-link"><i class="fas fa-angle-right"></i>Agression</a>
                    <i class="fas fa-check"></i>
                </li>
                {{-- @if($sousSidebar === "ambiances-ther") {{ 'active' }}@endif --}}
                <li class="sidebar-nav-item">
                    <a href="/risk/accident" class="sidebar-nav-link"><i class="fas fa-angle-right"></i>Ambiances thermiques</a>
                    <i class="fas fa-check"></i>
                </li>
                {{-- @if($sousSidebar === "amiamte") {{ 'active' }}@endif --}}
                <li class="sidebar-nav-item">
                    <a href="/risk/accident" class="sidebar-nav-link"><i class="fas fa-angle-right"></i>Amiante</a>
                    <i class="fas fa-check"></i>
                </li>
                {{-- @if($sousSidebar === "apti-work") {{ 'active' }}@endif --}}
                <li class="sidebar-nav-item">
                    <a href="/risk/accident" class="sidebar-nav-link"><i class="fas fa-angle-right"></i>Aptitude au travail</a>
                    <i class="fas fa-check"></i>
                </li>
                {{-- @if($sousSidebar === "song") {{ 'active' }}@endif --}}
                <li class="sidebar-nav-item">
                    <a href="/risk/accident" class="sidebar-nav-link"><i class="fas fa-angle-right"></i>Bruit</a>
                    <i class="fas fa-check"></i>
                </li>
                {{-- @if($sousSidebar === "champ-electo") {{ 'active' }}@endif --}}
                <li class="sidebar-nav-item">
                    <a href="/risk/accident" class="sidebar-nav-link"><i class="fas fa-angle-right"></i>Champs électromagnétiques</a>
                    <i class="fas fa-check"></i>
                </li>
            </ul>
        </li>
        <li class="sidebar-nav-item">
            <a href="#" class="sidebar-nav-link"><i class="fas fa-info-circle"></i><span>Risques psychosociaux</span></a>
        </li>
        @endif
        <li class="sidebar-nav-item">
            <a href="#" class="sidebar-nav-link"><i class="fas fa-info-circle"></i><span>Rappels règlementaires</span></a>
        </li>
        <li class="sidebar-nav-item">
            <a href="#" class="sidebar-nav-link"><i class="far fa-file"></i><span>Documentations</span></a>
        </li>
    </ul>
</div>
