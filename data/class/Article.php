<?php

require_once 'Connect.php';

class Article
{

    public function ShowAllArticle()
    {
        $co = new Connect();
        $query = $co->prepare('SELECT * FROM article');
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }
}
