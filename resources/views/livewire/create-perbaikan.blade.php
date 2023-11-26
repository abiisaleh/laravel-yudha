<div>
    <form wire:submit="create">
        {{ $this->form }}

        {{ $this->createAction }}
    </form>
    
    <x-filament-actions::modals />
</div>