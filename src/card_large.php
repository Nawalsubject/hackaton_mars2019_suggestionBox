<div class="card user-card headerBotron pb-0">
    <div class="card-header py-3 text-center">
        <h4 class="col"><?= $idea['title'] ?></h4>
    </div>
    <div class="card-block">
        <div class="">
            <p class="m-t-15  text-justify"><?= '"' . $idea['message'] . '"'?> - <i
                        class="text-muted"><?=  ucfirst (strtolower($idea['firstname'])) . ' ' . strtoupper ($idea['lastname'])?></i>
            </p>
        </div>
        <hr>
        <!-- bg-c-blue // bg-c-green // bg-c-yellow // -->
        <div class="row">
            <div class="col-4">
                <i class="fas fa-heart-broken"></i>
                <p><?= counterDislikes($pdo, $idea['categoryid']) ?></p>
            </div>
            <div class="col-4">
                <i class="fa fa-comment"></i>
                <p><?= counterComment($pdo, $idea['categoryid']) ?></p>
            </div>
            <div class="col-4">
                <i class="fas fa-heart"></i>
                <p><?= counterLikes($pdo, $idea['categoryid']) ?></p>
            </div>
        </div>
        <p class="mb-0 mt-1 pt-2 text-muted text-right ">
            <?php
            $phpdate = strtotime( $idea['date'] );
            $mysqldate = date( 'd/m/Y', $phpdate );
            echo $mysqldate;
            ?>
        </p>
    </div>
</div>