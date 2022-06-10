<?php

require_once 'Connect.php';

class Clients
{
public function getProfile($login){
    $co = new Connect();
    $query = $co->prepare("SELECT * FROM clients WHERE login = '$login'");
    $query->execute();
    return $query->fetch(PDO::FETCH_ASSOC);
}
public function getPanier($id){
    $co = new Connect();
    $query = $co->prepare("SELECT * FROM article WHERE id = $id");
    $query->execute();
    return $query->fetch(PDO::FETCH_ASSOC);
}
public function getFacture(){
    $id=$_SESSION['idc'];
    $co = new Connect();
    $query = $co->prepare("SELECT * FROM facture JOIN lignes,clients,article WHERE lignes.id_facture=facture.id AND clients.id=facture.id_client AND lignes.id_article=article.id AND id_client =$id");
    $query->execute();
    return $query->fetchAll(PDO::FETCH_ASSOC);
}
}
