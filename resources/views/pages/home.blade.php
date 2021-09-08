<x-layouts.base>
    <x-slot name="css">
        <link rel="stylesheet" href="{{ asset('css/pages/home.css') }}">
    </x-slot>
   {{-- Hero section --}}
   <section id="hero" class="py-36 bg-gray-700">
        <div class="container mx-auto">
            <div class="text-center text-white mb-10">
                <h1 class="title1">Construire un monde meilleur, un étudiant à la fois</h1>
                <p class="text-xl">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nisi diam pharetra enim vivamus id consequat nibh. </p>
            </div>
            <div class="flex justify-center">
                <a href="#" class="btn-primary">
                    Voir nos resources
                </a>
            </div>
        </div>
   </section>

</x-layouts.base>
