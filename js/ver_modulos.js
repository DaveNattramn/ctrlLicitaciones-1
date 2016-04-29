$(function() {
    var divmodulos=$('#modulos');
$.ajax({
    url: 'controladores/ver_modulos.php',
    type: 'post',
    dataType:'json',
    beforeSend:function(){
        divmodulos.html("<i class='fa fa-cog fa-2x fa-spin'></i>");
    },
    success: function (data) {
        divmodulos.empty();
        $.each(data, function( index, value ) {
            if(value==="Juridico"){
                divmodulos.append("<a href='modulos/juridico/vistas/principal.php' class='list-group-item'>"+value+"<i class='fa fa-gavel fa-lg fa-fw'></i></a>");
            }
            if(value==="Licitaciones"){
                divmodulos.append("<a href='modulos/licitaciones/index.php' class='list-group-item'>"+value+"<i class='fa fa-usd fa-lg fa-fw'></a>");
            }
        });
       divmodulos.append("<a href='modulos/rptEstimaciones/vistas/rptEstimaciones.php' class='list-group-item'>Reporte <i class='fa fa-file-text-o fa-lg fa-fw'></i </a>");

	},
	error:function(x,i,r){
            alert("ERROR "+x+i);
	}
    });
});