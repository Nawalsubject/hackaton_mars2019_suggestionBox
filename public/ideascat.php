<?php

require '../src/connec.php';
require '../src/functions.php';
require '../src/counterIdea.php';
$pdo = new PDO(DSN, USER, PASS);

/** DATA RETRIEVAL */

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
$idea = $ideas[randomIdeas($ideas)];

$pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
// recovers categories table //

$queryBestIdeas = "SELECT COUNT(eval) as counteval,  idea.* ";
$queryBestIdeas .= " FROM eval JOIN idea ON ideaid=ididea ";
$queryBestIdeas .= " WHERE eval GROUP BY idea.ididea ";
$queryBestIdeas .= " ORDER BY counteval DESC  LIMIT 3;";
$statementBestIdeas= $pdo->query($queryBestIdeas);
$bestideas = $statementBestIdeas->fetchAll(PDO::FETCH_ASSOC);
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
            <h1 class="text-light text-center my-3">L'IDÉE DU JOUR </h1>

            <?php require '../src/card_large.php' ?>

        </div>
    </div>
</header>
<section>
    <h2 id="bestID" class="text-warning text-center my-3">LES MEILLEURES IDEES DU MOMENT ...</h2>
    <div class="container">
        <div class="row">
            <?php
            $colorcards=[];
            foreach($bestideas as $idea) : ?>
                <?php
                $ranking = getRanking($idea['ididea']);
                $colorcards = getColorbyCategory($idea['categoryid']);
                include '../src/cards.php'; ?>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<?php
$queryRecentIdeas = "SELECT * FROM idea ORDER BY date DESC LIMIT 3;";
$statementRecentIdeas= $pdo->query($queryRecentIdeas);
$recentideas = $statementRecentIdeas->fetchAll(PDO::FETCH_ASSOC);
?>
<section>
    <h2 id="bestID" class="text-warning text-center my-3">LES IDEES RECENTES ...</h2>
    <div class="container">
        <div class="row">
            <?php
            $colorcards=[];
            foreach($recentideas as $idea) : ?>
                <?php
                $ranking = getRanking($idea['ididea']);
                $colorcards = getColorbyCategory($idea['categoryid']);
                include '../src/cards.php'; ?>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<?php

$queryCommIdeas = "SELECT * FROM idea JOIN (SELECT count(ideval) as countcomm, ideaid  ";
$queryCommIdeas .= "FROM eval WHERE eval.comment <> '' OR eval.comment IS NOT NULL GROUP BY ideaid) ";
$queryCommIdeas .= " as TableA ON TableA.ideaid = idea.ididea ORDER BY countcomm DESC LIMIT 3;";
$statementCommIdeas= $pdo->query($queryCommIdeas);
$commideas = $statementCommIdeas->fetchAll(PDO::FETCH_ASSOC);
?>

<section>
    <h2 id="bestID" class="text-warning text-center my-3">LES IDEES LES PLUS COMMENTEES ...</h2>
    <div class="container">
        <div class="row">
            <?php
            $colorcards=[];
            foreach($commideas as $idea) : ?>
                <?php
                $ranking = getRanking($idea['ididea']);
                $colorcards = getColorbyCategory($idea['categoryid']);
                include '../src/cards.php'; ?>
            <?php endforeach; ?>
        </div>
    </div>
</section>


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
<script>
    (function ($) {
        "use strict";
        $('.next').click(function () {
            $('.carousel').carousel('next');
            return false;
        });
        $('.prev').click(function () {
            $('.carousel').carousel('prev');
            return false;
        });
    })
    (jQuery);
</script>
</body>
</html>
