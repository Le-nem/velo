<?php

if (isset($_POST)){
    $password = password_hash(htmlspecialchars($_POST['password']) , PASSWORD_DEFAULT ) ;
    $login= htmlspecialchars($_POST['login']);
    $nom= htmlspecialchars($_POST['nom']);
    $prenom= htmlspecialchars($_POST['prenom']);
    $mail= htmlspecialchars($_POST['mail']);
    $adresse1= htmlspecialchars($_POST['adresse1']);
    if(isset($_POST['adresse2'])){
    $adresse2=htmlspecialchars($_POST['adresse2']);
    }else{$adresse2='';}
    $cp=htmlspecialchars($_POST['cp']);
    $ville=htmlspecialchars($_POST['ville']);


    require_once '../class/Registery.php';
    $user = new Registery();
    if($user->register($password,$login,$nom,$prenom,$mail,$adresse1,$adresse2,$cp,$ville)){
        header('Location: /index.html?register=ok');
    }else{
        header('Location: /index.html?register=error');
    }
}

