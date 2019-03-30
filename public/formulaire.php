<?php
require '../src/connec.php';
require '../src/functions.php';
$pdo = new PDO(DSN, USER, PASS);
$pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = cleanData($_POST);
    $errors = [];
    var_dump($data);

    var_dump($_POST);

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
    if ($data['category'] === 'neuve') {
        ($data['category'] = 1);
    }
    if ($data['category'] === 'evolutive') {
        ($data['category'] = 2);
    }
    if ($data['category'] === 'insolite') {
        ($data['category'] = 3);
    }


    if (empty($errors)) {


        $phpdate=strtotime(new DateTime());
        $mysqldate = date('Y/m/d', $phpdate);

        $query = "INSERT INTO idea (firstname, lastname, title, message, date, categoryid ) 
VALUES (:firstname, :lastname, :title, :message ,'2019/03/31', :category)";

        $statement = $pdo->prepare($query);

        $statement->bindValue(':lastname', $data['lastname'], PDO::PARAM_STR);
        $statement->bindValue(':firstname', $data['firstname'], PDO::PARAM_STR);
        $statement->bindValue(':title', $data['title'], PDO::PARAM_STR);
        $statement->bindValue(':message', $data['message'], PDO::PARAM_STR);
        $statement->bindValue(':category', $data['category'], PDO::PARAM_INT);
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

    <h1>Formulaire</h1>

    <div class="card formIdea my-2">

        <div class="card-body">

            <form method="POST" action="formulaire.php">
                <div class="form-group">
                    <label for="lastname">Nom</label>
                    <input type="text" class="form-control" id="lastname" name="lastname"
                           value="<?= $_POST['lastname'] ?? '' ?>" aria-describedby="textHelp"
                           placeholder="Veuillez préciser votre nom, s'il vous plait." required>
                    <small id="textHelp" class="form-text text-muted">Veuillez préciser votre nom s'il vous plait
                    </small>
                    <p><?= $errors["lastname"] ?? "" ?></p>
                </div>

                <div class="form-group">
                    <label for="firstname">Prénom</label>
                    <input type="text" class="form-control" id="firstname" name="firstname"
                           value="<?= $_POST['firstname'] ?? "" ?>" aria-describedby="textHelp"
                           placeholder="Veuillez préciser votre nom, s'il vous plait." required>
                    <small id="textHelp" class="form-text text-muted">Veuillez préciser votre prénom, s'il vous plait
                    </small>
                    <p><?= $errors["firstname"] ?? "" ?></p>
                </div>

                <div class="form-group">
                    <label for="title">Titre</label>
                    <input type="text" class="form-control" id="title" name="title" value="<?= $_POST['title'] ?? "" ?>"
                           aria-describedby="textHelp" placeholder="Veuillez préciser un titre, s'il vous plait."
                           required>
                    <small id="textHelp" class="form-text text-muted">Veuillez préciser un titre, s'il vous plait
                    </small>
                    <p><?= $errors['title'] ?? "" ?></p>
                </div>

                <div class="form-group">
                    <select class="custom-select" name="category">
                        <option selected>Thème</option>
                        <option value="neuve">Neuve</option>
                        <option value="evolutive">Evolutive</option>
                        <option value="insolite">Insolite</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="textarea">Postez votre idée 💡</label>
                    <textarea class="form-control" id="textarea" rows="3"
                              name="message"><?= $_POST['message'] ?? "" ?></textarea>
                </div>

                <button type="submit" class="btn btn-dark">Submit</button>

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
