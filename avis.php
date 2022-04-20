<?php
session_start();
require_once('app/client/avis/avisProduit.php');

$avis = new avisProduit();


$test = $avis->newAvis();

echo "<pre>";
var_dump($test);
echo "</pre>";
