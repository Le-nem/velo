<?php
if(isset($_GET['logout'])){
    session_start();
    session_destroy();
    header('Location: /index.html?logout=ok');

}
elseif(isset($_GET['action'])) {
    session_start();
    $data = array('user' => $_SESSION['user']);
    echo json_encode($data);
}
elseif (isset($_POST)){
    $password = htmlspecialchars($_POST['password']);
    $login= htmlspecialchars($_POST['login']);
    require_once '../class/Login.php';
    $user = new Login();
    $res = $user->login($login);
    if ($res){
        if (password_verify($password,$res['password'] )){
            session_start();
            $_SESSION['user']= $res['login'];
            $_SESSION['idc']=$res['id'];
            header('Location: /index.html?succes=login');
        }else{

            header('Location: /index.html?error=loginerror');
        }
    }else{
        header('Location: /index.html?error=loginerror');
    }

}
