<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Residence;
use App\Models\Reservation;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ResidenceController extends Controller
{
    // Affiche le formulaire
    public function create()
    {
        return view('pages.mise_en_ligne');
    }

    // Traite la soumission du formulaire
    public function store(Request $request)
    {
        // Validation des champs
        $request->validate([
            'nom_residence' => 'required|string|max:255',
            'pays' => 'required|string|max:255',
            'ville' => 'required|string|max:255',
            'type_residence' => 'required|string|max:255',
            'nb_chambres' => 'required|integer|min:1',
            'nb_salons' => 'required|integer|min:0',
            'prix_jour' => 'required|numeric|min:1',
            'details_position' => 'required|string|max:255',
            'geolocalisation' => 'required|string|max:255',
            'images.*' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);

        $imagesPath = [];

        if ($request->hasFile('images')) {
            $nomDossier = 'residences/' . Str::slug($request->nom_residence) . '_' . time();

            foreach ($request->file('images') as $image) {
                $path = $image->store($nomDossier, 'public'); // Enregistre dans /storage/app/public/residences/...

// 🔥 Correction importante pour serveur Linux (Laravel Cloud)
$path = str_replace('\\', '/', $path);

$imagesPath[] = $path;
            }
        }

        // Création de la résidence
        Residence::create([
            'proprietaire_id' => Auth::id(), // si vous avez la relation avec User
            'nom' => $request->nom_residence,
            'description' => $request->details_position,
            'nombre_chambres' => $request->nb_chambres,
            'nombre_salons' => $request->nb_salons,
            'prix_journalier' => $request->prix_jour,
            'ville' => $request->ville,
            'pays' => $request->pays,
            'geolocalisation' => $request->geolocalisation,
            'img' => json_encode($imagesPath),
            'statut' => 'en_attente',
        ]);

        return redirect()->route('message')
            ->with('success', '✅ Résidence ajoutée avec succès ! Elle est en attente de validation.');
    }

    public function index()
    {
        // On récupère toutes les résidences du user connecté
        $residences = Residence::where('proprietaire_id', Auth::id())->get();

        // On passe ces résidences à la vue
        return view('pages.residences', compact('residences'));
    }


    public function recherche_img(Request $request)
    {
        $ville = $request->input('ville_quartier');

        // Exemple de requête : récupérer les résidences selon la ville/quartier
        $recherches = Residence::where('ville', 'LIKE', "%{$ville}%")->get();

        // Passer la variable à la vue
        return view('pages.recherche', compact('recherches'));
    }

    // Réserver à nouveau
    public function details($id)
    {
        $residence = Residence::findOrFail($id);
        return view('pages.details', compact('residence'));
    }

    // Réserver à nouveau
    public function dashboard_resi_reserv()
    {
        // Résidences du propriétaire (table residences)
        $residences = Residence::where('proprietaire_id', Auth::id())->get();

        // Réservations confirmées ou gestionnées (table reservations)
        $reservation = Reservation::where('user_id', Auth::id())->get();

        // Passe les deux à la vue
        return view('pages.dashboard', compact('residences', 'reservation'));
    }

    public function occupees()
    {
        // Résidences du propriétaire (table residences)
        $residences = Reservation::where('proprietaire_id', Auth::id())->get();

        // Passe les deux à la vue
        return view('reservations.occupees', compact('residences'));
    }


}
