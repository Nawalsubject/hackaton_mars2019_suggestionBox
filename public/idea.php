<?php

// connection to table "category" //
require '../connec.php';
$pdo = new PDO(DSN, USER, PASS);
$pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
// recovers categories table //
$queryCategory = "SELECT * FROM category";
$statementCategory = $pdo->query($queryCategory);
$categories = $statementCategory->fetchAll(PDO::FETCH_ASSOC);

// recovers evaluations table //
$queryEval = "SELECT * FROM eval";
$statementEval = $pdo->query($queryEval);
$evaluations = $statementEval->fetchAll(PDO::FETCH_ASSOC);

// recovers ideas table //
$queryIdea = "SELECT * FROM idea";
$statementIdea = $pdo->query($queryIdea);
$ideas = $statementIdea->fetchAll(PDO::FETCH_ASSOC);

// -------------------- //


// ------------------------------ //

var_dump($categories);
echo '<br>';
var_dump($evaluations);
echo '<br>';
var_dump($ideas);
echo '<br>'

?>



<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/style.css"/>

    <title>Just box it</title>
</head>
<body>
<?php require 'header.php' ?>
<main>
<h1>Idée de </h1>


</main>
<?php require 'footer.php'?>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>