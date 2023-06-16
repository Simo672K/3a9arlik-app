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
  <title>3a9arlik | Tableau de bord</title>
  <style>
    .form-label{
      font-weight: bold;
    }
  </style>
</head>

<body>
  <main>
    <aside class="sidebar" style="border-right: solid 1px #dedede">
      <div class="sidebar-inner">
        <div class="py-1 px-2">
          <a href="">
            <img src="../assets/images/logo.png" alt="3a9arlik logo" class="logo">
          </a>
        </div>
        <div class="mt-1 pt-1 sidebar-nav-container d-flex flex-column">
          <ul class="nav sidebar-nav">
            <li class="sidebar-item">
              <a class="sidebar-link active" href="#">
                <i class="fa-solid fa-chart-pie me-2"></i> Tableau de bord
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link d-flex align-items-center" data-bs-toggle="collapse" href="#postCRUD" role="button"
                aria-expanded="false" aria-controls="postCRUD">
                <i class="fa-solid fa-bullhorn me-2"></i> Vos Postes
                <i class="fa-solid fa-chevron-down ms-auto" style="font-size: 1rem;"></i>
              </a>
              <div class="collapse show" id="postCRUD">
                <ul class="nav collapse-nav">
                  <li class="collapse-item">
                    <a href="" class="collapse-link">
                      Postes
                    </a>
                  </li>
                  <li class="collapse-item">
                    <a href="" class="collapse-link">
                      Ajouter un poste
                    </a>
                  </li>
                </ul>
              </div>
            </li>
            <li class="sidebar-item"><a class="sidebar-link" href="#">
                <i class="fa-solid fa-user me-2"></i> Profile</a>
            </li>
            <li class="sidebar-item"><a class="sidebar-link" href="#">
                <i class="fa-solid fa-gear me-2"></i> Paramètres</a>
            </li>
          </ul>
          <div class="sidebar-item mt-auto mb-2"><a class="sidebar-link" href="#">
              <i class="fa-solid fa-right-from-bracket me-2"></i> Se deconnecter</a>
          </div>
        </div>
      </div>
    </aside>
    <section class="main">
      <nav class="navbar navbar-expand-lg bg-white border-bottom">
        <div class="container-fluid py-2">
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0 align-items-center">
              <li class="nav-item dropdown pt-2 me-4">
                <a class="nav-link dropdown-toggle position-relative" href="#" role="button" data-bs-toggle="dropdown"
                  aria-expanded="false">
                  <i style="width: 30px; height: 40px;" data-feather="mail"></i>
                  <span class="red-dot"></span>
                </a>
                <ul class="dropdown-menu dropdown-menu-end mt-2">
                  <li><a class="dropdown-item" href="#">Action</a></li>
                  <li><a class="dropdown-item" href="#">Another action</a></li>
                  <li>
                    <hr class="dropdown-divider">
                  </li>
                  <li><a class="dropdown-item" href="#">Something else here</a></li>
                </ul>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                  aria-expanded="false">
                  <i class="nav-icon" data-feather="user"></i>
                </a>
                <ul class="dropdown-menu dropdown-menu-end mt-2">
                  <li class="px-4 py-2 d-flex flex-column text-center">
                    <p class="mb-0 user-name">Mohammed Hakmi</p>
                    <span class="text-muted user-email" style="font-size: 0.9rem;">example@email.com</span>
                  </li>
                  <li>
                    <hr class="dropdown-divider">
                  </li>
                  <li><a class="dropdown-item" href="#">Se deconnecter</a></li>
                </ul>
              </li>
            </ul>
          </div>
        </div>
      </nav>

      <section class="container-fluid">
        <div class="mb-4 pt-5 px-4 mt-3 rounded" style="background-color: #ffecd1; border-bottom: solid 5px #dec7a5;">
          <h2 class="poppins">📝 Ajouter un Poste.</h2>
          <p class="text-muted">Creer un nouveau poste.</p>
        </div>


        <div class="card shadow-sm border-0 p-4">
          <div class="card-body">
            <div class="border-bottom mb-4">
              <h4 class="mb-3"><i class="fa-solid fa-list-check"></i> Remplire le formulaire suivant</h4>
            </div>
            <div class="row">
              <div class="col-9 mx-auto">
                <form action="" method="POST" enctype="multipart/form-data">
                  <input type="hidden" name="post_user_id" value="" required>
          
                  <label class="form-label" for="post-titre">Titre du post :</label>
                  <input class="form-control mb-3" type="text" id="post-titre" name="post_title" placeholder="Titre d'annonce" required>
          
                  <label class="form-label" for="post-addresse">Addresse <strong class="text-small text-primary poppins">(*Vous devez tappez l'addresse puis définir la localisation en clicant sur selectionner localisation)</strong> :</label>
                  <div class="input-group align-items-center mb-3">
                    <input class="form-control" type="text" name="post_addresse" id="post-addresse" placeholder="Addresse du local" required>
                    <input type="hidden" name="post_coordinates" id="post-coordinates" required>
                    <button class="btn cta-btn border-2" type="button" data-bs-toggle="modal" data-bs-target="#locationModal"><i class="fa-solid fa-location-dot me-2"></i> Selectionner localisation</button>
                  </div>
                  
                  <label class="form-label" for="post-description">Description du post :</label>
                  <textarea class="form-control mb-3" id="post-description" name="post_description" placeholder="Description d'annonce" rows="7" required></textarea>
          
                  <div class="row mb-3">
                    <div class="col-6">
                      <label class="form-label" for="post-price">Prix du local :</label>
                      <input class="form-control" type="number" id="post-price" name="post_price" style="width: 150px;" value="0" required>
                    </div>
                    
                    <div class="col-6">
                      <label class="form-label">Type :</label>
                      <div>
                        <input type="radio" name="post_type" id="post-type-1" value="Louer" checked>
                        <label for="post-type-1" class="me-2">Louer</label>
                        
                        <input type="radio" name="post_type" id="post-type-2" value="Acheter">
                        <label for="post-type-2">Acheter</label>
                      </div>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <div class="col-6">
                      <label class="form-label" for="post-city">Ville :</label>
                      <select class="form-select" id="post-city" name="post_city_id" required>
                      </select>
                    </div>
                    
                    <div class="col-6">
                      <label class="form-label" for="post-category">Categorie :</label>
                      <select class="form-select" id="post-category" name="post_category_id" required>
                        
                      </select>
                    </div>
                  </div>
                    
                    <div>
                      <label class="form-label" for="post-images">Images du post:</label>
                      <input class="form-control" type="file" id="post-images" name="post_images[]" accept="image/*" style="width:fit-content" multiple>
                    </div>

                  
                  <div class="mt-4">
                    <button class="btn btn-danger" type="reset" style="padding:0.6rem 3rem !important; border-width: 3px; font-weight: 500;"><i class="fa-solid fa-close me-2"></i>Annuler</button>
                    <button class="btn cta-btn" type="submit" name="submit" style="padding:0.6rem 3rem !important;"><i class="fa-solid fa-paper-plane me-1"></i> Publier</button>
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
</body>

</html>