<?php 
  require_once('includes/session.php');
  require_once('../core/classes.php');
  $page_title= "Postes";
  $per_page= 10;
  $page= isset($_GET['page']) ? $_GET['page'] : 1;
  $page_content= Post::get_paginated_user_posts($_SESSION["user_id"], $page, $per_page);
  Post::get_user_posts($_SESSION["user_id"], $page, $per_page);
  $count= Post::$result->rowCount();
  
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
              <h4 class="mb-3"><i class="fa-solid fa-list-ul"></i> Tous les postes (<?php echo $count ?>)</h4>
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
                  <th>Vues</th>
                  <th>Date</th>
                  <th>Ville</th>
                  <th>Categorie</th>
                  <th>Type</th>
                  <th>Detailes</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach($page_content as $key=>$value) {?>
                <tr>
                  <td class="py-3"><?php echo $value["post_title"]?></td>
                  <td class="py-3"><?php echo $value["post_addresse"]?></td>
                  <td class="py-3"><?php echo $value["post_price"]?> DH</td>
                  <td class="py-3"><?php echo $value["post_views"]?></td>
                  <td class="py-3"><?php echo $value["post_added"]?></td>
                  <td class="py-3"><?php echo $value["post_city"]?></td>
                  <td class="py-3"><?php echo $value["post_category"]?></td>
                  <td class="py-3">À <?php echo $value["post_type"]?></td>
                  <td class="py-3">
                    <a href="details.php?post_id=<?php echo $value["post_id"]?>" class="text-decoration-none">detailes <i
                        class="fa-solid fa-arrow-up-right-from-square ms-2"></i></a>
                  </td>
                  <td class="py-3">
                    <a href="update-post.php?post_id=<?php echo $value["post_id"]?>" class="text-primary"><i class="fa-solid fa-pen-to-square me-2"></i></a>
                    <a href="#" class="text-danger delete-btn" data-bs-toggle="modal" data-post="<?php echo $value["post_id"]?>" data-bs-target="#confirmDeleteModal"><i class="fa-solid fa-trash"></i></a>
                  </td>
                </tr>
                <?php }?>
              </tbody>
            </table>
            
            <?php if($count> $per_page){ ?>
            <nav aria-label="...">
              <ul class="pagination pagination-sm">
                <!-- <li class="page-item active" aria-current="page">
                  <span class="page-link">1</span>
                </li> -->
                <?php for($i=1; $i<=ceil($count/$per_page);$i++){ ?>
                  <?php if($i != $page){?>
                  <li class="page-item">
                    <a class="page-link" href="?page=<?php echo $i?>">
                      <?php echo $i?>
                    </a>
                  </li>
                  <?php }else {?>
                    <li class="page-item active" aria-current="page">
                      <span class="page-link"><?php echo $i?></span>
                    </li>
                  <?php }?>
                <?php  }?>
              </ul>
            </nav>
            <?php  }?>
          </div>
        </div>

      </div>
    </section>
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
            <a type="button" id="delete-confirm" class="btn btn-danger"><i class="fa-solid fa-trash me-2"></i>Suprimer</a>
          </div>
        </div>
      </div>
    </div>
  </main>
  <script src="../vendors/js/bootstrap.bundle.min.js"></script>
  <script src="../vendors/js/feather.min.js"></script>
  <script>
    feather.replace();
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