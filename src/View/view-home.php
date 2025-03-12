<?php
include_once '../../Templates/head.php' ?>

<body>

    <h1>Bienvenue sur Afpagram</h1>

    <?php include_once '../../templates/nav.php' ?>

    <div class="border border-success text-center">

        <div class="row row-cols-3 d-flex flex-column align-items-center justify-content-center">


            <?php foreach ($allPosts as $value) { ?>

                <div class="card col-lg-3 col-11">
                    <h5 class="card-title"><img src="../../assets/img/users/11/voiture.png" class="rounded-circle avatar border border-dark" alt=""> <?= $value["user_pseudo"] ?> <span class="fs-6 fw-normal"><?= date("d/m/Y - H:i", $value['post_timestamp']) ?></span> </h5>

                    <img src="../../assets/img/users/<?= $value["user_id"] ?>/<?= $value["pic_name"] ?>" class="card-img-top" alt="...">
                    <div class="card-body">
                        <div class="card-body text-start">
                            <a href="#" class="card-link"><i class="bi bi-suit-heart"></i></a>
                            <a href="#" class="card-link"><i class="bi bi-chat"></i></a>
                            <p class="card-text">500 J'aime</p>

                            <p class="card-text w-100 text-truncate"><img src="../../assets/img/users/11/voiture.png" class="rounded-circle avatar border border-dark me-1" alt=""><b> <?= $value["user_pseudo"] ?></b> <?= $value["post_description"] ?></p>
                            <p class="card-text m-0 text-secondary text-truncate">Afficher les 20 commentaires</p>
                            <p class="card-text m-0 text-secondary">Ajouter un commentaire...</p>

                        </div>

                    </div>
                </div>

            <?php } ?>

        </div>

    </div>


</body>