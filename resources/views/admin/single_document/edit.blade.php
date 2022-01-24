@extends('app')

@section('content')
    <div class="content client">
        <div class="card card--add-client">
            <form class="card-body" action="{{ route('admin.single_document.update', [$sd->client->id, $sd->id]) }}" method="post">
                @csrf
                @if (Auth::user()->hasPermission('ADMIN'))
                    <div class="row">
                        <div class="line">
                            <div class="left"></div>
                            <div class="right">
                                <button type="button" class="btn btn-danger" data-modal=".modal--delete">Supprimer le document unique</button>
                            </div>
                        </div>
                    </div>
                @endif
                <div class="row">
                    <div class="line">
                        <div class="left">
                            <label for="name_single_document">Intitulé du DU</label>
                        </div>
                        <div class="right">
                            <input type="text" name="name_single_document" id="name_single_document" class="form-control @error('name_single_document') invalid @enderror" value="{{ old('name_single_document') ? old('name_single_document') : $sd->name }}" placeholder="Indiquer le nom du DU">
                            @error('name_single_document')
                                <p class="message-error">{{ $message }}</p>
                            @enderror
                            @error('dangers')
                                <p class="message-error">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="line">
                        <div class="left">
                            <p>Liste des dangers associés</p>
                        </div>
                        <div class="right right--btn">
                            @foreach ($packs as $pack)
                                <button type="button" class="btn btn-yellow btn-text select-pack" data-pack="{{ $pack->id }}">{{ $pack->name }}</button>
                            @endforeach
                            <button type="button" class="btn btn-yellow btn-text uncheck-pack">Tout décocher</button>
                        </div>
                    </div>
                    <div class="line">
                        <div class="left">
                        </div>
                        <div class="right right--check">
                            @foreach ($dangers as $danger)
                                <div>
                                    <input type="checkbox" class="radio-checkbox item-pack" data-pack="{{ $danger->packs->pluck('id')->implode(',') }}" id="danger_{{ $danger->id }}" name="dangers[{{ $danger->id }}]" value="{{ $danger->id }}" {{ old('dangers.'. $danger->id) ? 'checked' : '' }} {{ in_array($danger->id, $sd->dangers->pluck('danger_id')->toArray()) ? 'checked' : '' }}>
                                    <label for="danger_{{ $danger->id }}">{{ $danger->name }}</label>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="line">
                        <div class="left"></div>
                        <div class="right">
                            <button class="btn btn-yellow btn-inv">Mettre à jour le DU</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>

        @if (Auth::user()->hasPermission('ADMIN'))
            <div class="modal modal--delete">
                <div class="modal-dialog">
                    <form class="modal-content" action="{{ route('admin.single_document.delete', [$sd->client->id, $sd->id]) }}" method="POST">
                        @csrf
                        <div class="modal-header">
                            <p class="title">Confirmer la suppression</p>
                            <button type="button" class="btn-close" data-dismiss="modal"><i class="fas fa-times"></i></button>
                        </div>
                        <div class="modal-body">
                            <p>Êtes-vous sûr.e du vouloir supprimer ce document unique ?</p>
                            <div>
                                <button type="submit" class="btn btn-yellow">Supprimer</button>
                                <button type="button" class="btn btn-inv btn-yellow btn-small" data-dismiss="modal"> Annuler</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        @endif
    </div>
@endsection

@section('script')
    <script src="/js/app/client.js"></script>
@endsection
