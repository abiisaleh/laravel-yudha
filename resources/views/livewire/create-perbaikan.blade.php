<div>
    <form wire:submit="create">
        {{ $this->form }}
        
        <button type="submit" class="mt-4 mb-8 text-white bg-primary-500 hover:bg-primary-400 focus:outline-none font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:bg-primary-500 dark:hover:bg-primary-400">
            Submit
        </button>
    </form>
    
    <x-filament-actions::modals />
</div>