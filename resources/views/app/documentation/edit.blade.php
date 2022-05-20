@extends('app')

@section('content')
    <div class="content">
        <form class="card card--doc card--doc-edit" action="{{ route('documentation.update', [$doc->name]) }}" method="POST">
            @csrf
            <div class="card-header">
                <button type="submit" class="btn btn-yellow">Enregistrer</button>
            </div>
            <div class="card-body">
                <textarea name="contentFiles" id="default">{{ $doc->content }}</textarea>
                <input type="hidden" name="files" value="[]">
            </div>
        </form>
        <div class="card card--users">
            <div class="card-header">
                <div></div>
                <a data-modal=".modal--add" class="btn btn-yellow"><i class="fas fa-plus"></i> AJOUTER UN DOCUMENT</a>
            </div>
            <div class="card-body">
                <table class="table table--users table-sortable" style="width:100%">
                    <thead>
                    <tr>
                        <th class="th_user th-sort">Utilisateur</th>
                        <th class="th_file th-sort">Fichier</th>
                        <th class="th_date th-sort">Date</th>
                        <th class="th_actions"></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($files as $file)
                        <tr>
                            <td class="td_user">{{ $file->user->firstname }} {{ $file->user->lastname }}</td>
                            <td class="td_file">{{ $file->name }}</td>
                            <td class="td_date">{{ date("d/m/Y",strtotime($file->date)) }}</td>
                            <td class="td_actions">
                                @if (Auth::user()->hasPermission(['ADMIN']))
                                    <button data-modal=".modal--delete" data-id="{{ $file->id }}" class="delete-btn"><i class="fas fa-trash"></i></button>
                                @endif
                                <button type="button" data-clipboard="true" data-copy="{{ route('documentation.download', [$file->doc->name, $file->name]) }}" class="text-color-yellow"><i class="fas fa-copy"></i> </button>
                            </td>
                        </tr>
                    @endforeach
                    @if (count($files) === 0)
                        <tr class="no-data no-data--centered">
                            <td colspan="4">Aucun fichier</td>
                        </tr>
                    @endif
                    </tbody>
                </table>
            </div>
            <div class="card-footer">
            </div>
        </div>

        @if (Auth::user()->hasPermission(['ADMIN']))
            <div class="modal modal--delete">
                <div class="modal-dialog">
                    <form class="modal-content" action="{{ route('documentation.delete', [$doc->name]) }}" method="POST">
                        @csrf
                        <input type="hidden" name="id" value="">
                        <div class="modal-header">
                            <p class="title">Confirmer la suppression</p>
                            <button type="button" class="btn-close" data-dismiss="modal"><i class="fas fa-times"></i></button>
                        </div>
                        <div class="modal-body">
                            <p>Vous êtes sur le point de supprimer définitivement un document. Êtes-vous sûr.e de vouloir continuer ?</p>
                            <div>
                                <button type="submit" class="btn btn-yellow">Supprimer le document</button>
                                <button type="button" class="btn btn-inv btn-yellow btn-small" data-dismiss="modal"> Annuler</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        @endif
        <div class="modal modal--add">
            <div class="modal-dialog">
                <form class="modal-content" action="{{ route('documentation.upload', [$doc->name]) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-header">
                        <p class="title">Ajouter un document</p>
                        <button type="button" class="btn-close" data-dismiss="modal"><i class="fas fa-times"></i></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="line">
                                <div class="left">
                                    <label for="work">Document</label>
                                </div>
                                <div class="right">
                                    <label for="file" class="form-control form-control--file">
                                        <span>Choisir un document</span>
                                        <span>
                                            Parcourir
                                            <input type="file" name="file" id="file" class="" placeholder="Choisir un document">
                                        </span>
                                    </label>
                                    <span class="info-pdf-modal"></span>
                                </div>
                            </div>
                        </div>
                        <div>
                            <button type="submit" class="btn btn-success">Ajouter</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>
@endsection

@section('script')
    {{-- <script src="/js/libs/tinymce/tinymce.min.js"></script> --}}
    <script src="https://cdn.tiny.cloud/1/fy14eawqi58mrvgxrntce2xjm790wtr5q6eeogg095qk5pgs/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script src="/js/app/documentation.js"></script>
@endsection
