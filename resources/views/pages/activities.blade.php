<x-layouts.base>

    <section class="py-16">

        <div class="container mx-auto px-4">
            <h2 class="title1 text-primary-500 mb-8">Activities</h2>

            <h3 class="title2 mb-3">Dernier poste</h3>
            <article class="grid grid-cols-1 md:grid-cols-2 gap-8">

                <div class="flex items-center">
                    <div class="w-full relative ratio-720 bg-gray-400 rounded-md">
                        {{-- <img src="{{ $image->url }}" alt="Parking" class="object-cover absolute-full rounded shadow-md"> --}}
                    </div>
                </div>

                <div class="flex items-center">

                    <div class="w-full">
                        <h3 class="title3 mb-3">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lacinia ac risus dignissim non.</h3>

                        <div class="mb-3">
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Et suspendisse phasellus lacinia risus ornare nisl consectetur. Id dignissim dignissim nibh accumsan, bibendum eleifend aliquet porttitor laoreet. Facilisis accumsan diam id morbi eu pharetra, ut. Sed eu, condimentum sed a laoreet. Iaculis porta aliquet vitae quis.
                            </p>
                            <p>
                                Auctor neque ut nam accumsan aliquet ornare morbi neque facilisis. Et ridiculus mattis ullamcorper donec vivamus eros, in. Adipiscing ut sed sollicitudin vivamus at.
                            </p>
                        </div>

                        <div class="text-gray-600 text-base mb-3">
                            <span class="font-extrabold">Tags :</span> <span>events, blogs, trips, educational, latest</span>
                        </div>

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

                @for ($i = 0; $i < 12; $i++)
                    <article>

                        <div class="w-full relative ratio-720 bg-gray-400 rounded-md mb-3">
                            {{-- <img src="{{ $image->url }}" alt="Parking" class="object-cover absolute-full rounded shadow-md"> --}}
                        </div>
                        <h4 class="title3">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</h4>
                        <div>
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Et suspendisse phasellus lacinia risus ornare nisl consectetur.
                            </p>
                        </div>
                        <div class="text-gray-600 text-base mb-3">
                            <span class="font-extrabold">Tags :</span> <span>events, blogs, trips, educational, latest</span>
                        </div>

                        <div>
                            <a class="btn-primary" href="#">Voir plus</a>
                        </div>

                    </article>
                @endfor

            </div>

            {{-- pagination --}}
            <div class="flex justify-center">
                <div class="flex">
                    {{-- PREV --}}
                    <a href="#" class="mx-2">
                        <span class="w-8 h-8 rounded-md bg-primary-500 flex items-center justify-center">
                            <svg width="8" height="14" viewBox="0 0 8 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M7 1L1 7L7 13" stroke="#DCDCDC" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>                                
                        </span>
                    </a>


                    <a href="#" class="mx-2">
                        <span class="w-8 h-8 rounded-md bg-gray-50 flex items-center justify-center">
                            1                             
                        </span>
                    </a>
                    <a href="#" class="mx-2">
                        <span class="w-8 h-8 rounded-md bg-gray-50 flex items-center justify-center">
                            2                         
                        </span>
                    </a>
                    <a href="#" class="mx-2">
                        <span class="w-8 h-8 rounded-md bg-gray-50 flex items-center justify-center">
                            3                           
                        </span>
                    </a>
                    <a href="#" class="mx-2">
                        <span class="w-8 h-8 rounded-md bg-gray-50 flex items-center justify-center">
                            4                            
                        </span>
                    </a>


                    {{-- NEXT --}}
                    <a href="#" class="mx-2">
                        <span class="w-8 h-8 rounded-md bg-primary-500 flex items-center justify-center">
                            <svg width="8" height="14" viewBox="0 0 8 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M1 13L7 7L1 1" stroke="#DCDCDC" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </span>
                    </a>
                </div>
            </div>

        </div>
    </section>

</x-layouts.base>