function imprimirRecibo() {
  var matricula = document.getElementById("matricula").textContent;
  var total = document.getElementById("total").textContent;
  var contenido = "<h1>Recibo de pago</h1><p>Matrícula: " + matricula + "</p><p>Total pagar: $" + total + "</p>";
  var ventana = window.open("", "", "height=500,width=500");
  ventana.document.write(contenido);
  ventana.print();
  ventana.close();
}

$(document).ready(function() {
  $('#reciboModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget);
    var matricula = button.data('matricula');
    var total = button.data('total');
    var modal = $(this);
    modal.find('#matricula').text(matricula);
    modal.find('#total').text(total);
  });
});