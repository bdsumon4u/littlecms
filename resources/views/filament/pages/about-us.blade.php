<x-filament-panels::page>
    <form wire:submit="save">
        {{ $this->form }}

        <x-filament::button type="submit" class="mt-3">
            {{ __('filament-panels::resources/pages/edit-record.form.actions.save.label') }}
        </x-filament::button>
    </form>
</x-filament-panels::page>
