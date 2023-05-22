<?php 
  require_once("includes/classes.php");
  session_start();
  
  ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;700&family=Poppins:wght@400;600;700&display=swap"
    rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
    integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="vendors/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/css/price-range.min.css">
  <link rel="stylesheet" href="assets/css/main.min.css">

  <title>3a9arLik | Accueil</title>
</head>

<body>
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
            <a class="nav-link active" aria-current="page" href="#">Accueil</a>
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
  <!-- Hero -->
  <header class="bg-header">
    <div class="container h-100 d-flex align-items-center justify-content-center position-relative">
      <h1 class="text-white display-4 text-center">Trouvez des
        <span class="animate-text">
          <span class="text-content">Immeubles</span>
          <span class="text-content">Appartements</span>
          <span class="text-content">Villas</span>
          <span class="text-content">Boutiques</span>
          <span class="text-content">Bureaux</span>
          <span class="text-content">Terrains</span>
        </span>,<br> 
        Seulment en quelques Clics!
      </h1>
      <div class="card w-100 position-absolute bg-white p-4 search-card shadow" style="border-radius: 15px; border: 0;">
        <form action="search.php" metod="get" class="d-flex">
          <select class="form-select me-2" name="ville" >
            <option value="all">Toutes les villes</option>
            <?php foreach(City::$cities as $city){
              echo "<option value='{$city['city_id']}'>{$city['city_name']}</option>";
            }?>            
          </select>
          <select class="form-select me-2" name="type" >
            <option value="all">Tous les types d'immeubles</option>
            <?php foreach(Category::$categories as $category){
              echo "<option value='{$category['category_id']}'>{$category['category_name']}</option>";
            }?>            
          </select>
          <div class="dropdown">
            <button class="btn no-indecator rounded-pill border-custom me-2" type="button" data-bs-toggle="dropdown" aria-expanded="false" type="button">
              <i class="fa-solid fa-filter"></i>
            </button>
            <ul class="dropdown-menu dropdown-menu-end pt-3" style="width: 20rem;">
              <li class="px-3">
                <input type="checkbox" name="" id="enablePriceFilter">
                <label class="ms-2" for="enablePriceFilter">Activer le filtrage par prix.</label>
              </li>
              <li><hr class="dropdown-divider"></li>
              <li class="px-3 mb-2 text-muted" style="font-size: 0.9rem;">
                Choisir un prix:
              </li>
              <li class="range mb-3 px-3">
                <div class="range-slider">
                  <span class="range-selected"></span>
                </div>
                <div class="range-input">
                  <input type="range" class="min" min="0" max="1000" value="0" step="10">
                  <input type="range" class="max" min="0" max="1000" value="1000" step="10">
                </div>
                <div class="range-price">
                  <input type="hidden" name="min-prix" value="0">      
                  <input type="hidden" name="max-prix" value="1000">      
                </div>
              </li>
              <li><hr class="dropdown-divider"></li>
              <li class="px-3">
                <p class="mb-0">Prix: <span id="min-prix">0</span>~<span id="max-prix">0</span> MAD</p>
              </li>
            </ul>
          </div>
          <button type="submit" name="submit" class="btn cta-btn d-flex align-items-center">
            <i class="fa-solid fa-magnifying-glass-location me-2"></i>
            Rechercher
          </button>
        </form>
      </div>
    </div>
  </header>
  <main class="text-dark">
    <section class="my-5 py-5">
      <div class="container mt-5 pt-5">
        <div class="row">
          <div class="col-md-6">
            <img class="img-fluid curved-img" src="assets/images/apropos-img.jpg" alt="A-propos-de-nous-image">
          </div>
          <div class="col-md-6 d-flex flex-column ps-4">
            <h2 class="poppins display-5 fw-bold mb-3 mt-2">A propos de nous</h2>
            <p class="section-text">
              <strong style="border-bottom: dotted 2px var(--secondary-color);">3a9arLik</strong> est la plateforme idéale pour trouver et acheter des biens immobiliers dans votre région. Avec notre sélection variée de propriétés et notre équipe dédiée, nous simplifions le processus de recherche et d'achat. Rejoignez-nous dès maintenant et trouvez la maison de vos rêves en quelques clics.
            </p>
            <a class="btn cta-btn d-flex align-items-center mt-auto ms-auto mb-4" href="#" style="width: fit-content;">
              S'avoir Plus
              <i class="fa-solid fa-arrow-right ms-1a "></i>
            </a>
          </div>
        </div>
      </div>
    </section>
    <!-- How to -->

    <section class="bg-primary">
      <div class="container py-5">
        <h2 class="poppins text-center display-5 fw-bold text-white mb-5 mt-4">
          Trouvez votre Appartement de rêve avec nous<span style="color: var(--secondary-color)">.</span>
        </h2>
        <div class="row mb-4">
          <div class="col-md-3">
            <div class="card bg-secondary" style="border-radius: 25px ;border-top-right-radius: 0; border-bottom-left-radius: 0;">
              <div class="card-body text-center">
                <h3 class="poppins fw-semibold">1. Chercher</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
              </div>
            </div>
          </div>
          <div class="col-md-3">
            <div class="card bg-secondary" style="border-radius: 25px ;border-top-right-radius: 0; border-bottom-left-radius: 0;">
              <div class="card-body text-center">
                <h3 class="poppins fw-semibold">2. Choisir</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
              </div>
            </div>
          </div>
          <div class="col-md-3">
            <div class="card bg-secondary" style="border-radius: 25px ;border-top-right-radius: 0; border-bottom-left-radius: 0;">
              <div class="card-body text-center">
                <h3 class="poppins fw-semibold">3. Contacter</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
              </div>
            </div>
          </div>
          <div class="col-md-3">
            <div class="card bg-secondary" style="border-radius: 25px ;border-top-right-radius: 0; border-bottom-left-radius: 0;">
              <div class="card-body text-center">
                <h3 class="poppins fw-semibold">4. Demenager</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Nos partenaires -->


    <section class="fixed-bg"></section>
    <!-- Testimonial -->
    <section>
      <div class="container py-5">
        <h2 class="poppins text-center display-5 fw-bold mb-5 mt-4">
          Ce que disent nos clients
        </h2>
        <div class="row pt-5">
          <div class="col-md-4">
            <div class="card shadow curved-testimonial">
              <div class="card-body">
                <i class="fa-solid d-block fa-quote-left fs-1"></i>
                <p class="mb-0" style="text-indent: 2.5rem; font-size: 0.9rem; line-height: 1.2; text-align: justify;"> Lorem ipsum, dolor sit amet consectetur adipisicing elit. Culpa cupiditate magnam distinctio at, quaerat quia sit! Necessitatibus, enim, quo eius eligendi praesentium animi est ullam voluptas repellat consectetur exercitationem quas iusto nesciunt sed. Eum, exercitationem? </p>
                <i class="fa-solid fa-quote-right d-block ms-auto fs-1 position-relative" style="width: fit-content;"></i>
                <div class="d-flex flex-column align-items-center mt-4">
                  <h5 class="mb-0 poppins fw-bold">Mohammed Hakmi</h5>
                  <div>
                    <i class="fa-solid fa-star" style="color: var(--secondary-color)"></i>
                    <i class="fa-solid fa-star" style="color: var(--secondary-color)"></i>
                    <i class="fa-solid fa-star" style="color: var(--secondary-color)"></i>
                    <i class="fa-solid fa-star-half-stroke" style="color: var(--secondary-color)"></i>
                    <i class="fa-solid fa-star" style="color: #ddd;"></i></div>
                </div>
                </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card shadow curved-testimonial">
              <div class="card-body">
                <i class="fa-solid d-block fa-quote-left fs-1"></i>
                <p class="mb-0" style="text-indent: 2.5rem; font-size: 0.9rem; line-height: 1.2; text-align: justify;"> Lorem ipsum, dolor sit amet consectetur adipisicing elit. Culpa cupiditate magnam distinctio at, quaerat quia sit! Necessitatibus, enim, quo eius eligendi praesentium animi est ullam voluptas repellat consectetur exercitationem quas iusto nesciunt sed. Eum, exercitationem? </p>
                <i class="fa-solid fa-quote-right d-block ms-auto fs-1 position-relative" style="width: fit-content;"></i>
                <div class="d-flex flex-column align-items-center mt-4">
                  <h5 class="mb-0 poppins fw-bold">Mohammed Hakmi</h5>
                  <div>
                    <i class="fa-solid fa-star" style="color: var(--secondary-color)"></i>
                    <i class="fa-solid fa-star" style="color: var(--secondary-color)"></i>
                    <i class="fa-solid fa-star" style="color: var(--secondary-color)"></i>
                    <i class="fa-solid fa-star-half-stroke" style="color: var(--secondary-color)"></i>
                    <i class="fa-solid fa-star" style="color: #ddd;"></i></div>
                </div>
                </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card shadow curved-testimonial">
              <div class="card-body">
                <i class="fa-solid d-block fa-quote-left fs-1"></i>
                <p class="mb-0" style="text-indent: 2.5rem; font-size: 0.9rem; line-height: 1.2; text-align: justify;"> Lorem ipsum, dolor sit amet consectetur adipisicing elit. Culpa cupiditate magnam distinctio at, quaerat quia sit! Necessitatibus, enim, quo eius eligendi praesentium animi est ullam voluptas repellat consectetur exercitationem quas iusto nesciunt sed. Eum, exercitationem? </p>
                <i class="fa-solid fa-quote-right d-block ms-auto fs-1 position-relative" style="width: fit-content;"></i>
                <div class="d-flex flex-column align-items-center mt-4">
                  <h5 class="mb-0 poppins fw-bold">Mohammed Hakmi</h5>
                  <div>
                    <i class="fa-solid fa-star" style="color: var(--secondary-color)"></i>
                    <i class="fa-solid fa-star" style="color: var(--secondary-color)"></i>
                    <i class="fa-solid fa-star" style="color: var(--secondary-color)"></i>
                    <i class="fa-solid fa-star-half-stroke" style="color: var(--secondary-color)"></i>
                    <i class="fa-solid fa-star" style="color: #ddd;"></i></div>
                </div>
                </div>
            </div>
          </div>
        </div>
      </div>
    </section>

  </main>
  <!-- Footer -->
  <div class="bg-secondary py-4">
    <div class="container d-flex flex-column align-items-center">
      <h5 class="text-center poppins fw-bold">Voullez-vous être allerter sur toutes nouveautés? <br>Inscrivez-vous dans notre newsletter dés maintenant!</h5>
      <button class="btn bg-primary rounded-pill text-white px-5 py-3 mt-4" data-bs-toggle="modal" data-bs-target="#newsLetterModal">S'inscrire maintenant</button>
    </div>
  </div>
  <div class="modal fade" id="newsLetterModal" tabindex="-1" aria-labelledby="newsLetterModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="max-width: 45rem">
      <div class="modal-content shadow" style="border-radius: 0; border: 0;"> 
        <div class="modal-body p-0 d-flex flex-column h-100">
        <div class="row w-100 p-0">
          <div class="col-md-5 newsletter-bg">
          </div>
          <div class="col-md-7 ps-3 pt-3">
              <div class="d-flex align-items-start">
                <h3 class="poppins fw-bold pt-3">Inscrivez-vous maintenant</h3>
                <button type="button" class="btn-close ms-auto" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <p class="text-muted">
                Soiyez notifier et découvrez les nouveautés exclusives et profitez d'avantages exceptionnels!
              </p>
              <form action="">
                <label class="form-label text-muted" for="newsletter-email">Entrer votre addresse email:</label>
                <div class="mb-2">
                  <input id="newsletter-email" class="form-control mb-2" type="email" name="newsletter-email" placeholder="exemple@email.com">
                  <button class="btn cta-btn w-100">S'inscrire</button>
                </div>
                <div class="d-flex justify-content-center">
                  <input type="checkbox" name="notifitier-tous" id="notify-all">
                  <label for="notify-all" class="ms-2 text-muted" style="font-size: 0.8rem;">Notifier moi aussi de tous les autres produits.</label>
                </div>
              </form>
              <p class="text-muted text-center mt-2" style="font-size: 0.6rem;">*Note : Vos données n'aurons pas être partager avec autre personnes/organisation</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <footer class="footer-bg pt-4">
    <div class="container text-white py-5">
      <div class="row">
        <div class="col-md-4">
          <h3 class="poppins fw-bold">Explorer</h3>
          <p>Explorer notre site, pour savoir plus.</p>

          <ul class="nav flex-column ps-3">
            <li>Accueil</li>
            <li>A propos</li>
            <li>Termes d'utilisation</li>
            <li>Être partenaire</li>
            <li>Site map</li>
          </ul>
        </div>
        <div class="col-md-4">
          <h3 class="poppins fw-bold">Support</h3>
          <p>Le support est la pour vous 24/7.</p>
          <ul class="nav flex-column ps-3">
            <li>Manuel d'utilisateur</li>
            <li>Contacter Support</li>
            <li>Repoter un beugue</li>
            <li>Signaler</li>
          </ul>

        </div>
        <div class="col-md-4">
          <h3 class="poppins fw-bold">Contacter Nous</h3>
          <form action="">
            <input type="email" name="contact-email" class="form-control mb-2" placeholder="Votre email...">
            <textarea name="contact-message" class="form-control mb-2" rows="4" placeholder="Votre message..."></textarea>
            <button class="btn bg-secondary fw-bold px-5 py-2">Envoyer</button>
          </form>
        </div>
      </div>
    </div>
    <div class="py-2" style="background-color: #06334b;">
      <div class="container">
        <p class="text-light text-sm mb-0 text-center">
          &copy; Créer avec 💻 par Mohammed Hakmi & Zakariya Elassri - 2023 ✌
        </p>
      </div>
    </div>
  </footer>
  <script src="vendors/js/bootstrap.bundle.min.js"></script>
  <script src="vendors/js/feather.min.js"></script>
  <script>
    feather.replace({ class: "f-icon" });
    let navBar = document.querySelector(".navbar");

    if (window.scrollY > 150) {
      navBar.classList.add("shrink");
    }
    document.addEventListener("scroll", (e) => {
      if (window.scrollY > 150) {
        navBar.classList.add("shrink");
      } else {
        navBar.classList.remove("shrink");
      }
    });

    let rangeMin = 100;
    const range = document.querySelector(".range-selected");
    const rangeInput = document.querySelectorAll(".range-input input");
    const rangePrice = document.querySelectorAll(".range-price input");
    const minPrix = document.getElementById("min-prix");
    const maxPrix = document.getElementById("max-prix");

    rangeInput.forEach((input) => {
      input.addEventListener("input", (e) => {
        let minRange = parseInt(rangeInput[0].value);
        let maxRange = parseInt(rangeInput[1].value);
        if (maxRange - minRange < rangeMin) {     
          if (e.target.className === "min") {
            rangeInput[0].value = maxRange - rangeMin;        
          } else {
            rangeInput[1].value = minRange + rangeMin;        
          }
        } else {
          rangePrice[0].value = minRange;
          rangePrice[1].value = maxRange;
          range.style.left = (minRange / rangeInput[0].max) * 100 + "%";
          range.style.right = 100 - (maxRange / rangeInput[1].max) * 100 + "%";
          minPrix.textContent = rangePrice[0].value;
          maxPrix.textContent = rangePrice[1].value;
        }
      });
    });

    const txts = document.querySelectorAll(".text-content"),
      txtsLen = txts.length;
    let index = 0;
    const textInTimer = 3000,
      textOutTimer = 2800;

    function animateText() {
      for (let i = 0; i < txtsLen; i++) {
        txts[i].classList.remove("text-in", "text-out");
      }
      txts[index].classList.add("text-in");

      setTimeout(function () {
        txts[index].classList.add("text-out");
      }, textOutTimer)

      setTimeout(function () {

        if (index == txtsLen - 1) {
          index = 0;
        }
        else {
          index++;
        }
        animateText();
      }, textInTimer);
    }

    window.onload = animateText;
  </script>
</body>

</html>