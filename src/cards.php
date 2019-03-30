<div class="col-md-4">
    <div class="card <?= $colorcards['bordercolor'] ?> user-card ">
            <div class="card-block py-3 text-left">
                <h5 class="f-w-600"><?= ucfirst(strtolower($idea['firstname'])) . ' ' . strtoupper($idea['lastname']) ?> </h5>
            </div>
        <div class="card-img-overlay">
            <div class="card-body text-right p-1">
                <h3><span class="card-text"><img class="iconpic" alt="Idée" src="assets/img/<?= tag($idea['categoryid']); ?>"></h3>
            </div>
        </div>
            <div class="card-header py-3 text-center">
                <h4 class="col"><?= $idea['title'] ?> </h4>
            </div>
            <div class="card-block">
                <hr>
                <div class="">
                    <p class="m-t-15 text-muted text-justify"><?= $idea['message'] ?> </p>
                </div>
                <hr>
                <p class="text-muted m-t-15 mb-1"><!-- Barometre good / bad idea --><?= $ranking ?> %</p>
                <!-- activity-leval-blue // activity-leval-green // activity-leval-yellow // -->
                <div class="progress my-3">
                    <div class="progress-bar <?= $colorcards['bgcolor'] ?>" role="progressbar"
                         style="width: <?= $ranking ?>%" aria-valuenow="<?= $ranking ?>" aria-valuemin="0"
                         aria-valuemax="100"></div>
                </div>
                <!-- bg-c-blue // bg-c-green // bg-c-yellow // -->
                <div class="<?= $colorcards['bgcolor'] ?> counter-block m-t-10 p-15" >
                <div class="row pt-3">
                    <div class="col-4">
                        <i class="fas fa-heart-broken"></i>
                        <p><?= counterDislikes($pdo, $idea['categoryid']) ?></p> <!-- nombre de bad mother fucker -->
                    </div>
                    <div class="col-4">
                        <i class="fa fa-comment"></i>
                        <p><?= counterComment($pdo, $idea['categoryid']) ?></p><!-- nombre de commentaires -->
                    </div>
                    <div class="col-4">
                        <i class="fas fa-heart"></i>
                        <p><?= counterLikes($pdo, $idea['categoryid']) ?></p><!-- nombre de fuck yeah !  -->
                    </div>
                </div>
            </div>
            <p class="mb-0 mt-1 pt-2 text-muted">
                <?php
                $phpdate = strtotime($idea['date']);
                $mysqldate = date('d/m/Y', $phpdate);
                echo $mysqldate;
                ?>
            </p>
    </div>
    <div class="card-footer text-center">
        <a href="idea.php?id= <?= $idea['ididea'] ?>" class="btn <?= $colorcards['bordercolor'] ?>">Ca fait réfléchir ? </a></div>
</div>


</div>
