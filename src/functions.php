<?php

function getLimitPushIdea() : int {
     $limitLikeToPush = 10;
     return  $limitLikeToPush;
}


function getborderColorComment(int $id) : string
{
    $pdoEvalComment = new PDO(DSN, USER, PASS);
    $pdoEvalComment->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
    // recovers evaluations table //
    $queryEvalComment = "SELECT eval FROM eval";
    $queryEvalComment .= " WHERE ideval =" . $id;
    $statementEvalComment = $pdoEvalComment->query($queryEvalComment);
    $evalComment = $statementEvalComment->fetch(PDO::FETCH_ASSOC);

    $classSuccessComment=' border-danger border-outline-danger ';
    if ($evalComment['eval'] > 0){
        $classSuccessComment=' border-success border-outline-success ';
    }
    return $classSuccessComment;
}

function getColorbyCategory (int $idCategory ) : array {
     switch ($idCategory) {
         case '1':
             $colorcards['bgcolor']="bg-c-blue";
             $colorcards['levalcolor']="activity-leval-blue";
             $colorcards['bordercolor']= "border-primary";
             break;
         case '2':
             $colorcards['bgcolor'] = "bg-c-green";
             $colorcards['levalcolor']="activity-leval-green";
             $colorcards['bordercolor']= "border-success";
             break;
         case '3':
             $colorcards['bgcolor']= "bg-c-yellow";
             $colorcards['levalcolor']="activity-leval-yellow";
             $colorcards['bordercolor']= "border-warning";
             break;
     };

    return $colorcards;
}

function getRanking(int $id) : int {
    $pdorank = new PDO(DSN, USER, PASS);
    $pdorank->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
    $ranking = round((100/getLimitPushIdea()) * counterLikes($pdorank, $id),0);
    if ($ranking>100) {
        $ranking=100;
    }
    return  $ranking;
}

function cleanData(array $data) : array
{
    foreach ($data as $key => $dataCleaned ){
        $data[$key] = trim($dataCleaned);
    }
    return $data;
};



function tag(int $tag) : string
{
    if ($tag == 1 ) {
        $logo = 'light-bulb_blue.png';
    }

    if ($tag == 2 ) {
        $logo = 'light-bulb_green.png';
    }

    if ($tag == 3 ) {
        $logo = 'light-bulb_yellow.png';
    }
    return $logo;
}


function randomIdeas(array $ideas) : int
{
    $randomInt = rand(0, (count($ideas)-1));
    return $randomInt;
}