<?php

class homeController
{
    public function index(){
        $title = 'Accueil';
        $articles = new Article();
        $articles = $articles->getAllArticle();
        $gestions = new Gestion();
        $gestions = $gestions->getAllGestion();
        require '../app/views/home.php';
    }

}
