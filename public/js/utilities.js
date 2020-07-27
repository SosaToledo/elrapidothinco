var id;

$(document).on("click", ".submitBtn", function () {
    id = $(this).attr('idParaBorrar');
    var idSimple = $(this).attr('codigoSimple');
    $("#modalHeader").text("Borrado de elemento " + idSimple);
});

$(document).ready(function() {
    // show the alert
    setTimeout(function() {
        //$(".success-alert").alert('close');
        //$('#btnCerrar').click();
        jQuery('#success-alert').fadeOut();
    }, 3000);

    $('#submit').click(function() {
        $('#formBorrar'+id).submit();
    });

});