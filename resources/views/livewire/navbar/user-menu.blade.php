<div>
    @if (auth()->check())              
        <button id="dropdownAvatarNameButton" data-dropdown-toggle="dropdownAvatarName" class="flex items-center text-sm font-medium text-gray-900 rounded-full hover:text-blue-600 dark:hover:text-blue-500 md:me-0 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:text-white" type="button">
            <span class="sr-only">Open user menu</span>
            <img class="w-8 h-8 rounded-full" src="{{filament()->getUserAvatarUrl(auth()->user())}}" alt="user photo">
        </button>
        
        <!-- Dropdown menu -->
        <div id="dropdownAvatarName" class="z-10 hidden !-left-5 bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 dark:divide-gray-600">
            <div class="px-4 py-3 text-sm text-gray-900 dark:text-white">
            <div class="font-medium ">{{ucfirst(auth()->user()->role)}}</div>
            <div class="truncate">{{auth()->user()->email}}</div>
            </div>
            <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownInformdropdownAvatarNameButtonationButton">
            <li>
                <a href="{{ route('dashboard') }}" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Dashboard</a>
            </li>
            <li>
                <button
                    x-data="{}"
                    x-on:click="$dispatch('open-modal', { id: 'database-notifications' })"
                    type="button"
                    class="w-full text-left px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white"
                >
                    Notifications
                </button>
            </li>
            <li>
                <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Perbaikan</a>
            </li>
            </ul>
            <div class="py-2">
                <form action="{{ filament()->getLogoutUrl() }}" method="post" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">
                    @csrf
                    <button type="submit" class="flex w-full">Sign out</button>
                </form>
            </div>
        </div>
    @else
        <a href="{{ config('app.url') }}/admin" class="bg-white hover:bg-primary-400 font-medium rounded-lg text-sm px-4 lg:px-5 py-2 lg:py-2.5 mr-2 dark:bg-primary-500 dark:hover:bg-primary-400 focus:outline-none ">Login</a>
    @endif
</div>
