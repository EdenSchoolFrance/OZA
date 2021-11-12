<div class="row sidebar">
    <div class="sidebar-body">
        <ul class="nav nav-sidebar-menu sidebar-toggle-view">
            <li class="nav-item sidebar-nav-item">
                <a href="#" class="nav-link"><i class="fas fa-table"></i><span>Tableau de bord</span></a>
            </li>
            <li class="nav-item sidebar-nav-item @if($sidebar === "structure") {{ 'active' }}@endif">
                <a href="#" class="nav-link"><i class="fas fa-info-circle"></i><span>Structure</span></a>
                <ul class="nav sub-group-menu @if($sidebar === "structure") {{ 'menu-open' }}@endif" style="@if($sidebar === "structure") {{ 'display : block;' }}@endif">
                    <li class="nav-item @if($sousSidebar === "pres") {{ 'active' }}@endif">
                        <a href="/dashboard" class="nav-link"><i class="fas fa-angle-right"></i>Présentation</a>
                    </li>
                    <li class="nav-item @if($sousSidebar === "unit-work") {{ 'active' }}@endif">
                        <a href="/work" class="nav-link"><i class="fas fa-angle-right"></i>Unité de travail</a>
                    </li>
                    <li class="nav-item @if($sousSidebar === "user") {{ 'active' }}@endif">
                        <a href="/user" class="nav-link"><i class="fas fa-angle-right"></i>Utilisateurs</a>
                    </li>
                </ul>
            </li>
            <li class="nav-item sidebar-nav-item @if($sidebar === "risk-pro") {{ 'active' }}@endif">
                <a href="#" class="nav-link"><i class="fas fa-info-circle"></i><span>Risques professionnels</span></a>
                <ul class="nav sub-group-menu sidebar--risk @if($sidebar === "risk-pro") {{ 'menu-open' }}@endif" style="@if($sidebar === "risk-pro") {{ 'display : block;' }}@endif">
                    <li class="nav-item @if($sousSidebar === "comp") {{ 'active' }}@endif">
                        <a href="/risk/" class="nav-link"><i class="fas fa-angle-right"></i>Compétence</a>
                        <i class="fas fa-check"></i>
                    </li>
                    <li class="nav-item @if($sousSidebar === "accident") {{ 'active' }}@endif">
                        <a href="/risk/accident" class="nav-link"><i class="fas fa-angle-right"></i>Accident</a>
                        <i class="fas fa-check"></i>
                    </li>
                    <li class="nav-item @if($sousSidebar === "agent-bio") {{ 'active' }}@endif">
                        <a href="/risk/accident" class="nav-link"><i class="fas fa-angle-right"></i>Agent biologiques</a>
                        <i class="fas fa-check"></i>
                    </li>
                    <li class="nav-item @if($sousSidebar === "agent-chi") {{ 'active' }}@endif">
                        <a href="/risk/accident" class="nav-link"><i class="fas fa-angle-right"></i>Agents chimiques</a>
                        <i class="fas fa-check"></i>
                    </li>
                    <li class="nav-item @if($sousSidebar === "agression") {{ 'active' }}@endif">
                        <a href="/risk/accident" class="nav-link"><i class="fas fa-angle-right"></i>Agression</a>
                        <i class="fas fa-check"></i>
                    </li>
                    <li class="nav-item @if($sousSidebar === "ambiances-ther") {{ 'active' }}@endif">
                        <a href="/risk/accident" class="nav-link"><i class="fas fa-angle-right"></i>Ambiances thermiques</a>
                        <i class="fas fa-check"></i>
                    </li>
                    <li class="nav-item @if($sousSidebar === "amiamte") {{ 'active' }}@endif">
                        <a href="/risk/accident" class="nav-link"><i class="fas fa-angle-right"></i>Amiante</a>
                        <i class="fas fa-check"></i>
                    </li>
                    <li class="nav-item @if($sousSidebar === "apti-work") {{ 'active' }}@endif">
                        <a href="/risk/accident" class="nav-link"><i class="fas fa-angle-right"></i>Aptitude au travail</a>
                        <i class="fas fa-check"></i>
                    </li>
                    <li class="nav-item @if($sousSidebar === "song") {{ 'active' }}@endif">
                        <a href="/risk/accident" class="nav-link"><i class="fas fa-angle-right"></i>Bruit</a>
                        <i class="fas fa-check"></i>
                    </li>
                    <li class="nav-item @if($sousSidebar === "champ-electo") {{ 'active' }}@endif">
                        <a href="/risk/accident" class="nav-link"><i class="fas fa-angle-right"></i>Champs électromagnétiques</a>
                        <i class="fas fa-check"></i>
                    </li>
                </ul>
            </li>
            <li class="nav-item sidebar-nav-item">
                <a href="#" class="nav-link"><i class="fas fa-info-circle"></i><span>Risques psychosociaux</span></a>
            </li>
            <li class="nav-item sidebar-nav-item">
                <a href="#" class="nav-link"><i class="fas fa-info-circle"></i><span>Rappels règlementaires</span></a>
            </li>
            <li class="nav-item sidebar-nav-item">
                <a href="#" class="nav-link"><i class="far fa-file"></i><span>Documentations</span></a>
            </li>
        </ul>
    </div>
</div>
