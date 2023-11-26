<div>
    <form wire:submit="create">
        {{ $this->form }}
        
        <div class="mt-4">
            {{ $this->createAction }}
        </div>
    </form>
    
    <x-filament-actions::modals />
</div>