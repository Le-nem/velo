<?php

require_once 'Connect.php';

class Article
{

    public function showAllArticle()
    {
        $co = new Connect();
        $query = $co->prepare('SELECT * FROM article');
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }
    public function orderArticle($id){
        $co = new Connect();
        $query = $co->prepare("SELECT * FROM article where article.id = $id ");
        $query->execute();
        return $query->fetch(PDO::FETCH_ASSOC);
    }
    public function majLigne($idf){

        $id=$_SESSION['panier']['idp'];
        $co = new Connect();
        $query = $co->prepare("INSERT INTO lignes (id_article,id_facture,quantité) VALUES ($id,$idf,1)");
        $query->execute();
    }
    public function facture(){
        $id=$_SESSION['idc'];
        $date=date('Y-m-d H:i:s');
        $co = new Connect();
        $query = $co->prepare("INSERT INTO facture (id_client,date_livraison) VALUES ($id,'$date')");
        $query->execute();
        $idf = $co->lastInsertId();
        $this->majLigne($idf);
    }
    public function majArticle($id){
        $co = new Connect();
        $query = $co->prepare("UPDATE article SET stock = stock -1 where article.id = $id");
        $query->execute();
        $this->facture();
    }


}
