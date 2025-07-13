<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\Book;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function store(Request $request)
    {
        // Validation des données
        $request->validate([
            'user_id' => 'required|exists:users,id', // Validation pour s'assurer que l'utilisateur existe
            'comment' => 'required|string|max:255',
            'rating' => 'required|integer|between:1,5',
        ]);

        // Removed check to allow multiple reviews per user per book
        /*
        $existingReview = Review::where('book_id', $request->input('book_id'))
            ->where('user_id', $request->input('user_id'))
            ->first();

        if ($existingReview) {
            return redirect()->route('books.show', $request->input('book_id'))
                ->withErrors(['Vous avez déjà laissé un avis pour ce livre.']);
        }
        */

        // Création de l'avis
        Review::create([
            'book_id' => $request->input('book_id'), // Assurez-vous d'envoyer l'ID du livre
            'user_id' => $request->input('user_id'), // Utiliser l'ID de l'utilisateur sélectionné
            'comment' => $request->input('comment'),
            'rating' => $request->input('rating'),
        ]);

        // Redirection vers la page de détails du livre avec un message de succès
        return redirect()->route('books.show', $request->input('book_id'))->with('success', 'Avis ajouté avec succès !');
    }

    public function edit($id)
    {
        $review = Review::findOrFail($id);

        return view('reviews.edit', compact('review'));
    }

    public function update(Request $request, $id)
    {
        $review = Review::findOrFail($id);

        $request->validate([
            'comment' => 'required|string|max:255',
            'rating' => 'required|integer|between:1,5',
        ]);

        $review->update([
            'comment' => $request->input('comment'),
            'rating' => $request->input('rating'),
        ]);

        return redirect()->route('books.show', $review->book_id)->with('success', 'Avis mis à jour avec succès !');
    }

    public function destroy($id)
    {
        $review = Review::findOrFail($id);

        $review->delete();

        return redirect()->back()->with('success', 'Avis supprimé avec succès !');
    }
}
