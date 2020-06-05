<?php

class orderController
{
    public function index(){
        $title = 'Commander';
        $articles = new Article();
        $articles = $articles->getAllArticle();
        $orders = new Order();
        $orders = $orders->getAllOrder();
        require '../app/views/order.php';
    }



    public function order_request($id_article, $quantity){
        $order = new Order();
        $article = new Article();
        $article->updateQuantityById($quantity, $id_article);
        $article = $article->getArticleById($id_article);
        $order->__set('id_article', $id_article);
        $order->__set('quantity', $quantity);
        $order->__set('prix', $quantity * $article[0]["prix_unit"]);
        $order->save();
        $_SESSION['alert']['id'] = 1;
        $_SESSION['alert']['message'] = "La Commande a bien été passé";
    }
}
