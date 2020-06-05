<?php
/*******************************
 *           ROUTER            *
 ******************************/
session_start();
$request = $_SERVER['REQUEST_URI'];
switch ($request) {
    case '':
    case '/' :

        require '../app/controllers/homeController.php';
        $view = new homeController();
        $view->index();
        break;

    case '/gestion' :

        require '../app/controllers/gestionController.php';
        $view = new gestionController();
        if (isset($_POST['nFourni']) && isset($_POST['telFourni']) && isset($_POST['adrFourni']))
            if($_POST['crsf_token'] == $_SESSION['crsf_token'])
                $view->fournisseur_request($_POST['nFourni'], $_POST['telFourni'], $_POST['adrFourni']);
            else {
                http_response_code(403);
                require '../app/views/errors/403.html';
                break;
            }
        if (isset($_POST['nArticle']) && isset($_POST['prixArticle']) && isset($_POST['fournisseurArticle']))
            if($_POST['crsf_token'] == $_SESSION['crsf_token'])
                $view->article_request($_POST['nArticle'], $_POST['prixArticle'], $_POST['fournisseurArticle']);
            else {
                http_response_code(403);
                require '../app/views/errors/403.html';
                break;
            }
        if (isset($_POST['nService']) && isset($_POST['idService']))
            if($_POST['crsf_token'] == $_SESSION['crsf_token'])
                $view->service_request($_POST['nService'], $_POST['idService']);
            else {
                http_response_code(403);
                require '../app/views/errors/403.html';
                break;
            }
        if (isset($_POST['codeArticle']) && isset($_POST['codeService']) && isset($_POST['nbArticle']))
            if($_POST['crsf_token'] == $_SESSION['crsf_token'])
                $view->attribution_request($_POST['codeArticle'], $_POST['codeService'], $_POST['nbArticle']);
            else {
                http_response_code(403);
                require '../app/views/errors/403.html';
                break;
            }
        $view->index();
        break;

    case '/order' :
        require '../app/controllers/orderController.php';
        $view = new orderController();
        if (isset($_POST['commandeArticle']) && isset($_POST['quantite']))
            if($_POST['crsf_token'] == $_SESSION['crsf_token'])
                $view->order_request($_POST['commandeArticle'], $_POST['quantite']);
            else {
                http_response_code(403);
                require '../app/views/errors/403.html';
                break;
            }
        $view->index();
        break;
    default:
        http_response_code(404);
        require '../app/views/errors/404.html';
        break;
}
