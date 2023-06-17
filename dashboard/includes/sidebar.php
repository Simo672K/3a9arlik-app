<aside class="sidebar" style="border-right: solid 1px #dedede">
  <div class="sidebar-inner">
    <div class="py-1 px-2">
      <a href="index.php">
        <img src="../assets/images/logo.png" style="height:60px;" alt="3a9arlik logo" class="logo">
      </a>
    </div>
    <div class="mt-1 pt-1 sidebar-nav-container d-flex flex-column">
      <ul class="nav sidebar-nav">
        <li class="sidebar-item">
          <a class="sidebar-link active" href="index.php">
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
                <a href="all-posts.php" class="collapse-link">
                  Tous les postes
                </a>
              </li>
              <li class="collapse-item">
                <a href="add-post.php" class="collapse-link">
                  Ajouter un poste
                </a>
              </li>
            </ul>
          </div>
        </li>
        <li class="sidebar-item"><a class="sidebar-link" href="profile.php">
            <i class="fa-solid fa-user me-2"></i> Profile</a>
        </li>
        <li class="sidebar-item"><a class="sidebar-link" href="#">
            <i class="fa-solid fa-gear me-2"></i> Paramètres</a>
        </li>
      </ul>
      <div class="sidebar-item mt-auto mb-2"><a class="sidebar-link" href="../logout.php">
          <i class="fa-solid fa-right-from-bracket me-2"></i> Se deconnecter</a>
      </div>
    </div>
  </div>
</aside>