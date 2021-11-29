<div class="header">
    @if (isset($page['link_back']))
        <a href="{{ $page['link_back'] }}" class="btn-back"><i class="fas fa-chevron-left"></i> {{ isset($page['text_back']) ? $page['text_back'] : "Retour" }}</a>
    @endif
    <h1>{{ $page['title'] }}</h1>
    @if (isset($page['infos']))
        <div class="infos">
            <i class="fas fa-info-circle"></i>
            <p>
                {{ $page['infos'] }}
            </p>
        </div>
    @endif
    @if (isset($page['dangers']))
        <div class="dangers">
            <p>Danger :</p>
            <p>{{ $page['dangers'] }}</p>
        </div>
    @endif
</div>