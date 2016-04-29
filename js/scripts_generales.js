var tipo; //variable que distingue de un insert o delete
var chkfechaadju,chkfechaoficialcontrato,chkenviadoa,chkfecharecep,chkfirmadirector,chkfirmadirectorgral,chkfirmasub,chkfirmacpnstructora;
function generar_alerta(tipo, mensaje,pos) {

    /* ++++++++++++++++++++  FUNCIÓN GENERAL ALERTA ++++++++++++++++++++++++++++++
     Función que genera una alerta en pantalla, recibe como parametro el tipo de alerta
     (error,info,success,warning), el texto que se desea mostrar en pantalla, así como la
     posicion de la alerta (buscar en animate.css para las diferentes posiciones) */
    var x=noty({
        text: mensaje,
        type: tipo,
        timeout: 5000,
        force: true,
        dismissQueue: true, //Habilita cerrar mensaje
        layout: pos, //Posicion del mensaje
        closeWith: ['click'], //Habilita cerrar con un click
        theme: 'bootstrapTheme',
        killer:true,
        maxVisible: 1, //Numero de mensajes visibles en pantalla
        animation: {
            open: 'animated bounceInRight', //animacion al entrar}
            close: 'animated bounceOutRight', // animación al salir
            easing: 'swing',
            speed: 2000 //velocidad de la animación
        }
    });}
function convertir_fecha(fecha){
    /*Funcion que convierte la fecha UTC a YYYY-MM-DD*/
    var mes=fecha.getMonth()+1;
    var dia=fecha.getDate();
    return fecha.getFullYear()+'-'+(mes<10 ? '0':'')+mes+'-'+(dia<10 ? '0':'')+dia;
    //return (dia<10 ? '0':'')+dia+'-'+(mes<10 ? '0':'')+mes+'-'+fecha.getFullYear();
}
function contardias(fechafinal,fechainicio){
    /*
     ++++++++++++++++++++++++++++ FUNCION CONTAR DIAS +++++++++++++++++++++++++++
     Funcion que recibe como parametro la fecha final y la fecha de inicio, y retorna
     la diferencia en DIAS en función de las fechas ingresadas. */
    var dias=0;
    var FECHAINI = (fechainicio.getMonth() + 1) + "/" + (fechainicio.getDate()+1) + "/" + fechainicio.getFullYear().toString().substr(2,2);
    var FECHAFINAL= (fechafinal.getMonth() + 1) + "/" + (fechafinal.getDate()+1) + "/" + fechafinal.getFullYear().toString().substr(2,2);

    var diferencia=diferencia =  Math.floor(( Date.parse(FECHAFINAL) - Date.parse(FECHAINI) ) / 86400000);
    if(diferencia < 0){
        diferencia = diferencia*(-1);
        diferencia=diferencia+1;;
    }
    if(diferencia==0){
        diferencia=1;
    }
    return diferencia;}
function validar_campos(){


    /* ++++++++++++++++++++++++ FUNCION VALIDAR CAMPOS ++++++++++++++++++++++++++++++++++
     Función que verifica que los campos señalados contengan datos válidos para ser procesados, retorna
     TRUE si los campos son válidos, en caso contratio retornará FALSE

     Monto
     El monto debe ser mayor a 0

     Periodo de Ejecución
     El periodo de ejecución en dias debe ser mayor a 0

     Contrato
     La caja de texto contrato no debe de ir vacía
     * */
    if($('#txtmonto').val()<=0){
        alert("Verificar el Monto Contratado");
        $('#txtmonto').focus();
        return false;
    }
    if($('#txtperiododeejecucion').val()==0){
        alert("Verificar el Tiempo de ejecución");
        $('#txtperiododeejecucion').focus();
        return false;
    }
    if($('#txtnumcontrato').val()==''){
        alert("Verificar el numero de contrato");
        $('#txtnumcontrato').focus();
        return false;
    }
    return true;}
function guardar_contrato(){


    obra=$('#txtnumobra').val();
    procesoadj=$('#txtprocesoadjudicacion').val();
    cbxDAOP=$('#cbxDAOP option:selected').val();
    if(chkfechaadju===true){
        fechaadju=$('#fechaadju').val();
    }
    else{
        fechaadju=null;
    }
    descripcion=$('#txttrabajosarealizar').val();
    contratista=$('#cbxempresa option:selected').val();


    if(chkfecharecep===true){
        fecharecep=$('#fechaderecepcion').val();
    }
    else{
        fecharecep=null;
    }
    



    tipo_contrato=$('#cbxtipocontrato option:selected').val();
    oficio_auto=$('#txtoficioautorizacion').val();
    ncontrat=$('#txtnumcontrato').val();
    monto=$('#txtmonto').val();

    tipo_contrato=$('#cbxtipocontrato option:selected').val();

    iniejec=$('#fechainicioejec').val();
    termejec=$('#fechaterminoejec').val();

    periododeejec=$('#txtperiododeejecucion').val();

    //FIRMA CONSTRUCTOR
    if(chkfirmacpnstructora===true){
        firmaconstructor=$('#fechafirmaconstructor').val();
    }
    else{
        firmaconstructor=null;
    }

    //FIRMA DIR GENERAL
    if(chkfirmadirectorgral===true){
        firmadirectorgral=$('#fechafirmadirectorgral').val();
    }
    else{
        firmadirectorgral=null;
    }

    //FIRMA SUB-SECRETARIO
    if(chkfirmasub===true){
        firmasub=$('#fechafirmasub').val();
    }
    else{
        firmasub=null;
    }

    //FIRMA CONTRATO
    if(chkfechaoficialcontrato==true){
        firmaoficialcontrato=$('#fechaoficialcontrato').val();
    }else{
        firmaoficialcontrato=null;
    }
    enviadoa=$('#cbxenviadoa option:selected').val();

    if(chkenviadoa===true){fchenviadoa=$('#fechaenvioa').val();}
    else{fchenviadoa=null;}

    observaciones=$('#observacioncontrato').val();

    /*$('#alta').empty().html("Obra : "+obra+"<br>"+
        "Proceso Adjudicación "+procesoadj+"<br>"+
        "Adjudicación DAOP "+cbxDAOP+"<br>"+
        "Fecha Adjudicación "+fechaadju+"<br>"+
        "Descripcion "+descripcion+"<br>"+
        "Contratista "+contratista+"<br>"+
        "Fecha de Recepcion "+fecharecep+"<br>"+
        "Tipo de Contrato "+tipo_contrato+"<br>"+
        "Oficio de Autorización "+oficio_auto+"<br>"+
        "Numero de Contrato "+ncontrat+"<br>"+
        "Monto "+monto+"<br>"+
        "Fecha de Inicio de Ejecución "+iniejec+"<br>"+
        "Fecha de Termino de Ejecución "+termejec+"<br>"+
        "Periodo de Ejecución "+periododeejec+"<br>"+
        "Firma Constructor "+firmaconstructor+"<br>"+
        "Firma Gobierno "+firmagobierno+"<br>"+
        "Firma Oficial Contrato "+firmaoficialcontrato+"<br>"+
        "Enviado A "+enviadoa+"<br>"+
        "Fecha Envio a "+fchenviadoa+"<br>"+
        "Observaciones "+observaciones+"<br>"+
        "Tipo Consulta "+tipo);
    */
    var datos={
        numobra:obra,
        procadj:procesoadj,
        comboDAOP:cbxDAOP,
        fecadju:fechaadju,
        descr:descripcion,
        contrat:contratista,
        fecrecep:fecharecep,
        tipocontrato:tipo_contrato,
        oficioauto:oficio_auto,
        numcont:ncontrat,
        mont:monto,
        inicio_ejec:iniejec,
        termino_ejec:termejec,
        periodo_ejec:periododeejec,
        firma_contructor:firmaconstructor,
        firma_dir_general:firmadirectorgral,
        firma_sub_sec:firmasub,
        firma_of_contrato:firmaoficialcontrato,
        enviado_a:enviadoa,
        fecenviadoa:fchenviadoa,
        observa:observaciones,
        tipocontra:tipo_contrato,
        consulta:tipo
    }
    $.ajax({
             url: '../controladores/agregarmodificar_obra.php',
             type: 'post',
             data: datos,
             error:function(x,y,z){
                alert("ERROR "+x+y+z);
             },
             success: function (data) {
                console.log(data);
                 if(data==true){
                    generar_alerta('success','Los datos se guardaron exitosamente','topRight');
                    function redir(){
                       window.location.href='principal.php'; 
                    }
                    setTimeout("redir()",5000);
                    
                 }
                 else{
                    alert("Error en la consulta, verifiquela");
                 }
             }
         }); 

//alert("Fecha Adjudicación "+chkfechaadju +"  Fecha Firma Director Gral "+chkfirmadirectorgral+" Fecha Firma Subsecretario "+chkfirmasub +" Firma Contrato "+chkfechaoficialcontrato+"  Firma Contratista "+chkfirmacpnstructora);
    
    
}


function animar_drops(){
    /* ++++++++++++++++++++++++ FUNCION ANIMAR DROPS ++++++++++++++++++++++++++++++++++
     * Función que ejecuta las funciones slideDown() y slideUp() de jQuery cuando se da click
     * sobre una lista desplegable (ul.dropdown) para animar su despliegue en pantalla*/
    // Animacion Dropddown
    $('.dropdown').on('show.bs.dropdown', function(e) {
        $(this).find('.dropdown-menu').first().stop(true, true).slideDown(200);
    });
    $('.dropdown').on('hide.bs.dropdown', function(e) {
        $(this).find('.dropdown-menu').first().stop(true, true).slideUp(200);
    });}
function limpiar_campos(){
    /* +++++++++++++++++++++++++++++ FUNCION LIMPIAR CAMPOS +++++++++++++++++++++++++++++++++++
     Función que selecciona todos los input de tipo TEXT, DATE, TEXTAREA y SELECT del
     documento para ser restablecidos*/
    $('[type="text"] , [type="date"], textarea, select').val('');}
function habilitar_campos(){
    /* +++++++++++++++++++++ FUNCION HABILITAR CAMPOS ++++++++++++++++++++++++
     * Función que selecciona todos los input de tipo TEXT, DATE, TEXTAREA y SELECT del documento para
     * ser habilitados*/
    $('[type="text"] , [type="date"], textarea, select').removeAttr('disabled');}
function llenar_comboDAOP(adjudicacionDAOP){

    /*++++++++++++++++++++++++++ FUNCION LLENAR COMBO DAOP +++++++++++++++++++++++++++
     * Función que inserta elementos en el select box ADJUDICACION DAOP, recibe como parametro
     la adjudicación DAOP del contrato*/

    $.ajax({
        type:"POST",
        url:"../controladores/llenarCombo.php",
        data:{combo:'daop'},
        dataType:'json',
        success:function(datoscbx){
            var ddl = $("#cbxDAOP");
            ddl.empty();
            for (k = 0; k < datoscbx.length; k++){
                if(adjudicacionDAOP==datoscbx[k].id){
                    ddl.append("<option class='active' selected='selected' value='" + datoscbx[k].id+ "'>" + datoscbx[k].opcion + "</option>");
                }else{
                    ddl.append("<option value='" + datoscbx[k].id+ "'>" + datoscbx[k].opcion + "</option>");
                }
            }
            ddl.removeAttr('disabled');
        },
        error:function(w,error,z){
            alert("ERROR DAOP "+w+" "+error+" "+z );
        }
    });}
function llenar_comboEmpresaContratista(empresa){

    /*++++++++++++++++++++++++++ FUNCION LLENAR COMBO CONTRATISTA +++++++++++++++++++++++++++
     * Función que inserta elementos en el select box CONTRATISTA recibe como parametro el
     id de la empresa del contrato*/

    $.ajax({
        type:"POST",
        url:"../controladores/llenarCombo.php",
        data:{combo:'empresa'},
        dataType:'json',
        success:function(datoscbx){
            var ddl = $("#cbxempresa");
            ddl.empty();

            for (k = 0; k < datoscbx.length; k++){
                if(empresa==datoscbx[k].id_empresa){
                    ddl.append("<option class='active' selected='selected' value='" + datoscbx[k].id_empresa+ "'>" + datoscbx[k].contratista + "</option>");
                }else{
                    ddl.append("<option value='" + datoscbx[k].id_empresa+ "'>" + datoscbx[k].contratista + "</option>");
                }
            }
            ddl.removeAttr('disabled');
        },
        error:function(w,error){
            alert(error);
        }
    });}
function llenar_comboTipoContrato(idtipocontrato){
    /*++++++++++++++++++++++++++ FUNCION LLENAR COMBO TIPO CONTRATO +++++++++++++++++++++++++++
     * Función que inserta elementos en el select box TIPO CONTRATO recibe como parametro el id del tipo
     de contrato*/

    $.ajax({
        type:"POST",
        url:"../controladores/llenarCombo.php",
        data:{combo:'tipo_contrato'},
        dataType:'json',
        success:function(datoscbx){
            var ddl = $('#cbxtipocontrato');
            ddl.empty();
            for (k = 0; k < datoscbx.length; k++){
                if(idtipocontrato==datoscbx[k].id){
                    ddl.append("<option class='active' selected='selected' value='" + datoscbx[k].id+ "'>" + datoscbx[k].tipo + "</option>");
                }
                else{
                    ddl.append("<option value='" + datoscbx[k].id+ "'>" + datoscbx[k].tipo + "</option>");
                }
                
            }
            ddl.removeAttr('disabled');
        },
        error:function(w,error){
        }
    });}
function llenar_comboEnviadoA(enviadoA){
    /*++++++++++++++++++++++++++ FUNCION LLENAR COMBO ENVIADO A +++++++++++++++++++++++++++
     * Función que inserta elementos en el select box ENVIADO A recibe como parametro el
     id de la persona a la que fue enviada*/
    $.ajax({
        type:"POST",
        url:"../controladores/llenarCombo.php",
        data:{combo:'enviadoA'},
        dataType:'json',
        success:function(datoscbx){
            var ddl = $('#cbxenviadoa');
            ddl.empty();
            for (k = 0; k < datoscbx.length; k++){
                if(enviadoA==datoscbx[k].ID){
                    ddl.append("<option selected='selected' value='"+datoscbx[k].ID+"'>"+datoscbx[k].UR+"</option>")
                }
                else{
                    ddl.append("<option value='" + datoscbx[k].ID+ "'>" + datoscbx[k].UR + "</option>");
                }
            }
            ddl.removeAttr('disabled');
        },
        error:function(w,error){
            alert('ERROR A')
        }
    });}
function buscar_contrato(numobra){
    $.ajax({
        type: "POST",
        url: "../controladores/buscar_contrato.php",
        data:"idcontrato="+numobra,
        dataType:'json',
        success: function(data) {

            console.log(data);

            llenar_comboDAOP(data.adjudicacionDAOP);


            //NUMERO DE OBRA
            $('#txtnumobra').val(data.numObra);
            $('#txtnumobra').removeAttr('disabled');

            //PROCESO ADJUDICACIOM
            $('#txtprocesoadjudicacion').val(data.procesoAjudicacion);
            $('#txtprocesoadjudicacion').removeAttr('disabled');


            $('#txttrabajosarealizar').val(data.trabajosRealizar);
            $('#txttrabajosarealizar').removeAttr('disabled');

            llenar_comboEmpresaContratista(data.empresa);


            //FECHA ADJUDICACION

            if(data.fechaAdjudicacion==null){
                $('#fechaadju').val(convertir_fecha(new Date));
                $('#chkfechaadju').prop('checked','');
                $('#fechaadju').attr('disabled','disabled');
                chkfechaadju=false;

            }
            else{
                $('#fechaadju').val(data.fechaAdjudicacion);
                $('#chkfechaadju').prop('checked','checked');
                $('#fechaadju').removeAttr('disabled');
                chkfechaadju=true;
            }

            
            

            //FECHA DE RECEPCION DEL CONTRATO

            $('#fechaderecepcion').val(data.fechaTurno);
            $('#fechaderecepcion').removeAttr('disabled');

            llenar_comboTipoContrato(data.Id_Tipo_Contrato);

            //FECHA OFICIO AUTORIZACION
            if(data.oficioAutorizacion==null){
                $('#txtoficioautorizacion').val('S/N');
            }
            else{
                $('#txtoficioautorizacion').val(data.oficioAutorizacion);
            }
            $('#txtoficioautorizacion').removeAttr('disabled');

            //NUMERO DE CONTRATO
            $('#txtnumcontrato').val(data.numContrato);
            $('#txtnumcontrato').removeAttr('disabled');

            //MONTO

            $('#txtmonto').val(data.monto);
            $('#txtmonto').removeAttr('disabled');

            //FECHA DE INICIO DE EJECUCION

            $('#fechainicioejec').val(data.iniEjecucion);
            $('#fechainicioejec').removeAttr('disabled');

            //FECHA DE TERMINO DE EJECUCION

            $('#fechaterminoejec').val(data.terminoEjecucion);
            $('#fechaterminoejec').removeAttr('disabled');

            //CONTAR DIAS
            var fechainicio = new Date($("#fechainicioejec").val());
            var fechafinal = new Date($('#fechaterminoejec').val());
            var dias=contardias(fechafinal,fechainicio);
            $('#txtperiododeejecucion').val(dias);

            $("#fechainicioejec").change( function() {

                var fechainicio = new Date($("#fechainicioejec").val());
                var fechafinal = new Date($('#fechaterminoejec').val());

                if(fechafinal<fechainicio){
                    generar_alerta('error','El intervalo de la fecha de inicio no puede ser mayor a la de termino','topRight');
                    $('#fechaterminoejec').val($("#fechainicioejec").val());
                    $('#txtperiododeejecucion').val(1);
                }
                else{
                    $('#txtperiododeejecucion').val(contardias(fechafinal,fechainicio));
                }

            });

            $('#fechaterminoejec').change(function(){
                var fechainicio = new Date($("#fechainicioejec").val());
                var fechafinal = new Date($('#fechaterminoejec').val());
                if(fechafinal<fechainicio){
                    generar_alerta('error','El intervalo de la fecha de termino no puede ser inferior a la de inicio','topRight');
                    $('#fechaterminoejec').val($("#fechainicioejec").val());
                    $('#txtperiododeejecucion').val(1);
                }
                else{
                    $('#txtperiododeejecucion').val(contardias(fechafinal,fechainicio));
                }

            });


            //FECHA FIRMA DIRECTOR GENERAL
            if(data.fecFirmaDirGeneral){
                alert(data.fecFirmaDirGeneral);
                $('#fechafirmadirectorgral').attr('value',data.fecFirmaDirGeneral);
                $('#chkfirmadirectorgral').prop("checked",true);
                $('#fechafirmadirectorgral').prop("disabled",false);
                chkfirmadirectorgral=true;
            }
            else{
                $('#fechafirmadirectorgral').attr('value',convertir_fecha(new Date));
                $('#chkfirmadirectorgral').prop("checked",false);
                $('#fechafirmadirectorgral').prop("disabled",true);
                chkfirmadirectorgral=false;
            }
            

            //FECHA FIRMA SUBSECRETARIO
            if(data.fecFirmaSubsec){
                $('#fechafirmasub').attr('value',data.fecFirmaSubsec);
                $('#chkfirmasub').prop("checked",true);
                $('#fechafirmasub').prop("disabled",false);
                chkfirmasub=true;

            }else{
                $('#fechafirmasub').attr('value',convertir_fecha(new Date));
                $('#chkfirmasub').prop("checked",false);
                $('#fechafirmasub').prop("disabled",true);
                chkfirmasub=false;
            }
            //FECHA OFICIAL CONTRATO
            if(data.fecOficialContrato==null){
                $('#fechaoficialcontrato').attr('value',convertir_fecha(new Date));
                $('#chkfechaoficialcontrato').prop('checked',false);
                $('#fechaoficialcontrato').attr('disabled','disabled');
                chkfechaoficialcontrato=false;

            }
            else{
                $('#fechaoficialcontrato').attr('value',data.fechaAdjudicacion);
                $('#chkfechaoficialcontrato').prop('checked','checked');
                $('#fechaoficialcontrato').removeAttr('disabled');
                chkfechaoficialcontrato=true;
            }
            //FECHA FIRMA CONTRATISTA
            if(data.fecFirmaConstructor){
                $('#fechafirmaconstructor').attr('value',data.fecFirmaConstructor);
                $('#chkfirmacpnstructora').prop("checked",true);
                $('#fechafirmaconstructor').prop("disabled",false);
                chkfirmacpnstructora=true;
            }
            else{
                $('#fechafirmaconstructor').attr('value',convertir_fecha(new Date));
                $('#chkfirmacpnstructora').prop("checked",false);
                $('#fechafirmaconstructor').prop("disabled",true);
                chkfirmacpnstructora=false;
            }
            llenar_comboEnviadoA(data.enviadoA);


            //FECHA ENVIO A
            if(data.fecOficialContrato==null){
                $('#fechaenvioa').attr('value',convertir_fecha(new Date));
                $('#chkenviadoa').prop('checked','');
                $('#fechaenvioa').attr('disabled','disabled');
                chkenviadoa=false;

            }
            else{
                $('#fechaenvioa').attr('value',data.fechaAdjudicacion);
                $('#chkenviadoa').prop('checked','checked');
                $('#fechaenvioa').removeAttr('disabled');
                chkenviadoa=true;
            }


            //OBSERVACION CONTRATO
            $('#observacioncontrato').val(data.ObservacionContrato);
            $('#observacioncontrato').removeAttr('disabled');



        },
        error:function(w,error,x){
            alert(w +error + x);
        }
    });}
$(document).ready(function(){
animar_drops();

/* Verifica si el usuario tecleo enter en la caja de password, o dió click al boton
   de iniciar sesión ejecuta el metodo login()*/
$("#txtpass").keypress(function(e) {
    if (e.keyCode === 13) {
        login();
    }});
$('#btnlogin').click(function() {login();});

/* Calcula el ancho y alto de la ventana del navegador, con dichas dimensiones
   crea una nueva ventana emergente con el documento mostrar_contatos.php*/
$('#nventana').click(function() {
    var alto = $(window).height(),
        ancho = $(window).width(),
        pop = window.open('mostrar_contratos.php', 'Contratos', "height=" + alto + ",width=" + ancho);
        pop.focus();});

/*De la tabla 'tabla_contratos' de la ventana emergente*/
$('#tabla_contratos tr').dblclick(function() {
    var id = $(this).attr("row-key");
    if (window.opener !== null && !window.opener.closed) {
        var txtid = window.opener.document.getElementById("txtnumobra");
        txtid.value = id;
        var contr=window.opener.document.getElementById("contratos");
        contr.style.display='block';
        window.opener.focus();
        buscar_contrato(id);
    }
    if (window.opener.closed) {
        alert("No se selecciono ningun contrato");
    }
    window.close();});

/* Ejecuta el metodo limpiar_campos() cuando al boton 'btnlimpiar' se le da click*/
$('#btnlimpiar').click(function() {limpiar_campos();});

/*Verifica el estado de los radios, si alguno cambia, ejecuta la funcion
fadeOut() de jQuery para animar la salida del div.contratos, ademas ejecuta la función
limpiar_campos()*/
$("input[name=rdobusc]:radio").change(function(){
       $('.contratos').fadeOut(350);
       $('#tabla-res').fadeOut(350);
       limpiar_campos();});

/*Verifica cuando el texto de la caja 'txtbuscar_contrato' cambia, recupera el valor
  del redio que está seleccionado y ejecuta una función AJAX para buscar el controta
  de acuerdo al parametro seleccionado.
  Valida que si los datos que retorno AJAX son una alerta, el tipo de consulta sera un
  insert a la BD, en caso contrario sera un update.
  +++++++++++++ CUANDO LA OBRA NO EXISTE +++++++++++++++++
  Si se da click al boton 'btnagregar', oculta el div#res_busc, ejecuta la funcion 
  habilitar_campos(), asigna el valor de la caja de busqueda al de número de obra, y
  cambia a visible el div.contratos
  +++++++++++++ CUANDO LA O LAS OBRAS existen +++++++++++++++++
  Elimina los elementos que se encuentren en el div#res_busc y luego asigna los datos
  que retorne la consulta (TABLA CON LAS OBRA DE LA BUSQUEDA) con un efecto de la función
  fadeIn() de jQuery.
  Si se le da doble clic a la fila de la tabla '#tabla_busqueda', recupera el valor de la 
  primera celda de la fila (numObra),oculta la tabla con la funcion fadeOut() de jQuery, y
  muestra el div.contratos y al final ejecuta la funcion buscar_contrato(obra)

  */
$('#txtbuscar_contrato').keyup(function(e){
    var busqueda=$(this).val();
    var radio=$("input[name='rdobusc']:checked").val();      
    $.ajax({
        type:"POST",
        url:"../controladores/buscar_general.php",
        data:{tipo_busq:radio,busq:busqueda},
        dataType: "html",
        success:function(datos){
            if(datos.search('alerta')<0){
                tipo='update';    
            }
            else{
                tipo='insert';
            }
            $('#res_busc').on('click','.btnagregar',function(){
                $('#res_busc').hide();
                habilitar_campos();
                limpiar_campos();
                llenar_comboDAOP();
                llenar_comboEnviadoA();
                llenar_comboTipoContrato();
                llenar_comboEmpresaContratista();
                $('#txtnumobra').val($('#txtbuscar_contrato').val());
                $('.contratos').show();
            });
            $('#res_busc').empty();
            $('#res_busc').append(datos).fadeIn(300);
            $('#tabla_busqueda tr').dblclick(function(e){
                var obra=$(this).find("td:nth-child(1)").text();
                $('#tabla-res').fadeOut(300);
                $('.contratos').show();
                buscar_contrato(obra);
            });
        },
        error:function(w,error){
            alert("ERROR");
        }
    });
    //TERMINA AJAX BUSCAR GENERAL
    
});

/*GUARDA EL CONTRATO A LA BASE DE DATOS*/
$('#btnguardarcontrato').click(function(){guardar_contrato();});

/*Verifica el estado del checkbox '#chkfechaadju para habilitar o deshabilitar 
  la fecha de adjudicación segun sea el caso'*/
  $("#chkfechaadju").on('change', function(){
    if($(this).is(':checked')){
        $('#fechaadju').removeAttr('disabled');
        chkfechaadju=true;
    }
    else{
        $('#fechaadju').attr('disabled','disabled');
        chkfechaadju=false;
    }
});
$("#chkfecharecep").on('change', function(){
    if($(this).is(':checked')){
        $('#fechaderecepcion').removeAttr('disabled');
        chkfecharecep=true;
    }
    else{
        $('#fechaderecepcion').attr('disabled','disabled');
        chkfecharecep=false;
    }
});
$("#chkfechaoficialcontrato").on('change', function(){
    if($(this).is(':checked')){
        $('#fechaoficialcontrato').removeAttr('disabled');
        chkfechaoficialcontrato=true;
    }
    else{
        $('#fechaoficialcontrato').attr('disabled','disabled');
        chkfechaoficialcontrato=false;
    }
});
$("#chkenviadoa").on('change', function(){
    if($(this).is(':checked')){
        $('#fechaenvioa').removeAttr('disabled');
        chkenviadoa=true;
    }
    else{
        $('#fechaenvioa').attr('disabled','disabled');
        chkenviadoa=false;
    }
});
$("#chkfirmadirector").on('change', function(){
    if($(this).is(':checked')){
        $('#fechafirmadirector').removeAttr('disabled');
        chkfirmadirector=true;
    }
    else{
        $('#fechafirmadirector').attr('disabled','disabled');
        chkfirmadirector=false;
    }
});
$("#chkfirmadirectorgral").on('change', function(){
    if($(this).is(':checked')){
        $('#fechafirmadirectorgral').removeAttr('disabled');
        chkfirmadirectorgral=true;
    }
    else{
        $('#fechafirmadirectorgral').attr('disabled','disabled');
        chkfirmadirectorgral=false;
    }
});
$("#chkfirmasub").on('change', function(){
    if($(this).is(':checked')){
        $('#fechafirmasub').removeAttr('disabled');
        chkfirmasub=true;
    }
    else{
        $('#fechafirmasub').attr('disabled','disabled');
        chkfirmasub=false;
    }
});
$("#chkfirmacpnstructora").on('change', function(){
    if($(this).is(':checked')){
        $('#fechafirmaconstructor').removeAttr('disabled');
        chkfirmacpnstructora=true;
    }
    else{
        $('#fechafirmaconstructor').attr('disabled','disabled');
        chkfirmacpnstructora=false;
    }
});
//CONTAR DIAS
            var fechainicio = new Date($("#fechainicioejec").val());
            var fechafinal = new Date($('#fechaterminoejec').val());
            var dias=contardias(fechafinal,fechainicio);
            $('#txtperiododeejecucion').val(dias);

            $("#fechainicioejec").change( function() {
                var fechainicio = new Date($("#fechainicioejec").val());
                var fechafinal = new Date($('#fechaterminoejec').val());
                if(fechafinal){
                    if(fechafinal<fechainicio){
                        generar_alerta('error','El intervalo de la fecha de inicio no puede ser mayor a la de termino','topRight');
                        $('#fechaterminoejec').val($("#fechainicioejec").val());
                        $('#txtperiododeejecucion').val(1);
                    }
                    else{
                        //$('#txtperiododeejecucion').val(contardias(fechafinal,fechainicio));
                        $('#txtperiododeejecucion').val(isNaN(fechafinal));
                    }
                }
                else{
                    $('#txtperiododeejecucion').val(isNaN());
                }

            });

            $('#fechaterminoejec').change(function(){
                var fechainicio = new Date($("#fechainicioejec").val());
                var fechafinal = new Date($('#fechaterminoejec').val());
                if(fechafinal<fechainicio){
                    generar_alerta('error','El intervalo de la fecha de termino no puede ser inferior a la de inicio','topRight');
                    $('#fechaterminoejec').val($("#fechainicioejec").val());
                    $('#txtperiododeejecucion').val(1);
                }
                else{
                    $('#txtperiododeejecucion').val(contardias(fechafinal,fechainicio));
                }

            });


$('#txtmonto').blur(function(){
    var monto=$('#txtmonto').val();
    if(!($.isNumeric(monto)) || (monto<0)){
        $('#idmonto').addClass('has-warning').focus();
        $('#txtmonto').attr('placeholder','El monto no es valido, verifíquelo');
    }
    else{
        $('#idmonto').removeClass('has-warning');
    }
});
$('#txtnumcontrato').blur(function(){
    if($('#txtnumcontrato').val()==""){
        $('#idnumcontrato').addClass('has-warning').focus();
        $('#txtnumcontrato').attr('placeholder','El campo no puede ir vacio');
    }
    else{
        $('#idnumcontrato').removeClass('has-warning');
    }
})
$('#txtoficioautorizacion').blur(function(){
    if($('#txtoficioautorizacion').val()==""){
        $('#idoficioautorizacion').addClass('has-warning').focus();
        $('#txtoficioautorizacion').attr('placeholder','El campo no puede ir vacio');
    }
    else{
        $('#idoficioautorizacion').removeClass('has-warning');
    }
})

}); //Finaliza READY

