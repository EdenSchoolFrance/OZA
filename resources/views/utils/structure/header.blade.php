<div class="header">
    @if (isset($page['text_back']))
        <a href="{{ $page['url_back'] }}" class="btn-back"><i class="fas fa-chevron-left"></i> {{ $page['text_back'] }}</a>
    @endif
    @if (isset($page['title']))
        <h1>{{ $page['title'] }}</h1>
    @endif
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
    @if (isset($page['ut_info']))
        <div class="dangers">
            <p>Unité de travail :</p>
            <p>{{ $page['ut_info'] }}</p>
        </div>
    @endif
</div>
