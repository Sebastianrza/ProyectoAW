$(function () {
  var audios = [];
  var reproduciendo = [];
  var restoaudios = [];
  var ids = [];
  var titles = [];

  $("source").each(function () {
    audios.push($(this).prop("src"));
  });

  $("source").each(function () {
    ids.push($(this).prop("id"));
  });

  $(".caja").each(function () {
    reproduciendo.push($(this));
  });

  $(".infoPlaylist").each(function () {
    restoaudios.push($(this));
  });

  $(".nombre-podcast").each(function () {
    titles.push($(this));
  });

  //BUSQUEDA DE LA POSICION DEL ELEMENTO CON IDPODCAST INICIAL (PARAMETRO)
  //obtener la url de la pagina
  const urlParams = new URLSearchParams(window.location.search);
  //recuperar el idpocast de la url
  const idGET = urlParams.get('idPodcast');
  var contador = ids.findIndex((indexInList) => indexInList == idGET);

  $("audio").on("ended", function (event) {
    //Ocultamos los elementos del anterior
    reproduciendo[contador].hide();
    restoaudios[contador].show();
    titles[contador].hide();

    //Aumentamos el contador de la playlist
    contador++;
    if (contador > audios.length - 1) {
      contador = 0;
    }
    if (audios[contador] !== undefined) {
      //Cambiar span podcast reproduciendo
      reproduciendo[contador].show();
      //Cambiar div resto de podcasts
      restoaudios[contador].hide();
      //Cambiar audio al siguiente
      titles[contador].show();
      $("audio").prop("src", audios[contador]);
      $("audio")[0].load();
      $("audio")[0].play();
    }

  });

  $("#previous").on("click", function (event) {
    reproduciendo[contador].hide();
    restoaudios[contador].show();
    titles[contador].hide();
    contador--;
    if (contador < 0) {
      contador = audios.length - 1;
    }
    if (audios[contador] !== undefined) {
      //Cambiar span podcast reproduciendo
      reproduciendo[contador].show();
      //Cambiar div resto de podcasts
      restoaudios[contador].hide();
      //Cambiar audio al siguiente
      titles[contador].show();
      $("audio").prop("src", audios[contador]);
      $("audio")[0].load();
      $("audio")[0].play();
    }

  });

  $("#next").on("click", function (event) {
    //Ocultamos los elementos del anterior
    reproduciendo[contador].hide();
    restoaudios[contador].show();
    titles[contador].hide();

    //Aumentamos el contador de la playlist
    contador++;
    if (contador > audios.length - 1) {
      contador = 0;
    }
    if (audios[contador] !== undefined) {
      //Cambiar span podcast reproduciendo
      reproduciendo[contador].show();
      //Cambiar div resto de podcasts
      restoaudios[contador].hide();
      //Cambiar audio al siguiente
      titles[contador].show();
      $("audio").prop("src", audios[contador]);
      $("audio")[0].load();
      $("audio")[0].play();
    }

  });
});