<?php include_once '../../Templates/head.php' ?>

<body>

    <?php include_once '../../Templates/nav.php' ?>

    <h1 class="text-center">Creation</h1>

    <form action="" method="POST" enctype="multipart/form-data">
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
    </form>

</body>