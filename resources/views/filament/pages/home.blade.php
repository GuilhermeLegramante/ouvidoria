<x-filament-panels::page.simple>
    <style>
        body {
            background-image: url('img/standard-quality-control-concept-m.png');
            background-size: 100%;
        }
    </style>


    <x-filament::section>
        <x-slot name="heading">
            INTEGRIDADE CORPORATIVA – COMPLIANCE
        </x-slot>

        <x-filament-panels::form wire:submit="authenticate">
            {{ $this->form }}

        </x-filament-panels::form>

        <br>
        <hr>
        <br>
        <div style="margin-left: 20%; margin-right: 20%;">
            <x-filament::button wire:click="redirectToFormSelection" icon="heroicon-o-chat-bubble-left-right"
                size="xl">
                COMUNICAÇÃO
            </x-filament::button>

            <x-filament::button icon="heroicon-o-document-text" target="_blank"
                href="{{ asset('storage/files/codigo_etica.pdf') }}" tag="a" size="xl">
                CÓDIGO DE ÉTICA
            </x-filament::button>

            <x-filament::button icon="heroicon-o-document-text" target="_blank"
                href="{{ asset('storage/files/politica_integridade.pdf') }}" tag="a" size="xl">
                POLÍTICA DE INTEGRIDADE
            </x-filament::button>

            <x-filament::button wire:click="redirectToConsultation" icon="heroicon-o-document-magnifying-glass"
                size="xl">
                CONSULTA
            </x-filament::button>
        </div>

        <x-slot name="headerEnd">
            {{-- Input to select the user's ID --}}
        </x-slot>

    </x-filament::section>


</x-filament-panels::page.simple>
