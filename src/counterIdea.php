<?php

function counterLikes (PDO $pdo, int $id):int
{

    $queryCountLike = "SELECT COUNT(eval.ideval) as counter FROM eval WHERE eval.eval = 1 ";
    $queryCountLike .= " AND eval.ideaid=" . $id;
    $statementCountLike = $pdo->query($queryCountLike);
    $likes = $statementCountLike->fetch(PDO::FETCH_ASSOC);
    return $likes['counter'];
}

function counterDislikes (PDO $pdo, int $id):int
{
    $queryCountDislike = "SELECT COUNT(eval.ideval) as counter FROM eval WHERE eval.eval = 0";
    $queryCountDislike .= " AND eval.ideaid=" . $id;
    $statementCountDislike = $pdo->query($queryCountDislike);
    $dislikes = $statementCountDislike->fetch(PDO::FETCH_ASSOC);
    return $dislikes['counter'];
}

function counterComment (PDO $pdo, int $id):int
{
    $queryCommentCount = "SELECT COUNT(eval.ideval) as counter FROM eval JOIN idea ON idea.ididea = eval.ideaid WHERE eval.comment IS NOT NULL AND eval.comment <> ''";
    $queryCommentCount .= " AND eval.ideaid=" . $id;
    $statementCountComm = $pdo->query($queryCommentCount);
    $countComm = $statementCountComm->fetch(PDO::FETCH_ASSOC);
    return $countComm['counter'];
}



function likeStatusComment (PDO $pdo, int $idcomment):bool
{
    $queryCommentLikeStatus = "SELECT eval FROM eval " ;
    $queryCommentLikeStatus .= " WHERE eval.ideval=" . $idcomment;
    $statementCommentLikeStatus = $pdo->query($queryCommentLikeStatus);
    $likeStatusComm = $statementCommentLikeStatus->fetch(PDO::FETCH_ASSOC);

    $status = true;
    if ($likeStatusComm["eval"] == 0) {
        $status = false;
    }
    return $status;
}


