function openInformacion() {
    closePodSub();
    closePodFav();
    closeeditperfil();
    document.getElementById("User-Data").style.display = "inline";
    document.getElementById("User-bio").style.display = "inline";
  }
  function closeInformacion() {
        document.getElementById("User-Data").style.display = "none";
        document.getElementById("User-bio").style.display = "none";
    }
  function openPodSub() {
        closeInformacion();
        closePodFav();
        closeeditperfil();
        document.getElementById("subir-podc").style.display = "block";
    }
  function closePodSub() {
        document.getElementById("subir-podc").style.display = "none";
  }
  function openPodFav() {
    closeInformacion();
    closePodSub();
    closeeditperfil();
    document.getElementById("podc-fav").style.display = "block";
  }
  function closePodFav() {
        document.getElementById("podc-fav").style.display = "none";
  }
  function openeditperfil() {
    closeInformacion();
    closePodSub();
    closePodFav();
    document.getElementById("edit-perfil").style.display = "block";
  }
  function closeeditperfil() {
    document.getElementById("edit-perfil").style.display = "none";
  }