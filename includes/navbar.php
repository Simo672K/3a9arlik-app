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
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Type d'immobilier <i data-feather="chevron-down"></i>
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="#">Action</a></li>
              <li><a class="dropdown-item" href="#">Another action</a></li>
              <li>
                <hr class="dropdown-divider">
              </li>
              <li><a class="dropdown-item" href="#">Something else here</a></li>
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