<?php
include_once '../../Templates/head.php' ?>

<body>

    <h1>Bienvenue sur Afpagram</h1>

    <?php include_once '../../templates/nav.php' ?>

    <div class="border border-success text-center">

        <div class="row row-cols-3">


            <?php
            foreach ($allPosts as $value) { ?>

                <div class="card mb-3">
                    <div class="row g-0">
                        <div class="col">
                            <img src="../../assets/img/users/<?= $_SESSION['user_id'] ?>/<?= $value['pic_name'] ?>" class="img-fluid rounded-start" alt="...">
                        </div>
                    </div>
                </div>

            <?php } ?>







            

        </div>

    </div>


</body>