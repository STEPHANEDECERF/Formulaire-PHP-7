<?php
include_once '../../Templates/head.php' ?>

<body>
    <div class="col-4 mx-auto">

        <h1>Inscription :</h1>


        <form method="post">
            <!-- nom prénom -->

            <div class="form-group">
                <label for="usr">Nom :</label><span class="text-danger ms-1"><?= $errors["lastname"] ?? "" ?></span>
                <input type="text" name="lastname" class="form-control" id="usr" value="<?= $_POST["lastname"] ?? "" ?>">
            </div>
            <div class="form-group">
                <label for="usr">Prénom :</label><span class="text-danger ms-1"><?= $errors["firstname"] ?? "" ?></span>
                <input type="text" name="firstname" class="form-control" id="usr" value="<?= $_POST["firstname"] ?? "" ?>">
            </div>
            <div class="form-group">
                <label for="usr">Pseudo :</label><span class="text-danger ms-1"><?= $errors["pseudo"] ?? "" ?></span>
                <input type="text" name="pseudo" class="form-control" id="usr" value="<?= $_POST["pseudo"] ?? "" ?>">
            </div>


            <!-- Email -->

            <div class="mb-3 mt-3">
                <label for="exampleInputEmail1" class="form-label">Email : </label><span class="text-danger ms-1"><?= $errors["email"] ?? "" ?></span>
                <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"value="<?= $_POST["email"] ?? "" ?>">
                <div id="emailHelp" class="form-text">Nous ne partagerons jamais votre e-mail avec quelqu'un d'autre.
                </div>


                <!-- mot de passe -->

                <div class="mb-3 mt-3">
                    <label for="exampleInputPassword1" class="form-label">Mot de passe :</label><span class="text-danger ms-1"><?= $errors["password"] ?? "" ?></span>
                    <input type="password" name="password" class="form-control" id="exampleInputPassword1">
                </div>

                <label for="exampleInputPassword1" class="form-label">Confirmation du mot de passe :</label><span class="text-danger ms-1"><?= $errors["password"] ?? "" ?></span>
                <input type="password" name="password" class="form-control" id="exampleInputPassword1">
            </div>
            <br>

            <!-- date de naissance -->


            <div class="form-group">
                <label for="usr">Date de naissance :</label><span class="text-danger ms-1"><?= $errors["date"] ?? "" ?></span>
                <input type="date" name="date" class="form-control" id="usr">
            </div>
            <br>

            <!-- Genre         -->
            <span class="text-danger ms-1"><?= $errors["genre"] ?? "" ?></span>
            <select class="form-select" aria-label="Default select example" name="genre">
                <option selected disabled value="">Choix du genre</option>
                <option value="homme">Homme</option>
                <option value="femme">Femme</option>
                <option value="autre">Autre</option>
            </select>
            <br>

            <!-- conditions d'utilisation         -->

            <div class="mb-3 form-check">
                <input type="checkbox" name="checkbox" class="form-check-input" id="exampleCheck1">
                <p>Conditions d'utilisation (obligatoire)</p>

            </div>
            <button type="submit" class="btn btn-primary">Soumettre</button>
            <br><br><br>
            <a href="../Controller/controller-connexion.php">Retour</a>

            <br><br>



        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>