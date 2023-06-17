<?php 
  require_once('includes/session.php');
  require_once('core/classes.php');
  $page_title= "Profile";
  $user_id= $_SESSION["user_id"];
  $alert= array(
    "show"=>false,
    "type"=> Null,
    "message"=> null
  );

  try{
    // ini_set('assert.exception', 1);

    if(isset($_POST["submit"])){
      $current_pass= $_POST["current_pass"];
      $new_pass= $_POST["new_pass"];
      $confirm_pass= $_POST["confirm_pass"];

      // get user data
      $query_result= DBhandler::get_result("SELECT * FROM ". USER_TABLE . " WHERE user_id=$user_id");
      $user_data= $query_result->fetch(PDO::FETCH_ASSOC);
      
      assert(password_verify($current_pass, $user_data["user_password"]), "Le mot de passe est incorrect!");
      assert($new_pass===$confirm_pass, "La confirmation du mot de passe a echouer!");

      // Everything is ok! now it's time for applying updates
      $update_query=  DBhandler::$conn->prepare("UPDATE user SET user_password=:new_pass WHERE user_id=:user_id");
      $update_query->execute(array(
        "new_pass"=> password_hash($new_pass, PASSWORD_DEFAULT),
        "user_id"=> $user_id,
      ));

      if(!$update_query) 
        throw new Exception("Failed to create user");
        
    

      $alert["show"]= true;
      $alert["type"]= 'success';
      $alert["message"]= "Votre mot de passe modifier avec successer";
    }
  }catch(AssertionError $e) {
    $alert["show"]= true;
    $alert["type"]= 'danger';
    $alert["message"]=  $e->getMessage();
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
  <link rel="stylesheet" href="../assets/css/dashboard.min.css">
  <link rel="stylesheet" href="../assets/css/dashboard-pages.min.css">
  <title>3a9arlik | <?php echo $page_title?></title>
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
        <?php if($alert["show"]){?>
          <div class="alert alert-<?php echo $alert["type"]?> position-fixed" style="z-index: 50; right: 3rem;">
            <?php echo $alert["message"]?>
          </div>
        <?php }?>
        <div class="mb-4 pt-5 px-4 mt-3 rounded" style="background-color: #ffecd1; border-bottom: solid 5px #dec7a5;">
          <h2 class="poppins">🔐 Changer mot de passe.</h2>
          <p class="text-muted">Changer votre mot de passe maintenant.</p>

          <nav class="p-2 mb-3 rounded " aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
              <li class="breadcrumb-item"><a href="index.php"><i class="fa-solid fa-house"></i></a></li>
              <li class="breadcrumb-item"><a href="profile.php">Profile</a></li>
              <li class="breadcrumb-item active" aria-current="page">Changer mot de passe</li>
            </ol>
          </nav>
        </div>


        <div class="card shadow-sm border-0 p-4">
          <div class="d-flex align-items-center border-bottom pb-3">
            <h2 class="me-auto"><i class="fa-solid fa-lock"></i> Changer votre mot de passe</h2>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-8">
                <form action="" method="POST">
                  <table class="w-100">
                    <tr>
                      <td style="width: 250px;" class="pt-2"><strong><i class="fa-solid fa-lock me-2"></i> Mot de passe actuel</strong> :</td>
                      <td class="ps-3">
                        <input class="form-control" name="current_pass" type="password" placeholder="Mot de passe actuel" required>
                      </td>
                    </tr>
                    <tr>
                      <td class="pt-2"><strong><i class="fa-solid fa-key me-2"></i>  Nouveau mot de passe</strong> :</td>
                      <td class="ps-3">
                      <input class="form-control" name="new_pass" type="password" placeholder="Nouveau mot de passe" required>
                      </td>
                    </tr>
                    <tr>
                      <td class="pt-2"><strong><i class="fa-solid fa-key me-2"></i>  Confirmer mot de passe</strong> :</td>
                      <td class="ps-3">
                      <input class="form-control" name="confirm_pass" type="password" placeholder="Confirmer mot de passe" required>
                      </td>
                    </tr>
                  </table>
                  <div class="mt-4">
                    <button class="btn btn-danger" type="reset" style="padding:0.6rem 3rem !important; font-weight: 500;"><i class="fa-solid fa-close me-2"></i>Annuler</button>
                    <button class="btn btn-success" type="submit" name="submit" style="padding:0.6rem 3rem !important;"><i class="fa-solid fa-check"></i> Confirmer</button>
                  </div>
                </form>
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
  <script src="../assets/js/alert.js"></script>
</body>

</html>