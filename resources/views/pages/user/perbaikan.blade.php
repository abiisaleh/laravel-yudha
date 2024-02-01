@extends('template')

@section('content')
    <section class="bg-white dark:bg-gray-900">
        <div class="items-center py-8 px-4 mx-auto max-w-screen-md">
            <p class="mb-2 mt-8 text-gray-500  dark:text-gray-400">Riwayat perbaikan</p>
            @livewire('riwayat-perbaikan')
        </div>
    </section>
    
@endsection