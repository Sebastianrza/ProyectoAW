<?php

class Usuario{
    
    private $username;
    private $email;
    private $nombre;
    private $apellido;
    private $password;
    

    public function __construct($username, $nombre,$email, $apellido, $password){
        $this -> username = $username;
        $this -> nombre = $nombre;
        $this -> apellido = $apellido;
        $this -> email = $email;
        $this -> password = $password;
    }


    public function obtenerUser(){
        return $this->username;
    }
    public function obtenerNombre(){
        return $this -> nombre;
    }
    public function obtenerApellido(){
       return $this -> apellido;
    }
    public function obtenerEmail(){
        return  $this -> email;
    }
    public function obtenerPassword(){
        return $this -> password;
    }

    public function cambiarUser($username){
        $this -> username = $username;
    }
    public function cambiarNombre($nombre){
        $this -> nombre = $nombre;
    }
    public function cambiarApellido($apellido){
        $this -> apellido = $apellido;
    }
    public function cambiarEmail($email){
        $this -> email = $email;
    }
    public function cambiarPassword($password){
        $this -> password = $password;
    }
}

?>