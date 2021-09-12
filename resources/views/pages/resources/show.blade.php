<x-layouts.base>

    <section class="py-16">
        <div class="container mx-auto px-4 flex">

            <div class="w-full xl:w-2/3">
                <div class="w-full relative ratio-720 bg-gray-400 rounded-md mb-3">
                    <img src="{{ $resource->getImage() }}" alt="Image" class="object-cover absolute-full rounded shadow-md">
                </div>
                <div class="flex text-primary-500 items-center">
                    <div class="h-12 mr-4">
                        {!! $resource->getIcon() !!}
                    </div>

                    <h2 class="title2 text-primary-500">
                        {{ $resource->title }} | {{ $resource->getType() }}
                    </h2>
                </div>

                <div class="py-4 text-xl">
                    <p><span class="font-bold">Leçon: </span>{{ $resource->lesson->title ?? '' }}</p>
                    <p><span class="font-bold">Auteur: </span>{{ $resource->user->name ?? '' }}</p>
                </div>

                <div class="py-4">
                    <h3 class="title3">Description</h3>
                    <div>
                        {!! $resource->description !!}
                    </div>
                </div>

                <div class="flex gap-4 flex-wrap lg:flex-nowrap">
                    <div class="w-full lg:w-1/2">
                        <h3 class="title3">Fichier</h3>
                        <section>
                            @if( $resource->file)
                            <a href="{{ $resource->file->getUrl() }}" class="btn-primary flex justify-between my-2">
                                <span>
                                    {{ \Illuminate\Support\Str::limit($resource->file->name, 20, $end = '...') }}
                                </span>
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                                </svg>
                            </a>
                            @else
                                <p>Il n'y a pas de fichier</p>
                            @endif
                        </section>
                    </div>
                    <div class="w-full lg:w-1/2">
                        <h3 class="title3">Liens</h3>
                        <section>
                            @if (empty($resource->link))
                                <p class="my-2">Il n'y a pas de liens</p>
                            @else
                                @foreach (explode(" ", $resource->link) as $link)
                                    <a href="{{ $link }}" target="_blank" class="block my-2 text-primary-500">
                                        {{ \Illuminate\Support\Str::limit($link, 30, $end = '...') }}
                                    </a>
                                @endforeach
                            @endif
                        </section>
                    </div>
                </div>
            </div>

            <div class="hidden xl:block xl:w-1/3">

            </div>

        </div>
    </section>

</x-layouts.base>