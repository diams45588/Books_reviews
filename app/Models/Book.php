<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'author', 'description', 'published_at', 'cover_image'];

    // Définir la relation avec le modèle Review
    public function reviews()
    {
        return $this->hasMany(Review::class); // Un livre peut avoir plusieurs avis
    }

    // Calculer la note moyenne du livre
    public function averageRating()
    {
        return $this->reviews()->avg('rating');
    }
}
