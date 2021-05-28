$(document).ready(function () {

  $("audio").on("ended", function (event) {

    let nextaudios = $("#pod").prop("href");
    window.location.href = nextaudios;

  });

});