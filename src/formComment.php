<?php

require 'functions.php';

$pdo = new PDO(DSN, USER, PASS);
$pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $errors = [];

// Clean the $_POST data
    $data = cleanData($_POST);
    $likeStatus = false;

    /** VERIFICATION OF THE DATA */

    if (empty($data['comment']) OR strlen($data['comment']) > 140) {
        $errors['comment'] = 'Veuillez ajouter un commentaire';
    }
    if (isset($data['likes'])) {
        $likeStatus = true;
    }

    /** IF EVERYTHING IS OK -> INSERTION IN MY DATABASE */
    if (empty($errors)) {

        $query = "INSERT INTO eval (eval, comment, date, ideaid) VALUES (:eval, :comment, :date, :ideaid);";
        $statement = $pdo->prepare($query);
        $statement->bindValue(':eval', $likeStatus, PDO::PARAM_BOOL);
        $statement->bindValue(':comment', $data['comment'], PDO::PARAM_STR);
        $statement->bindValue(':ideaid', $idIdeaAsked, PDO::PARAM_INT);
        $statement->bindValue(':date', '2019/03/30');

        $statement->execute();

        header('Location: index.php');
        exit();
    }

} ?>

<div class="row formComment justify-content-center my-5" xmlns="http://www.w3.org/1999/html">
    <div class="col-6">
        <form method="post">
            <div class="form-group">
                <label for="comment">Ajoutez un commentaire de moins de 140 caracteres</label>
                <textarea class="form-control bg-light" id="comment" rows="4" name="comment"
                          maxlength="140" required><?= $data['comment'] ?? '' ?></textarea>
                <p><?= $errors['comment'] ?? '' ?></p>
            </div>
    </div>

    <div class="col-1 mt-5  pt-3">
        <button type="submit" class="btn btn-danger" name="dislikes" value="0"><i class="fas fa-heart-broken"></i>
        </button>
        <p><?= counterDislikes($pdo, $idea['categoryid']) ?></p>
    </div>

    <div class="col-1 mt-5 pt-3">
        <button type="submit" class="btn btn-success" name="likes" value="1"><i class="fas fa-heart"></i></button>
        <p><?= counterLikes($pdo, $idea['categoryid']) ?></p>
    </div>
    </form>
</div>
</div>
