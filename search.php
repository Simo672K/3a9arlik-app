<?php
  require_once("core/init_session.php");
  require_once("core/classes.php");

  if(isset($_GET["submit"])){
    Post::filter_posts($_GET["ville"], $_GET["category"], $_GET["type"]);
  }
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

  <title>3a9arLik | Résultas</title>
</head>

<body>
  <?php include("includes/navbar.php")?>

  <main>
    <div class="container pb-5 my-5">
      <h2 class="poppins fw-bold display-5 mb-5 text-center pt-5">Resultat de recherche (<?php echo Post::$result->rowCount() ?>):</h2>
      <div class="card w-100 bg-white p-4 border-0 mb-5">
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
          <!-- <div class="dropdown">
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
          </div> -->
        </form>
      </div>
      
      <?php foreach(Post::$result as $key=>$value) {?>
      <a href="<?php echo "details.php?post_id=".$value["post_id"]?>" style="text-decoration: none">
        <div class="card flex-row p-1 mb-4 card-result">
          <div class="bg-placeholder overflow-hidden">
            <?php if($value["post_images"]){?>
            <img
              class="card-img-left rounded"
            />
            <?php }?>
          </div>
          <div class="card-body px-4 py-3">
            <div class="d-flex align-items-center">
              <h3 class="card-title mb-0 poppins mt-2 fw-bold text-dark">
              <?php echo $value["post_title"]?>
              </h3>
              <span class="badge ms-3" style="background-color: var(--secondary-color);font-weight: 700;box-shadow: 0px 0px 10px #66666666;">
                À <?php echo $value["post_type"]?>
              </span>
            </div>
            <div class="card-text mb-3 text-muted text-small d-flex align-items-center">
              <span class="fw-bold" style="color: var(--secondary-color); font-size: 1.1rem;"><?php echo $value["post_price"]?> DH</span>
              <span class="d-flex align-items-center ms-3"><i data-feather="eye" class="me-1"></i><?php echo $value["post_views"]?></span>
              <span class="d-flex align-items-center ms-3"><i data-feather="clock" class="me-1"></i><?php echo $value["post_added"]?></span>
              <span class="d-flex align-items-center ms-3 fw-bold"><i data-feather="map-pin" class="me-1"></i><?php echo $value["post_city"]?></span>
            </div>
    
            <p class="card-text text-body text-muted"style="overflow: hidden;text-overflow: ellipsis;display: -webkit-box;-webkit-line-clamp: 2;-webkit-box-orient: vertical;">
              <?php echo $value["post_description"]?>
            </p>
          </div>
        </div>
      </a>
      <?php }?>

      <nav aria-label="Page navigation example">
        <ul class="pagination">
          <li class="page-item active"><a class="page-link" href="#">1</a></li>
          <li class="page-item"><a class="page-link" href="#">2</a></li>
          <li class="page-item"><a class="page-link" href="#">3</a></li>
        </ul>
      </nav>
    </div>
  </main>

  <!-- Footer -->
  <?php include("includes/footer.php")?>
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

    // let rangeMin = 100;
    // const range = document.querySelector(".range-selected");
    // const rangeInput = document.querySelectorAll(".range-input input");
    // const rangePrice = document.querySelectorAll(".range-price input");
    // const minPrix = document.getElementById("min-prix");
    // const maxPrix = document.getElementById("max-prix");

    // rangeInput.forEach((input) => {
    //   input.addEventListener("input", (e) => {
    //     let minRange = parseInt(rangeInput[0].value);
    //     let maxRange = parseInt(rangeInput[1].value);
    //     if (maxRange - minRange < rangeMin) {     
    //       if (e.target.className === "min") {
    //         rangeInput[0].value = maxRange - rangeMin;        
    //       } else {
    //         rangeInput[1].value = minRange + rangeMin;        
    //       }
    //     } else {
    //       rangePrice[0].value = minRange;
    //       rangePrice[1].value = maxRange;
    //       range.style.left = (minRange / rangeInput[0].max) * 100 + "%";
    //       range.style.right = 100 - (maxRange / rangeInput[1].max) * 100 + "%";
    //       minPrix.textContent = rangePrice[0].value;
    //       maxPrix.textContent = rangePrice[1].value;
    //     }
    //   });
    // });
  </script>
</body>

</html>