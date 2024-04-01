<x-filament-panels::page.simple>

    <x-filament-panels::form wire:submit="submit">
        {{ $this->form }}

        <x-filament::button type="submit" form="submit">
            Enviar
        </x-filament::button>
    </x-filament-panels::form>
</x-filament-panels::page.simple>
