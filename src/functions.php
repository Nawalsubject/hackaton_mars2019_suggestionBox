<?php

function getLimitPushIdea() : int {
     $limitLikeToPush = 5;
     return  $limitLikeToPush;
}


function getRanking(PDO $pdorank, int $id) : int {
    $ranking = round((100/getLimitPushIdea()) * counterLikes($pdorank, $id),0);
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