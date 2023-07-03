<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;


class MovieController extends Controller
{
    // Méthode list qui retourne tous les films
    public function list()
    {
        // Utilisation de la méthode all grâce à l'héritage(récupérant tous les films)
        $movies = Movie::all();
        // Retour sous format JSON
        return response()->json($movies);
    }

    public function create(Request $request)
    {
        // Récupération des la valeur du champ "title" envoyé dans la requête
        $title = $request->input('title');

        // On crée une nouvelle instance, puis on lui définit la propriété "title"
        $movie = new Movie();
        $movie->title = $title;

        // On sauvegarde, puis on gère la réponse avec le code HTTP qui convient
        // 201 : Created ou bien 500 : Internal Server Error
        if ($movie->save()) {
            return response()->json($movie, 201);
        } else {
            return response(null, 500);
        }
    }

    public function read($id)
    {
        // Récupère l'élément recherché, s'il n'existe pas, lève une exception
        $movie = Movie::findOrFail($id);

        // On renvoie la task au format JSON
        return $movie;
    }

    public function update(Request $request, $id)
    {
        // On recherche avec l'id
        $movie = Movie::find($id);
        // Si on n'a rien, on ne peut pas faire de mise à jour donc: 404 : not found
        if (!$movie) {
            return response(null, 404);
        }

        // Récupération des la valeur du champ "title" envoyé dans la requête
        $title = $request->input('title');

        $movie->title = $title;

        // On sauvegarde, puis on gère la réponse avec le code HTTP qui convient
        // 500 : Internal Server Error
        if ($movie->save()) {
            return response()->json($movie);
        } else {
            return response(null, 500);
        }
    }

    public function delete($id)
    {
        // On recherche avec l'id
        $movie = Movie::find($id);
        // Si on n'a rien, on ne peut pas faire de mise à jour donc: 404 : not found
        if (!$movie) {
            return response(null, 404);
        }

        // On supprime puis on gère la réponse avec le code HTTP qui convient
        // 200 : ok ou 500 : Internal Server Error
        if ($movie->delete()) {
            return response(null, 200);
        } else {
            return response(null, 500);
        }
    }
}
