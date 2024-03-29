<x-layouts.base>
    <x-slot name="css">
        <style>
            .resource p {
                color: white !important;
            }
        </style>
    </x-slot>
    <x-slot name="js">
        <script src="{{ asset('js/collapse.js') }}"></script>
    </x-slot>
    <section class="py-16">
        <div class="container mx-auto px-4 flex">
            <div class="w-full md:w-2/3 xl:w-3/4">
                @foreach ($lessons as $lesson)
                    <div class="mb-12" data-type="collapse" data-button="collapse-btn" data-target="collapse-content" id="les{{ $loop->iteration }}">
                        <div class="flex items-center bg-primary-100 rounded-t overflow-hidden" data-name="collapse-btn">
                            <span class="flex items-center justify-center bg-primary-500 text-white h-12 w-12 rounded-br-2xl mr-4">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 19a2 2 0 01-2-2V7a2 2 0 012-2h4l2 2h4a2 2 0 012 2v1M5 19h14a2 2 0 002-2v-5a2 2 0 00-2-2H9a2 2 0 00-2 2v5a2 2 0 01-2 2z" />
                                </svg>
                            </span>
                            <h2 class="title2">{{ $lesson->title }}</h2>
                        </div>
                        <div data-name="collapse-content" class="bg-primary-50 px-4 rounded-b">
                            @for ($i = 0; $i < 4; $i++)
                                <div class="my-4">
                                    <h4 class="title3">{{ \App\Models\Resource::TYPE_SELECT[$i] }}</h4>
                                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4  gap-x-4 gap-y-2 lg:gap-y-4">
                                        @forelse ($lesson->resources->filter(function($item) use($i){
                                            return ($item->type == $i);
                                        })->values() as $resource)
                                            <article class="resource h-full">
                                                <a href="{{ route('resources.show', $resource) }}" class="btn-primary block h-full">
                                                    {{-- <div class="w-full relative ratio-720 bg-gray-400 rounded-md mb-3 overflow-hidden">
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
                                                    </div> --}}
                                                    <div class="flex items-center h-full">
                                                        <div class="h-6 w-6 text-white mr-4">
                                                            {!! $resource->getIcon() !!}
                                                        </div>
                    
                                                        <h3 class="text-base text-white">{{ \Illuminate\Support\Str::limit($resource->title, 60, $end = '...') }}</h3>
                                                    </div>
                                                </a>
                        
                                            </article>
                                        @empty
                                            <p>Il n'y as pas de {{ \App\Models\Resource::TYPE_SELECT[$i] }}.</p>
                                        @endforelse
                                    </div>
                                </div>
                            @endfor
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="hidden md:block md:w-1/3 xl:w-1/4 pl-4">
                <div class="bg-blue-700 text-white rounded p-4">
                    @foreach ($lessons as $lesson)
                    <div class="mb-4">
                        <a href="#les{{ $loop->iteration }}">
                            <div class="flex items-center">
                                <h2 class="text-lg">{{ $lesson->title }}</h2>
                            </div>
                        </a>
                    </div>
                    @endforeach
                </div>
            </div>

        </div>
    </section>
</x-layouts.base>