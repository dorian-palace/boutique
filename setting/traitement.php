<?php 

require_once '../app/Search.php';

$word = $_POST['search'];

$search = new Search();

$start = $search->startSearch($word);
$result = $search->searchReq($word);

$getALL = ['startResult' => $start, 'allResult' => $result];

echo (json_encode($getALL));