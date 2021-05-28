$(document).ready(function () {

  $("audio").on("ended", function (event) {
    //guardamos el enlace del elemento pod que son los audio 
    let nextaudios = $("#pod").prop("href");
    //redireccionamos a la variable almacenada arriba
    //PROBLEMA: $pod sólo devuelve el primero, eso tenemos que arreglarlo para eliminar los archivos que ya se han escuchado
    window.location.href = nextaudios;

  });

});