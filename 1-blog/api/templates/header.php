<?php
include_once("helpers/url.php");
include_once("data/posts.php");
include_once("data/categories.php");
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Blog</title>
  <link rel="icon" href="<?= $BASE_URL ?>/img/logo.svg" type="image/svg+xml">
  <link rel="stylesheet" href="<?= $BASE_URL ?>css/style.css">
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;700&display=swap" rel="stylesheet">
</head>

<body>
  <header>
    <a href="<?= $BASE_URL ?>" class="logo">
      <img src="<?= $BASE_URL ?>/img/logo.svg" alt="Blog Codar"></a>
    <nav>
      <ul class="navbar">
        <li><a href="<?= $BASE_URL ?>./">Home</a></li>
        <li><a href="#">Categorias</a></li>
        <li><a href="#">Sobre</a></li>
        <li><a href="<?= $BASE_URL ?>contato.php">Contato</a></li>
      </ul>
    </nav>
  </header>