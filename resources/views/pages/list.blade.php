@extends('template')

@section('content')

<section class="bg-white dark:bg-gray-900">
    <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-16 lg:px-6">

        <div class="mx-auto mb-8 lg:mb-12">
            <h3 class="mb-4 text-xl md:text-3xl tracking-tight font-bold text-gray-900 dark:text-white">{{$heading}}</h3>
            <p class="mb-8 text-sm font-normal text-gray-500 md:text-xl dark:text-gray-200">{{$subheading ?? ''}}</p>

            @livewire('card.list-toko',['items' => $toko])
        
        </div>

    </div>
</section>

@endsection
