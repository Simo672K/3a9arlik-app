<?php 
  require_once('includes/session.php');
  require_once("../core/classes.php");
  $page_title= "Postes";

  if(isset($_GET["post_id"])){
    Post::get_detailed_post($_GET["post_id"]);
    $row= Post::$result->fetch(PDO::FETCH_ASSOC);
  }else{
    header("Location:all-posts.php");
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
  <link rel="stylesheet" href="../vendors/css/bootstrap.min.css">
  <link rel="stylesheet" href="../vendors/css/all.min.css">
  <link rel="stylesheet" href="../vendors/css/leaflet.css">
  <link rel="stylesheet" href="../vendors/css/swiper-bundle.min.css">
  <link rel="stylesheet" href="../assets/css/dashboard.min.css">
  <link rel="stylesheet" href="../assets/css/dashboard-pages.min.css">
  <title>3a9arlik | <?php echo $page_title?></title>
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
          <nav class="p-2 mb-3 rounded " aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
              <li class="breadcrumb-item"><a href="index.php"><i class="fa-solid fa-house"></i></a></li>
              <li class="breadcrumb-item"><a href="all-posts.php">Postes</a></li>
              <li class="breadcrumb-item active" aria-current="page"><?php echo $row["post_title"]?></li>
            </ol>
          </nav>
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
                  <a href="update-post.php?post_id=<?php echo $row["post_id"]?>" class="btn btn-info me-2"><i class="fa-solid fa-pen-to-square"></i> Modifier</a>
                  <a href="#" class="btn btn-danger delete-btn" data-bs-toggle="modal" data-post="<?php echo $row["post_id"]?>" data-bs-target="#confirmDeleteModal"><i class="fa-solid fa-trash"></i> Suprimer</a>
                </div>
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="col-6">
                    <p><strong>Images</strong> :</p>
                    <div class="swiper-container" style="width: 650px;">
                      <div class="swiper">
                        <div class="swiper-wrapper">
                        <?php foreach(json_decode($row["post_images"]) as $image){?>
                          <div class="swiper-slide"><img src="<?php echo "../".UPLOAD_DIR . $image?>" alt="<?php echo $image;?>"/></div>
                        <?php }?>
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
                        <td><?php echo $row["post_title"]?></td>
                      </tr>
                      <tr>
                        <td><strong>Prix</strong></td>
                        <td><?php echo $row["post_price"]?> DH</td>
                      </tr>
                      <tr>
                        <td class="d-block"><strong>Description</strong> </td>
                        <td>
                          <small>
                          <?php echo $row["post_description"]?>
                          </small>
                        </td>
                      </tr>
                      <tr>
                        <td><strong>Addresse</strong></td>
                        <td><?php echo $row["post_addresse"]?></td>
                      </tr>
                      <tr>
                        <td><strong>Ville</strong></td>
                        <td><?php echo $row["post_city"]?></td>
                      </tr>
                      <tr>
                        <td><strong>Categorie</strong></td>
                        <td><?php echo $row["post_category"]?></td>
                      </tr>
                      <tr>
                        <td><strong>Type d'annonce</strong></td>
                        <td>À <?php echo $row["post_type"]?></td>
                      </tr>
                      <tr>
                        <td><strong>Ajouter le</strong></td>
                        <td><?php echo $row["post_added"]?></td>
                      </tr>
                      <tr>
                        <td><strong>Nombre de vues</strong></td>
                        <td><?php echo $row["post_views"]?></td>
                      </tr>
                    </table>
                  </div>
                </div>


                <!---------------------------------------------------------------------------------------------------------->
                <p><strong>Location</strong> :</p>
                <div class="map-container mb-4">
                  <div class="map-wrapper">
                    <div data-addresse="<?php echo $row["post_addresse"]?>" id="map" data-map="<?php echo $row["post_coordinates"]?>">
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
  <div class="modal fade" id="confirmDeleteModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="confirmDeleteModal" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" style="max-width: 35rem;">
        <div class="modal-content">
          <div class="modal-header py-2 border-0">
            <h1 class="modal-title fs-3" id="confirmDeleteModal">Suprimer Le poste</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body pt-5">
            <p class="text-danger text-center"><i class="fa-solid fa-triangle-exclamation me-2"></i> Vous ete sure de suprimer se poste? Si vous confirmer il est imposible de le recuperer!</p>
          </div>
          <div class="modal-footer py-2 border-0">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fa-solid fa-xmark me-2"></i>Annuler</button>
            <a href="#" id="delete-confirm" class="btn btn-danger"><i class="fa-solid fa-trash me-2"></i>Suprimer</a>
          </div>
        </div>
      </div>
    </div>
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
  <script>
    let deleteConfirm= document.getElementById("delete-confirm");

    window.onload= function() {
      let deleteBtns= document.querySelectorAll(".delete-btn");

      deleteBtns.forEach(btn=>{
        btn.addEventListener("click", ()=>{
          deleteConfirm.setAttribute("href","delete-post.php?post_id="+btn.getAttribute("data-post"));
        });
      })
    }
  </script>
</body>

</html>