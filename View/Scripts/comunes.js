function ConsultarNombre()
{
    //let identificacion = document.getElementById("txtIdentificacion").value; //document = body. --JavaScript Puro
    let identificacion = $("#txtIdentificacion").val(); //JQuery, mejor a nivel de mercado.
    //alert(identificacion);

    $("#txtNombre").val("");
    if(identificacion.length >= 9){
        $.ajax({
            url: 'https://apis.gometa.org/cedulas/' + identificacion,
            method: 'GET',
            success: function(data) {
                $("#txtNombre").val(data.nombre);
            },
        });
    }  
}