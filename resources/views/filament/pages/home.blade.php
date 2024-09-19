<x-filament-panels::page.simple>
    <style>
        body {
            background-image: url('img/standard-quality-control-concept-m.png');
            background-size: 100%;
        }
        .image-container {
            text-align: center;
            margin-top: 20px;
        }
        .image-container img {
            margin-left: 40%;
            width: 150px; /* Definindo um tamanho pequeno */
            height: auto; /* Mantendo a proporção da imagem */
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

        <nav
            class="fi-tabs flex max-w-full justify-center items-center text-center gap-x-1 overflow-x-auto mx-auto rounded-xl bg-white p-2 shadow-sm ring-1 ring-gray-950/5 dark:bg-gray-900 dark:ring-white/10">
            <x-filament::button wire:click="redirectToFormSelection" icon="heroicon-o-chat-bubble-left-right" size="lg">
                COMUNICAÇÃO
            </x-filament::button>

            <x-filament::button icon="heroicon-o-document-text" target="_blank"
                href="{{ asset('storage/files/codigo_etica.pdf') }}" tag="a" size="lg">
                CÓDIGO DE ÉTICA E CONDUTA
            </x-filament::button>

            <x-filament::button icon="heroicon-o-document-text" target="_blank"
                href="{{ asset('storage/files/politica_integridade.pdf') }}" tag="a" size="lg">
                POLÍTICA DE INTEGRIDADE
            </x-filament::button>

            <x-filament::button wire:click="redirectToConsultation" icon="heroicon-o-document-magnifying-glass" size="lg">
                CONSULTA
            </x-filament::button>
        </nav>

        <!-- Adicionando a imagem pequena e centralizada -->
        <div class="image-container">
            <img src="{{ asset('img/selo.jpeg') }}" alt="Imagem descritiva">
        </div>

        <x-slot name="headerEnd">
            {{-- Input to select the user's ID --}}
        </x-slot>
    </x-filament::section>
</x-filament-panels::page.simple>