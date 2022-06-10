<?php

require_once 'Connect.php';

class Registery
{
    public function register($password,$login,$nom,$prenom,$mail,$adresse1,$adresse2,$cp,$ville){
        $co = new Connect();
        $query = $co->prepare("INSERT INTO clients (login,password,nom,prenom,mail,adresse1,adresse2,cp,ville) VALUES ('$login','$password','$nom','$prenom','$mail','$adresse1','$adresse2','$cp','$ville');");
        $query->execute();
        return true;
    }
}