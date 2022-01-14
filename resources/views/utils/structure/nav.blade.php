<nav class="nav">
    <div>
        <img src="{{ asset('/img/logo.png') }}" alt="Logo OZA">
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
                        @if (Auth::user()->hasAccess('oza'))
                            <button type="button" class="btn toggle-dropdown @if(count($single_document->client->single_documents) == 1) disabled @endif">
                                DU - {{ $single_document->name }}
                            </button>
                            <div class="dropdown-menu dropdown-menu-right">
                                @foreach($single_document->client->single_documents as $sd)
                                    @if ($sd->id !== $single_document->id)
                                        <a class="dropdown-item" href="{{ route('dashboard', [$sd->id]) }}">{{ $sd->name }}</a>
                                    @endif
                                @endforeach
                            </div>
                        @else
                            <button type="button" class="btn toggle-dropdown @if(count(Auth::user()->single_documents->where('archived', 0)) == 1) disabled @endif">
                                DU - {{ $single_document->name }}
                            </button>
                            <div class="dropdown-menu dropdown-menu-right">
                                @foreach(Auth::user()->single_documents->where('archived', 0) as $sd)
                                    @if ($sd->id !== $single_document->id)
                                        <a class="dropdown-item" href="{{ route('dashboard', [$sd->id]) }}">{{ $sd->name }}</a>
                                    @endif
                                @endforeach
                            </div>
                        @endif
                    </div>
                </div>
            @endisset

            @if (Auth::user()->hasAccess('client'))
                <div class="nav-link" data-tooltip=".tooltip--contact-expert">
                    <i class="far fa-envelope"></i>
                    <p>Contacter <br/> un expert</p>
                </div>
            @endif

            @if (Auth::user()->first_connection !== 1)
                <div class="nav-link">
                    <i class="far fa-user-circle"></i>
                    <p>Profil</p>
                </div>
            @endif
            <div class="nav-link">
                <a href="{{ route('logout') }}" class="nav-link">
                    <i class="fas fa-sign-out-alt"></i>
                </a>
            </div>
        </div>

        <div class="tooltip tooltip--contact-expert">
            <p>Tootltip</p>
        </div>
    @endif
</nav>
