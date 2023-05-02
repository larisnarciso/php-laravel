<?php
  include_once("templates/header.php");
?>

<main>
  <div class="title-container">
    <h1>Blog Codar<span>.</span></h1>
    <p>O seu blog de programação</p>
  </div>
  <div class="home-container">
    <?php foreach($posts as $post): ?>
      <div class="home-box">
        <img src="<?= $BASE_URL?>/img/<?= $post['img'] ?>" alt="<?= $post['title']?>">
        <h2 class="home-title">
          <a href="<?= $BASE_URL ?>post.php?id=<?= $post['id']?>" ><?= $post['title']?></a>
        </h2>
        <p class="home-description"><?= $post['description']?></p>
        <div class="tag-container">
          <?php foreach($post['tags'] as $tag): ?>
            <a href="#"><?= $tag ?></a>
          <?php endforeach; ?>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
</main>

<?php
include_once("templates/footer.php")
?>