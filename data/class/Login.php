<?php

require_once 'Connect.php';

class Login
{
    public function login($login){
        $co = new Connect();
        $query = $co->prepare("SELECT * FROM clients where login = '$login' ");
        $query->execute();
        return $query->fetch(PDO::FETCH_ASSOC);
    }

}