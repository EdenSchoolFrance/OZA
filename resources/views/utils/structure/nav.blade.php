<nav class="nav">
    <div>
        <img src="" alt="logo">
        @if (Auth::check() && Auth::user()->oza && isset($single_document))
            <a href="{{ route('admin.clients') }}" class="btn-back"><i class="fas fa-chevron-left"></i> {{ "Retour interface OZA" }}</a>
        @endif
    </div>

    @if (Auth::check())
        <div>
            @isset($single_document)
                <div class="col-3 d-flex justify-content-around">
                    <img src="/logo" alt="Logo">
                    <div class="btn-group-dropdown">
                        <button type="button" class="btn toggle-dropdown @if(count($single_document->client->single_documents->where('archived', 0)) == 1) disabled @endif">
                            DU - {{ $single_document->name }}
                        </button>
                        <div class="dropdown-menu dropdown-menu-right">
                            @foreach($single_document->client->single_documents->where('archived', 0) as $sd)
                                @if ($sd->id !== $single_document->id)
                                    <a class="dropdown-item" href="{{ route('dashboard', [$sd->id]) }}">{{ $sd->name }}</a>
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
