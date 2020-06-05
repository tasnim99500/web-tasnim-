<?php

class gestionController
{
    /**
     * return view with data
     */
    public function index(){
        $title = 'Gestion';
        $fournisseurs = new Fournisseur();
        $fournisseurs = $fournisseurs->getAllFournisseur();
        $services = new Service();
        $services = $services->getAllService();
        $articles = new Article();
        $articles = $articles->getAllArticle();
        $gestions = new Gestion();
        $gestions = $gestions->getAllGestion();
        require '../app/views/gestion.php';
    }

    /**
     * request the post function
     * @param $name
     * @param $phone
     * @param $address
     */
    public function fournisseur_request($name, $phone, $address){
        $fournisseur = new Fournisseur();
        $fournisseur->__set('name', $name);
        $fournisseur->__set('phone', $phone);
        $fournisseur->__set('address', $address);
        $fournisseur->save();
        $_SESSION['alert']['id'] = 1;
        $_SESSION['alert']['message'] = "Le fournisseur a bien été créé";
    }

    /**
     * Insert in table historique gestion and update stock if we are stock
     * @param $id_article
     * @param $id_service
     * @param $quantity
     */
    public function attribution_request($id_article, $id_service, $quantity){
        $gestion = new Gestion();
        $article = new Article();
        if ($quantity <= $article->getArticleById($id_article)[0]["stock"]) {
            $quantity = $quantity * -1;
            $article->updateQuantityById($quantity, $id_article);
            $gestion->__set('id_article', $id_article);
            $gestion->__set('id_service', $id_service);
            $gestion->__set('quantity', $quantity);
            $gestion->save();
            $_SESSION['alert']['id'] = 1;
            $_SESSION['alert']['message'] = "L'attribution a bien été prise en compte";
        }
        else {
            $_SESSION['alert']['id'] = 2;
            $_SESSION['alert']['message'] = "Il n'y a pas assez de stock";
        }
    }

    /**
     * request the post function
     * @param $name
     * @param $code
     */
    public function service_request($name, $code){
        $service = new Service();
        $service->__set('name', $name);
        $service->__set('code', $code);
        $service->save();
        $_SESSION['alert']['id'] = 1;
        $_SESSION['alert']['message'] = "Le service a bien été créé";
    }

    /**
     * request the post function
     * @param $name
     * @param $code
     */
    public function article_request($name, $price, $fournisseur){
        $service = new Article();
        $service->__set('name', $name);
        $service->__set('price', $price);
        $service->__set('fournisseur', $fournisseur);
        $service->__set('stock', 0);
        $service->save();
        $_SESSION['alert']['id'] = 1;
        $_SESSION['alert']['message'] = "L'article a bien été créé";
    }

}
