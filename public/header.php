<?php

$queryRandom = "SELECT ROUND( RAND() * MAX(ideval) ) as ideval FROM eval;";
$statementRandom = $pdo->query($queryRandom);
$evaluations = $statementRandom->fetchAll(PDO::FETCH_ASSOC);

?>


<header>
<nav class="navbar sticky-top navbar-expand-lg py-2">
    <a class="navbar-brand" href="index.php"><img src="assets/img/logo_justboxit.png" class="d-inline-block align-top"
                                                                      alt="logo de just box it"/></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Link</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Link</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Link</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Link</a>
            </li>

        </ul>
        <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-light my-2 my-sm-0" type="submit">Search</button>
        </form>
    </div>
</nav>

<div class="jumbotron headerBotron jumbotron-fluid">
    <div class="container justify-content-center">
        <h1 class="display-4">Idée du jour</h1>

        <?php require '../src/card_large.php'?>

    </div>
</div>

</header>