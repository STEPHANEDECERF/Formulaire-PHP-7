<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>connexion.php</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>

<body>
    <div class="col-4 mx-auto">
        <h1>Connexion :</h1>

    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Email : </label></label><span class="text-danger ms-1">erreur</span>
        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        <div id="emailHelp" class="form-text">Nous ne partagerons jamais votre e-mail avec quelqu'un d'autre.</div>

        <br><br>

        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Mot de passe :</label></label><span class="text-danger ms-1">erreur</span>
            <input type="password" class="form-control" id="exampleInputPassword1">
        </div>

        <br><br>

        <div>

            <button type="submit" class="btn btn-primary">Connexion</button>

        </div>

        <br><br>

        
<div>
    <a class="icon-link" href="#">
        <svg class="bi" aria-hidden="true"><use xlink:href="#box-seam"></use></svg>
      link "Pas encore de compte ? Inscrivez-vous"
      </a>
    </div>



</div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>