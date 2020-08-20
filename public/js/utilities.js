var id;

function calcularVencimiento(fecha1) {
    var dateParts = fecha1.split("/");
    var expiresDate = new Date(+dateParts[2], dateParts[1] - 1, +dateParts[0]);
    var today = new Date();
    /* today.setHours(0, 0, 0, 0); */
    /* var fechaVto = new Date(fecha1); */
    const diffTime = Math.abs(expiresDate - today);
    const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24)); 
    
    /*
        < 30d rojo
        < 60d amarillo
    */
    if (diffDays < 30) {
        /* return 'casillaRoja'; */
        return ' <i class="fa fa-exclamation-triangle" style="color:red"> </i>';
    } else {
        if (diffDays < 60) {
            return ' <i class="fa fa-exclamation-triangle" style="color:darkorange"> </i>';
            /* return 'casillaAmarilla'; */
        }
        else{
            return '';
        }
     }
}

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

    /* fechaConVto */
    $('.fechaConVto').each(function(index, value) {
        /* console.log($(this).text()); */
        $(this).addClass(calcularVencimiento($(this).text()));
        $(this).append(calcularVencimiento($(this).text()));
        
        $("ol").append("<li>append item</li>");
    });
});