<x-layouts.base>
    <x-slot name="css">
        <link rel="stylesheet" href="{{ asset('css/pages/home.css') }}">
    </x-slot>
   {{-- Hero section --}}
   <section id="hero" class="py-36">
        <div class="container mx-auto p-4">
            <div class="text-center text-white mb-10">
                <h1 class="title1">Construire un monde meilleur, un étudiant à la fois</h1>
                <p class="text-xl text-white">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nisi diam pharetra enim vivamus id consequat nibh. </p>
            </div>
            <div class="flex justify-center">
                <a href="#" class="btn-primary">
                    Voir nos resources
                </a>
            </div>
        </div>
   </section>

   {{-- presentation --}}
   <section class="py-16">
       <div class="container mx-auto lg:flex gap-4 p-4">
            <div class="lg:w-1/3">
                <img src="https://thumbs.dreamstime.com/b/default-avatar-profile-icon-vector-social-media-user-photo-183042379.jpg" alt="Directeur">
            </div>

            <div class="w-2/3 flex items-center">
                <div class="">
                    <h2 class="title2 text-primary-500 mb-4">Porta nec, lacinia tellus ultricies</h2>
                    <div class="mb-4">
                        <p>
                            “Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lacus consequat urna faucibus imperdiet et aliquam viverra. Porta nec, lacinia tellus ultricies quis interdum.
                        </p> 
                        <p>
                            Egestas augue tristique amet, nullam nisl, tellus. Faucibus suspendisse lorem elit proin nulla tincidunt neque maecenas at. Quis ultrices ultrices euismod egestas morbi dictumst facilisis proin viverra”
                        </p>
                    </div>
                    <div class="text-base text-gray-500">
                        <span class="block font-extrabold">Wade Wilson</span>
                        <span>Directeur</span>
                    </div>
                </div>
            </div>
       </div>
   </section>

</x-layouts.base>
