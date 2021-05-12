$(document).ready(function () {
    $('.permiso_rol').on('change', function () {
        var data = {
            permiso_id: $(this).data('permiso'),
            rol_id: $(this).val(),
            _token: $('input[name=_token]').val()
        };
        if ($(this).is(':checked')) {
            data.estado = 1
        } else {
            data.estado = 0
        }
        const url = $(this).data('url');
        ajaxRequest(url, data);
    });

    function ajaxRequest(url, data) {
        $.ajax({
            url: url,
            type: 'POST',
            data: data,
            success: function (respuesta) {
                console.log()
            }
        });
    }
});