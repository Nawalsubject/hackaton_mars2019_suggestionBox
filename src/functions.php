<?php


function cleanData(array $data) : array
{
    foreach ($data as $key => $dataCleaned ){
        $data[$key] = trim($dataCleaned);
    }
    return $data;
};


function tag(int $tag) : string
{
    if ($tag = 1 ) {
        $logo = '<i class="far fa-edit"></i>';
    }

    if ($tag = 2 ) {
        $logo = '<i class="fas fa-cart-plus"></i>';
    }

    if ($tag = 3 ) {
        $logo = '<i class="fas fa-tools"></i>';
    }
    return $logo;
}