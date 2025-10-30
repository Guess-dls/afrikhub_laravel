<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page d'Accueil Afrik'Hub</title>
    
    <!-- Liens Bootstrap et Font Awesome -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- CSS COMPLET ET INLINE COMME DEMANDÉ -->
    <style>
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
        body { padding-top: 70px; } 

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

        /* ---------------- OFFCANVAS CUSTOM STYLE (SIDEBAR MOBILE) ---------------- */

        /* En-tête du Offcanvas (Sidebar) */
        .offcanvas-header {
            background: linear-gradient(135deg, #006d77, #00afb9); /* Dégradé vert-bleu */
            color: white;
            border-bottom: none;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }

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

        /* ---------------- SECTION ACCUEIL ---------------- */
        #accueil {
        /* Placeholder pour l'image d'accueil */
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

        /* Boutons d'action */
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

        /* ---------------- SECTION HÉBERGEMENT ---------------- */
        #hebergement {
          padding: 3rem 1rem;
          background: #e0f2f1;
          color: #004d40;
          border-radius: 20px;
          box-shadow: 0 8px 24px rgba(0,0,0,0.15);
          margin: 3rem auto;
          transition: transform 0.3s ease, box-shadow 0.3s ease;
          max-width: 1100px;
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
        }

        /* Accordion */
        .accordion-button {
          background: linear-gradient(135deg, #006d77, #00afb9) !important;
          color: white !important;
          font-weight: 700;
          border-radius: 12px !important;
          transition: all 0.3s ease;
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
        @media (max-width: 992px) { 
          .nav-desktop-links { 
            display: none !important; 
          }
        }
        @media (max-width: 768px) {
          #hebergement h2 { font-size: 2rem; }
        }
    </style>
</head>
<body>

    <!-- HEADER -->
    <header class="p-1">
      <div class="col-12 row m-0 align-items-center">
        
        <!-- Logo -->
        <div class="col-lg-2 col-md-2 col-3">
          <!-- UTILISATION DE BLADE POUR L'ASSET (Image de votre logo) -->
          <img class="img-fluid" src="{{ asset('logo/logo_01.png') }}" alt="Afrik'Hub Logo" />
        </div>
        
        <!-- NAV -->
        <nav class="col-lg-10 col-md-10 col-9 d-flex justify-content-end align-items-center">
          
          <!-- LIENS DE BUREAU (AVEC ROUTES BLADE) -->
          <ul class="nav-desktop-links d-none d-lg-flex list-unstyled m-0 p-0 gap-3">
            <li><a href="{{ route('dashboard') }}" class="bg-dark" aria-label="Connexion"><span class="fa fa-sign-in"></span><span class="badge">connexion</span></a></li>
            <li><a href="{{ route('register') }}" class="bg-dark" aria-label="Inscription"><span class="fa fa-sign-in"></span><span class="badge">inscription</span></a></li>
            <li><a href="{{ route('admin_dashboard') }}" class="bg-danger"><span class="fa fa-user-shield"></span><span class="badge">admin</span></a></li>
            <li><a href="#hebergement"><span class="fa fa-home"></span><span class="badge">hébergement</span></a></li>
            <li><a href="#location"><span class="fa fa-car"></span><span class="badge">vehicule</span></a></li>
            <li><a href="#contact"><span class="fa fa-phone"></span><span class="badge">contact</span></a></li>
          </ul>

          <!-- BOUTON MOBILE -->
          <button class="btn d-lg-none" type="button" data-bs-toggle="offcanvas" data-bs-target="#mobileSidebar" aria-controls="mobileSidebar">
            <span class="fa fa-bars fs-4" style="color: white;"></span>
          </button>
        </nav>
      </div>
    </header>

    <!-- LE OFFCANVAS (Sidebar Mobile - AVEC ROUTES BLADE) -->
    <div class="offcanvas offcanvas-end" tabindex="-1" id="mobileSidebar" aria-labelledby="mobileSidebarLabel">
      <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="mobileSidebarLabel">Menu Afrik'Hub</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>
      <div class="offcanvas-body">
        <ul class="list-group list-group-flush">
          <li class="list-group-item"><a href="{{ route('login') }}" data-bs-dismiss="offcanvas">Connexion</a></li>
          <li class="list-group-item"><a href="{{ route('register') }}" data-bs-dismiss="offcanvas">Inscription</a></li>
          <li class="list-group-item"><a href="{{ route('admin_connect') }}" data-bs-dismiss="offcanvas">Admin</a></li> 
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
            <!-- BOUTONS AVEC ROUTES BLADE -->
            <a href="{{ route('recherche', ['action' => 'recherche']) }}" class="btn-reserver me-2">Réserver</a>
            <a href="{{ route('mise_en_ligne', ['action' => 'mise_en_ligne']) }}" class="btn-reserver">Ajouter un bien</a>
          </div>
        </section>
        
        <!-- Section hébergement -->
        <section id="hebergement" class="my-2 col-12 row m-0 justify-content-center">
          <h2>hébergements</h2>
          <div class="row g-4 align-items-center col-lg-6 col-md-10">
            <div class="col-12">
              <!-- UTILISATION DE BLADE POUR L'IMAGE -->
              <img src="{{ asset('img/hebergement.jpg') }}" alt="Exemple d'hébergement" /> 
            </div>

            <div class="col-12">
              <div class="accordion" id="accordionHebergement">
                <!-- ACCORDION CONTENU -->
                <div class="accordion-item border-0" style="background: #e0f2f1;">
                  <h2 class="accordion-header" id="headingTypes">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTypes" aria-expanded="true" aria-controls="collapseTypes">
                      types d'hébergements
                    </button>
                  </h2>
                  <div id="collapseTypes" class="accordion-collapse collapse" aria-labelledby="headingTypes" data-bs-parent="#accordionHebergement">
                    <div class="accordion-body">
                      <!-- Listes Studio, Chambre, Villa -->
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
                      <!-- Contenu des conditions -->
                    </div>
                  </div>
                </div>
              </div>
              <div class="text-center mt-4">
                <!-- BOUTON AVEC ROUTE BLADE -->
                <a href="{{ route('recherche') }}" class="btn-reserver">réserver</a>
              </div>
            </div>
          </div>
        </section>
        
        <!-- ANCRAGES POUR LE MENU (Location, Circuits, Réservation) -->
        <section id="location" style="height: 100px; text-align: center; padding: 20px;">
            <h3 style="color: #006d77;">Ancrage Location de Véhicule</h3>
        </section>
        <section id="circuits" style="height: 100px; text-align: center; padding: 20px; background-color: #f0f0f0;">
            <h3 style="color: #006d77;">Ancrage Circuits</h3>
        </section>
        <section id="reservation" style="height: 100px; text-align: center; padding: 20px;">
            <h3 style="color: #006d77;">Ancrage Réservation</h3>
        </section>
    </main>

    <footer>
        <p id="contact">&copy; 2025 afrik’hub. tous droits réservés.<br />afrikhub@gmail.com</p>
    </footer>

    <!-- Scripts Bootstrap (pour le Offcanvas) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" defer></script>
    
</body>
</html>
