<?php

namespace App\Models;

//"CoreModel" de Laravel
use Illuminate\Database\Eloquent\Model;

// Création de la classe Movie héritant de toutes les capacités de Model grâce à Eloquent, l'ORM de Laravel
class Movie extends Model
{
    // On indique a Eloquent que ce modèle n'a pas de colonnes created_at ni updated_at
    public $timestamps = false;
}
