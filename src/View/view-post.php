<?php include_once '../../Templates/head.php' ?>

<body>

    <h1>Bienvenue sur Afpagram</h1>

    <?php include_once '../../Templates/nav.php' ?>

    <h1 class="text-center">Commentaire</h1>

    <div class="row justify-content-center">
        <div class="card mb-3 col-8">
            <div class="row g-0">
                <div class="col-md-6 border border-dark text-center">
                    <img src="../../assets/img/users/<?= $post['user_id'] ?>/<?= $post['pic_name'] ?>" class="img-fluid rounded-start" alt="...">
                </div>
                <div class="col-md-6">
                    <div class="card-body">
                        <h5 class="card-title"><img src="../../assets/img/users/<?= $post['user_id'] ?>/<?= $post['pic_name'] ?>" class="rounded-circle avatar border border-dark" class="card-title"> <?= $post['user_pseudo'] ?> <span class="fs-6 fw-normal"></span> </h5>
                        <br>
                        <h5 class="card-text d-inline-block"><img src="../../assets/img/users/<?= $post['user_id'] ?>/<?= $post['pic_name'] ?>" class="rounded-circle avatar border border-dark" class="card-title"> <?= $post['user_pseudo'] ?> <span class="fs-6 fw-normal"></span></h5>
                        <p class="card-text d-inline-block mr-2"><?= $post['post_description'] ?></p>
                        <br>
                        <p class="card-text">OUIIII vraiment adorable.</p>
                        <a href="#" class="card-link"><i class="bi bi-suit-heart"></i></a>
                        <a href="#" class="card-link"><i class="bi bi-chat"></i></a>
                        <p class="card-text">500 J'aime</p>
                        <p class="card-text"><small class="text-body-secondary">14/03/2025</small></p>

                        <!-- <a href="../Controller/controller-post.php">
                            <p class="card-text m-0 text-secondary">Ajouter un commentaire...</p>
                        </a> -->


                        <p class="card-text m-0 text-secondary">Ajouter un commentaire...</p>
                        <!-- <div class="d-flex justify-content-between"></div> -->
                        <button type="button" class="btn btn-secondary">Publier</button>


                    </div>
                </div>
            </div>
        </div>
    </div>















    <!-- <form action="" method="POST" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="formFile" class="form-label">Ajouter une photo</label>
            <input class="form-control" type="file" id="formFile" name="photo">
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" id="description" name="description"></textarea>
        </div>
        <div class="fixed-bottom">...</div>
        <button class="btn btn-secondary">Publier</button>
    </form> -->

</body>