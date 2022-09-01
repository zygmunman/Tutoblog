$(document).ready(function () {
    APP.validacionGeneral('form-general');

    $('#icono').on('blur', function() {
        $('#mostrar-icono').removeClass().addClass('fa fa-fw ' + $(this).val());
    });

    /* Este código es el original que yo tenía
    $('#icono').on('change', function () {
        $('#mostrar-icono').removeClass().addClass($(this).val());
        $('#mostrar-icono').removeClass().addClass('fa fa-fw ' + $(this).val());
    });
    */
});
