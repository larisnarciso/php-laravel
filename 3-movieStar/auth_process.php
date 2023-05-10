<?php

  require_once("globals.php");
  require_once("database/db.php");
  require_once("models/User.php");
  require_once("models/Message.php");
  require_once("dao/UserDAO.php");

  $message = new Message($BASE_URL);

  // Resgata o tipo do formulario
  $type = filter_input(INPUT_POST, "type");

  // Verificação dotipo do formulario
  if ($type === "register"){

    $email = filter_input(INPUT_POST, "email");
    $name = filter_input(INPUT_POST, "name");
    $lastname = filter_input(INPUT_POST, "lastname");
    $password = filter_input(INPUT_POST, "password");
    $confirmpassword = filter_input(INPUT_POST, "confirmpassword");

    // Verificação de dados minimos
    if($name && $lastname && $email && $password){
      // 

    } else {
      // Enviar uma msg de erro, de dados faltantes
      $message->setMessage("Por favor, preencha todos os campos.", "error", "back");
    }

  }else if ($type === "login"){

  }