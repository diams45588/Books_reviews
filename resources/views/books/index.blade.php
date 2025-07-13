<x-app-layout>
    <div class="container">
        <h1>Liste des Livres</h1>
        <div class="book-list">
            @if($books->isEmpty())
                <p>Aucun livre disponible.</p>
            @else
                @foreach ($books as $book)
                    <div class="book-item">
                        <img src="{{ asset('images/covers/' . $book->cover_image) }}" alt="{{ $book->title }} Cover" class="book-cover">
                        <h2>{{ $book->title }}</h2>
                        <p>Auteur : {{ $book->author }}</p>
                        @php
                            $avgRating = $book->averageRating();
                        @endphp
                        <p>Note: 
                            @if($avgRating)
                                {{ number_format($avgRating, 1) }} / 5
                            @else
                                pas encore de note
                            @endif
                        </p>
                        <a href="{{ route('books.show', $book->id) }}" class="details-button">Détails</a>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
</x-app-layout>
