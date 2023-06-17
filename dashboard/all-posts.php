<?php 
  require_once('includes/session.php');
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
          <h2 class="poppins">📢Vos Postes.</h2>
          <p class="text-muted">Liste de tous vos postes</p>
        </div>


        <div class="card shadow-sm border-0 p-4">
          <div class="card-body">
            <div class="border-bottom mb-4">
              <h4 class="mb-3"><i class="fa-solid fa-list-ul"></i> Tous les postes (18)</h4>
            </div>
            <div class="mb-4 mt-4">
              <h5 class="mb-2"><i class="fa-solid fa-search me-1"></i> Rechercher un poste:</h5>
              <form action="">
                <div class="d-flex">
                  <input type="text" class="form-control me-3" placeholder="Entrer quelque chose a rechercher...">
                  <button class="btn cta-btn d-flex align-items-center"><i class="fa-solid fa-search me-2"></i> Rechercher</button>
                </div>
              </form>
            </div>
            <table class="table table-hover rounded overflow-hidden">
              <thead>
                <tr class="table-primary">
                  <th class="pt-3">Titre</th>
                  <th>Addresse</th>
                  <th>Prix</th>
                  <th>Date</th>
                  <th>Ville</th>
                  <th>Categorie</th>
                  <th>Type</th>
                  <th>Detailes</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td class="py-3">Annonce 1</td>
                  <td class="py-3">hay al jadid nr 205</td>
                  <td class="py-3">3450</td>
                  <td class="py-3">2023-06-04 16:30:25</td>
                  <td class="py-3">Nador</td>
                  <td class="py-3">Appartement</td>
                  <td class="py-3">A louer</td>
                  <td class="py-3">
                    <a href="#" class="text-decoration-none">detailes <i
                        class="fa-solid fa-arrow-up-right-from-square ms-2"></i></a>
                  </td>
                  <td class="py-3">
                    <a href="#" class="text-primary"><i class="fa-solid fa-pen-to-square me-2"></i></a>
                    <a href="#" class="text-danger"><i class="fa-solid fa-trash"></i></a>
                  </td>
                </tr>

                <tr>
                  <td class="py-3">Annonce 1</td>
                  <td class="py-3">hay al jadid nr 205</td>
                  <td class="py-3">3450</td>
                  <td class="py-3">2023-06-04 16:30:25</td>
                  <td class="py-3">Nador</td>
                  <td class="py-3">Appartement</td>
                  <td class="py-3">A louer</td>
                  <td class="py-3">
                    <a href="#" class="text-decoration-none">detailes <i
                        class="fa-solid fa-arrow-up-right-from-square ms-2"></i></a>
                  </td>
                  <td class="py-3">
                    <a href="#" class="text-primary"><i class="fa-solid fa-pen-to-square me-2"></i></a>
                    <a href="#" class="text-danger"><i class="fa-solid fa-trash"></i></a>
                  </td>
                </tr>

                <tr>
                  <td class="py-3">Annonce 1</td>
                  <td class="py-3">hay al jadid nr 205</td>
                  <td class="py-3">3450</td>
                  <td class="py-3">2023-06-04 16:30:25</td>
                  <td class="py-3">Nador</td>
                  <td class="py-3">Appartement</td>
                  <td class="py-3">A louer</td>
                  <td class="py-3">
                    <a href="#" class="text-decoration-none">detailes <i
                        class="fa-solid fa-arrow-up-right-from-square ms-2"></i></a>
                  </td>
                  <td class="py-3">
                    <a href="#" class="text-primary"><i class="fa-solid fa-pen-to-square me-2"></i></a>
                    <a href="#" class="text-danger"><i class="fa-solid fa-trash"></i></a>
                  </td>
                </tr>

                <tr>
                  <td class="py-3">Annonce 1</td>
                  <td class="py-3">hay al jadid nr 205</td>
                  <td class="py-3">3450</td>
                  <td class="py-3">2023-06-04 16:30:25</td>
                  <td class="py-3">Nador</td>
                  <td class="py-3">Appartement</td>
                  <td class="py-3">A louer</td>
                  <td class="py-3">
                    <a href="#" class="text-decoration-none">detailes <i
                        class="fa-solid fa-arrow-up-right-from-square ms-2"></i></a>
                  </td>
                  <td class="py-3">
                    <a href="#" class="text-primary"><i class="fa-solid fa-pen-to-square me-2"></i></a>
                    <a href="#" class="text-danger"><i class="fa-solid fa-trash"></i></a>
                  </td>
                </tr>

                <tr>
                  <td class="py-3">Annonce 1</td>
                  <td class="py-3">hay al jadid nr 205</td>
                  <td class="py-3">3450</td>
                  <td class="py-3">2023-06-04 16:30:25</td>
                  <td class="py-3">Nador</td>
                  <td class="py-3">Appartement</td>
                  <td class="py-3">A louer</td>
                  <td class="py-3">
                    <a href="#" class="text-decoration-none">detailes <i
                        class="fa-solid fa-arrow-up-right-from-square ms-2"></i></a>
                  </td>
                  <td class="py-3">
                    <a href="#" class="text-primary"><i class="fa-solid fa-pen-to-square me-2"></i></a>
                    <a href="#" class="text-danger"><i class="fa-solid fa-trash"></i></a>
                  </td>
                </tr>
              </tbody>
            </table>
            <nav aria-label="...">
              <ul class="pagination pagination-sm">
                <li class="page-item active" aria-current="page">
                  <span class="page-link">1</span>
                </li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
              </ul>
            </nav>
          </div>
        </div>

      </div>
    </section>
  </main>
  <script src="../vendors/js/bootstrap.bundle.min.js"></script>
  <script src="../vendors/js/feather.min.js"></script>
  <script>
    feather.replace();
  </script>
</body>

</html>