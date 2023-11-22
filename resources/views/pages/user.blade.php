@extends('template')

@section('content')
    <section class="bg-white dark:bg-gray-900">
        <div class="items-center py-8 px-4 mx-auto max-w-screen-xl"> 
            <div class="mb-8 lg:mb-16 text-center">
                <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-gray-900 dark:text-white">Beritahu kami masalahmu</h2>
                <p class="text-gray-500 sm:text-xl dark:text-gray-400">Beritahu kami masalahmu</p>
            </div>
            @livewire('list-perbaikan')
        </div>
    </section>
    
@endsection