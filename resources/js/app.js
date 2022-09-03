import { Dropzone } from "dropzone";

Dropzone.autoDiscover = false;

const dropzone = new Dropzone('#dropzone', {
    dictDefaultMessage: 'Sube aquí tu imagen',
    acceptedFiles: ".png,.jpg,.jpeg,.gif",
    addRemoveLinks: true,
    dictRemoveFile: "Borrar archivo",
    maxFiles: 1,
    uploadMultiple: false,

    init: function () {
        if (document.querySelector('[name="imagen"]').value.trim()) {
            const ImagenPublicada = {};
            ImagenPublicada.size = 1234;
            ImagenPublicada.name = document.querySelector('[name="imagen"]').value;

            this.options.addedfile.call(this, ImagenPublicada);
            this.options.thumbnail.call(this, ImagenPublicada, '/uploads/' + ImagenPublicada.name);

            ImagenPublicada.previewElement.classList.add('dz-success', 'dz-complete');
        }
    }
});

dropzone.on('sending', function (file, xhr, formData) {
    console.log(formData);
});

dropzone.on('success', function (file, response) {
    document.querySelector('[name="imagen"]').value = response.imagen;
});

dropzone.on('error', function (file, message) {
    console.log(message);
});
dropzone.on('removedfile', function () {
    document.querySelector('[name="imagen"]').value = '';
})
