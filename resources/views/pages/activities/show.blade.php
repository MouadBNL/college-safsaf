<x-layouts.base>
    <section class="py-16">
        <div class="container mx-auto">
            <div class="flex gap-4">
                <div class="w-full xl:w-2/3">
                    <div class="w-full relative ratio-720 bg-gray-400 rounded-md mb-3">
                        <img src="{{ $activity->image ? $activity->image->url : '#' }}" alt="Parking" class="object-cover absolute-full rounded shadow-md">
                    </div>
                    <h2 class="title2 text-primary-500 mb-3">{{ $activity->title }}</h2>
                    <article>
                        {!! $activity->description !!}
                    </article>
                </div>
                <div class="w-1/3 hidden xl:block bg-gray-50 p-4 rounded">
                    <p>last posts</p>
                </div>
            </div>
            
        </div>
    </section>
</x-layouts.base>