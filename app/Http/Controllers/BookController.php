<?php

namespace App\Http\Controllers;
use App\Models\Book;
use App\Models\Review;
use App\Models\User;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index() {
        $books = Book::all();
        return view('books.index', compact('books'));
    }

    public function show($id) {
        $book = Book::findOrFail($id);
        $users = User::all();
        $currentUserId = \Illuminate\Support\Facades\Auth::check() ? \Illuminate\Support\Facades\Auth::id() : null;
        $reviews = $book->reviews()->with('user')->paginate(5);
        $averageRating = $book->averageRating();
        return view('books.show', compact('book', 'users', 'currentUserId', 'reviews', 'averageRating'));
    }

    public function store(Request $request)
    {
        // Validation des données
        $request->validate([
            'user_id' => 'required|exists:users,id', // Validation pour s'assurer que l'utilisateur existe
            'comment' => 'required|string|max:255',
            'rating' => 'required|integer|between:1,5',
        ]);

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
    
        public function search(Request $request) {
        $query = $request->input('query');
        $books = Book::where('title', 'LIKE', "%{$query}%")->get(); // Recherche par titre
        return view('books.index', compact('books'));
}

}
