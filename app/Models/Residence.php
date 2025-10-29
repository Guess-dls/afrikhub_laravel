<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Residence extends Model
{
    use HasFactory;

    protected $table = 'residences';

    protected $fillable = [
        'proprietaire_id', // 👈 ajouté pour l'utilisateur connecté
        'nom',
        'description',
        'nombre_chambres',
        'nombre_salons',
        'prix_journalier',
        'statut',
        'disponible',
        'ville',
        'pays',
        'quartier',
        'adresse',
        'date_disponible_apres',
        'img',
        'geolocalisation',
        'type_residence',
        'autres_details',
        'details_position',
    ];

    protected $casts = [
        'date_disponible_apres' => 'datetime',
        'prix_journalier' => 'decimal:2',
        'disponible' => 'boolean',
        'img' => 'array', // 🔹 JSON des images
    ];

    /**
     * Relation : une résidence appartient à un utilisateur
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'proprietaire_id');
    }

    /**
     * Relation : une résidence peut avoir plusieurs réservations
     */
    public function reservations()
    {
        return $this->hasMany(Reservation::class, 'residence_id');
    }
}
