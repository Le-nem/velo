<?php

if (isset($_GET['action'])) {
    if ($_GET['action'] === 'all') {
        require_once '../class/Article.php';
        $article = new Article();
        $res = $article->ShowAllArticle();
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
}
