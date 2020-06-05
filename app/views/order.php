<?php
require '../app/controllers/homeController.php';
require 'layout/header.php';
$crsf_token = bin2hex(random_bytes(32));
$_SESSION['crsf_token'] = $crsf_token;
?>


<div class="container">
    <?php
    if (isset($_SESSION['alert']['id']))
    {
        if ($_SESSION['alert']['id'] == 1){

            echo '<div class="alert mt-3 alert-success alert-dismissible fade show" role="alert">';
            echo '<strong>Success ! </strong>' . $_SESSION['alert']['message'] .'.';
            echo '<button type="button" class="close" data-dismiss="alert" aria-label="Close">';
            echo '<span aria-hidden="true">&times;</span>';
            echo '</button>';
            echo '</div>';
        }
        elseif ($_SESSION['alert']['id'] == 2) {
            echo '<div class="alert mt-3 alert-danger alert-dismissible fade show" role="alert">';
            echo '<strong>Oops ! </strong>' . $_SESSION['alert']['message'] .'.';
            echo '<button type="button" class="close" data-dismiss="alert" aria-label="Close">';
            echo '<span aria-hidden="true">&times;</span>';
            echo '</button>';
            echo '</div>';
        }
    }
    $_SESSION['alert']['id'] = 0;
    $_SESSION['alert']['message'] = "";
    ?>
    <div class="my-3 p-3 bg-white rounded shadow-sm">
        <div class="row">
            <div class="col-12">
                <h6 class="border-bottom border-gray pb-2 mb-0">Passer une commande</h6>
                <form class="mt-1" action="/order" method="post">
                    <div class="form-group">
                        <input type="hidden" name="crsf_token" value="<?= $crsf_token; ?>">
                        <label for="commandeArticle">Article</label>
                        <select class="form-control" name="commandeArticle" id="commandeArticle">
                            <?php
                                foreach ($articles as $article)
                                {
                                    echo '<option value="'. $article['id'] .'">' . $article['nom'] . '</option>';
                                }
                            ?>
                        </select>
                        <label for="quantite">Quantité</label>
                        <input type="text" class="form-control" name="quantite" id="quantite" placeholder="3" required>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Commander</button><span> Prix: €</span>
                    </div>
                </form>
                <h6 class="border-bottom border-gray pb-2 mb-0">Les commandes</h6>
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nom</th>
                        <th scope="col">Quantié</th>
                        <th scope="col">Prix</th>
                        <th scope="col">Date</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    foreach ($orders as $order) {
                        echo '<tr>';
                        echo '<th scope="row">' . $order['id'] . '</th>';
                        echo '<td>';
                        foreach ($articles as $article)
                            if($order['id_article'] == $article['id'])
                                echo $article['nom'];
                        echo '</td>';
                        echo '<td>' . $order['quantite'] . '</td>';
                        echo '<td>' . $order['prix'] . '€</td>';
                        echo '<td>' . $order['date_commande'] . '</td>';
                    }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>
<?php
require 'layout/footer.html';
?>
