<x-layouts.base>

    <section class="py-16">
        <div class="container mx-auto px-4">

            @foreach (\App\Models\Level::get() as $lvl)
                <div class="mb-12">
                    <div class="flex items-center">
                        <span class="flex items-center justify-center bg-primary-500 text-white h-12 w-12 rounded-2xl mr-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 19a2 2 0 01-2-2V7a2 2 0 012-2h4l2 2h4a2 2 0 012 2v1M5 19h14a2 2 0 002-2v-5a2 2 0 00-2-2H9a2 2 0 00-2 2v5a2 2 0 01-2 2z" />
                              </svg>
                        </span>
                        <h2 class="title2">{{ $lvl->label }}</h2>
                    </div>
                    <div class="ml-16">
                        @foreach ($lvl->subjects as $subject)
                            <a href="{{ route('resources.list', [
                                'level' => $lvl,
                                'subject' => $subject
                            ]) }}" class="block text-xl shadow-md px-4 py-2 mb-6">
                                {{ $subject->label }}                            
                            </a>
                        @endforeach
                    </div>
                </div>
            @endforeach

        </div>
    </section>

</x-layouts.base>