@if(!isset($page['nav']))
    @php($page['nav'] = true)
@endif
<nav class="nav">
    <img src="" alt="logo">
    @if($page['nav'] !== false)

        <div>
            @if($page['nav'] !== 'oza')
            <div class="col-3 d-flex justify-content-around">
                <img src="" alt="Logo BIOCOOP">
                <div class="btn-group-dropdown">
                    <button type="button" class="btn toggle-dropdown">
                        Document unique 1
                    </button>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item" href="{{route('dashboard.dashboard')}}">Document unique 1</a>
                        <a class="dropdown-item" href="{{route('dashboard.dashboard')}}">Document unique 2</a>
                        <a class="dropdown-item" href="{{route('dashboard.dashboard')}}">Document unique 3</a>
                    </div>
                </div>
            </div>
            <div class="nav-link">
                <i class="far fa-envelope"></i>
                <p>Contacter <br/> un expert</p>
            </div>
            @endif
            <div class="nav-link">
                <i class="far fa-user-circle"></i>
                <p>Profil</p>
            </div>
            <div class="nav-link">
                <a href="{{route('auth.logout')}}">
                    <i class="fas fa-sign-out-alt"></i>
                </a>
            </div>
        </div>
    @endif
</nav>
