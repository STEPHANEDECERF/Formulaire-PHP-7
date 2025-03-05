<?php
include_once '../../Templates/head.php' ?>

<body>
    <div class="col-4 mx-auto">
        <h1>Connexion :</h1>
        <form action="" method="POST" novalidate>
            <div class="mb-3">
                <label for="email" class="form-label">Email : </label></label><span class="text-danger ms-1"><?= $errors["email"] ?? "" ?></span>
                <input type="email" class="form-control" name="email" id="email" value="<?= $_POST["email"] ?? "" ?>">
                <div id="emailHelp" class="form-text">Nous ne partagerons jamais votre e-mail avec quelqu'un d'autre.</div>

                <br><br>

                <div class="mb-3">
                    <label for="password" class="form-label">Mot de passe :</label>
                    <span class="text-danger ms-1"><?= $errors["password"] ?? "" ?></span>
                    <input type="password" class="form-control" id="password" name="password">
                </div>

                <br><br>

                <div>
                    <span class="text-danger text-center d-block"><?= $errors["connexion"] ?? "" ?></span>
                    <button type="submit" class="btn btn-primary mx-auto d-block">Connexion</button>
                </div>
        </form>
        <br><br>


        <div>
            <a class="icon-link" href="../Controller/controller-inscription.php">
                <svg class="bi" aria-hidden="true">
                    <use xlink:href="#box-seam"></use>
                </svg>
                Pas encore de compte ? Inscrivez-vous
            </a>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>