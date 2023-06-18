<?php 
  require_once('includes/session.php');
  require_once("../core/classes.php");

  $page_title= "Postes";
  $alert= array(
    "show"=>false,
    "type"=> Null,
    "message"=> null
  );

  if(!isset($_GET["post_id"])){
    header("location:all-posts.php");
  } else {
    Post::get_post($_GET["post_id"]);
    $row= Post::$result->fetch(PDO::FETCH_ASSOC);
  }

  if(isset($_POST["submit"]) && $_SESSION["user_logged"]){
    try{
      $values= [
        "post_id"=>$_GET["post_id"],
        "post_title"=>$_POST["post_title"],
        "post_description"=>$_POST["post_description"],
        "post_addresse"=>$_POST["post_addresse"],
        "post_coordinates"=>$_POST["post_coordinates"],
        "post_price"=>$_POST["post_price"],
        "post_type"=>$_POST["post_type"],
      ];
      Post::update_post($values);
      $alert["show"]= true;
      $alert["type"]= 'success';
      $alert["message"]=  "Votre poste a ete modifier avec successe";

    }catch(AssertionError $e) {
      $alert["show"]= true;
      $alert["type"]= 'danger';
      $alert["message"]=  $e->getMessage();
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
  <link rel="stylesheet" href="../vendors/css/bootstrap.min.css">
  <link rel="stylesheet" href="../vendors/css/all.min.css">
  <link rel="stylesheet" href="../vendors/css/leaflet.css">
  <link rel="stylesheet" href="../assets/css/dashboard.min.css">
  <link rel="stylesheet" href="../assets/css/dashboard-pages.min.css">
  <title>3a9arlik | <?php echo $page_title?></title>
  <style>
    .form-label{
      font-weight: bold;
    }
  </style>
</head>

<body>
  <main>
    <?php include("includes/sidebar.php")?>
    <section class="main">
      <?php include("includes/navbar.php")?>
      
      <section class="container-fluid">
        <?php if($alert["show"]){?>
          <div class="alert alert-<?php echo $alert["type"]?> position-fixed" style="z-index: 50; right: 3rem;">
            <?php echo $alert["message"]?>
          </div>
        <?php }?>
        <div class="mb-4 pt-5 px-4 mt-3 rounded" style="background-color: #ffecd1; border-bottom: solid 5px #dec7a5;">
          <h2 class="poppins">📝 Modifier un Poste.</h2>
          <p class="text-muted">Modifier les donners du poste.</p>
          <nav class="p-2 mb-3 rounded " aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
              <li class="breadcrumb-item"><a href="index.php"><i class="fa-solid fa-house"></i></a></li>
              <li class="breadcrumb-item"><a href="all-posts.php">Postes</a></li>
              <li class="breadcrumb-item active" aria-current="page">Ajouter un poste</li>
            </ol>
          </nav>
        </div>

        <div class="card shadow-sm border-0 p-4">
          <div class="card-body">
            <div class="border-bottom mb-4">
              <h4 class="mb-3"><i class="fa-solid fa-list-check"></i> Modifier les donnees</h4>
            </div>
            <div class="row">
              <div class="col-9 mx-auto">
                <form action="" method="POST" enctype="multipart/form-data">          
                  <label class="form-label" for="post-titre">Titre du post :</label>
                  <input class="form-control mb-3" type="text" id="post-titre" name="post_title" placeholder="Titre d'annonce" value="<?php echo $row["post_title"]?>" required>
          
                  <label class="form-label" for="post-addresse">Addresse <strong class="text-small text-primary poppins">(*Vous devez tappez l'addresse puis définir la localisation en clicant sur selectionner localisation)</strong> :</label>
                  <div class="input-group align-items-center mb-3">
                    <input class="form-control" type="text" name="post_addresse" id="post-addresse" placeholder="Addresse du local" value="<?php echo $row["post_addresse"]?>" required>
                    <input type="hidden" name="post_coordinates" id="post-coordinates" value="<?php echo $row["post_coordinates"]?>" required>
                    <button class="btn cta-btn border-2" type="button" data-bs-toggle="modal" data-bs-target="#locationModal"><i class="fa-solid fa-location-dot me-2"></i> Selectionner localisation</button>
                  </div>
                  
                  <label class="form-label" for="post-description">Description du post :</label>
                  <textarea class="form-control mb-3" id="post-description" name="post_description" placeholder="Description d'annonce" rows="7" required><?php echo $row["post_description"]?></textarea>
          
                  <div class="row mb-3">
                    <div class="col-6">
                      <label class="form-label" for="post-price">Prix du local :</label>
                      <input class="form-control" type="number" id="post-price" name="post_price" value="<?php echo $row["post_price"]?>" style="width: 150px;" value="0" required>
                    </div>
                    
                    <div class="col-6">
                      <label class="form-label">Type :</label>
                      <div>
                        <input type="radio" name="post_type" id="post-type-1" value="Louer" <?php echo $row["post_type"]==="Louer"? "checked": ""?>>
                        <label for="post-type-1" class="me-2">Louer</label>
                        
                        <input type="radio" name="post_type" id="post-type-2" value="Acheter" <?php echo $row["post_type"]==="Acheter"? "checked": ""?>>
                        <label for="post-type-2">Acheter</label>
                      </div>
                    </div>
                  </div>

                  <div class="mt-4">
                    <a class="btn btn-danger" href="all-posts.php" style="padding:0.6rem 3rem !important; border-width: 3px; font-weight: 500;"><i class="fa-solid fa-close me-2"></i>Annuler</a>
                    <button class="btn btn-success" type="submit" name="submit" style="padding:0.6rem 3rem !important; border-width: 3px;"><i class="fa-solid fa-check me-2"></i></i> Confirmer</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>

      </section>
    </section>
  </main>

  <!-- Map location selector Modal -->
  <div class="modal fade" id="locationModal" tabindex="-1" aria-labelledby="locationModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered py-1" style="min-width: 55rem;">
      <div class="modal-content rounded-2">
        <div class="modal-header border-0">
          <h3 class="modal-title poppins fw-bold" id="locationModalLabel">Selectionner la localisation</h3>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body p-0 px-2" style="height: 30rem;">
          <div class="map-wrapper">
            <div id="map"></div>
          </div>
        </div>
        <div class="modal-footer border-0 py-1">
          <button type="button" class="btn cta-btn" id="souvegarder" data-bs-dismiss="modal">Souvegarder</button>
        </div>
      </div>
    </div>
  </div>
  <script src="../vendors/js/bootstrap.bundle.min.js"></script>
  <script src="../vendors/js/feather.min.js"></script>
  <script src="../vendors/js/leaflet.js"></script>
  <script>
    feather.replace();

    // For map data collection
    const modal = document.getElementById("locationModal");
    const coordInput= document.getElementById("post-coordinates");
    
    
    let addCoordinates= document.getElementById("souvegarder");

    var map = L.map('map').setView([35.146, -2.907], 13);
    L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
      maxZoom: 19,
      attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
    }).addTo(map);
    
    modal.addEventListener('shown.bs.modal', function (event) {
      map.invalidateSize();
    });

    var latlng= null;
    var marker= L.marker([35.146, -2.907], 13).addTo(map);

    // Map Markers handling
    map.on('click', function(ev){
      latlng = map.mouseEventToLatLng(ev.originalEvent);
      if(marker){
        map.removeLayer(marker);
      }
      marker= L.marker([latlng.lat,latlng.lng]).addTo(map);
    });
    
    addCoordinates.onclick= function (){
      coordInput.value= JSON.stringify([latlng.lat,latlng.lng]);
    }
  </script>
  <script src="../assets/js/alert.js"></script>
</body>

</html>