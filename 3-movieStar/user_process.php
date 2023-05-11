<?php

  require_once("globals.php");
  require_once("database/db.php");
  require_once("models/User.php");
  require_once("models/Message.php");
  require_once("dao/UserDAO.php");

  $message = new Message($BASE_URL);
  $userDao = new UserDAO($conn, $BASE_URL);

  // Resgata o tipo do formulario
  $type = filter_input(INPUT_POST, "type");

  // Atualizar usuário
  if($type === "update"){
    
    // Resgata dados do usuário
    $userData = $userDao->verifyToken();

    // Recebe dados do post
    $name = filter_input(INPUT_POST, "name");
    $lastname = filter_input(INPUT_POST, "lastname");
    $email = filter_input(INPUT_POST, "email");
    $bio = filter_input(INPUT_POST, "bio");

    // Criar um novo objeto de usuário
    $user = new User();

    // Preencher os dados do usuário
    $userData->name = $name;
    $userData->lastname = $lastname;
    $userData->email = $email;
    $userData->bio = $bio;

    $userDao->update($userData);

    // Atualizar senha do usuário
  }else if($type === "changepassword"){

  }else{
    $message->setMessage("Informações inválidas", "error", "back");
  }
