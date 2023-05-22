<div class="bg-secondary py-4">
  <div class="container d-flex flex-column align-items-center">
    <h5 class="text-center poppins fw-bold">Voullez-vous être allerter sur toutes nouveautés? <br>Inscrivez-vous dans notre newsletter dés maintenant!</h5>
    <button class="btn bg-primary rounded-pill text-white px-5 py-3 mt-4" data-bs-toggle="modal" data-bs-target="#newsLetterModal">S'inscrire maintenant</button>
  </div>
</div>
<div class="modal fade" id="newsLetterModal" tabindex="-1" aria-labelledby="newsLetterModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" style="max-width: 45rem">
    <div class="modal-content shadow" style="border-radius: 0; border: 0;"> 
      <div class="modal-body p-0 d-flex flex-column h-100">
      <div class="row w-100 p-0">
        <div class="col-md-5 newsletter-bg">
        </div>
        <div class="col-md-7 ps-3 pt-3">
            <div class="d-flex align-items-start">
              <h3 class="poppins fw-bold pt-3">Inscrivez-vous maintenant</h3>
              <button type="button" class="btn-close ms-auto" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <p class="text-muted">
              Soiyez notifier et découvrez les nouveautés exclusives et profitez d'avantages exceptionnels!
            </p>
            <form action="">
              <label class="form-label text-muted" for="newsletter-email">Entrer votre addresse email:</label>
              <div class="mb-2">
                <input id="newsletter-email" class="form-control mb-2" type="email" name="newsletter-email" placeholder="exemple@email.com">
                <button class="btn cta-btn w-100">S'inscrire</button>
              </div>
              <div class="d-flex justify-content-center">
                <input type="checkbox" name="notifitier-tous" id="notify-all">
                <label for="notify-all" class="ms-2 text-muted" style="font-size: 0.8rem;">Notifier moi aussi de tous les autres produits.</label>
              </div>
            </form>
            <p class="text-muted text-center mt-2" style="font-size: 0.6rem;">*Note : Vos données n'aurons pas être partager avec autre personnes/organisation</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<footer class="footer-bg pt-4">
  <div class="container text-white py-5">
    <div class="row">
      <div class="col-md-4">
        <h3 class="poppins fw-bold">Explorer</h3>
        <p>Explorer notre site, pour savoir plus.</p>

        <ul class="nav flex-column ps-3">
          <li>Accueil</li>
          <li>A propos</li>
          <li>Termes d'utilisation</li>
          <li>Être partenaire</li>
          <li>Site map</li>
        </ul>
      </div>
      <div class="col-md-4">
        <h3 class="poppins fw-bold">Support</h3>
        <p>Le support est la pour vous 24/7.</p>
        <ul class="nav flex-column ps-3">
          <li>Manuel d'utilisateur</li>
          <li>Contacter Support</li>
          <li>Repoter un beugue</li>
          <li>Signaler</li>
        </ul>

      </div>
      <div class="col-md-4">
        <h3 class="poppins fw-bold">Contacter Nous</h3>
        <form action="">
          <input type="email" name="contact-email" class="form-control mb-2" placeholder="Votre email...">
          <textarea name="contact-message" class="form-control mb-2" rows="4" placeholder="Votre message..."></textarea>
          <button class="btn bg-secondary fw-bold px-5 py-2">Envoyer</button>
        </form>
      </div>
    </div>
  </div>
  <div class="py-2" style="background-color: #06334b;">
    <div class="container">
      <p class="text-light text-small mb-0 text-center poppins">
        &copy; Créer avec 💻 par Mohammed Hakmi & Zakariya Elassri - 2023 ✌
      </p>
    </div>
  </div>
</footer>