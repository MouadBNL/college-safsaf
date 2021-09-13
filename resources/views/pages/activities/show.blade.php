<x-layouts.base>
    <section class="py-16">
        <div class="container mx-auto">
            <div class="flex gap-4">
                <div class="w-full xl:w-2/3">
                    <div class="w-full relative ratio-720 bg-gray-400 rounded-md mb-3">
                        <img src="{{ $activity->image ? $activity->image->url : '#' }}" alt="Image" class="object-cover absolute-full rounded shadow-md">
                    </div>
                    <h2 class="title2 text-primary-500 mb-3">{{ $activity->title }}</h2>
                    <article>
                        {!! $activity->description !!}
                    </article>
                </div>
                <div class="w-1/3 hidden xl:block bg-gray-50 p-4 rounded">
                    <div>

                    </div>
                    @forelse (\App\Models\Activity::latest()->take(3)->get() as $post)
                        <article class="w-full p-4">
                            <div class="relative ratio-720 bg-gray-400 rounded-md mb-3">
                                <img src="{{ $post->image->url }}" alt="Image" class="object-cover absolute-full rounded shadow-md">
                            </div>

                            <h3 class="title3 mb-3">{{ \Illuminate\Support\Str::limit($post->title, 50, $end = '...')  }}</h3>
                            <div class="mb-3">
                                {!! \Illuminate\Support\Str::limit($post->description, 100, $end = '...') !!}
                            </div>
                            <a class="btn-primary" href="{{ route('activities.show', $post) }}">Voir plus</a>
                        </article> 
                    @empty
                        <p class="text-center block">Il n'y a pas d'articles pour le moment, merci de revenir plus tard.</p>
                    @endforelse
                </div>
            </div>
            
        </div>
    </section>
</x-layouts.base>