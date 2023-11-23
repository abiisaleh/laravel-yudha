@extends('template')

@section('content')
    <section class="bg-white dark:bg-gray-900">
        <div class="items-center py-8 px-4 mx-auto max-w-screen-md">
            <div class="flex items-center justify-between mb-4">
                <div class="flex items-center">
                    <img class="rounded-full w-10 h-10" src="{{filament()->getUserAvatarUrl(auth()->user())}}" alt="profile picture">
                    <div class="space-y-0.5 font-medium dark:text-white text-left rtl:text-right ms-3">
                        <div>yudha</div>
                        <div class="text-sm text-gray-500 dark:text-gray-400 ">yudha@demo.com</div>
                    </div>
                </div>
                <div>
                    <span class="text-white bg-primary-500 font-medium rounded-lg text-xs px-3 py-1.5 dark:bg-primary-500">Not verified</span>
                </div>
            </div>
            <a href="#" class="block text-center w-full py-2.5 px-5 me-2 mb-2 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Edit Profile</a>
            
            <p class="mb-2 mt-8 text-gray-500  dark:text-gray-400">Selesai</p>
            @livewire('list-perbaikan')
            
            <p class="mb-2 mt-8 text-gray-500  dark:text-gray-400">Perbaikan</p>
            @livewire('list-perbaikan')

        </div>
    </section>
    
@endsection