<?php
require_once("bootstrap.php");
if($_POST)
{
    var_export($_POST);
    $product = new Product();
    $product->setName($_POST["product"]);
    $entityManager->persist($product);
    $entityManager->flush();
}
if(!isset($_SERVER["PATH_INFO"]))
{
    $_SERVER["PATH_INFO"]='/';
}
$uri = trim($_SERVER["PATH_INFO"],'/');
if(file_exists(__DIR__.'/Controller/'.ucfirst($uri).".php"))
{
    include_once(__DIR__.'/Controller/'.ucfirst($uri).".php");
}
else
{
    include_once(__DIR__.'/Controller/Home.php');
}
