<?php

  require_once("globals.php");
  require_once("database/db.php");
  require_once("models/Movie.php");
  require_once("models/Message.php");
  require_once("dao/UserDAO.php");
  require_once("dao/MovieDAO.php");

  $message = new Message($BASE_URL);
  $userDao = new UserDAO($conn, $BASE_URL);

  // Resgata o tipo do formulario
  $type = filter_input(INPUT_POST, "type");

  // Pegar dados do usuário
  $userData = $userDao->verifyToken();

  // Dao dos Filmes
  $movieDao = new MovieDAO($conn, $BASE_URL);

  if($type === "create"){
   // Recebe dados do input
   $title = filter_input(INPUT_POST, "title");
   $description = filter_input(INPUT_POST, "description");
   $trailer = filter_input(INPUT_POST, "trailer");
   $category = filter_input(INPUT_POST, "category");
   $length = filter_input(INPUT_POST, "length");

   $movie = new Movie();

    //  Validação minima de dados
    if(!empty($title) && !empty($description) &&  !empty($category)){
      
      $movie->title = $title;
      $movie->description = $description;
      $movie->trailer = $trailer;
      $movie->category = $category;
      $movie->length = $length;
      $movie->users_id = $userData->id;

      // Upload de imagem do filme
      if(isset($_FILES["image"]) && !empty($_FILES["image"]["tmp_name"])) {

        $image = $_FILES["image"];

        // Checando tipo da imagem
        if(in_array($image["type"], ["image/jpeg", "image/jpg", "image/png"])) {

          // Checa se é jpg
          if(in_array($image["type"], ["image/jpeg", "image/jpg"])) {
            $imageFile = imagecreatefromjpeg($image["tmp_name"]);
          } else {
            $imageFile = imagecreatefrompng($image["tmp_name"]);
          }

          $imageName = $movie->generateImageName();

          imagejpeg($imageFile, "./img/movies/".$imageName, 100);

          $movie->image = $imageName;

        } else {
          $message->setMessage("Tipo inválido de imagem, envie jpg ou png!", "error", "editprofile.php");
        }
      }
      $movieDao->create($movie);
    }else $message->setMessage("Você precisa adicionar pelo menos: título, descrição e categoria!", "error", "back");
  } else if($type === "delete"){
    // Recebe os dados do form
    $id = filter_input(INPUT_POST, "id");

    $movie = $movieDao->findById($id);

    if($movie){
      // Verificar se o filme é do usuário
      if($movie->users_id === $userData->id){
        $movieDao->destroy($movie->id);
      }else{
        $message->setMessage("Informações inválidas!", "error", "index.php");
      }
    }else{
      $message->setMessage("Informações inválidas!", "error", "index.php");
    }
  } else{
    $message->setMessage("Informações inválidas!", "error", "index.php");
  }


  