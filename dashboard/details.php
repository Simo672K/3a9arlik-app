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
  <link rel="stylesheet" href="../vendors/css/bootstrap.min.css">
  <link rel="stylesheet" href="../vendors/css/all.min.css">
  <link rel="stylesheet" href="../vendors/css/leaflet.css">
  <link rel="stylesheet" href="../vendors/css/swiper-bundle.min.css">
  <link rel="stylesheet" href="../assets/css/dashboard.min.css">
  <link rel="stylesheet" href="../assets/css/dashboard-pages.min.css">
  <title>3a9arlik | Tableau de bord</title>
</head>

<body>
  <main>
    <?php include("includes/sidebar.php")?>
    
    <section class="main">
      <?php include("includes/navbar.php")?>
      

      <div class="container-fluid">
        <div class="mb-4 pt-5 px-4 mt-3 rounded" style="background-color: #ffecd1; border-bottom: solid 5px #dec7a5;">
          <h2 class="poppins">Detailes du poste.</h2>
          <p class="text-muted">Voici les detailes et statistiques du postes</p>
        </div>

        <h2 class="poppins mb-3"><i class="fa-solid fa-chart-line me-3"></i>Statistiques.</h2>
        <div class="row mb-5">
          <div class="col-6">
            <div class="card h-100 p-4 shadow border-0">
              <h3 class="mb-2">L'activiter sur vos postes.</h3>
              <p class="mb-3">Durans le dernier mois</p>
              <div class="card-body" style="height: 300px;">
                <canvas id="viewsOverTimeChart"></canvas>
              </div>
            </div>
          </div>

          <div class="col-6">
            <div class="card h-100 p-4 shadow border-0">
              <h3 class="mb-2">Contactes & Vues.</h3>
              <p class="mb-3">Totale de 125 vues</p>
              <div class="card-body p-0 d-flex flex-column align-items-center" style="max-height: 290px;">
                <canvas id="interractionsChart"></canvas>
              </div>
            </div>
          </div>
        </div>

        <h2 class="poppins mb-3"><i class="fa-solid fa-circle-info me-3"></i> Detailes du poste.</h2>
        <div class="row">
          <div class="col-12">
            <div class="card p-4 shadow border-0">
              <div class="d-flex align-items-start border-bottom">
                <h2 class="poppins mb-3">Contenue du poste.</h2>
                <div class="ms-auto d-flex align-items-center">
                  <a href="#" class="btn btn-info me-2"><i class="fa-solid fa-pen-to-square"></i> Modifier</a>
                  <a href="#" class="btn btn-danger"><i class="fa-solid fa-trash"></i> Suprimer</a>
                </div>
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="col-6">
                    <p><strong>Images</strong> :</p>
                    <div class="swiper-container" style="width: 650px;">
                      <div class="swiper">
                        <div class="swiper-wrapper">
                          <div class="swiper-slide">
                            <img
                              src="../uploads/BAl_K5-FIniMUYmL9wygW4D71eTjRp3EXcqao6JxChzVd2ktuHSvGs08PrNfZbOQkenny-eliason-kdwahpWYfQo-unsplash.jpg"
                              alt="" />
                          </div>
                          <div class="swiper-slide">
                            <img
                              src="../uploads/eijLvwX8sQH1B9EzTWZOJUtpk7aP2SxdcRqVNhAfo3M4CbYyumGn60-rgl5FDK_Ipatrick-perkins-3wylDrjxH-E-unsplash.jpg"
                              alt="" />
                          </div>
                          <div class="swiper-slide">
                            <img
                              src="../uploads/xa5YQl-FVCmfR_ckZbtDJMr7pvHu1Nd2OKWAzn8Ew4yXLPGjIsiqeSg3oBhU69T0outsite-co-R-LK3sqLiBw-unsplash.jpg"
                              alt="" />
                          </div>
                        </div>

                        <div class="swiper-button-prev custom-btn" style="left: 0.4rem"></div>
                        <div class="swiper-button-next custom-btn" style="right: 0.4rem"></div>
                      </div>
                    </div>
                  </div>
                  <div class="col-6">
                    <table class="mb-3">
                      <tr>
                        <td><strong>Status du poste</strong></td>
                        <td>
                          <span class="badge bg-success">
                            <i class="fa-solid fa-check"></i> actif
                          </span>
                        </td>
                      </tr>
                      <tr>
                        <td style="min-width: 180px;"><strong>Titre</strong></td>
                        <td>Annonce 1 du site</td>
                      </tr>
                      <tr>
                        <td><strong>Prix</strong></td>
                        <td>750000 DH</td>
                      </tr>
                      <tr>
                        <td class="d-block"><strong>Description</strong> </td>
                        <td>
                          <small>
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Asperiores odit perspiciatis in
                            obcaecati vitae id voluptatum, labore assumenda voluptates amet quas suscipit accusamus
                            officia nesciunt ratione sed modi nobis corrupti eius provident laboriosam rem, repellat
                            fugit? Dicta amet fugit maxime atque soluta consequatur error. Aperiam magnam expedita
                            excepturi sed, vel deleniti dolor at. Debitis autem officiis explicabo ipsa, quia rem
                            tempore dignissimos, voluptates libero earum, mollitia aspernatur veritatis. Error id at
                            nostrum molestiae deserunt amet sit dignissimos, quis nemo est, sequi exercitationem
                            voluptatem vitae distinctio alias. Porro natus amet a rerum molestiae, iusto animi dolorem,
                            voluptatem commodi aperiam similique accusamus rem mollitia suscipit at doloremque veniam ea
                            sit labore! Autem reiciendis placeat.
                          </small>
                        </td>
                      </tr>
                      <tr>
                        <td><strong>Addresse</strong></td>
                        <td>Nador kournich, Immeuble Nouveau class, Apparetemant 4</td>
                      </tr>
                      <tr>
                        <td><strong>Ville</strong></td>
                        <td>Nador</td>
                      </tr>
                      <tr>
                        <td><strong>Categorie</strong></td>
                        <td>Apparetemant</td>
                      </tr>
                      <tr>
                        <td><strong>Type d'annonce</strong></td>
                        <td>A acheter</td>
                      </tr>
                      <tr>
                        <td><strong>Ajouter le</strong></td>
                        <td>23/05/2023</td>
                      </tr>
                      <tr>
                        <td><strong>Nombre de vues</strong></td>
                        <td>23</td>
                      </tr>
                    </table>
                  </div>
                </div>


                <!---------------------------------------------------------------------------------------------------------->
                <p><strong>Location</strong> :</p>
                <div class="map-container mb-4">
                  <div class="map-wrapper">
                    <div data-addresse="some dummy data" id="map" data-map="[35.149073608580714,-2.9118919372558594]">
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>
    </section>
  </main>
  <script src="../vendors/js/bootstrap.bundle.min.js"></script>
  <script src="../vendors/js/feather.min.js"></script>
  <script src="../vendors/js/chart.umd.js"></script>
  <script src="../vendors/js/leaflet.js"></script>
  <script src="../vendors/js/swiper-bundle.min.js"></script>
  <script>
    feather.replace();
    let average = 0;
    let data = [0, 9, 4, 12, 5, 7, 2, 17, 16, 0];

    for (let d of data) {
      average += d;
    }
    average = average / data.length;

    const averageLine = {
      id: 'averageLine',
      beforeDatasetDraw(chart, args, options) {
        const { ctx, chartArea: { top, right, bottom, left, width, height }, scales: { x, y } } = chart;
        ctx.save();

        ctx.strokeStyle = "rgb(0, 71, 110)";
        ctx.setLineDash([15, 50]);
        ctx.strokeRect(left, y.getPixelForValue(average), width, 0);
        ctx.restore();
      }
    }
    const ctx = document.getElementById('viewsOverTimeChart');
    new Chart(ctx, {
      type: 'line',
      data: {
        labels: ['01 juin 23', '02 juin 23', '03 juin 23', '04 juin 23', '05 juin 23', '06 juin 23', '07 juin 23', '08 juin 23', '09 juin 23', '10 juin 23'],
        datasets: [{
          label: 'Totale de Vues',
          data: [0, 9, 4, 12, 5, 7, 2, 17, 16, 0],
          borderWidth: 2,
          tension: 0.3,
          borderColor: "rgb(255, 153, 0)",
          backgroundColor: (context) => {
            const bgColor = ["rgba(255, 153, 0, 0.6 )", "rgba(255, 153, 0, 0.0)"];
            if (!context.chart.chartArea) {
              return
            }
            const { ctx, data, chartArea: { top, bottom } } = context.chart;
            const gradientBg = ctx.createLinearGradient(0, top, 0, bottom);
            gradientBg.addColorStop(0, bgColor[0]);
            gradientBg.addColorStop(1, bgColor[1]);
            return gradientBg;
          },
          fill: true
        }]
      },
      options: {
        scales: {
          y: {
            beginAtZero: true
          }
        }
      },
      plugins: [averageLine]
    });

    new Chart(document.getElementById('interractionsChart'), {
      type: 'doughnut',
      data: {
        labels: [
          'Avec contacte',
          'Sans contacte'
        ],
        datasets: [{
          label: 'Nombre de fois',
          data: [25, 100],
          backgroundColor: [
            'rgb(255, 153, 0)',
            'rgb(0, 71, 110)',
          ],
          hoverOffset: 5
        }]
      }
    })

  </script>
  <script>
    var mapContainer = document.getElementById("map");
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