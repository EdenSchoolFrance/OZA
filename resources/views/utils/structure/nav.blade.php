<nav class="nav">
    <div>
        <img src="" alt="logo">
        @if (Auth::check() && Auth::user()->oza && isset($sd))
            <a href="{{ route('admin.client') }}" class="btn-back"><i class="fas fa-chevron-left"></i> {{ "Retour interface OZA" }}</a>
        @endif
    </div>

    @if (Auth::check())
        <div>
            @isset($sd)
                <div class="col-3 d-flex justify-content-around">
                    <img src="/logo" alt="Logo">
                    <div class="btn-group-dropdown">
                        <button type="button" class="btn toggle-dropdown @if(count($sd->client->single_documents) < 2) disabled @endif">
                            DU - {{ $sd->name }}
                        </button>
                        <div class="dropdown-menu dropdown-menu-right">
                            @foreach($sd->client->single_documents as $du)
                                @if ($du->id !== $sd->id)
                                    <a class="dropdown-item" href="{{ route('dashboard', [$du->id]) }}">{{ $du->name }}</a>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            @endisset
            @if (!Auth::user()->oza)
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
                <a href="{{ route('auth.logout') }}">
                    <i class="fas fa-sign-out-alt"></i>
                </a>
            </div>
        </div>
    @endif
</nav>
