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
  <style>
    .avatar {
      width: 120px;
      height: 120px;
      border-radius: 50%;
      overflow: hidden;
      background-color: #fff4e4;
      box-shadow: 0px 0px 7px 0px rgba(0, 0, 0, 0.3);
    }
  </style>
</head>

<body>
  <main>
    <?php include("includes/sidebar.php")?>
    <section class="main">
      <?php include("includes/navbar.php")?>

      <div class="container-fluid">
        <div class="mb-4 pt-5 px-4 mt-3 rounded" style="background-color: #ffecd1; border-bottom: solid 5px #dec7a5;">
          <h2 class="poppins">📃 Votre profile.</h2>
          <p class="text-muted">Votre profile et vos donnees.</p>
        </div>


        <div class="card shadow-sm border-0 p-4">
          <div class="d-flex align-items-center border-bottom pb-3">
            <h2 class="me-auto"><i class="fa-solid fa-clipboard-user"></i> Vos donnees.</h2>
            <div>
              <a class="btn btn-primary" href="">
                <i class="fa-solid fa-key me-2"></i> 
                Changer mot de passe
              </a>
              <a class="btn btn-secondary" href="">
                <i class="fa-solid fa-pen-to-square me-2"></i>
                Modifier vos donnees
              </a>
            </div>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-2 border-end">
                <div class="d-flex flex-column justify-content-center align-items-center">
                  <div class="avatar">
                    <img src="../assets/images/avatar.png" alt="avatar">
                  </div>
                  <h5 class="mt-2">Mohammed Hakmi</h5>
                </div>

              </div>
              <div class="col-8 ps-4">
                <table>
                  <tr>
                    <td class="pt-2"><strong><i class="fa-solid fa-user"></i> Nom utilisateur</strong> :</td>
                    <td class="ps-3">Mohammed Hakmi</td>
                  </tr>
                  <tr>
                    <td class="pt-2"><strong><i class="fa-solid fa-envelope"></i> Addresse email</strong> :</td>
                    <td class="ps-3">mohammed.hakmi@gmail.com</td>
                  </tr>
                  <tr>
                    <td class="pt-2"><strong><i class="fa-solid fa-phone"></i> Numero de telephone</strong> :</td>
                    <td class="ps-3">0612345678</td>
                  </tr>
                  <tr>
                    <td class="pt-2"><strong><i class="fa-solid fa-calendar"></i> Rejoint le</strong> :</td>
                    <td class="ps-3">2023-06-04</td>
                  </tr>
                </table>
                <div class="mt-4">
                  <h4 class="text-danger"><i class="fa-solid fa-triangle-exclamation me-2"></i> Zone danger</h4>
                  <a class="btn btn-danger" href="">
                    <i class="fa-solid fa-user-slash me-2"></i> 
                    Suprimer votre compte
                  </a>
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
  <script>
    feather.replace();
  </script>
</body>

</html>