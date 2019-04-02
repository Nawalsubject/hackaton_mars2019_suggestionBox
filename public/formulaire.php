<?php
require '../src/connec.php';
require '../src/functions.php';
$pdo = new PDO(DSN, USER, PASS);
$pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);

// recovers categories table //
$queryCategory = "SELECT * FROM category";
$statementCategory = $pdo->query($queryCategory);
$categories = $statementCategory->fetchall(PDO::FETCH_ASSOC);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = cleanData($_POST);
    $errors = [];

    if (empty($data['lastname']) > 255) {
        $errors['lastname'] = "Votre nom de famille ne peut pas dépasser 255 caractères.";
    }
    if (empty($data['fistname']) > 255) {
        $errors['firstname'] = "Votre prénom ne peut pas dépasser 255 caractères";
    }
    if (empty($data['title']) > 45) {
        $errors['title'] = "Votre titre ne peut pas dépasser 45 caractères";
    }
    if (empty($data['message']) > 140) {
        $errors['message'] = "Votre message ne peut pas dépasser 140 caractères";
    }
    if (empty($data['ideacategory'])) {
        $errors['ideacategory'] = "Le type d'idée doit être défini.";
    }


    if (empty($errors)) {

        $query = "INSERT INTO idea (firstname, lastname, title, message, date, categoryid ) 
VALUES (:firstname, :lastname, :title, :message ,:date, :category)";

        $statement = $pdo->prepare($query);

        $statement->bindValue(':lastname', $data['lastname'], PDO::PARAM_STR);
        $statement->bindValue(':firstname', $data['firstname'], PDO::PARAM_STR);
        $statement->bindValue(':title', $data['title'], PDO::PARAM_STR);
        $statement->bindValue(':message', $data['message'], PDO::PARAM_STR);
        $statement->bindValue(':category', $data['ideacategory'], PDO::PARAM_INT);
        $statement->bindValue(':date',GetDateToSQLFormat(), PDO::PARAM_STR);
        $statement->execute();
        header("Location:success.php");
        exit();
    }
}
?>

<!doctype html>
<html lang="fr">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/style.css"/>
    <title>Just box it</title>
</head>
<body>
<header>
    <?php
    require "header.php";
    ?>
</header>
<div class="container p-0 my-5">

    <h1>Une petite idée ... Faites la partager !</h1>

    <div class="card formIdea my-2">

        <div class="card-body">

            <form method="POST" action="formulaire.php">
                <div class="form-group">
                    <label for="lastname">Nom</label>
                    <input type="text" class="form-control" id="lastname" name="lastname"
                           value="<?= $_POST['lastname'] ?? '' ?>" aria-describedby="textHelp"
                           placeholder="Votre nom ..." required>
                    <p><?= $errors["lastname"] ?? "" ?></p>
                </div>

                <div class="form-group">
                    <label for="firstname">Prénom</label>
                    <input type="text" class="form-control" id="firstname" name="firstname"
                           value="<?= $_POST['firstname'] ?? "" ?>" aria-describedby="textHelp"
                           placeholder="Votre prénom ..." required>
                    <p><?= $errors["firstname"] ?? "" ?></p>
                </div>

                <div class="form-group">
                    <label for="title">Titre</label>
                    <input type="text" class="form-control" id="title" name="title" value="<?= $_POST['title'] ?? "" ?>"
                           aria-describedby="textHelp" placeholder="Ca parle de quoi ? "
                           required>
                    <p><?= $errors['title'] ?? "" ?></p>
                </div>

                  <div class="form-group">
                    <label for="textarea">Postez votre idée 💡</label>
                    <textarea class="form-control" id="textarea" rows="3"  placeholder="Quelle est votre idée ? (140 caractères maximum)"
                              name="message" required><?= $_POST['message'] ?? "" ?></textarea>
                    <p><?= $errors['message'] ?? "" ?></p>
                </div>

                <div class="row justify-content-center text-center">
                <?php foreach ($categories as $category) : ?>
                <div class="col-4 w-80 my-2 pt-3">
                    <button type="submit" class="btn btn-light" name="ideacategory" value="<?=$category['idcategory'] ?>">Idée <?= ucfirst($category['category']); ?> <span class="card-text mx-2"><img class="iconpic" alt="Idée" src="assets/img/<?= tag($category['idcategory']); ?>"></button>
                </div>
                <?php endforeach; ?>
                    <p><?= $errors['ideacategory'] ?? "" ?></p>
                </div>


            </form>
        </div>
    </div>
</div>

<footer>
    <?php
    require 'footer.php'
    ?>
</footer>
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
</body>
</html>
