<?php

  require_once("models/User.php");
  require_once("dao/UserDAO.php");

  $userDao = new UserDAO($conn, $BASE_URL);
  $user = new User();

  $userData = $userDao->verifyToken(true);

  $fullName = $user->getFullName($userData);

  if($userData->image == ""){
    $userData->image = "user.png";
  }

?>

<div class="col-md-12 review">
  <div class="row">
    <div class="col-md-1">
      <div class="profile-image-container review-image" style="background-image: url('<?= $BASE_URL ?>img/users/user.png');"></div>
    </div>
    <div class="col-md-9 author-details-container">
      <h4 class="author-name">
        <a href="#">Teste</a>
      </h4>
      <p><i class="fas fa-star"></i><?= $review->rating ?></p>
    </div>
    <div class="col-md-12">
      <p class="comment-title">Comentário:</p>
      <p><?= $review->review ?></p>
    </div>
  </div>
</div>
