<?php
session_start();
require_once '../class/Article.php';

if (isset($_GET['action'])) {
    if ($_GET['action'] === 'all') {
        $article = new Article();
        $res = $article->showAllArticle();
        foreach ($res as $a => $row) {
            $data[] = array(
                'id' => $row['id'],
                'code' => $row['code'],
                'description' => $row['description'],
                'prix' => $row['prix'],
                'stock' => $row['stock']
            );
        }
        echo json_encode($data);
    }
    elseif ($_GET['action'] === 'order') {
        $id = htmlspecialchars($_GET['id']);
        $article = new Article();
        $res = $article->orderArticle($id);

        $_SESSION['panier']=array('idp' => $res['id']);
        header('Location: /index.html?command=standby');

    }
    elseif($_GET['action'] === 'command'){
        $id=$_SESSION['panier']['idp'];
        $article = new Article();
        $article->majArticle($id);
        header('Location: /index.html?command=ok');


    }
    elseif($_GET['action'] === 'facture'){
        $article = new Article();
        $article->facture();
        header('Location: /index.html?facture=ok');


    }


}


