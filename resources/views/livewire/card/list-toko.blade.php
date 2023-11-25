<section class="{{$class}}">
    <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-16 lg:px-6">
        <div class="mx-auto mb-8 lg:mb-12">
            <h3 class="mb-4 text-xl md:text-3xl tracking-tight font-bold text-gray-900 dark:text-white">{{$heading}}</h3>
            <p class="mb-8 text-lg font-normal text-gray-500 lg:text-xl dark:text-gray-200">{{$subheading}}</p>

            <ul class="flex flex-wrap text-sm font-medium text-center text-gray-500 dark:text-gray-500" id="{{$id}}-list-tab" data-tabs-toggle="#{{$id}}-list-tab-content" role="tablist">
                @php
                    $i = 1;
                @endphp
                @foreach ($items as $key => $item)
                    <li class="me-2" role="presentation">
                        <button class="{{ ($i == 1)? 'active' : '' }} border border-gray-500 hover:text-white hover:bg-primary-600 hover:bg-opacity-100 hover:border-primary-600 duration-150 ease-in font-medium rounded-full text-sm px-5 py-2.5 me-2 mb-2" id="{{$id}}-{{$key}}-tab" data-tabs-target="#{{$id}}-{{$key}}" onclick="activeClass(this)" type="button" role="tab" aria-controls="{{$id}}-{{$key}}" aria-selected="false">{{str_replace('-',' ',ucfirst($key))}}</button>
                    </li>
                    @php
                        $i++
                    @endphp
                @endforeach
            </ul>
        </div> 
        <div id="list-tab-content">
            @foreach ($items as $key => $item)
                <div class="hidden mb-6 grid gap-8 grid-cols-2 md:grid-cols-3 lg:grid-cols-4" id="{{$id}}-{{$key}}" role="tabpanel" aria-labelledby="{{$id}}-{{$key}}-tab">
                    @foreach ($item as $toko)
                
                    <div class="shadow-lg min-w-sm w-full mx-auto bg-white border border-gray-200 rounded-lg dark:bg-gray-800 dark:border-gray-700">
                        @if (is_null($toko->gambar))
                            <img class="h-auto max-w-full rounded-t-lg brightness-200 dark:filter-none" src="default.jpg" alt="image description">
                        @else
                            <img class="h-auto max-w-full rounded-t-lg" src="{{ $toko->gambar }}" alt="image description">
                        @endif
                        <div class="p-5">
                            <span class="flex items-center text-yellow-800 font-medium rounded-full dark:text-yellow-300">
                                <svg class="w-4 h-4 text-yellow-300 me-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                                    <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
                                </svg> 4.2
                            </span>
                            <a href="detail/{{$toko->id}}">
                                <h5 class="mt-2 mb-2 text-sm md:text-lg lg:text-xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $toko->nama }}</h5>
                            </a>
                            <ul class="max-w-md space-y-1 text-xs md:text-sm lg:text-md text-gray-500 list-inside dark:text-gray-400 mb-4">
                                <li class="flex items-center">
                                <svg class="w-3.5 h-3.5 mr-2 text-gray-500 dark:text-gray-400 flex-shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 20">
                                    <path d="M8 0a7.992 7.992 0 0 0-6.583 12.535 1 1 0 0 0 .12.183l.12.146c.112.145.227.285.326.4l5.245 6.374a1 1 0 0 0 1.545-.003l5.092-6.205c.206-.222.4-.455.578-.7l.127-.155a.934.934 0 0 0 .122-.192A8.001 8.001 0 0 0 8 0Zm0 11a3 3 0 1 1 0-6 3 3 0 0 1 0 6Z"/>
                                </svg>
                                {{ $toko->kecamatan }}, {{ $toko->kelurahan }}
                                </li>
                            </ul>
                        </div>
                    </div>
            
                    @endforeach
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

@section('script')
<script>
    function activeClass(param) {
        parrent = param.parentNode.parentNode;
        allButton = parrent.getElementsByTagName("button");

        for (var i = 0; i < allButton.length; i++) {
            allButton[i].classList.remove('active');
        }

        param.classList.add('active');
    }
</script>
    
@endsection