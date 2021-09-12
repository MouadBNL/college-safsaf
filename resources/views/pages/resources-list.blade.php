<x-layouts.base>
    <section class="py-16">
        <div class="container mx-auto px-4">

            @foreach ($lessons as $lesson)
                <div class="mb-12">
                    <div class="flex items-center">
                        <span class="flex items-center justify-center bg-primary-500 text-white h-12 w-12 rounded-2xl mr-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 19a2 2 0 01-2-2V7a2 2 0 012-2h4l2 2h4a2 2 0 012 2v1M5 19h14a2 2 0 002-2v-5a2 2 0 00-2-2H9a2 2 0 00-2 2v5a2 2 0 01-2 2z" />
                              </svg>
                        </span>
                        <h2 class="title2">{{ $lesson->title }}</h2>
                    </div>
                    <div class="mt-6">
                        <div class="grid grid-cols-1 md:grid-cols-3 xl:grid-cols-4 gap-4 mb-8">
                            <style>
                                .resource p {
                                    color: white !important;
                                }
                            </style>
                            @forelse ($lesson->resources as $resource)
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
                            @empty
                                <p>Il n'y as pas de resources.</p>
                            @endforelse
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </section>
</x-layouts.base>