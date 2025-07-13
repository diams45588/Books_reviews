<x-app-layout>
    <style>
        a.edit-button {
            text-decoration: none;
            color: gold;
        }
        section {
            background-image: url('images/covers/library.jpeg');
            background-size: cover;
            background-position: center;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
            padding: 2rem;
            margin-bottom: 2rem;
            font-family: 'Georgia', serif;
            color: #333;
        }
        h1, h2 {
            font-family: 'Merriweather', serif;
            color:rgb(255, 255, 255);
        }
        p, label, button {
            font-family: 'Georgia', serif;
            color:rgb(255, 255, 255);
        }
        a.edit-button {
            background-color: #b98355;
            padding: 0.5rem 1rem;
            border-radius: 6px;
            box-shadow: 0 2px 6px rgba(185,131,85,0.5);
            transition: background-color 0.3s ease;
        }
        a.edit-button:hover {
            background-color: #946a43;
            text-decoration: none;
            color: white;
        }
        button {
            background-color: #b98355;
            border: none;
            padding: 0.5rem 1rem;
            border-radius: 6px;
            box-shadow: 0 2px 6px rgba(185,131,85,0.5);
            color: white;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        button:hover {
            background-color: #946a43;
        }
        input, select {
            border: 1px solid #b98355;
            border-radius: 6px;
            padding: 0.5rem;
            transition: border-color 0.3s ease;
        }
        input:focus, select:focus {
            border-color: #946a43;
            outline: none;
            box-shadow: 0 0 5px #946a43;
        }
    </style>
    <section class="max-w-4xl mx-auto rounded shadow-md">
        <h1 class="text-4xl font-bold mb-4 font-serif">{{ $book->title }}</h1>
        <p class="text-lg mb-6 font-serif">Auteur: {{ $book->author }}</p>
        <p class="mb-8 font-serif">{{ $book->description }}</p>

        <section class="mb-10 rounded-lg p-6 shadow-lg">
            <h2 class="text-3xl font-semibold mb-6 flex items-center justify-between font-serif">
                Avis
                @if($averageRating)
                    <span class="text-yellow-500 font-bold text-xl">Note moyenne: {{ number_format($averageRating, 2) }} / 5</span>
                @endif
            </h2>
            @forelse ($reviews as $review)
                <div class="border rounded p-6 mb-6 shadow-md hover:shadow-lg transition-shadow duration-300">
                    <p class="mb-4 text-lg italic font-serif">"{{ $review->comment }}"</p>
                    <p class="mb-2 font-semibold">Note: <span class="text-yellow-500">{{ $review->rating }} / 5</span></p>
                    <p class="mb-2 text-sm font-serif">Utilisateur: {{ $review->user->name }}</p>
                    <div class="flex flex-wrap gap-4 mt-4">
                        <a href="{{ route('reviews.edit', $review->id) }}" class="edit-button">
                            Modifier
                        </a>
                        <form action="{{ route('reviews.destroy', $review->id) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet avis ?')">
                                Supprimer
                            </button>
                        </form>
                    </div>
                </div>
            @empty
                <p class="italic font-serif">Aucun avis pour ce livre.</p>
            @endforelse

            {{ $reviews->links() }}
        </section>

        <section>
            <h2 class="text-2xl font-semibold mb-4 font-serif">Ajouter un avis</h2>
            <form action="{{ route('reviews.store') }}" method="POST" class="space-y-6 rounded-lg shadow-md">
                @csrf
                <input type="hidden" name="book_id" value="{{ $book->id }}">

                <label for="user_id" class="block font-semibold mb-2 font-serif">Choisir l'utilisateur:</label>
                <select name="user_id" id="user_id" required>
                    <option value="" disabled selected>-- Sélectionnez un utilisateur --</option>
                    @foreach ($users as $user)
                        <option value="{{ $user->id }}" @if($user->id === $currentUserId) selected @endif>{{ $user->name }}</option>
                    @endforeach
                </select>

                <label for="comment" class="block font-semibold mb-2 font-serif">Commentaire:</label>
                <input type="text" name="comment" id="comment" placeholder="Votre commentaire" required>

                <label for="rating" class="block font-semibold mb-2 font-serif">Note (1-5):</label>
                <input type="number" name="rating" id="rating" min="1" max="5" placeholder="Note (1-5)" required>

                <button type="submit">Ajouter un avis</button>
            </form>
        </section>
    </section>
</x-app-layout>
