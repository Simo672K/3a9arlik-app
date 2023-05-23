<style>
  .navbar .dropdown-menu{
    overflow: hidden;
    width: 15rem;
    border-radius: 3px !important;
    border: 0;
    padding: 0;
    padding-top: 1rem;
    box-shadow: 0 2rem 15px rgba(0,0,0,0.4)!important;
  }
  .navbar .dropdown-menu .dropdown-item{
    padding-top: 0.4rem;
    padding-bottom: 0.4rem;
    border-left: solid 5px var(--secondary-color);
  }
  .nav-link.hover-toggle:hover ~ .dropdown-menu, .dropdown-menu:hover{
    display: block;
    transition: all 300ms ease-in !important;
  }
</style>

<nav class="navbar navbar-expand-lg bg-white shadow-sm sticky-top">
    <div class="container">
      <a class="navbar-brand" href="#">
        <img src="assets/images/logo.png" alt="3a9arLik logo image" style="width: 180px;">
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mb-2 mb-lg-0 w-100 align-items-center">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="index.php">Accueil</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">A propos</a>
          </li>
          <li class="nav-item dropend">
            <a class="nav-link hover-toggle dropdown-toggle" href="posts.php">
              Annonces <i data-feather="chevron-down"></i>
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="posts.php?post_type=louer">Louer</a></li>
              <li><a class="dropdown-item" href="posts.php?post_type=Acheter">Acheter</a></li>
            </ul>
          </li>
          <?php if(!$_SESSION["user_logged"]){ ?>
          <li class="nav-item ms-auto me-2">
            <a class="nav-link" href="login.php">Se Connecter</a>
          </li>
          <li class="nav-item">
            <a class="nav-link btn cta-btn" href="register.php">S'inscrire</a>
          </li>
          <?php }else{?>
          <li class="nav-item ms">
            <a class="nav-link" href="logout.php">Déconnecter (<?php echo $_SESSION["user_name"];?>)</a>
          </li>
          <li class="nav-item ms-auto">
            <a class="nav-link btn cta-btn" href="#"><i data-feather="plus-circle"></i> Ajouter un post</a>
          </li>
          <?php }?>
        </ul>
      </div>
    </div>
  </nav>