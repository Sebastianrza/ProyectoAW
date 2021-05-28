var contador = -1;
$(document).ready(function () {

  $("audio").on("ended", function (event) {
    var audios= [];
    $(".contenedorPlaylist > .infoPlaylist > a").each(function(){
      //Almacenar cada uno en un array
      audios.push($(this).prop("href"));
    });
    //guardamos el enlace del elemento pod que son los audio 
    //redireccionamos a la variable almacenada arriba
    //PROBLEMA: $pod sólo devuelve el primero, eso tenemos que arreglarlo para eliminar los archivos que ya se han escuchado
    contador++;
    if(contador > audios.length-1){
     contador = 0; 
    }
    window.location.href = audios[contador];
  
  });

});