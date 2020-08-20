function calcularKmTotales() {
  var inicio = $("#km_inicial").val();
  var final = $("#km_final").val();

  if (!(inicio == null && final ==null ) && inicio!=0 && final!=0 && final>inicio){
      $("#distancia").val(final-inicio);
  }
}

function calcularGananciaCamionero() {
  var valorViaje = $("#valorViaje").val() - $("#comision").val();
  $("#gananciaCamionero").val(Math.floor((18*valorViaje)/100));
}

function calcularValor(){
  var cantidad = $("#cantidad").val();
  var precio = $("#precio").val();

  if (!(cantidad == null && precio ==null ) && cantidad!=0 && precio!=0){
      $("#valorViaje").val(cantidad*precio);
      var valorViaje = $("#valorViaje").val();
      $("#gananciaCamionero").val(Math.floor((18*valorViaje)/100));   
  }
}



$(document).ready(function() {

  $("#km_inicial").change(calcularKmTotales);
  $("#km_final").change(calcularKmTotales);
  $("#cantidad").change(calcularValor);
  $("#precio").change(calcularValor);
  $("#valorViaje").change(calcularGananciaCamionero);
  $("#comision").change(calcularGananciaCamionero);

});