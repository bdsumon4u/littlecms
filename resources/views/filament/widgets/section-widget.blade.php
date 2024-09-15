<x-filament-widgets::widget>
    <x-filament::section collapsible collapsed>
        <x-slot name="heading">Edit {{$label}} section</x-slot>

        <form wire:submit="save"> 
            {{ $this->form }}
 
            <x-filament::button type="submit" class="mt-3">
                {{ __('filament-panels::resources/pages/edit-record.form.actions.save.label') }}
            </x-filament::button>
        </form>
    </x-filament::section>
</x-filament-widgets::widget>
