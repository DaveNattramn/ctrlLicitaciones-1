$('#tabla_nuevo_convenio tr').dblclick(function() {
    var id = $(this).attr("row-key");
    $.ajax({
            url: '',
            type: 'post',
            data: {},
            success: function (data) {
                $('#divrespuestamodal').empty().append(data);
                $('#mi_id_modal').modal('show');
            }
        });
});