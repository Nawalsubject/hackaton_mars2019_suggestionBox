<?php

$queryRandom = "SELECT ROUND( RAND() * MAX(ideval) ) as ideval FROM eval;";
$statementRandom = $pdo->query($queryRandom);
$evaluations = $statementRandom->fetchAll(PDO::FETCH_ASSOC);

var_dump($evaluations);
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


            <div class="card user-card pb-0">
                <div class="card-header py-3 text-center">
                    <h4 class="col">Plus de bière</h4>
                </div>
                <div class="card-block">
                    <div class="">
                        <p class="m-t-15 text-muted text-justify">Lorem ipsum dolor sit amet, consectetuer adipiscing elit.
                            Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et ma Lorem ipsum dolor sit amet, consectetuer adipiscing elit.
                            Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et ma - <i class="text-muted">Regis<!-- date de l'idée --></i>

                        </p>

                    </div>
                    <hr>
                    <!-- bg-c-blue // bg-c-green // bg-c-yellow // -->

                    <div class="row">
                            <div class="col-4">
                                <i class="fas fa-heart-broken"></i>
                                <p>1256</p> <!-- nombre de bad mother fucker -->
                            </div>
                            <div class="col-4">
                                <i class="fa fa-comment"></i>
                                <p>8562</p><!-- nombre de commentaires -->
                            </div>
                            <div class="col-4">
                                <i class="fas fa-heart"></i>
                                <p>189</p><!-- nombre de fuck yeah !  -->
                            </div>
                    </div>
                </div>
            </div>
    </div>
</div>

</header>