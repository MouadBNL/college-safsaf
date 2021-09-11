<x-layouts.base>

    <section class="py-16">

        <div class="container mx-auto px-4">
            <h2 class="title1 text-primary-500 mb-8">Activities</h2>

            <h3 class="title2 mb-3">Dernier poste</h3>
            <article class="grid grid-cols-1 md:grid-cols-2 gap-8">

                <div class="flex items-center">
                    <div class="w-full relative ratio-720 bg-gray-400 rounded-md">
                        <img src="{{ $latest->image ? $latest->image->url : '#' }}" alt="Parking" class="object-cover absolute-full rounded shadow-md">
                    </div>
                </div>

                <div class="flex items-center">

                    <div class="w-full">
                        <h3 class="title3 mb-3">{{ $latest->title }}</h3>

                        <div class="mb-3">
                            {!! \Illuminate\Support\Str::limit($latest->description, 500, $end = '...</p>') !!}
                        </div>

                        {{-- <div class="text-gray-600 text-base mb-3">
                            <span class="font-extrabold">Tags :</span> <span>events, blogs, trips, educational, latest</span>
                        </div> --}}

                        <div>
                            <a class="btn-primary" href="#">Voir plus</a>
                        </div>
                        
                    </div>

                </div>

            </article>
        </div>

    </section>


    <section class="py-16">
        <div class="container mx-auto px-4">

            <h3 class="title2 mb-8">Articles</h3>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4 xl:gap-6 mb-8">

                @foreach ($posts as $post)
                    <article>

                        <div class="w-full relative ratio-720 bg-gray-400 rounded-md mb-3">
                            <img src="{{ $post->image ? $post->image->url : '#' }}" alt="Parking" class="object-cover absolute-full rounded shadow-md">
                        </div>
                        <h4 class="title3">{{ $post->title }}</h4>
                        <div class="mb-3">
                            {!! \Illuminate\Support\Str::limit($post->description, 100, $end = '...') !!}
                        </div>
                        {{-- <div class="text-gray-600 text-base mb-3">
                            <span class="font-extrabold">Tags :</span> <span>events, blogs, trips, educational, latest</span>
                        </div> --}}

                        <div>
                            <a class="btn-primary" href="#">Voir plus</a>
                        </div>

                    </article>
                @endforeach

            </div>

            {{-- pagination --}}
            <div>
                {{ $posts->onEachSide(5)->links() }}
            </div>

        </div>
    </section>

</x-layouts.base>