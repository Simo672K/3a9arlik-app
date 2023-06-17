<?php 
  require_once("core/init_session.php");
  require_once("core/classes.php");
  
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
  <link rel="stylesheet" href="vendors/css/aos.css">
  <link rel="stylesheet" href="assets/css/main.min.css">

  <title>3a9arLik | Accueil</title>
</head>

<body>
  <?php include("includes/navbar.php")?>
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
          <select class="form-select me-2" name="category" >
            <option value="all">Tous les types d'immeubles</option>
            <?php foreach(Category::$categories as $category){
              echo "<option value='{$category['category_id']}'>{$category['category_name']}</option>";
            }?>            
          </select>
          <div class="d-flex align-items-center me-3">
            <input type="radio" class="me-1" name="type" value="Louer" id="a-louer" checked>
            <label for="a-louer" class="me-3">Louer</label>
            <input type="radio" class="me-1" name="type" value="Acheter" id="a-acheter">
            <label for="a-acheter">Acheter</label>
          </div>
          <button type="submit" name="submit" class="btn cta-btn d-flex align-items-center">
            <i class="fa-solid fa-magnifying-glass-location me-2"></i>
            Rechercher
          </button>
        </form>
      </div>
    </div>
  </header>
  <main class="text-dark mb-5 pb-5">
    <section class="my-5 py-5">
      <div class="container mt-5 pt-5">
        <div class="row">
          <div class="col-md-6" data-aos="fade-right">
            <img class="img-fluid curved-img" src="assets/images/apropos-img.jpg" alt="A-propos-de-nous-image">
          </div>
          <div class="col-md-6 d-flex flex-column ps-4" data-aos="fade-up">
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

    <section class="bg-primary py-5">
      <div class="container py-5">
        <h2 class="poppins text-center display-5 fw-bold text-white mb-5 mt-4">
          Trouvez votre Appartement de rêve avec nous<span style="color: var(--secondary-color)">.</span>
        </h2>
        <div class="row mb-4">
          <div class="col-md-3">
            <div class="card bg-secondary" data-aos="fade-up" style="border-radius: 25px ;border-top-right-radius: 0; border-bottom-left-radius: 0;">
              <div class="card-body text-center">
                <h3 class="poppins fw-semibold">1. Chercher</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
              </div>
            </div>
          </div>
          <div class="col-md-3">
            <div class="card bg-secondary" data-aos="fade-up" style="border-radius: 25px ;border-top-right-radius: 0; border-bottom-left-radius: 0;">
              <div class="card-body text-center">
                <h3 class="poppins fw-semibold">2. Choisir</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
              </div>
            </div>
          </div>
          <div class="col-md-3">
            <div class="card bg-secondary" data-aos="fade-up" style="border-radius: 25px ;border-top-right-radius: 0; border-bottom-left-radius: 0;">
              <div class="card-body text-center">
                <h3 class="poppins fw-semibold">3. Contacter</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
              </div>
            </div>
          </div>
          <div class="col-md-3">
            <div class="card bg-secondary" data-aos="fade-up" style="border-radius: 25px ;border-top-right-radius: 0; border-bottom-left-radius: 0;">
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
  <?php include("includes/footer.php")?>
  <script src="vendors/js/bootstrap.bundle.min.js"></script>
  <script src="vendors/js/feather.min.js"></script>
  <script src="vendors/js/aos.js"></script>
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

    AOS.init();
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