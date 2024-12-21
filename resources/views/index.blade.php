<!-- resources/views/auth/custom/index.blade.php -->

<x-layouts.auth>
    <x-slot name="title">
        Page d'Accueil
    </x-slot>

    <x-slot name="content">
        <div class="text-center mt-20">
            <h1 class="text-2xl font-semibold mb-4">
                Bienvenue sur notre plateforme
            </h1>
            <p class="text-lg mb-6">
                Connectez-vous ou inscrivez-vous pour commencer.
            </p>

            <!-- Liens vers la page de login et d'inscription -->
            <a href="{{ route('login') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
    Se connecter
</a>
            
        </div>
    </x-slot>

</x-layouts.auth>
