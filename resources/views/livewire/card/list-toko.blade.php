<section class="{{$class}}">
    <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-16 lg:px-6 ">
        <div class="mx-auto mb-8 lg:mb-12">
            <h3 class="mb-4 text-3xl tracking-tight font-bold text-gray-900 dark:text-white">{{$heading}}</h3>
            <p class="mb-8 text-lg font-normal text-gray-500 lg:text-xl dark:text-gray-200">{{$subheading}}</p>
            <ul class="flex">
                <li><a href="#" class="text-gray-900 bg-primary-100 border border-primary-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-full text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">Semua</a></li>
                <li><a href="#" class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-full text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">Abepura</a></li>
                <li><a href="#" class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-full text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">Waena</a></li>
            </ul>
        </div> 
        <div class="grid gap-8 mb-6 md:grid-cols-3 lg:grid-cols-4">
  
          @foreach ($items as $item)
      
          <div class="shadow-lg min-w-sm w-full mx-auto bg-white border border-gray-200 rounded-lg dark:bg-gray-800 dark:border-gray-700">
                <iframe 
                        class="rounded-t-lg w-full"
                        src="https://www.google.com/maps/embed/v1/place?key={{ env('GOOGLE_MAPS_API_KEY') }}
                        &q={{$item->lat}},{{$item->lng}}&region=id" 
                        height="250" 
                        style="border:0;" 
                        allowfullscreen="true" 
                        loading="lazy" 
                        referrerpolicy="no-referrer-when-downgrade"
                        >
                </iframe>
            <div class="p-5">
                <span class="bg-yellow-100 text-yellow-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-full dark:bg-yellow-900 dark:text-yellow-300">⭐ 4.2</span>
                <a href="detail/{{$item->id}}">
                    <h5 class="mt-2 mb-2 text-xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $item->nama }}</h5>
                </a>
                <ul class="max-w-md space-y-1 text-gray-500 list-inside dark:text-gray-400 mb-4">
                  <li class="flex items-center">
                    <svg class="w-3.5 h-3.5 mr-2 text-gray-500 dark:text-gray-400 flex-shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 20">
                      <path d="M8 0a7.992 7.992 0 0 0-6.583 12.535 1 1 0 0 0 .12.183l.12.146c.112.145.227.285.326.4l5.245 6.374a1 1 0 0 0 1.545-.003l5.092-6.205c.206-.222.4-.455.578-.7l.127-.155a.934.934 0 0 0 .122-.192A8.001 8.001 0 0 0 8 0Zm0 11a3 3 0 1 1 0-6 3 3 0 0 1 0 6Z"/>
                    </svg>
                    {{ $item->alamat }}
                  </li>
              </ul>
               
            </div>
          </div>
  
          @endforeach
        </div>
        <div class="flex items-center justify-center">
            <button type="button" class="text-white bg-primary-500 hover:bg-primary-400 focus:outline-none font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:bg-primary-500 dark:hover:bg-primary-400">
                Selengkapnya
                <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                </svg>
            </button>  
        </div>
    </div>
</section>