function openInformacion() {
    closePodSub();
    closePodFav();
    closeSeguidores();
    closeSiguiendo();
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
        closeSeguidores();
        closeSiguiendo();
        closeeditperfil();
        document.getElementById("subir-podc").style.display = "block";
    }
  function closePodSub() {
        document.getElementById("subir-podc").style.display = "none";
  }
  function openPodFav() {
    closeInformacion();
    closePodSub();
    closeSeguidores();
    closeSiguiendo();
    closeeditperfil();
    document.getElementById("podc-fav").style.display = "block";
  }
  function closePodFav() {
        document.getElementById("podc-fav").style.display = "none";
  }
  function openSeguidores() {
    closeInformacion();
    closePodSub();
    closePodFav();
    closeSiguiendo();
    closeeditperfil();
    document.getElementById("seguidores").style.display = "block";
  }
  function closeSeguidores() {
    document.getElementById("seguidores").style.display = "none";
  }
  function openSiguiendo() {
    closeInformacion();
    closePodSub();
    closePodFav();
    closeSeguidores();
    closeeditperfil();
    document.getElementById("siguiendo").style.display = "block";
  }
  function closeSiguiendo() {
    document.getElementById("siguiendo").style.display = "none";
  }
  function openeditperfil() {
    closeInformacion();
    closePodSub();
    closePodFav();
    closeSiguiendo();
    closeSeguidores();
    document.getElementById("edit-perfil").style.display = "block";
  }
  function closeeditperfil() {
    document.getElementById("edit-perfil").style.display = "none";
  }