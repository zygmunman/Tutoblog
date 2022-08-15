$(document).ready(function () {
    APP.validacionGeneral('form-general');
    $('#categoria').select2({
        language: "es"
    });
    $('#tag').select2({
        language: "es",
        tags: true,
        tokenSeparators: [',']
    });
    $('#titulo').on('change', function(){
        const str = removeAccents($(this).val());
        $('#slug').val(str.toLowerCase().replace(/ /g, '-'));
    });
    $('#slug').on('change', function(){
        $(this).val($(this).val().toLowerCase().replace(/ /g, '-'));
    });
    $('#imagen').fileinput({
        language: "es",
        allowedFileExtensions: ['jpg', 'jpeg', 'png'],
        maxFileSize: 1000,
        showUpload: false,
        showClose: false,
        dropZoneEnabled: false,
        showCaption: false,
        showCancel: false,
        initialPreviewAsData: true,
        theme: "fa6"
    });
    //var toolbarOptions = ['bold', 'italic', 'underline', 'strike'];
    var quill = new Quill('#body', {
        theme: 'snow',
        /* modules: {
            toolbar: toolbarOptions
        } */
    });
    const removeAccents = (str) => {
        return str.normalize("NFD").replace(/[\u0300-\u036f]/g, "");
    }
});
