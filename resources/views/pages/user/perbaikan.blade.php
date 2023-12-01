@extends('template')

@section('content')
<section class="bg-white dark:bg-gray-900">
    <div class="items-center py-8 px-4 mx-auto max-w-screen-md">
        <h3 class="mb-4 text-xl md:text-3xl md:mb-12 tracking-tight font-bold text-gray-900 dark:text-white">Riwayat perbaikan</h3>
        @livewire('riwayat-perbaikan')
    </div>
</section>

@endsection
