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
  </style>
</head>

<body>
  <section class="details-container">
    <aside class="content-container d-flex flex-column shadow-lg" style="z-index: 401;">
      <div class="px-3 shadow-sm py-1">
        <img src="assets/images/logo.png" style="width:160px" alt="3a9arLik logo">
      </div>
      <div class="pt-4 px-3 d-flex flex-column h-100">
        <h2 class="poppins display-6 mb-0 fw-bold">Home for sell</h2>
        <p class="card-text mb-3 text-muted text-small d-flex align-items-center">
          <span class="fw-bold" style="color: var(--secondary-color); font-size: 1.1rem;">3,000 DH</span>
          <span class="d-flex align-items-center"><i data-feather="eye" class="me-1 ms-3"></i>122</span>
          <span class="d-flex align-items-center"><i data-feather="clock" class="me-1 ms-3"></i>12/05/2023</span>
        </p>
        <div class="description-preview mb-auto d-flex flex-column">
          <p class="mb-0" style="text-align: justify;">
            Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nisi dicta aspernatur laudantium mollitia ex blanditiis consectetur
            eligendi laborum reiciendis deleniti. Neque nostrum eum, ab, libero ex quidem alias accusantium eius cum, culpa enim iure...
          </p>
          <div class="description-overlay"></div>
          <button class="btn more fw-bold mx-auto mt-1" 
            data-bs-toggle="modal" data-bs-target="#moreContentModal"
            style="color: var(--primary-color); font-size: 0.9rem; text-decoration: underline;">Lire la suite</button>
        </div>

        <!-- gallery slider -->
        <div class="swiper mb-3" style="width: 450px; border-radius: 15px;">
          <div class="swiper-wrapper">
            <!-- Slides -->
            <div class="swiper-slide"><img src="assets/images/swiper-1.jpg" alt="test-img-1"></div>
            <div class="swiper-slide"><img src="assets/images/swiper-2.jpg" alt="test-img-1"></div>
            <div class="swiper-slide"><img src="assets/images/swiper-3.jpg" alt="test-img-1"></div>
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

        <div class="" id="map"></div>
      </div>

    </main>
  </section>
  <div class="modal fade" id="moreContentModal" tabindex="-1" aria-labelledby="moreContentModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" style="max-width: 45rem">
      <div class="modal-content shadow" style="border-radius: 15px; border: 0;"> 
        <div class="modal-header border-0 align-items-start shadow-sm">
          <h3 class="poppins display-5 mb-0 fw-bold">House for sell</h3>
          <button type="button" class="btn-close ms-auto" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body p-3 d-flex flex-column h-100">
          <p class="text-indent">
            Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nobis minima architecto nisi amet esse quod doloremque maxime non repellat reprehenderit, dolorum eveniet! Nam eaque praesentium cum! In autem quia aliquid libero assumenda cumque voluptas nobis soluta, totam fugiat ipsam dolore facilis, corporis ducimus neque deleniti incidunt quasi! 
          </p>
          <p>
            A obcaecati voluptatibus corrupti perferendis officia rerum, veritatis debitis dolor necessitatibus sit omnis ipsam! Doloremque saepe accusamus asperiores earum provident, nemo harum animi iusto ipsa quo iure itaque delectus minima. Cupiditate, est reprehenderit voluptatem corrupti iste veniam necessitatibus aliquam architecto. Repellat, praesentium eaque dolor rerum rem ut vitae alias delectus. 
          </p>
          <p>Accusantium repellat dolore quaerat ut, obcaecati consequatur libero necessitatibus voluptatibus reprehenderit, deserunt quas expedita minus error, ipsum ullam tempore eaque perferendis id! Error veniam sequi quidem est quis illo quam repudiandae asperiores, temporibus pariatur, tempore nostrum ex neque officiis sed eos. Repudiandae porro, distinctio maxime quibusdam quam cum hic expedita illo, quidem molestias, ratione tenetur inventore necessitatibus quaerat nemo cumque? Adipisci rem vitae accusamus! Voluptatem eos placeat corrupti ipsa itaque, nobis eius suscipit non explicabo in necessitatibus delectus voluptatum quos sunt, deserunt officiis labore. 
          </p>
          <p>
            Est laborum magni alias repellendus id a aut blanditiis tempora recusandae neque natus voluptatum, nostrum, libero omnis! Vitae fugit itaque reprehenderit minus modi consequuntur libero hic quas, commodi ex officiis nostrum, accusantium facere ullam quod a alias ab ad, soluta non repudiandae dolorum earum dolores. Esse mollitia consequuntur magni minus obcaecati quis eius fugiat praesentium sunt nulla, corporis aut, sint eum odit beatae eos repellat expedita dolorum corrupti quod voluptate! Cumque delectus quaerat aperiam doloribus commodi minus nisi culpa tenetur dolore vero facilis esse iusto, neque velit nihil alias quasi. Perferendis itaque veniam est tempora ducimus voluptatem praesentium dolores officia? Expedita placeat repellat necessitatibus, dignissimos quisquam, nostrum eum laborum eligendi ex illum dolorum fuga unde amet deserunt doloribus beatae?
          </p>
        </div>
      </div>
    </div>
  </div>

  <script src="vendors/js/bootstrap.bundle.min.js"></script>
  <script src="vendors/js/leaflet.js"></script>
  <script src="vendors/js/feather.min.js"></script>
  <script src="vendors/js/swiper-bundle.min.js"></script>
  <script>
    feather.replace();

    var map = L.map('map').setView([51.505, -0.09], 13);

    L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
      maxZoom: 19,
      attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
    }).addTo(map);

    var marker = L.marker([51.5, -0.09]).addTo(map);
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