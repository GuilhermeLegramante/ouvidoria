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
        <div class="flex items-start">
            <x-filament::button wire:click="redirectToFormSelection" icon="heroicon-o-chat-bubble-left-right"
                size="md">
                COMUNICAÇÃO
            </x-filament::button>

            <x-filament::button icon="heroicon-o-document-text" target="_blank"
                href="{{ asset('storage/files/codigo_etica.pdf') }}" tag="a" size="md">
                CÓDIGO DE ÉTICA
            </x-filament::button>

            <x-filament::button icon="heroicon-o-document-text" target="_blank"
                href="{{ asset('storage/files/politica_integridade.pdf') }}" tag="a" size="md">
                POLÍTICA DE INTEGRIDADE
            </x-filament::button>

            <x-filament::button wire:click="redirectToConsultation" icon="heroicon-o-document-magnifying-glass"
                size="md">
                CONSULTA
            </x-filament::button>
        </div>

        <x-slot name="headerEnd">
            {{-- Input to select the user's ID --}}
        </x-slot>

    </x-filament::section>

</x-filament-panels::page.simple>
