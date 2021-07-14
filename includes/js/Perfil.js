$(function () {
    $("#podcastsubidos").on("click", function (event) {
        $("#User-Data").hide();
        $("#User-bio").hide();
        $("#playlist-user").hide();
        $("#edit-perfil").hide();
        $("#subir-podc").show();
    });
    $("#infoperfil").on("click", function (event) {
        $("#subir-podc").hide();
        $("#playlist-user").hide();
        $("#edit-perfil").hide();
        $("#User-Data").show();
        $("#User-bio").show();
    });

    $("#subirPlaylist").on("click", function (event) {
        $("#User-Data").hide();
        $("#User-bio").hide();
        $("#edit-perfil").hide();
        $("#subir-podc").hide();
        $("#playlist-user").show();
    });
    $("#edita-perfil").on("click", function(event){
        $("#User-Data").hide();
        $("#User-bio").hide();
        $("#subir-podc").hide();
        $("#playlist-user").hide();
        $("#edit-perfil").show();
    });
});