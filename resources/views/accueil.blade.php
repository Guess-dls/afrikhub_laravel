@extends('heritage')
@section('titre', 'accueil')
@section('ux-ui')
    <link rel="stylesheet" href="{{ asset('assets/css/accueil.css') }}">
@endsection

@section('contenu')
    <!-- HEADER -->
    <header class="p-1">
      <div class="col-12 row m-0 align-items-center">
        <div class="col-lg-2 col-md-2 col-3">
          <img class="img-fluid" src="../../public/logo/logo_01.png" alt="Afrik'Hub Logo" />
        </div>
        
        <!-- NAVIGATION CORRIGÉE -->
        <nav class="col-lg-10 col-md-10 col-9">
          <!-- 
            
          <ul class="d-flex justify-content-end py-2 align-items-center m-0 p-0" style="list-style: none;">
            
            <!-- Liens de bureau -->
            <li class="nav-desktop-item"><a href="{{ route('dashboard') }}" class="bg-dark" aria-label="Connexion"><span class="fa fa-sign-in"></span><span class="badge">connexion</span></a></li>
            <li class="nav-desktop-item"><a href="{{ route('register') }}" class="bg-dark" aria-label="inscription"><span class="fa fa-sign-in"></span><span class="badge">inscription</span></a></li>
            <li class="nav-desktop-item"><a href="{{ route('admin_dashboard') }}" class="bg-danger"><span class="fa fa-user-shield"></span><span class="badge">admin</span></a></li>
            <li class="nav-desktop-item"><a href="#hebergement"><span class="fa fa-home"></span><span class="badge">hébergement</span></a></li>
            <li class="nav-desktop-item"><a href="#location"><span class="fa fa-car"></span><span class="badge">vehicule</span></a></li>
            <li class="nav-desktop-item"><a href="#contact"><span class="fa fa-phone"></span><span class="badge">contact</span></a></li>
            
            <!-- Lien de menu mobile (géré par le CSS) -->
            <li class="nav-item dropdown">
              <a href="#" class="dropdown-toggle">menu</a>
              <ul class="dropdown-menu row m-0 py-2 col-8 col-md-6" aria-label="submenu">
                <li><a class="dropdown-item" href="{{ route('login') }}">connexion</a></li>
                <li><a class="dropdown-item" href="{{ route('register') }}">inscription</a></li>
                <li><a class="dropdown-item" href="../../admins/php/admin_connect.php">admin</a></li>
                <li><a class="dropdown-item" href="#hebergement">Hébergements</a></li>
                <li><a class="dropdown-item" href="#location">Véhicules</a></li>
                <li><a class="dropdown-item" href="#circuits">Circuits</a></li>
                <li><a class="dropdown-item" href="#reservation">Réservation</a></li>
                <li><a class="dropdown-item" href="#contact">Contact</a></li>
              </ul>
            </li>
          </ul>
        </nav>
      </div>
    </header>

    <!-- Section accueil -->
    <section id="accueil" class="text-center py-5">
      <div>
        <h2>Bienvenue</h2>
        <span class="fs-6">Explorez l'Afrique autrement avec Afrik’Hub</span><br><br>
        <a href="../../accueil/php/redirection.php?action=recherche" class="btn-reserver me-2">Réserver</a>
        <a href="../../accueil/php/redirection.php?action=mise_en_ligne" class="btn-reserver">Ajouter un bien</a>
      </div>
    </section>
    
    <!-- Section hébergement -->
    <section id="hebergement" class="my-2 col-12 row m-0 justify-content-center">
      <h2>hébergements</h2>
      <div class="row g-4 align-items-center col-lg-6 col-md-10">
        <div class="col-12">
          <img src="../../public/img/hebergement.jpg" alt="Exemple d'hébergement" />
        </div>

        <div class="col-12">
          <!-- NOTE: L'accordéon fonctionnera maintenant avec le JS de Bootstrap -->
          <div class="accordion" id="accordionHebergement">
            <div class="accordion-item border-0" style="background: #e0f2f1;">
              <h2 class="accordion-header" id="headingTypes">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTypes" aria-expanded="true" aria-controls="collapseTypes">
                  types d'hébergements
                </button>
              </h2>
              <!-- NOTE: 'collapse show' au lieu de 'collapse' si vous voulez qu'il soit ouvert par défaut -->
              <div id="collapseTypes" class="accordion-collapse collapse" aria-labelledby="headingTypes" data-bs-parent="#accordionHebergement">
                <div class="accordion-body">
                  <div class="mb-3 border-0">
                    <div class="d-flex align-items-center justify-content-between"><strong>Studio</strong><span class="toggle-services"><i class="fa fa-chevron-down"></i></span></div>
                    <ul class="services-list mt-2"><li>wifi gratuit</li><li>ventilateur</li><li>caméra de surveillance</li></ul>
                  </div>
                  <div class="mb-3">
                    <div class="d-flex align-items-center justify-content-between"><strong>Chambre unique</strong><span class="toggle-services"><i class="fa fa-chevron-down"></i></span></div>
                    <ul class="services-list mt-2"><li>wifi gratuit</li><li>climatisation</li><li>petit déjeuner inclus</li></ul>
                  </div>
                  <div class="mb-3">
                    <div class="d-flex align-items-center justify-content-between"><strong>Villa avec piscine</strong><span class="toggle-services"><i class="fa fa-chevron-down"></i></span></div>
                    <ul class="services-list mt-2"><li>wifi gratuit</li><li>piscine privée</li><li>climatisation</li><li>parking gratuit</li></ul>
                  </div>
                </div>
              </div>
            </div>

            <div class="accordion-item border-0" style="background: #e0f2f1;">
              <h2 class="accordion-header" id="headingConditions">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseConditions" aria-expanded="false" aria-controls="collapseConditions">
                  conditions de réservation
                </button>
              </h2>
              <div id="collapseConditions" class="accordion-collapse collapse" aria-labelledby="headingConditions" data-bs-parent="#accordionHebergement">
                <div class="accordion-body">
                  <ul>
                    <li>réservation préalable requise</li>
                    <li>acompte de 20% pour confirmation</li>
                    <li>annulation gratuite jusqu'à 48h avant l'arrivée</li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
          <div class="text-center">
            <a href="../../annexe/php/recherche.php" class="btn-reserver">réserver</a>
          </div>
        </div>
      </div>
    </section>
@endsection

@section('footer')
    <footer>
        <p id="contact">&copy; 2025 afrik’hub. tous droits réservés.<br />afrikhub@gmail.com</p>
    </footer>
@endsection

    <!-- Scripts -->
@section('script')
    <!-- 
      NOTE: Le script personnalisé pour l'accordéon a été SUPPRIMÉ.
      Celui de Bootstrap ci-dessous est suffisant.
    -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" defer></script>
@endsection
