<x-filament-panels::page.simple>
    @if (filament()->hasRegistration())
        <x-slot name="subheading">
            <x-filament::link :href="url('/app/register')" tag="a">
                sign up as toko
            </x-filament::link>

            {{ __('filament-panels::pages/auth/login.actions.register.before') }}

            <x-filament::link :href="url('/admin/register')" tag="a">
                sign up as pelanggan
            </x-filament::link>
        </x-slot>
    @endif

    {{ \Filament\Support\Facades\FilamentView::renderHook('panels::auth.login.form.before') }}

    <x-filament-panels::form wire:submit="authenticate">
        {{ $this->form }}

        <x-filament-panels::form.actions
            :actions="$this->getCachedFormActions()"
            :full-width="$this->hasFullWidthFormActions()"
        />
    </x-filament-panels::form>

    {{ \Filament\Support\Facades\FilamentView::renderHook('panels::auth.login.form.after') }}
</x-filament-panels::page.simple>
