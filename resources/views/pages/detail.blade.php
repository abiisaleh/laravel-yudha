@extends('template')

@section('content')
    <section class="bg-white dark:bg-gray-900">
        <div class="gap-8 py-8 px-4 mx-auto max-w-screen-xl xl:gap-16 md:grid md:grid-cols-2 sm:py-16 lg:px-6">
            @if (is_null($toko->gambar))
                <img class="w-full rounded-lg" src="/default.jpg" alt="image description">
            @else
                <img class="w-full rounded-lg" src="/{{$toko->gambar}}" alt="image description">  
            @endif
            <div class="mt-4 md:mt-0">
                <h3 class="mb-2 text-3xl tracking-tight font-bold text-gray-900 dark:text-white">{{$toko->nama}}</h3>
                
                <div class="flex items-center mb-2">
                    @livewire('rating', ['rating' => $toko->perbaikans()->where('rating','!=','null')->avg('rating')])
                    
                    <p class="ms-1 text-sm font-medium text-gray-500 dark:text-gray-400">{{number_format($toko->perbaikans()->where('rating','!=','null')->avg('rating'),2)}}</p>
                    <p class="ms-1 text-sm font-medium text-gray-500 dark:text-gray-400">out of</p>
                    <p class="ms-1 text-sm font-medium text-gray-500 dark:text-gray-400">{{$toko->perbaikans()->where('rating','!=','null')->count()}}</p>
                </div>
                
                <div class="flex items-center">
                    <img class="rounded-full w-9 h-9" src="{{filament()->getUserAvatarUrl($toko->user[0])}}" alt="profile picture">
                    <div class="space-y-0.5 font-medium dark:text-white text-left rtl:text-right ms-3">
                        <div>{{$toko->user[0]['name']}}</div>
                        <div class="text-sm text-gray-500 dark:text-gray-400 ">{{$toko->user[0]['email']}}</div>
                    </div>
                </div>

                <p class="mb-8 mt-4 font-normal text-gray-500 dark:text-gray-200">📍 {{$toko->alamat}}, Kel. {{$toko->kelurahan}}, Kec. {{$toko->kecamatan}}</p>
                
                @foreach ($toko->perbaikans->where('rating','!=',null) as $item)
                <article class="p-4 rounded-lg bg-gray-50 dark:bg-gray-800 mb-2">
                    <div class="flex items-center mb-4">
                        <img class="w-10 h-10 me-4 rounded-full" src="{{filament()->getUserAvatarUrl($item->user)}}" alt="">
                        <div class="font-medium dark:text-white">
                            <p>{{$item->name}} <time datetime="2014-08-16 19:00" class="block text-sm text-gray-500 dark:text-gray-400">Joined on {{ date('M Y', strtotime($item->user->created_at)) }}</time></p>
                        </div>
                    </div>

                    <div class="flex items-center mb-5">
                        @livewire('rating', ['rating' => $item->rating])
                        <footer class="ms-2 text-sm text-gray-500 dark:text-gray-400"><p>Reviewed on <time datetime="2017-03-03 19:00">{{date('d M Y', strtotime($item->user->updated_at))}}</time></p></footer>
                    </div>

                    
                    <p class="mb-2 text-gray-500 dark:text-gray-400">{{$item->comment}}</p>
                </article>
                @endforeach
            </div>
        </div>

        
        <div class="items-center py-8 px-4 mx-auto max-w-screen-md">
            <div class="mb-8 lg:mb-16 text-center">
                <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-gray-900 dark:text-white">Contact us</h2>
                <p class="text-gray-500 sm:text-xl dark:text-gray-400">Beritahu kami masalahmu</p>
            </div>
            @if (!auth()->check())
                
            <div id="alert-1" class="flex items-center p-4 mb-2 text-sm text-gray-800 rounded-lg bg-gray-50 dark:bg-gray-800 dark:text-gray-300" role="alert">
                <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                  <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                </svg>
                <span class="sr-only">Info</span>
                <div class="ms-3 text-sm font-medium">
                  <a href="admin/login" class="font-semibold underline hover:no-underline">Login</a> untuk mendapatkan status perbaikan secara langsung
                </div>
            </div>
            @elseif (auth()->user()->verified)
                @livewire('create-perbaikan',['tokoId' => $toko->id])
            @else
            <div id="alert-1" class="flex items-center p-4 mb-2 text-sm text-gray-800 rounded-lg bg-gray-50 dark:bg-gray-800 dark:text-gray-300" role="alert">
                <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                  <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                </svg>
                <span class="sr-only">Info</span>
                <div class="ms-3 text-sm font-medium">
                  anda dapat menghubungi kami setelah akun di verifikasi oleh admin
                </div>
            </div>
            @endif

        </div>
    </section>
    
@endsection