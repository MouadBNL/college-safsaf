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
                        @for ($i = 0; $i < 24; $i++)
                        <article>
                            <a href="#">
                                <div class="w-full relative ratio-720 bg-gray-400 rounded-md mb-3 overflow-hidden">
                                    {{-- <img src="{{ $image->url }}" alt="Parking" class="object-cover absolute-full rounded shadow-md"> --}}
                                    <div class="absolute-full bg-black bg-opacity-60 flex items-center">
                                        <div class="p-4">
                                            <div class="h-16">
                                                <svg width="35" height="46" viewBox="0 0 35 46" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M34.6056 11.1634L23.8366 0.394423C23.5852 0.142962 23.2422 0 22.8846 0H4.03846C1.81165 0 0 1.81165 0 4.03846V41.9103C0 44.1371 1.81165 45.9487 4.03846 45.9487H30.9615C33.1883 45.9487 35 44.1371 35 41.9103V12.1154C35 11.7483 34.8459 11.4036 34.6056 11.1634ZM24.2308 4.59604L30.404 10.7692H25.5769C24.8347 10.7692 24.2308 10.1653 24.2308 9.42308V4.59604ZM30.9615 43.2564H4.03846C3.29619 43.2564 2.69231 42.6525 2.69231 41.9103V4.03846C2.69231 3.29619 3.29619 2.69231 4.03846 2.69231H21.5385V9.42308C21.5385 11.6499 23.3501 13.4615 25.5769 13.4615H32.3077V41.9103C32.3077 42.6525 31.7038 43.2564 30.9615 43.2564Z" fill="white"/>
                                                    <path d="M25.5769 19.0257H9.42306C8.67962 19.0257 8.0769 19.6284 8.0769 20.3718C8.0769 21.1152 8.67962 21.718 9.42306 21.718H25.5769C26.3203 21.718 26.9231 21.1152 26.9231 20.3718C26.9231 19.6284 26.3203 19.0257 25.5769 19.0257Z" fill="white"/>
                                                    <path d="M25.5769 24.4103H9.42306C8.67962 24.4103 8.0769 25.013 8.0769 25.7564C8.0769 26.4999 8.67962 27.1026 9.42306 27.1026H25.5769C26.3203 27.1026 26.9231 26.4999 26.9231 25.7564C26.9231 25.013 26.3203 24.4103 25.5769 24.4103Z" fill="white"/>
                                                    <path d="M25.5769 29.7949H9.42306C8.67962 29.7949 8.0769 30.3976 8.0769 31.141C8.0769 31.8845 8.67962 32.4872 9.42306 32.4872H25.5769C26.3203 32.4872 26.9231 31.8845 26.9231 31.141C26.9231 30.3976 26.3203 29.7949 25.5769 29.7949Z" fill="white"/>
                                                    <path d="M20.1923 35.1795H9.42306C8.67962 35.1795 8.0769 35.7822 8.0769 36.5257C8.0769 37.2691 8.67962 37.8718 9.42306 37.8718H20.1923C20.9357 37.8718 21.5384 37.2691 21.5384 36.5257C21.5384 35.7822 20.9357 35.1795 20.1923 35.1795Z" fill="white"/>
                                                </svg>
                                            </div>
        
                                            <h3 class="title3 text-white">Course Title 101</h3>
                                            <p class="text-white">Imperdiet et eget enim non sit.</p>
                                            <p class="text-white">Math</p>
                                        </div>
                                    </div>
                                </div>
                            </a>
    
                        </article>
                        @endfor
                    </div>
                    {{-- Pagination --}}
                    <div class="flex justify-center">
                        <div class="flex">
                            {{-- PREV --}}
                            <a href="#" class="mx-2">
                                <span class="w-8 h-8 transition rounded-md bg-primary-500 hover:bg-primary-600 flex items-center justify-center">
                                    <svg width="8" height="14" viewBox="0 0 8 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M7 1L1 7L7 13" stroke="#DCDCDC" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>                                
                                </span>
                            </a>
        
        
                            <a href="#" class="mx-2">
                                <span class="w-8 h-8 transition rounded-md bg-gray-50 hover:bg-gray-200 flex items-center justify-center">
                                    1                             
                                </span>
                            </a>
                            <a href="#" class="mx-2">
                                <span class="w-8 h-8 transition rounded-md bg-gray-50 hover:bg-gray-200 flex items-center justify-center">
                                    2                         
                                </span>
                            </a>
                            <a href="#" class="mx-2">
                                <span class="w-8 h-8 transition rounded-md bg-gray-50 hover:bg-gray-200 flex items-center justify-center">
                                    3                           
                                </span>
                            </a>
                            <a href="#" class="mx-2">
                                <span class="w-8 h-8 transition rounded-md bg-gray-50 hover:bg-gray-200 flex items-center justify-center">
                                    4                            
                                </span>
                            </a>
        
        
                            {{-- NEXT --}}
                            <a href="#" class="mx-2">
                                <span class="w-8 h-8 transition rounded-md bg-primary-500 hover:bg-primary-600 flex items-center justify-center">
                                    <svg width="8" height="14" viewBox="0 0 8 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M1 13L7 7L1 1" stroke="#DCDCDC" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                </span>
                            </a>
                        </div>
                    </div>
        
                </div>

            </div>

        </div>
    </section>

</x-layouts.base>