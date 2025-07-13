<x-app-layout>
    <style>
        form {
            max-width: 600px;
            margin: 2rem auto;
            padding: 2rem;
            background-color: #fefefe;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
            font-family: 'Georgia', serif;
            color: #333;
        }
        label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: bold;
            font-family: 'Merriweather', serif;
            color: #5a3e1b;
        }
        input[type="text"],
        input[type="number"] {
            width: 100%;
            padding: 0.5rem;
            margin-bottom: 1.5rem;
            border: 1px solid #b98355;
            border-radius: 6px;
            box-shadow: inset 0 1px 3px rgba(185,131,85,0.2);
            font-family: 'Georgia', serif;
            color: #4a4a4a;
            transition: border-color 0.3s ease;
        }
        input[type="text"]:focus,
        input[type="number"]:focus {
            border-color: #946a43;
            outline: none;
            box-shadow: 0 0 5px #946a43;
        }
        button {
            background-color: #b98355;
            border: none;
            padding: 0.75rem 1.5rem;
            border-radius: 6px;
            box-shadow: 0 2px 6px rgba(185,131,85,0.5);
            color: white;
            font-weight: bold;
            cursor: pointer;
            font-family: 'Georgia', serif;
            transition: background-color 0.3s ease;
        }
        button:hover {
            background-color: #946a43;
        }
        h1 {
            text-align: center;
            font-family: 'Merriweather', serif;
            color:rgb(255, 255, 255);
            margin-bottom: 2rem;
        }
    </style>

    <h1>Modifier l'avis</h1>

    <form action="{{ route('reviews.update', $review->id) }}" method="POST">
        @csrf
        @method('PATCH')

        <label for="comment">Commentaire:</label>
        <input type="text" name="comment" id="comment" value="{{ old('comment', $review->comment) }}" required>

        <label for="rating">Note (1-5):</label>
        <input type="number" name="rating" id="rating" min="1" max="5" value="{{ old('rating', $review->rating) }}" required>

        <button type="submit">Mettre à jour</button>
    </form>
</x-app-layout>
