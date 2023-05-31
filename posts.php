<?php
  require_once("core/init_session.php");
  require_once("core/classes.php");

  Post::get_all_posts();
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

  <title>3a9arLik | Toutes Les Annonces</title>
</head>

<body>
  <?php include("includes/navbar.php")?>

  <main>
    <div class="container pb-5 my-5">
      <h2 class="poppins fw-bold display-5 mb-5 text-center pt-5">Toutes les annonces</h2>
      <h4><i data-feather="filter"></i> Filtrer par :</h4>
      <div class="w-100 bg-white mb-5">
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
            <input type="radio" class="me-1" name="type" value="louer" id="a-louer" checked>
            <label for="a-louer" class="me-3">Louer</label>
            <input type="radio" class="me-1" name="type" value="acheter" id="a-acheter">
            <label for="a-acheter">Acheter</label>
          </div>
          <button type="submit" name="submit" class="btn cta-btn d-flex align-items-center">
            Filterer
          </button>
        </form>
      </div>
      <div class="py-5"></div>
      <?php foreach(Post::$result as $key=>$value) {?>
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
            <h3 class="card-title mb-0 poppins mt-2 fw-bold">
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
  </script>
</body>

</html>