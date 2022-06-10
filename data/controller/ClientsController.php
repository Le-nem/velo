<?php
session_start();
require_once '../class/Clients.php';
if (isset($_GET['action'])) {
    $user = new Clients();
    if ($_GET['action'] === 'panier'){
        if (isset($_SESSION['user'])) {
            $res=$user->getPanier($_SESSION['panier']['idp']);
                $data= array(
                    'id' => $res['id'],
                    'code' => $res['code'],
                    'description' => $res['description'],
                    'prix' => $res['prix'],
                    'stock' => $res['stock']
                );

            echo json_encode($res);
        }
    }
    elseif ($_GET['action'] === 'profile') {
        if (isset($_SESSION['user'])) {
            $res = $user->getProfile($_SESSION['user']);
                $data = array(
                    'id' => $res['id'],
                    'login' => $res['login'],
                    'nom' => $res['nom'],
                    'prenom' => $res['prenom'],
                    'mail' => $res['mail'],
                    'adresse1' => $res['adresse1'],
                    'adresse2' => $res['adresse2'],
                    'cp' => $res['cp'],
                    'ville' => $res['ville']
                );
            echo json_encode($data);
        }
    }
    elseif ($_GET['action'] === 'facture') {
            $res = $user->getFacture();
            foreach ($res as $a => $row){
            $data[] = array(
                'nom' => $row['nom'],
                'prenom' => $row['prenom'],
                'mail' => $row['mail'],
                'adresse1' => $row['adresse1'],
                'adresse2' => $row['adresse2'],
                'cp' => $row['cp'],
                'ville' => $row['ville'],
                'date' => $row['date_livraison'],
                'prix' => $row['prix'],
                'description' => $row['description']
            );
            }
            echo json_encode($data);

    }

}
