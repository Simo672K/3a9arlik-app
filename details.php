<?php
  require_once("core/init_session.php");
  require_once("core/classes.php");

  if(isset($_GET["post_id"])){
    Post::get_post($_GET["post_id"]);
    Post::update_views($_GET["post_id"]);
    $user_data= Post::get_post_user_data($_GET["post_id"]);
  }else{
    header("Location:posts.php");
  }
  
  if(isset($_POST["send"])) {
    $values= [
      "message_sender_name"=> $_POST["message_sender_name"],
      "message_sender_email"=> $_POST["message_sender_email"],
      "message_sender_content"=> $_POST["message_sender_content"],
      "message_post_id"=> $_GET["post_id"],
      "message_user_id"=> $user_data["post_user_id"],
    ];

    Message::post_message($values);
    header("location:index.php");
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
  <link rel="stylesheet" href="vendors/css/leaflet.css">
  <link rel="stylesheet" href="vendors/css/swiper-bundle.min.css">
  <link rel="stylesheet" href="vendors/css/all.min.css">
  <link rel="stylesheet" href="assets/css/price-range.min.css">
  <link rel="stylesheet" href="assets/css/main.min.css">

  <title>3a9arLik | Détails</title>
  <style>
    html,
    body,
    .details-container {
      width: 100%;
      height: 100%;
    }

    .details-container {
      display: flex;
    }

    .content-container {
      flex-basis: 50%;
    }

    .map-wrapper {
      flex-basis: 100%;
      position: relative;
    }

    .map-innerwrapper,
    #map {
      width: 100%;
      height: 100%;
    }

    .search-mapcard {
      border-radius: 15px;
      z-index: 401;
      width: 85%;
      top: 1rem;
      left: 50%;
      transform: translate(-50%);
    }
    .swiper-slide{
      height: 250px;
      overflow: hidden;
      display: flex;
      justify-content: center;
      background-color: #666;
    }

    .swiper-slide > img{
      height: 100%;
      width: auto;
    }
    .custom-btn{
      color: #fff;
      background-color: #333;
      padding: 1rem 1.3rem;
      border-radius: 50%;
      display: flex;
      text-align: center;
    }
    .custom-btn::after{
      font-size: 1.5rem;
    }
    .description-preview{
      position: relative;
    }
    .description-overlay{
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: linear-gradient(to top, rgba(255,255,255,0.9), rgba(0,0,0,0.0));
    }
    .more{
      position: relative;
      z-index: 2;
    }
    .contact-item {
    }
    .contact-item a {
      padding: 1rem;
      color: #fff;
      font-size: 1.5rem;
    }
    .contact-nav{
      top: 50%;
      left: 0;
      transform: translate(0, -50%);
    }
  </style>
</head>

<body>
  <?php $row= Post::$result->fetch(PDO::FETCH_ASSOC);?>
  <section class="details-container">
    <aside class="content-container d-flex flex-column shadow-lg" style="z-index: 401;">
      <div class="px-3 shadow-sm py-1">
        <a href="index.php"> 
          <img src="assets/images/logo.png" style="width:160px" alt="3a9arLik logo">
        </a>
      </div>
      <div class="pt-4 px-3 d-flex flex-column h-100">
        <h2 class="poppins fs-2 mb-0 fw-bold"><?php echo $row["post_title"]?></h2>
        <p class="card-text mb-3 text-muted text-small d-flex align-items-center">
          <span class="fw-bold" style="color: var(--secondary-color); font-size: 1.1rem;"><?php echo $row["post_price"]?> DH</span>
          <span class="d-flex align-items-center"><i data-feather="eye" class="me-1 ms-3"></i><?php echo $row["post_views"]?></span>
          <span class="d-flex align-items-center"><i data-feather="clock" class="me-1 ms-3"></i><?php echo $row["post_added"]?></span>
          <span class="d-flex align-items-center"><i data-feather="user" class="me-1 ms-3"></i><?php echo $user_data["user_name"]?></span>
        </p>
        <div class="description-preview mb-auto d-flex flex-column" style="height: 25%;">
          <p class="mb-0" style="text-align: justify; max-height: 100%; overflow: hidden; display: -webkit-box; -webkit-box-orient: vertical; -webkit-line-clamp: 5;">
            <?php echo $row["post_description"]?>
          </p>
          <div class="description-overlay h-100"></div>
          <button class="btn more fw-bold mx-auto mt-1 position-absolute" 
            data-bs-toggle="modal" data-bs-target="#moreContentModal"
            style="color: var(--primary-color); font-size: 0.9rem; text-decoration: underline; bottom: 0;left: 50%;transform: translate(-50%);">
            Lire la suite
          </button>
        </div>
        <ul class="position-fixed nav flex-column contact-nav">
          <li class="bg-primary contact-item">
            <a class="d-block" href="tel:<?php echo $user_data["user_phone"]?>" target="_blank" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="Appler directement"><i class="fa-solid fa-phone"></i></a>
          </li>
          <li class="bg-success contact-item">
            <a class="d-block" href="https://wa.me/<?php echo $user_data["user_phone"]?>" target="_blank" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="Contacter sur whatsapp"><i class="fa-brands fa-whatsapp"></i></a>
          </li>
          <li class="bg-info contact-item">
            <a class="d-block" href="#" data-bs-toggle="modal" data-bs-target="#messageSendModal" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="Envoyer un message directement"><i class="fa-solid fa-message"></i></a>
          </li>
        </ul>
        <!-- gallery slider -->
        <div class="swiper mb-3" style="width: 450px; border-radius: 15px;">
          <div class="swiper-wrapper">
            <!-- Slides -->
            <?php foreach(json_decode($row["post_images"]) as $image){?>
              <div class="swiper-slide"><img src="<?php echo UPLOAD_DIR . $image?>" alt="<?php echo $image;?>"/></div>
            <?php }?>
          </div>
        
          <!-- If we need navigation buttons -->
          <div class="swiper-button-prev custom-btn" style="left: 0.4rem"></div>
          <div class="swiper-button-next custom-btn" style="right: 0.4rem"></div>
        </div>
      </div>
    </aside>
    <main class="map-wrapper">
      <div class="map-innerwrapper">
        <div class="card position-absolute bg-white p-3 shadow search-mapcard">
        <form action="search.php" metod="get" class="d-flex">
          <select class="form-select me-2" name="ville" >
            <option value="">Toutes les villes</option>
            <option value="">Appartements</option>
            <option value="">Villas</option>
            <option value="">Boutiques</option>
            <option value="">Bureaux</option>
            <option value="">Terrains</option>
          </select>
          <select class="form-select me-2" name="type" >
            <option value="">Tous les types d'immeubles</option>
            <option value="">Appartements</option>
            <option value="">Villas</option>
            <option value="">Boutiques</option>
            <option value="">Bureaux</option>
            <option value="">Terrains</option>
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

        <div data-addresse="<?php echo $row["post_addresse"]?>" id="map" data-map="<?php echo $row["post_coordinates"]?>"></div>
      </div>

    </main>
  </section>
  <div class="modal fade" id="moreContentModal" tabindex="-1" aria-labelledby="moreContentModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" style="max-width: 45rem">
      <div class="modal-content shadow" style="border-radius: 15px; border: 0;"> 
        <div class="modal-header border-0 align-items-start shadow-sm">
          <h3 class="poppins display-5 mb-0 fw-bold"><?php echo $row["post_title"]?></h3>
          <button type="button" class="btn-close ms-auto" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body p-3 d-flex flex-column h-100">
          <p class="text-indent">
            <?php echo $row["post_description"]?>
          </p>
        </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="messageSendModal" data-bs-backdrop="static" tabindex="-1" aria-labelledby="messageSendModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" style="max-width: 45rem">
      <div class="modal-content shadow" style="border-radius: 15px; border: 0;"> 
        <div class="modal-header border-0 align-items-start shadow-sm">
          <h3 class="poppins mb-0 fw-bold">Contactez la personne</h3>
          <button type="button" class="btn-close ms-auto" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body p-3 d-flex flex-column h-100">
          <form action="" method="POST">
            <label class="form-label" for="name">Nom complet :</label>
            <input class="form-control mb-3" type="text" id="name" name="message_sender_name" placeholder="Votre nom complet" required>

            <label class="form-label" for="email">Addresse email :</label>
            <input class="form-control" type="email" name="message_sender_email" id="email" placeholder="Votre addresse email" required>

            <label class="form-label" for="content">Votre message :</label>
            <textarea class="form-control mb-3" id="content" name="message_sender_content" placeholder="Votre message" rows="7" required></textarea>
          
            <button class="btn btn-danger" type="reset" style="padding:0.6rem 3rem !important; border-width: 3px;" data-bs-dismiss="modal"><i class="fa-solid fa-xmark me-2"></i>Annuler</button>
            <button class="btn cta-btn" type="submit" name="send" style="padding:0.6rem 3rem !important;"><i class="fa-solid fa-paper-plane me-2"></i>Envoyer</button>
          </form>
        </div>
      </div>
    </div>
  </div>
  <script src="vendors/js/bootstrap.bundle.min.js"></script>
  <script src="vendors/js/leaflet.js"></script>
  <script src="vendors/js/feather.min.js"></script>
  <script src="vendors/js/swiper-bundle.min.js"></script>
  <script>
    const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
    const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))
    feather.replace();
    var mapContainer= document.getElementById("map");
    var map = L.map('map').setView(JSON.parse(mapContainer.getAttribute("data-map")), 13);

    L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
      maxZoom: 19,
      attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
    }).addTo(map);

    var marker = L.marker(JSON.parse(mapContainer.getAttribute("data-map"))).addTo(map);
    marker.bindPopup(mapContainer.getAttribute("data-addresse")).openPopup();
    const swiper = new Swiper('.swiper', {
      loop: true,
      autoplay: {
        delay: 2500,
        disableOnInteraction: false,
      },
      // Navigation arrows
      navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
      },
    });
  </script>
</body>

</html>