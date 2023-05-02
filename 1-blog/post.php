<?php
include_once("templates/header.php");
  

  if(isset($_GET['id'])) {

    $postId = $_GET['id'];
    $currentPost;

    foreach($posts as $post) if($post['id'] == $postId) $currentPost = $post;
  }
?>

<main class="post-container">
  <div class="content-container">
    <h1 class="main-title"><?= $currentPost['title'] ?><span>.</span></h1>
    <p class="post-description"><?= $currentPost['description'] ?></p>
    <div class="img-container">
        <img src="<?= $BASE_URL?>/img/<?= $currentPost['img'] ?>" alt="<?= $currentPost['title']?>">
    </div>
    <p class="post-content">A linguagem de programação PHP é uma das mais utilizadas na criação de sites e aplicativos web, oferecendo uma série de recursos e funcionalidades para desenvolvedores de todos os níveis de experiência. O PHP é uma linguagem de código aberto, o que significa que seu código-fonte é livremente disponível para qualquer pessoa. Isso permite que desenvolvedores criem aplicativos web com rapidez e facilidade, além de poderem contar com uma grande comunidade de usuários e desenvolvedores dispostos a ajudar. Entre as principais vantagens do PHP, podemos destacar a simplicidade de sua sintaxe, a facilidade de aprendizado, a grande quantidade de recursos e funcionalidades disponíveis, além de ser uma linguagem bastante versátil, que pode ser utilizada em diversos tipos de projetos.</p>
    <p class="post-content">Outra vantagem do PHP é que ele é compatível com a maioria dos servidores web, como Apache, IIS e Nginx, além de suportar diversos bancos de dados, como MySQL e PostgreSQL.Para quem está começando a aprender PHP, existem diversas opções de cursos online e materiais gratuitos disponíveis na internet. Além disso, muitos desenvolvedores utilizam frameworks, como o Laravel e o Symfony, que ajudam a acelerar o desenvolvimento de aplicativos web, oferecendo uma série de recursos e funcionalidades prontos para uso.Outra dica importante para quem está começando a programar em PHP é participar de fóruns e comunidades online, onde é possível tirar dúvidas, trocar experiências e aprender com outros desenvolvedores.Em resumo, a linguagem de programação PHP é uma excelente opção para quem deseja desenvolver aplicativos web de forma rápida e eficiente, oferecendo uma grande quantidade de recursos e funcionalidades prontos para uso. Com um pouco de estudo e prática, é possível se tornar um excelente desenvolvedor PHP e criar soluções incríveis para a web.</p>
  </div>
  
  <aside class="nav-container">
    <h3 class="nav-title">Tags</h3>
  <ul class="nav-list">
    <?php foreach($currentPost['tags'] as $tag): ?>
      <li>
        <a href="#"><?= $tag ?></a>
      </li>
      <?php endforeach; ?>
    </ul>
    
    <h3 class="nav-title">Categorias</h3>
    <ul class="nav-list">
      <?php foreach($categories as $category): ?>
        <li>
          <a href="#"><?= $category ?></a>
        </li>
        <?php endforeach; ?>
      </ul>
    </aside>
</main>
    
    <?php
include_once("templates/footer.php")
?>