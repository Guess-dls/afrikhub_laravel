<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil Afrik'Hub (Test Offcanvas)</title>
    
    <!-- Liens Bootstrap et Font Awesome -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <style>
        /* * CSS MIS À JOUR pour le OFFCANVAS * */
        
        /* ---------------- OFFCANVAS CUSTOM STYLE ---------------- */
        
        /* En-tête du Offcanvas (Sidebar) */
        .offcanvas-header {
            background: linear-gradient(135deg, #006d77, #00afb9); /* Votre dégradé */
            color: white;
            border-bottom: none;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }

        .offcanvas-title {
            font-weight: 700;
            font-size: 1.5rem;
        }

        /* Bouton de fermeture (blanc sur le fond sombre) */
        .offcanvas .btn-close {
            filter: invert(1) grayscale(100%) brightness(200%); /* Rend le X blanc */
            opacity: 1;
        }

        /* Corps du Offcanvas */
        .offcanvas-body {
            padding: 0;
        }

        /* Styles des éléments de la liste */
        .offcanvas-body .list-group-item {
            border-left: none;
            border-right: none;
            padding: 15px 20px;
            font-size: 1.1rem;
            transition: background-color 0.3s ease, border-left 0.3s ease;
        }

        /* Style des liens à l'intérieur */
        .offcanvas-body .list-group-item a {
            color: #006d77;
            text-decoration: none;
            font-weight: 600;
            display: block;
            transition: color 0.3s ease;
        }

        /* Effet de survol */
        .offcanvas-body .list-group-item:hover {
            background-color: #e0f7fa; /* Couleur de fond très claire */
            border-left: 5px solid #00afb9; /* Bordure d'accentuation à gauche */
        }
        
        .offcanvas-body .list-group-item:hover a {
            color: #004d40;
        }


        /* ---------------- HEADER ET NAV ---------------- */

        header {
          position: fixed;
          top: 0;
          left: 0;
          right: 0;
          height: 70px;
          background: linear-gradient(135deg, #006d77, #00afb9);
          color: white;
          box-shadow: 0 4px 12px rgba(0,0,0,0.2);
          z-index: 1000;
          padding: 0 1rem;
          display: flex;  
          align-items: center;
          justify-content: space-between;
        }

        /* Compense la hauteur du header pour le contenu */
        main, section {
          padding-top: 70px;
        }

        header img {
          max-height: 60px;
          object-fit: contain;
        }
        
        /* Styles pour les liens de bureau */
        .nav-desktop-links a {
            color: white;
            text-decoration: none;
            padding: 0.5rem 1rem;
            border-radius: 50px;
            transition: all 0.3s ease;
            font-weight: 600;
            text-align: center;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .nav-desktop-links a .fa {
            font-size: 20px;
        }
        
        .nav-desktop-links a .badge {
            font-size: 12px;
            margin-top: 3px;
            text-transform: capitalize;
        }

        .nav-desktop-links a.bg-danger { background-color: #dc3545; }
        .nav-desktop-links a.bg-dark { background-color: #343a40; }

        .nav-desktop-links a:hover {
          background-color: rgba(255,255,255,0.2);
          color: #fff;
        }
        
        /* ---------------- SECTION ACCUEIL ---------------- */
        #accueil {
        background: linear-gradient(rgba(0,91,107,0.7), rgba(0,91,107,0.5)),  
               url('https://placehold.co/1920x700/555555/eeeeee?text=Image+d%27Accueil')  
               no-repeat center center / cover;  
        height: 700px;
          display: flex;
          align-items: center;
          justify-content: center;
          text-align: center;
          padding: 0 1rem;
          color: white;
          position: relative;
        }

        #accueil h2 {
          font-size: clamp(2.5rem, 6vw, 5rem);
          font-weight: 900;
          line-height: 1.1;
          margin-bottom: 0.3rem;
          text-shadow: 3px 3px 10px rgba(0,0,0,0.6);
        }

        #accueil span.fs-6 {
          font-size: clamp(1rem, 2vw, 1.25rem);
          font-weight: 400;
          text-shadow: 2px 2px 8px rgba(0,0,0,0.5);
        }

        /* ---------------- SECTION HÉBERGEMENT ---------------- */
        #hebergement {
          padding: 3rem 1rem;
          background: #e0f2f1;
          color: #004d40;
          border-radius: 20px;
          box-shadow: 0 8px 24px rgba(0,0,0,0.15);
          margin: 3rem auto;
          transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        #hebergement:hover {
          transform: translateY(-5px);
          box-shadow: 0 12px 32px rgba(0,0,0,0.25);
        }

        #hebergement h2 {
          font-weight: 800;
          margin-bottom: 2rem;
          text-align: center;
          font-size: 2.8rem;
          color: #006d77;
          text-transform: uppercase;
          letter-spacing: 2px;
        }

        #hebergement img {
          border-radius: 15px;
          box-shadow: 0 8px 18px rgba(0,0,0,0.2);
          width: 100%;
          height: auto;
          object-fit: cover;
          transition: transform 0.3s ease;
        }

        #hebergement img:hover { transform: scale(1.05); }

        /* Accordion */
        .accordion-button {
          background: linear-gradient(135deg, #006d77, #00afb9) !important;
          color: white !important;
          font-weight: 700;
          border-radius: 12px !important;
          transition: all 0.3s ease;
        }

        .accordion-button:not(.collapsed) {
          background: linear-gradient(135deg, #004d55, #007f7a) !important;
          color: #fff;
        }

        .accordion-body {
          font-weight: 600;
          color: #004d40;
        }
        .services-list {
          list-style: none;
          padding-left: 0;
        }
        
        .services-list li {
          padding: 8px 0;
          transition: transform 0.2s ease, background 0.3s ease;
        }

        .services-list li:hover {
          background: rgba(0,109,119,0.1);
          transform: translateX(5px);
        }

        .toggle-services i {
          transition: transform 0.3s ease, color 0.3s ease;
        }

        .toggle-services:hover i { color: #004d40; }


        .btn-reserver {
            display: inline-block;
            padding: 12px 28px;
            font-size: 18px;
            font-weight: bold;
            color: #fff;
            background: #007bff;
            border-radius: 30px;
            text-decoration: none;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
            transition: background 0.3s ease, transform 0.2s ease;
        }

        .btn-reserver:hover {
            background: #0056b3;
            transform: translateY(-2px);
        }

        /* ---------------- FOOTER ---------------- */
        footer {
          background: linear-gradient(135deg, #006d77, #00afb9);
          color: white;
          padding: 1.5rem;
          text-align: center;
          font-size: 0.95rem;
          letter-spacing: 1px;
        }

        /* ---------------- RESPONSIVE ---------------- */
        @media (max-width: 992px) { /* La taille par défaut de Bootstrap pour cacher la nav est 992px */
          .nav-desktop-links { 
            display: none !important; 
          }
        }
        @media (max-width: 768px) {
          #hebergement { padding: 2rem 1rem; }
          #hebergement h2 { font-size: 2rem; }
          .accordion-button { font-size: 1rem !important; padding: 0.75rem 1rem !important; }
          .btn-reserver { font-size: 1rem; padding: 12px 28px; }
        }
    </style>
</head>
<body>

    <!-- HEADER (Utilise maintenant le bouton Offcanvas) -->
    <header class="p-1">
      <div class="col-12 row m-0 align-items-center">
        <div class="col-lg-2 col-md-2 col-3">
          <!-- NOTE: Image locale remplacée par un placeholder -->
          <img class="img-fluid" src="https://placehold.co/200x60/006d77/white?text=Afrik'Hub" alt="Afrik'Hub Logo" />
        </div>
        
        <nav class="col-lg-10 col-md-10 col-9 d-flex justify-content-end align-items-center">
          
          <!-- LIENS DE BUREAU (Visibles sur grand écran) -->
          <ul class="nav-desktop-links d-none d-lg-flex list-unstyled m-0 p-0 gap-3">
            <li><a href="#" class="bg-dark" aria-label="Connexion"><span class="fa fa-sign-in"></span><span class="badge">connexion</span></a></li>
            <li><a href="#" class="bg-dark" aria-label="inscription"><span class="fa fa-sign-in"></span><span class="badge">inscription</span></a></li>
            <li><a href="#" class="bg-danger"><span class="fa fa-user-shield"></span><span class="badge">admin</span></a></li>
            <li><a href="#hebergement"><span class="fa fa-home"></span><span class="badge">hébergement</span></a></li>
            <li><a href="#location"><span class="fa fa-car"></span><span class="badge">vehicule</span></a></li>
            <li><a href="#contact"><span class="fa fa-phone"></span><span class="badge">contact</span></a></li>
          </ul>

          <!-- BOUTON MOBILE (Visible sur petit écran) -->
          <button class="btn d-lg-none" type="button" data-bs-toggle="offcanvas" data-bs-target="#mobileSidebar" aria-controls="mobileSidebar">
            <span class="fa fa-bars fs-4" style="color: white;"></span>
          </button>
        </nav>
      </div>
    </header>

    <!-- LE OFFCANVAS (Votre SIDEBAR) -->
    <div class="offcanvas offcanvas-end" tabindex="-1" id="mobileSidebar" aria-labelledby="mobileSidebarLabel">
      <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="mobileSidebarLabel">Menu Afrik'Hub</h5>
        <!-- Utilise btn-close-white avec le filtre CSS ci-dessus pour un meilleur contraste -->
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>
      <div class="offcanvas-body">
        <ul class="list-group list-group-flush">
          <!-- J'ajoute data-bs-dismiss="offcanvas" pour que le menu se ferme après un clic sur un lien interne -->
          <li class="list-group-item"><a href="#" data-bs-dismiss="offcanvas">Connexion</a></li>
          <li class="list-group-item"><a href="#" data-bs-dismiss="offcanvas">Inscription</a></li>
          <li class="list-group-item"><a href="#" data-bs-dismiss="offcanvas">Admin</a></li>
          <li class="list-group-item"><a href="#hebergement" data-bs-dismiss="offcanvas">Hébergements</a></li>
          <li class="list-group-item"><a href="#location" data-bs-dismiss="offcanvas">Véhicules</a></li>
          <li class="list-group-item"><a href="#circuits" data-bs-dismiss="offcanvas">Circuits</a></li>
          <li class="list-group-item"><a href="#reservation" data-bs-dismiss="offcanvas">Réservation</a></li>
          <li class="list-group-item"><a href="#contact" data-bs-dismiss="offcanvas">Contact</a></li>
        </ul>
      </div>
    </div>

    <!-- Contenu Principal -->
    <main>
        <!-- Section accueil -->
        <section id="accueil" class="text-center py-5">
          <div>
            <h2>Bienvenue</h2>
            <span class="fs-6">Explorez l'Afrique autrement avec Afrik’Hub</span><br><br>
            <a href="#" class="btn-reserver me-2">Réserver</a>
            <a href="#" class="btn-reserver">Ajouter un bien</a>
          </div>
        </section>
        
        <!-- Section hébergement -->
        <section id="hebergement" class="my-2 col-12 row m-0 justify-content-center">
          <h2>hébergements</h2>
          <div class="row g-4 align-items-center col-lg-6 col-md-10">
            <div class="col-12">
              <img src="https://placehold.co/600x400/00afb9/white?text=Hébergement" alt="Exemple d'hébergement" />
            </div>

            <div class="col-12">
              <div class="accordion" id="accordionHebergement">
                <div class="accordion-item border-0" style="background: #e0f2f1;">
                  <h2 class="accordion-header" id="headingTypes">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTypes" aria-expanded="true" aria-controls="collapseTypes">
                      types d'hébergements
                    </button>
                  </h2>
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
                      <ul class="services-list" style="list-style: disc; padding-left: 20px;">
                        <li>réservation préalable requise</li>
                        <li>acompte de 20% pour confirmation</li>
                        <li>annulation gratuite jusqu'à 48h avant l'arrivée</li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
              <div class="text-center">
                <a href="#" class="btn-reserver">réserver</a>
              </div>
            </div>
          </div>
        </section>
    </main>

    <footer>
        <p id="contact">&copy; 2025 afrik’hub. tous droits réservés.<br />afrikhub@gmail.com</p>
    </footer>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" defer></script>
    
</body>
</html>
