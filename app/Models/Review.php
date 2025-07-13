<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $fillable = ['book_id', 'user_id', 'rating', 'comment'];

    // Définir la relation avec le modèle Book
    public function book()
    {
        return $this->belongsTo(Book::class); // Un avis appartient à un livre
    }

    // Définir la relation avec le modèle User
    public function user()
    {
        return $this->belongsTo(User::class); // Un avis appartient à un utilisateur
    }
}
