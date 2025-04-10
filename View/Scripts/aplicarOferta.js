$(document).on("click","#btnAplicarOferta", function(){

    $("#txtIdOferta").val($(this).attr("data-idOferta"));
    $("#lblNombre").text($(this).attr("data-nombre"));
    $("#txtDescripcion").val($(this).attr("data-desc"));
    $("#lblSalario").text($(this).attr("data-salario"));
    $("#lblHorario").text($(this).attr("data-horario"));

});