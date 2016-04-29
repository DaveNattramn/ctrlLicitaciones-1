function getdatos(id){
    $.ajax({
        url: 'controladores/info_usuarios.php',
        type: 'post',
        data: {id : id},
        success: function (data) {
            $('.modal-body').empty();
            $('.modal-body').append(data);
            $('#myModal').modal('show');
            $('#id_user_send').val(id);
        },
        error:function(x,h,r){
            alert('Error $.ajax Info usuarios');
        } 
    });
}