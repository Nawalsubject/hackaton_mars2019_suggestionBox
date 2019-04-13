<?php

// connection to table "category" //
require '../src/connec.php';
require '../src/functions.php';
require '../src/counterIdea.php';
$pdo = new PDO(DSN, USER, PASS);
$pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
// ------------------------------ //


// recovers categories table //
$queryCategory = "SELECT * FROM category";
$statementCategory = $pdo->query($queryCategory);
$categories = $statementCategory->fetch(PDO::FETCH_ASSOC);

// recovers ideas table //
$queryIdea = "SELECT * FROM idea";
$statementIdea = $pdo->query($queryIdea);
$ideas = $statementIdea->fetchAll(PDO::FETCH_ASSOC);
shuffle ($ideas);
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
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
              integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
        <link rel="stylesheet" href="https://bootswatch.com/4/materia/bootstrap.min.css">
        <link rel="stylesheet" href="assets/style.css"/>
        <link rel="stylesheet" href="assets/cards.css"/>
        <title>Just box it</title>
    </head>
    <body class="m-0">
    <header>
        <?php require 'header.php' ?>

        <div class="jumbotron headerBotron jumbotron-fluid m-0">
            <div class="container justify-content-center">
                <h1 class="text-light text-center my-3">LE BOX'ON </h1>
                <div align="center" class="fond">
                    <div class="bouton_google">
                        <div class="google_volet"><img src="assets/img/de.png"/></div>
                        <a href="javascript:window.location.reload(true)" >
                            <div class="txt_google">On mélange ?</div>
                        </a>
                    </div>
                </div>
            </div>
        </div>

    </header>
    <main>

        <section>

            <h2 id="bestID" class="text-warning text-center my-3">DES IDEES EN VRAC ...</h2>
            <div class="container">
                <div class="row">
                    <?php
                    $colorcards=[];
                    foreach($ideas as $idea) : ?>
                        <?php
                        $ranking = getRanking($idea['ididea']);
                        $colorcards = getColorbyCategory($idea['categoryid']);
                        include '../src/cards.php'; ?>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>

    </main>
    <?php require 'footer.php' ?>

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
    <script src="assets/js/boxonbutton.js"
    </body>
    </html>
<?php
