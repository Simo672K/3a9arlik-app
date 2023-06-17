<?php
  require_once("core/init_session.php");
  require_once("core/classes.php");
  
  if(isset($_POST["submit"])){
    $email= $_POST["user_email"];
    $password= $_POST["user_password"];
    User::auth_user($email, $password);
    if(User::$logged_in){
      $_SESSION["user_id"]= User::$id;
      $_SESSION["user_name"]= User::$name;
      $_SESSION["user_email"]= User::$email;
      $_SESSION["user_phone"]= User::$phone;
      $_SESSION["user_logged"]= User::$logged_in;

      header("Location: dashboard/");
    }
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
  <link rel="stylesheet" href="assets/css/main.min.css">
  <title>3a9arLik | Connexion</title>
  <style>
    html, body{
      height: 100%;
    }
    body{
      display: flex;
      justify-content: center;
      align-items: center;
    }
    .card{
      border-radius: 0;
      border-color: var(--primary-color);
      border-width: 2px;
    }
    .form-label{
      margin-bottom: 0;
    }
    .register-bg{
      background:linear-gradient(to right, rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.4)), url(assets/images/register-bg.jpg);
      background-repeat: no-repeat;
      background-position: center center;
      background-size: cover;
    }
  </style>
</head>
<body>
  <div class="container">

    <div class="card shadow" style="overflow: hidden;">
      <div class="card-body p-0" style="overflow: hidden;">
        <div class="row p-0">
          <div class="col-6 register-bg"></div>
          <div class="col-6 px-4 py-2">
            <h3 class="poppins mb-4 mt-3 display-6 fw-bold">Connecter à votre compte</h3>
            <form action="login.php" method="POST" class="d-flex flex-column">
              <div class="mb-3">
                <label class="form-label text-muted" for="email"><span class="text-danger me-1">*</span>Email:</label>
                <input type="text" class="form-control" name="user_email" id="email" placeholder="Votre Email..." required>
              </div>
              <div class="mb-3">
                <label class="form-label text-muted" for="prenom"><span class="text-danger me-1">*</span>Mot de passe:</label>
                <input type="password" class="form-control" name="user_password" id="prenom" placeholder="Votre Mot de Passe..." required>
              </div>
  
              <button class="btn cta-btn" type="submit" name="submit">Se Connecter</button>
            </form>
            <p class="text-center text-muted mt-2 mb-0">Vous n'avez pas de compte? <a href="register.php" style="color: var(--secondary-color);">Créez un maintenant.</a></p>
            <hr class="mt-2">
            <div class="d-flex justify-content-center">
              <a href="index.php">
                <img src="assets/images/logo.png" alt="logo 3a9arlik" style="width: 150px">
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="vendors/js/bootstrap.bundle.min.js"></script>
  <script src="vendors/js/feather.min.js"></script>
</body>
</html>