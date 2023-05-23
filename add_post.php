<?php
  require_once("core/init_session.php");
  require_once("core/classes.php");
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
  <link rel="stylesheet" href="assets/css/main.min.css">

  <title>3a9arLik | Ajuter un post</title>
  <style>
  .form-select{
    width: fit-content;
    border-color: #00476e; 
  }
  .map-wrapper, #map{
    width: 100%;
    height: 100%;
  }
  </style>
</head>

<body>
  <?php include("includes/navbar.php")?>

  <main>
    <div class="container py-2 my-5">
      <nav class="card bg-gray mb-4 border-0" aria-label="breadcrumb">
        <div class="card-body pb-0">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Acceil</a></li>
            <li class="breadcrumb-item"><a href="#">Posts</a></li>
            <li class="breadcrumb-item active" aria-current="page">Nouveau post</li>
          </ol>
        </div>
      </nav>
      <h2 class="text-center display-4 fw-bold mb-5">Ajouter un nouveau post.</h2>
      <form action="">
        <input type="hidden" value="<?php echo User::$id?>">

        <label class="form-label" for="">Titre du post :</label>
        <input class="form-control mb-3" type="text" placeholder="Titre d'annonce">

        <label class="form-label" for="">Addresse <strong class="text-small text-primary poppins">(*Vous devez tappez l'addresse puis définir la localisation en clicant sur selectionner localisation)</strong> :</label>
        <div class="input-group align-items-center mb-3">
          <input class="form-control" type="text" placeholder="Addresse du local">
          <button class="btn cta-btn border-2" type="button" data-bs-toggle="modal" data-bs-target="#locationModal">Selectionner localisation</button>
        </div>
        
        <label class="form-label" for="">Description du post :</label>
        <textarea class="form-control mb-3" placeholder="Description d'annonce" rows="7"></textarea>

        <div class="d-flex align-items-center">
          <div>
            <label class="form-label" for="">Prix du local :</label>
            <input class="form-control" type="number" style="width: 150px;" value="0">
          </div>
  
          <div class="mx-auto">
            <label class="form-label" for="">Ville :</label>
            <select class="form-select" name="ville" >
              <?php foreach(City::$cities as $city){
                echo "<option value='{$city['city_id']}'>{$city['city_name']}</option>";
              }?>            
            </select>
          </div>
          
          <div class="mx-auto">
            <label class="form-label" for="">Categorie :</label>
            <select class="form-select" name="category" >
              <?php foreach(Category::$categories as $category){
                echo "<option value='{$category['category_id']}'>{$category['category_name']}</option>";
              }?>            
            </select>
          </div>
          <div class="mx-auto">
            <label class="form-label" for="">Type :</label>
            <div>
              <input type="radio" name="" id="" value="Louer">
              <label for="" class="me-2">Louer</label>
              
              <input type="radio" name="" id="" value="Acheter">
              <label for="">Acheter</label>
            </div>
          </div>
          
          <div>
            <label class="form-label" for="">Images du post:</label>
            <input class="form-control" type="file" style="width:fit-content">
          </div>
        </div>
        
        <div class="mt-4">
          <button class="btn btn-danger" type="reset" style="padding:0.6rem 6rem !important; border-width: 3px;">Annuler</button>
          <button class="btn cta-btn" type="submit" style="padding:0.6rem 6rem !important;">Publier</button>
        </div>
      </form>
    </div>
  </main>

  <!-- Map location selector Modal -->
  <div class="modal fade" id="locationModal" tabindex="-1" aria-labelledby="locationModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered py-1" style="min-width: 45rem;">
      <div class="modal-content rounded-2">
        <div class="modal-header border-0">
          <h3 class="modal-title poppins fw-bold" id="locationModalLabel">Selectionner la localisation</h3>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body p-0 px-2" style="height: 20rem;">
          <div class="map-wrapper">
            <div id="map"></div>
          </div>
        </div>
        <div class="modal-footer border-0 py-1">
          <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Annuler</button>
          <button type="button" class="btn cta-btn" id="souvegarder">Souvegarder</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Footer -->
  <?php include("includes/footer.php")?>
  <script src="vendors/js/bootstrap.bundle.min.js"></script>
  <script src="vendors/js/leaflet.js"></script>
  <script>
    let navBar = document.querySelector(".navbar");
    if (window.scrollY > 150) {
      navBar.classList.add("shrink");
    }
    document.addEventListener("scroll", (e) => {
      if (window.scrollY > 150) {
        navBar.classList.add("shrink");
      } else {
        navBar.classList.remove("shrink");
      }
    });
    const modal = document.getElementById("locationModal");

    
    
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

    map.on('click', function(ev){
      latlng = map.mouseEventToLatLng(ev.originalEvent);
      if(marker){
        map.removeLayer(marker);
      }
      marker= L.marker([latlng.lat,latlng.lng]).addTo(map);
    });
    
    addCoordinates.onclick= function (){
      console.log([latlng.lat,latlng.lng]);
    }

  </script>
</body>

</html>