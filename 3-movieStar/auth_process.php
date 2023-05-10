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

  // Verificação dotipo do formulario
  if ($type === "register"){

    $email = filter_input(INPUT_POST, "email");
    $name = filter_input(INPUT_POST, "name");
    $lastname = filter_input(INPUT_POST, "lastname");
    $password = filter_input(INPUT_POST, "password");
    $confirmpassword = filter_input(INPUT_POST, "confirmpassword");

    // Verificação de dados minimos
    if($name && $lastname && $email && $password){
      
      // Verificar se as senhas batem
      if($password === $confirmpassword){
        // Verificar se o e-mail já está cadastrado no sistema
        if($userDao->findByEmail($email) === false){

          $user = new User();

          // Criação de token e senha
          $userToken = $user->generateToken();
          $finalPassword = $user->generatePassword($password);

          $user->name = $name;
          $user->lastname = $lastname;
          $user->email = $email;
          $user->password = $finalPassword;
          $user->token = $userToken;

          $auth = true;

          $userDao->create($user, $auth);

        }else{
          // Enviar uma msg de erro, usuário ja existe
          $message->setMessage("Uusuário já cadastrado, tente outro e-mail.", "error", "back");
        }
      }else{
        // Enviar uma msg de erro, de senhas diferentes
        $message->setMessage("As senhas não são iguais.", "error", "back");
      }
    } else {
      // Enviar uma msg de erro, de dados faltantes
      $message->setMessage("Por favor, preencha todos os campos.", "error", "back");
    }

  }else if ($type === "login"){

  }