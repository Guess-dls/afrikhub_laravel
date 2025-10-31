
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page d'Accueil Afrik'Hub</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <style>
        body {
          min-height: 100vh;
          display: flex;
          flex-direction: column;
        }
        
        main { flex-grow: 1; background-color: #f8f8f8; }

        header {
          background: linear-gradient(135deg, #006d77, #00afb9);
          color: white;
          box-shadow: 0 4px 12px rgba(0,0,0,0.2);
          padding: .5rem 1rem;
        }

        header img { max-height: 60px; }

        .nav-desktop-links a {
          color: white; text-decoration: none; padding: .5rem 1rem;
          border-radius: 50px; font-weight: 600;
          display: flex; flex-direction: column; align-items: center;
          transition: .3s;
        }

        .nav-desktop-links a:hover { background-color: rgba(255,255,255,.2); }

        /* ---------------- ACCUEIL ---------------- */
        #accueil {
          background: linear-gradient(rgba(0,91,107,0.7), rgba(0,91,107,0.5)),
                      url('https://placehold.co/1920x700/555555/eeeeee?text=Image+d%27Accueil')
                      center/cover no-repeat;
          height: 700px; display:flex; justify-content:center; align-items:center;
          color:white; text-align:center; padding:1rem;
        }

        #accueil h2 { font-size:3.5rem; font-weight:900; text-shadow:3px 3px 8px #000; }

        .btn-reserver {
          display:inline-block; padding:12px 28px; font-size:18px; font-weight:bold;
          color:#fff; background:#007bff; border-radius:30px; text-decoration:none;
          transition:.3s; box-shadow:0 4px 10px rgba(0,0,0,.2);
        }

        .btn-reserver:hover { background:#0056b3; }

        /* ---------------- SECTION HÉBERGEMENT ---------------- */
        #hebergement { background:#e0f2f1; padding:3rem 1rem; border-radius:20px; }

        #hebergement h2 { text-align:center; margin-bottom:2rem; }

        #hebergement img { border-radius:12px; width:100%; box-shadow:0 8px 18px rgba(0,0,0,.2); }

        /* --- ✅ NOUVEL ACCORDÉON CORRIGÉ --- */
        .css-accordion input[type="radio"] { display:none; }

        .accordion-button {
          display:block; padding:1rem; border-radius:12px;
          background:linear-gradient(135deg,#006d77,#00afb9);
          color:white; font-weight:700; cursor:pointer; margin-top:10px; position:relative;
          transition:.3s;
        }

        .accordion-button::after {
          font-family:"FontAwesome"; content:"\f078";
          position:absolute; right:1rem; top:50%; transform:translateY(-50%);
          transition:.3s;
        }

        .css-accordion input[type="radio"]:checked + .accordion-button {
          background:linear-gradient(135deg,#004d55,#007f7a);
        }

        .css-accordion input[type="radio"]:checked + .accordion-button::after {
          transform:translateY(-50%) rotate(180deg);
        }

        .accordion-content {
          max-height:0; overflow:hidden; padding:0 1rem;
          background:#f0fdfd; border-radius:0 0 12px 12px;
          transition:max-height .5s ease, padding .5s ease;
        }

        .css-accordion input[type="radio"]:checked + .accordion-button + .accordion-content {
          max-height:500px; padding:1rem;
        }

        /* -------- Services internes -------- */
        .type-checkbox { display:none; }

        .type-item-label {
            display:flex; justify-content:space-between; font-weight:bold;
            padding:.7rem 0; cursor:pointer; border-bottom:1px solid #bde0df;
        }

        .service-icon { transition:.3s; }

        .type-checkbox:checked + .type-item-label .service-icon {
            transform:rotate(180deg);
        }

        .service-content { max-height:0; overflow:hidden; transition:.4s; padding-left:1rem; }

        .type-checkbox:checked ~ .service-content { max-height:200px; padding-bottom:.8rem; }

        /* ---------------- RESIDENCES ---------------- */
        .residence-card { border:none; border-radius:15px; box-shadow:0 10px 25px rgba(0,0,0,.1); overflow:hidden; }

        footer {
          background:linear-gradient(135deg,#006d77,#00afb9);
          color:white; padding:1.5rem; text-align:center;
        }
    </style>
</head>
<body>

<header class="p-1">
    <div class="row m-0 align-items-center">
        <div class="col-3"><img src="{{ asset('logo/logo_01.png') }}" class="img-fluid"></div>
        <nav class="col d-flex justify-content-end">
          <ul class="nav-desktop-links d-none d-lg-flex list-unstyled gap-3 m-0">
            <li><a href="{{ route('dashboard') }}"><span class="fa fa-sign-in"></span><span class="badge">connexion</span></a></li>
            <li><a href="{{ route('register') }}"><span class="fa fa-user-plus"></span><span class="badge">inscription</span></a></li>
            <li><a href="{{ route('admin_dashboard') }}" class="bg-danger"><span class="fa fa-user-shield"></span><span class="badge">admin</span></a></li>
          </ul>
        </nav>
    </div>
</header>

<main>

<section id="accueil">
  <div>
    <h2>Bienvenue</h2>
    <span>Explorez l'Afrique autrement avec Afrik’Hub</span><br><br>
    <a href="{{ route('recherche') }}" class="btn-reserver">Réserver</a>
    <a href="{{ route('mise_en_ligne') }}" class="btn-reserver">Ajouter un bien</a>
  </div>
</section>

<section id="hebergement" class="container">
  <h2>Hébergements</h2>
  <div class="row align-items-center justify-content-center">
    
    <div class="col-lg-6"><img src="{{ asset('img/hebergement.jpg') }}"></div>

    <div class="col-lg-6 css-accordion">
      
      <input type="radio" name="acc" id="acc1" checked>
      <label for="acc1" class="accordion-button">Types d'hébergements</label>
      <div class="accordion-content">

        <input type="checkbox" id="studio" class="type-checkbox" checked>
        <label for="studio" class="type-item-label">Studio <span class="service-icon"><i class="fa fa-chevron-down"></i></span></label>
        <div class="service-content"><ul><li>wifi</li><li>ventilateur</li><li>sécurité</li></ul></div>

        <input type="checkbox" id="chambre" class="type-checkbox">
        <label for="chambre" class="type-item-label">Chambre unique <span class="service-icon"><i class="fa fa-chevron-down"></i></span></label>
        <div class="service-content"><ul><li>wifi</li><li>clim</li><li>petit déjeuner</li></ul></div>

        <input type="checkbox" id="villa" class="type-checkbox">
        <label for="villa" class="type-item-label">Villa avec piscine <span class="service-icon"><i class="fa fa-chevron-down"></i></span></label>
        <div class="service-content"><ul><li>wifi</li><li>piscine</li><li>parking</li></ul></div>

      </div>

      <input type="radio" name="acc" id="acc2">
      <label for="acc2" class="accordion-button">Conditions de réservation</label>
      <div class="accordion-content">
        <ul><li>20% d'acompte</li><li>Annulation 48h gratuite</li></ul>
      </div>

    </div>

  </div>
</section>

<section id="residences" class="container py-5">
  <h2>Nos Résidences Sélectionnées</h2>

  <div class="row g-4">

    <div class="col-md-4">
      <div class="card residence-card">
        <img src="{{ asset('img/residence_1.jpg') }}">
        <div class="card-body">
          <h5 class="card-title">Résidence Soleil</h5>
        </div>
      </div>
    </div>

  </div>
</section>

</main>

<footer>© 2025 Afrik'Hub - Tous droits réservés</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
