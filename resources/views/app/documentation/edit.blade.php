@extends('app')

@section('content')
    <div class="content">
        <form class="card card--doc card--doc-edit" action="{{ route('documentation.update', [$doc->name]) }}" method="POST">
            @csrf
            <div class="card-header">
                <button type="submit" class="btn btn-yellow">Enregistrer</a>
            </div>
            <div class="card-body">
                <textarea name="content" id="default">{{ $doc->content }}</textarea>
            </div>
        </form>
    </div>
@endsection

@section('script')
    <script src="/js/libs/tinymce/tinymce.min.js"></script>

    <script>
        tinymce.init({
            selector: 'textarea#default',
            statusbar: false,
            menubar: false,
            language : "fr_FR",
            toolbar: 'undo redo | bold italic underline | alignleft aligncenter alignright alignjustify | link image | formatselect',
            plugins: 'link image autoresize',
            link_class_list: [
                { title: 'Lien basique', value: '' },
                { title: 'Lien stylisé', value: 'link_doc' },
            ],

            image_title: true,
            automatic_uploads: true,
            images_upload_url: '/doc/upload',
            file_picker_types: 'image',
            file_picker_callback: function (cb, value, meta) {
                let input = document.createElement('input');
                
                input.setAttribute('type', 'file');
                input.setAttribute('accept', 'image/*');

                input.onchange = function () {
                    let file = this.files[0];
                    let reader = new FileReader();

                    reader.onload = function () {
                        let id = 'blobid' + (new Date()).getTime();
                        let blobCache =  tinymce.activeEditor.editorUpload.blobCache;
                        let base64 = reader.result.split(',')[1];
                        let blobInfo = blobCache.create(id, file, base64);

                        blobCache.add(blobInfo);

                        cb(blobInfo.blobUri(), { title: file.name });
                    };

                    reader.readAsDataURL(file);
                };

                input.click();
            },
        });
    </script>
@endsection
