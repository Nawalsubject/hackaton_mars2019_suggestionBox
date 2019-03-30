<?php

require 'functions.php';

$pdo = new PDO(DSN, USER, PASS);
$pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $errors = [];

// Clean the $_POST data
    $data = cleanData($_POST);

    /** VERIFICATION OF THE DATA */

    if (empty($data['comment']) OR strlen($data['comment']) > 140) {
        $errors['comment'] = 'Veuillez ajouter un commentaire';
    }

    /** IF EVERYTHING IS OK -> INSERTION IN MY DATABASE */
    if (empty($errors)) {

        $query = "INSERT INTO eval (comment, date, ideaid) VALUES (:comment, :date, :ideaid);";
        $statement = $pdo->prepare($query);
        $statement->bindValue(':comment', $data['comment'], PDO::PARAM_STR);
        $statement->bindValue(':ideaid', $idIdeaAsked, PDO::PARAM_INT);
        $statement->bindValue(':date', '2019/03/30');

        $statement->execute();

        header('Location: index.php');
        exit();
    }
    var_dump($errors);

} ?>

<div class="row formComment justify-content-center my-5">
<div class="col-6">
    <form method="post">
        <div class="form-group">
            <label for="comment">Ajoutez un commentaire de moins de 140 caracteres</label>
            <textarea class="form-control bg-light" id="comment" rows="4" name="comment"
                      maxlength="140" required><?= $data['comment'] ?? '' ?></textarea>
            <p><?= $errors['comment'] ?? '' ?></p>
        </div>
        <button class="btn btn-dark">Ajouter</button>
</div>
<div class="col-1 mt-5  pt-3">
    <i class="fas fa-heart-broken"></i>
    <p><?= counterDislikes($pdo, $idea['categoryid']) ?></p>
</div>
<div class="col-1 mt-5 pt-3">
    <i class="fa fa-comment"></i>
    <p><?= counterComment($pdo, $idea['categoryid']) ?></p>
</div>
<div class="col-1 mt-5 pt-3">
    <i class="fas fa-heart"></i>
    <p><?= counterLikes($pdo, $idea['categoryid']) ?></p>
</div>
</form>
</div>
