<?php
require 'layout/header.php';
?>


<div class="container">
    <div class="my-3 p-3 bg-white rounded shadow-sm">
        <div class="row">
            <div class="col-4">
                <h6 class="border-bottom border-gray pb-2 mb-0">Infos entreprise</h6>
                <div class="media text-muted pt-3">
                    <img src="https://i.picsum.photos/id/516/32/32.jpg" class="mr-2 rounded">
                    <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
                        <strong class="d-block text-gray-dark"><span class="text-primary">Last tweet : </span>Ouheibi tasnim </strong>
                        Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, j'ai fais roue arrière devant les CRS tortor mauris condimentum nibh, ut fermentum massa justo sit amet.
                    </p>
                </div>
                <div class="media text-muted pt-3">
                    <img data-src="holder.js/32x32?theme=thumb&bg=e83e8c&fg=e83e8c&size=1" alt="" class="mr-2 rounded">
                    <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
                        <strong class="d-block text-gray-dark">Rush B</strong>
                        Donec id elit non mi porta gravida at eget metus. Fusce LA MOTOCROSS, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.
                    </p>
                </div>
                <div class="media text-muted pt-3">
                    <img data-src="holder.js/32x32?theme=thumb&bg=6f42c1&fg=6f42c1&size=1" alt="" class="mr-2 rounded">
                    <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
                        <strong class="d-block text-gray-dark">S1mple et son flux RSS</strong>
                        Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.
                    </p>
                </div>
            </div>
            <div class="col-8">
                <h1>Bienvenue sur la plateforme de gestion de fournitures de bureau de l'entreprise <span class="text-warning font-weight-bold"></h1>
                <div class="my-3 p-3 bg-dark text-white rounded shadow-sm">
                    <h6 class="border-bottom border-gray pb-2 mb-0">Dernière gestion</h6>
                    <?php
                    foreach ($gestions as $gestion)
                    {
                        echo '<div class="media text-muted pt-3">';
                        echo '<div class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">';
                        echo '<div class="d-flex justify-content-between align-items-center w-100">';
                        echo '<strong class="text-white">';
                            foreach ($articles as $article)
                                if($article['id'] == $gestion['id_article'])
                                    echo $article['nom'];
                           echo '</strong>';
                        echo '<a class="text-success">' . $gestion['date_'] . '</a>';

                        echo '</div>';
                        echo '<span class="d-block text-warning">Quantité: ' . $gestion['quantite_enleve'] . '</span>';
                        echo '</div>';
                        echo '</div>';
                    }
                    ?>
                    <small class="d-block text-right mt-3">
                        <a href="/gestion">Toute les gestions</a>
                    </small>
                </div>
            </div>
        </div>

    </div>
</div>



<?php
require 'layout/footer.html';
?>



