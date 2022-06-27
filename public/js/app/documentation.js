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
    file_picker_types: 'file image',
    images_file_types: 'jpg',
    file_picker_callback: function (cb, value, meta) {
        let input = document.createElement('input');

        input.setAttribute('type', 'file');

        if (meta.fieldname == "src") {
            input.setAttribute('accept', 'image/*');
        } else if (meta.fieldname == "url") {
            input.setAttribute('accept', 'image/*,application/pdf,application/vnd.ms-excel');
        }

        input.onchange = function () {
            let file = this.files[0];
            let reader = new FileReader();

            reader.onload = function () {
                let id = 'blobid' + (new Date()).getTime();
                let blobCache =  tinymce.activeEditor.editorUpload.blobCache;
                let base64 = reader.result.split(',')[1];
                let blobInfo = blobCache.create(id, file, base64);

                blobCache.add(blobInfo);

                let inputFile = $('input[name="files"]', document, 0);
                let files = JSON.parse(inputFile.value);

                files.push(blobInfo.id().replace('blobid', ''));
                inputFile.value = JSON.stringify(files);

                cb(blobInfo.blobUri(), { title: file.name, text: file.name });
            };

            reader.readAsDataURL(file);
        };

        input.click();
    },
});

/*

Pas d'image

1.
J'ajoute une image puis ça la télécharge et je l'ajooute à mon tableau

J'enregistre mon doc.

2.
J'ajoute une image puis ça la télécharge et je l'ajooute à mon tableau

Puis je la delete de tiny // elle est toujours dans mon tableau et elle est toujours téléchargé

J'enregistre mon doc.



Acheter tinymce pro



Créer mon propre plugin, en lui transmettant toutes mes images/pdf


Je rajoute un bouton dans le menu

Ce bouton ouvre une modal ou ça nous montre toutes les images/pdf du projet




Modal qui contient toutes les images/pdf du document

Rajouter une image/pdf

*/