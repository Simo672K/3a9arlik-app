<?php 
  require_once('includes/session.php');
  require_once('core/classes.php');

  UserData::overview($_SESSION["user_logged"]);
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
  <link rel="stylesheet" href="../assets/css/dashboard.min.css">
  <title>3a9arlik | Tableau de bord</title>
</head>

<body>
  <main>
    <?php include("includes/sidebar.php")?>
    <section class="main">
      <?php include("includes/navbar.php")?>

      <div class="container-fluid">
        <div class="mb-4 pt-5 px-4 d-flex mt-3 align-items-start rounded" style="background-color: #ffecd1; border-bottom: solid 5px #dec7a5;">
          <div class="me-auto">
            <h2 class="poppins">👋 Bienvenu Mohammed Hakmi.</h2>
            <p class="text-muted">Nous somme heureux de vous avoires ici avec nous, voici un aperçu des activites sur vos postes / annoces</p>
          </div>
  
          <a class="text-primary text-decoration-none" href="../index.php">Aller au site publique <i class="fa-solid fa-arrow-up-right-from-square"></i></a>
        </div>
        <div class="row mb-5">
          <div class="col-3">
            <div class="card bg-custom shadow border-0 card-mini">
              <div class="card-body">
                <h3 class="poppins">
                  <i class="fa-solid fa-location-dot me-2"></i>
                  Totale de Postes
                </h3>
                <h5 class="display-5 poppins fw-bold ps-2">25</h5>
              </div>
            </div>
          </div>

          <div class="col-3">
            <div class="card bg-custom shadow border-0 card-mini">
              <div class="card-body">
                <h3 class="poppins">
                  <i class="fa-solid fa-eye me-2"></i>
                  Totale des Vues
                </h3>
                <h5 class="display-5 poppins fw-bold ps-2">5829</h5>
              </div>
            </div>
          </div>

          <div class="col-3">
            <div class="card bg-custom shadow border-0 card-mini">
              <div class="card-body">
                <h3 class="poppins">
                  <i class="fa-solid fa-chart-bar me-2"></i>
                  Votre Rank
                </h3>
                <h5 class="display-5 poppins fw-bold ps-2">189</h5>
              </div>
            </div>
          </div>

          <div class="col-3">
            <div class="card bg-custom shadow border-0 card-mini">
              <div class="card-body">
                <h3 class="poppins">
                  <i class="fa-solid fa-inbox me-2"></i>
                  Inbox
                </h3>
                <h5 class="display-5 poppins fw-bold ps-2">50</h5>
              </div>
            </div>
          </div>
        </div>

        <h1 class="poppins mb-3"><i class="fa-solid fa-chart-line me-3"></i> Statistiques.</h1>
        <div class="row mb-4"> 
          <div class="col-5">
            <div class="card h-100 p-4 shadow border-0">
              <h3 class="mb-2">L'activiter sur vos postes.</h3>
              <p class="mb-3">Durans le dernier mois</p>
              <div class="card-body" style="height: 300px;">
                <canvas id="viewsOverTimeChart"></canvas>
              </div>
            </div>
          </div>

          <div class="col-4">
            <div class="card h-100 p-4 shadow border-0">
              <h3 class="mb-2">Contactes & Vues.</h3>
              <p class="mb-3">Totale de 125 vues</p>
              <div class="card-body p-0 d-flex flex-column align-items-center" style="max-height: 290px;">
                <canvas id="interractionsChart"></canvas>
              </div>
            </div>
          </div>

          <div class="col-3">
            <div class="row h-100">
              <div class="col-12 mb-3">
                <div class="card h-100 pt-2 shadow border-0">
                  <h3 class="pt-2 px-3">Vues par Type.</h3>
                  <div class="card-body">
                    <canvas id="propertyStatesByView"></canvas>
                  </div>
                </div>
              </div>

              <div class="col-12">
                <div class="card h-100 p-4 shadow bg-primary text-white border-0">
                  <h3><i class="fa-solid fa-star me-2"></i> Top Region.</h3>
                  <div class="card-body p-1 pb-2">
                    <h2 class="fw-bold">Oujda</h2>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="row mt-3">
          <div class="col-12">
            <div class="card shadow border-0 p-4">
              <div class="card-body">
                <h4 class="mb-3"><i class="fa-solid fa-arrow-trend-up"></i> Vos Meilleures Postes Du Mois :</h4>
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Titre</th>
                      <th>Addresse</th>
                      <th>Prix</th>
                      <th>Date</th>
                      <th>Ville</th>
                      <th>Categorie</th>
                      <th>Type</th>
                      <th>Detailes</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>1</td>
                      <td>Annonce 1</td>
                      <td>hay al jadid nr 205</td>
                      <td>3450</td>
                      <td>2023-06-04 16:30:25</td>
                      <td>Nador</td>
                      <td>Appartement</td>
                      <td>A louer</td>
                      <td><a href="#"><i class="fa-solid fa-arrow-up-right-from-square"></i></a></td>
                    </tr>
                    <tr>
                      <td>2</td>
                      <td>Annonce 1</td>
                      <td>hay al jadid nr 205</td>
                      <td>3450</td>
                      <td>2023-06-04 16:30:25</td>
                      <td>Nador</td>
                      <td>Appartement</td>
                      <td>A louer</td>
                      <td><a href="#"><i class="fa-solid fa-arrow-up-right-from-square"></i></a></td>
                    </tr>
                    <tr>
                      <td>3</td>
                      <td>Annonce 1</td>
                      <td>hay al jadid nr 205</td>
                      <td>3450</td>
                      <td>2023-06-04 16:30:25</td>
                      <td>Nador</td>
                      <td>Appartement</td>
                      <td>A louer</td>
                      <td><a href="#"><i class="fa-solid fa-arrow-up-right-from-square"></i></a></td>
                    </tr>
                    <tr>
                      <td>4</td>
                      <td>Annonce 1</td>
                      <td>hay al jadid nr 205</td>
                      <td>3450</td>
                      <td>2023-06-04 16:30:25</td>
                      <td>Nador</td>
                      <td>Appartement</td>
                      <td>A louer</td>
                      <td><a href="#"><i class="fa-solid fa-arrow-up-right-from-square"></i></a></td>
                    </tr>
                    <tr>
                      <td>5</td>
                      <td>Annonce 1</td>
                      <td>hay al jadid nr 205</td>
                      <td>3450</td>
                      <td>2023-06-04 16:30:25</td>
                      <td>Nador</td>
                      <td>Appartement</td>
                      <td>A louer</td>
                      <td><a href="#"><i class="fa-solid fa-arrow-up-right-from-square"></i></a></td>
                    </tr>
                  </tbody>
                </table>
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


    new Chart(document.getElementById('propertyStatesByView'), {

      type: 'bar',
      data: {
        labels: [
          'Apparetemant',
          'Villa',
          'Boutique',
          'Bureau',
          'Terrain',
        ],
        datasets: [
          {
            label: "Contactes",
            data: [20, 16, 38, 7, 18],
            backgroundColor: [
              'rgb(255, 153, 0)',
              'rgb(255, 153, 0)',
              'rgb(255, 153, 0)',
              'rgb(255, 153, 0)',
              'rgb(255, 153, 0)',
            ],
          }
          , {
            label: "Vues",
            data: [25, 100, 42, 77, 18],
            backgroundColor: [
              'rgb(0, 71, 110)',
              'rgb(0, 71, 110)',
              'rgb(0, 71, 110)',
              'rgb(0, 71, 110)',
              'rgb(0, 71, 110)',
            ],
          }]
      }
    })

  </script>
</body>

</html>