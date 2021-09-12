<x-layouts.base>

    <section class="py-12">
        <div class="container mx-auto px-4 flex flex-wrap">
            <div class="w-full lg:w-1/4 mb-4 lg:mb-0">
                <h2 class="title1 text-primary-500">Resources</h2>
            </div>

            <div class="w-full lg:w-3/4">
                <form action="#" class="flex">
                    <input class="w-full mr-8 p-2 shadow-mg rounded-md border-2 border-gray-200" type="search" placeholder="Rechercher...">
                    <div class="">
                        <div class="btn-primary h-full flex items-center">
                            Rechercher
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <section class="py-12">
        <div class="container mx-auto px-4">

            <div class="w-full flex flex-wrap">

                <div class="w-full lg:w-1/4 lg:pr-8">
                    <h4>Filtrer par:</h4>

                    <div class="mb-8">
                        <h4 class="title3">Niveaux</h4>

                        <div class="p-4 rounded shadow-md bg-gray-50">
                            <span class="text-lg font-bold">
                                Primaire - College - Lycee
                            </span>
                        </div>
                    </div>

                    <div class="mb-8">
                        <h4 class="title3">Années</h4>

                        <div class="p-4 rounded shadow-md bg-gray-50">
                            <span class="text-lg font-bold">
                                1er - 2eme - 3eme
                            </span>
                        </div>
                    </div>

                    <div class="mb-8">
                        <h4 class="title3">Matière</h4>

                        <div class="p-4 rounded shadow-md bg-gray-50">
                            <span class="text-lg font-bold">
                                Math - Physique - Arabe
                            </span>
                        </div>
                    </div>
                </div>

                <div class="w-full lg:w-3/4 rounded-lg shadow-md p-4">
                    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-4 mb-8">
                        <style>
                            .resource p {
                                color: white !important;
                            }
                        </style>
                        @foreach ($resources as $resource)
                            <article class="resource">
                                <a href="{{ route('resources.show', $resource) }}">
                                    <div class="w-full relative ratio-720 bg-gray-400 rounded-md mb-3 overflow-hidden">
                                        <img src="{{ $resource->getImage() }}" alt="Image" class="object-cover absolute-full rounded shadow-md">
                                        <div class="absolute-full bg-black bg-opacity-60 flex items-center">
                                            <div class="p-4">
                                                <div class="h-16 text-white">
                                                    {!! $resource->getIcon() !!}
                                                </div>
            
                                                <h3 class="title3 text-white">{{ \Illuminate\Support\Str::limit($resource->title, 20, $end = '...') }}</h3>
                                                <div class="text-white">
                                                    {!! \Illuminate\Support\Str::limit($resource->description, 20, $end = '...</p>') !!}
                                                </div>
                                                <p class="text-white">{{ $resource->getType() }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </a>
        
                            </article>
                        @endforeach
                    </div>
                    {{-- Pagination --}}
                    {{ $resources->links() }}
        
                </div>

            </div>

        </div>
    </section>

</x-layouts.base>