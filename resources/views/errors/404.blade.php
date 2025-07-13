<x-app-layout>
    <style>
        section {
            max-width: 600px;
            margin: 5rem auto;
            padding: 3rem;
            background-color: #fff;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
            text-align: center;
            font-family: 'Georgia', serif;
            color: #333;
        }
        h1 {
            font-size: 6rem;
            font-weight: 800;
            color: #b83e3e;
            margin-bottom: 1rem;
        }
        h2 {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 1.5rem;
            font-family: 'Merriweather', serif;
            color: #5a3e1b;
        }
        p {
            font-size: 1.25rem;
            margin-bottom: 2rem;
        }
        a {
            display: inline-block;
            background-color:rgb(187, 81, 11);
            color: white;
            padding: 0.75rem 2rem;
            border-radius: 8px;
            font-weight: 600;
            text-decoration: none;
            transition: background-color 0.3s ease;
            font-family: 'Georgia', serif;
        }
        a:hover {
            background-color: brown;
        }
    </style>
    <section class="max-w-4xl mx-auto p-6 bg-white rounded shadow-md text-center">
        <h1 class="text-6xl font-extrabold text-red-600 mb-4">404</h1>
        <h2 class="text-3xl font-bold mb-6">Page non trouvée</h2>
        <p class="text-lg mb-6">Désolé, la page que vous recherchez n'existe pas dans notre bibliothèque.</p>
        <a href="{{ route('books.index') }}" class="inline-block bg-blue-600 text-white px-6 py-3 rounded hover:bg-blue-700 transition-colors duration-300">
            Retour à la liste des livres
        </a>
    </section>
</x-app-layout>
