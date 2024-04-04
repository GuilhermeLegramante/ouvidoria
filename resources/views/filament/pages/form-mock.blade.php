<x-filament-panels::page.simple>

    <x-filament-panels::form wire:submit="submit">
        {{ $this->form }}

        <x-filament::button type="submit" form="submit">
            Enviar
        </x-filament::button>
    </x-filament-panels::form>

    @if (isset($this->manifestation->id))
        <div style="--col-span-default: 1 / -1;" class="col-[--col-span-default]">
            <fieldset class="fi-fieldset rounded-xl border border-gray-200 p-6 dark:border-white/10">
                <legend class="-ms-2 px-2 text-sm font-medium leading-6 text-gray-950 dark:text-white">
                    Informações Gerais
                </legend>
                <dl>
                    <div style="--cols-default: repeat(1, minmax(0, 1fr)); --cols-lg: repeat(2, minmax(0, 1fr));"
                        class="grid grid-cols-[--cols-default] lg:grid-cols-[--cols-lg] fi-fo-component-ctn gap-6">
                        <div style="--col-span-default: span 1 / span 1;" class="col-[--col-span-default]">
                            <div class="fi-in-entry-wrp">
                                <div class="grid gap-y-2">
                                    <div class="flex items-center justify-between gap-x-3">
                                        <dt class="fi-in-entry-wrp-label inline-flex items-center gap-x-3">
                                            <span class="text-sm font-medium leading-6 text-gray-950 dark:text-white">
                                                N° do Protocolo
                                            </span>
                                        </dt>
                                    </div>
                                    <div class="grid gap-y-2">
                                        <dd class="">
                                            <div class="fi-in-text w-full">
                                                <div class="fi-in-affixes flex">

                                                    <div class="min-w-0 flex-1">
                                                        <div class="flex ">
                                                            <div class="flex max-w-max">
                                                                <div
                                                                    class="fi-in-text-item inline-flex items-center gap-1.5 ">

                                                                    <div class="text-sm leading-6 text-gray-950 dark:text-white  "
                                                                        style="">
                                                                        {{ $this->manifestation->protocol_number }}
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </dd>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div style="--col-span-default: span 1 / span 1;" class="col-[--col-span-default]">
                            <div class="fi-in-entry-wrp">
                                <div class="grid gap-y-2">
                                    <div class="flex items-center justify-between gap-x-3">
                                        <dt class="fi-in-entry-wrp-label inline-flex items-center gap-x-3">
                                            <span class="text-sm font-medium leading-6 text-gray-950 dark:text-white">
                                                Status
                                            </span>
                                        </dt>
                                    </div>
                                    <div class="grid gap-y-2">
                                        <dd class="">
                                            <div class="fi-in-text w-full">
                                                <div class="fi-in-affixes flex">

                                                    <div class="min-w-0 flex-1">
                                                        <div class="flex ">
                                                            <div class="flex max-w-max">
                                                                <div
                                                                    class="fi-in-text-item inline-flex items-center gap-1.5 ">
                                                                    <div class="text-sm leading-6 text-gray-950 dark:text-white  "
                                                                        style="">
                                                                        {{ $this->manifestation->status->name }}
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </dd>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div style="--col-span-default: span 1 / span 1;" class="col-[--col-span-default]">
                            <div class="fi-in-entry-wrp">
                                <div class="grid gap-y-2">
                                    <div class="flex items-center justify-between gap-x-3">
                                        <dt class="fi-in-entry-wrp-label inline-flex items-center gap-x-3">
                                            <span class="text-sm font-medium leading-6 text-gray-950 dark:text-white">
                                                Tipo de Manifestação
                                            </span>
                                        </dt>
                                    </div>
                                    <div class="grid gap-y-2">
                                        <dd class="">
                                            <div class="fi-in-text w-full">
                                                <div class="fi-in-affixes flex">
                                                    <div class="min-w-0 flex-1">
                                                        <div class="flex ">
                                                            <div class="flex max-w-max">
                                                                <div
                                                                    class="fi-in-text-item inline-flex items-center gap-1.5 ">
                                                                    <div class="text-sm leading-6 text-gray-950 dark:text-white  "
                                                                        style="">
                                                                        {{ $this->manifestation->type->name }}
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </dd>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div style="--col-span-default: span 1 / span 1;" class="col-[--col-span-default]">
                            <div class="fi-in-entry-wrp">

                                <div class="grid gap-y-2">
                                    <div class="flex items-center justify-between gap-x-3">
                                        <dt class="fi-in-entry-wrp-label inline-flex items-center gap-x-3">
                                            <span class="text-sm font-medium leading-6 text-gray-950 dark:text-white">
                                                Atos praticados por
                                            </span>
                                        </dt>
                                    </div>
                                    <div class="grid gap-y-2">
                                        <dd class="">
                                            <div class="fi-in-text w-full">
                                                @switch($this->manifestation->reported)
                                                    @case('management')
                                                        Membros da Direção
                                                    @break

                                                    @case('employees')
                                                        Empregados
                                                    @break

                                                    @case('outsourced')
                                                        Terceirizados
                                                    @break

                                                    @case('agents')
                                                        Prepostos
                                                    @break

                                                    @case('others')
                                                        Mais de uma categoria anterior ou outros
                                                    @break

                                                    @default
                                                @endswitch
                                            </div>
                                        </dd>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div style="--col-span-default: span 1 / span 1;" class="col-[--col-span-default]">
                            <div class="fi-in-entry-wrp">
                                <div class="grid gap-y-2">
                                    <div class="flex items-center justify-between gap-x-3">
                                        <dt class="fi-in-entry-wrp-label inline-flex items-center gap-x-3">
                                            <span class="text-sm font-medium leading-6 text-gray-950 dark:text-white">
                                                Descrição
                                            </span>
                                        </dt>
                                    </div>
                                    <div class="grid gap-y-2">
                                        <dd class="">
                                            <div class="fi-in-text w-full">
                                                <div class="fi-in-affixes flex">

                                                    <div class="min-w-0 flex-1">
                                                        <div class="flex ">
                                                            <div class="flex max-w-max">
                                                                <div
                                                                    class="fi-in-text-item inline-flex items-center gap-1.5 ">

                                                                    <div class="text-sm leading-6 text-gray-950 dark:text-white  "
                                                                        style="">
                                                                        {{ $this->manifestation->description }}
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </dd>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @if ($this->manifestation->requestReason != null)
                            <div style="--col-span-default: span 1 / span 1;" class="col-[--col-span-default]">
                                <div class="fi-in-entry-wrp">
                                    <div class="grid gap-y-2">
                                        <div class="flex items-center justify-between gap-x-3">
                                            <dt class="fi-in-entry-wrp-label inline-flex items-center gap-x-3">
                                                <span
                                                    class="text-sm font-medium leading-6 text-gray-950 dark:text-white">
                                                    Motivo da Solicitação
                                                </span>
                                            </dt>
                                        </div>
                                        <div class="grid gap-y-2">
                                            <dd class="">
                                                <div class="fi-in-text w-full">
                                                    <div class="fi-in-affixes flex">
                                                        <div class="min-w-0 flex-1">
                                                            <div class="flex ">
                                                                <div class="flex max-w-max">
                                                                    <div
                                                                        class="fi-in-text-item inline-flex items-center gap-1.5 ">
                                                                        <div class="text-sm leading-6 text-gray-950 dark:text-white  "
                                                                            style="">
                                                                            {{ $this->manifestation->requestReason->description }}
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </dd>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                </dl>
            </fieldset>
        </div>

        @if ($this->manifestation->comunication_type != 'anonymous')
            <div style="--col-span-default: 1 / -1;" class="col-[--col-span-default]">
                <fieldset class="fi-fieldset rounded-xl border border-gray-200 p-6 dark:border-white/10">
                    <legend class="-ms-2 px-2 text-sm font-medium leading-6 text-gray-950 dark:text-white">
                        Informações Pessoais
                    </legend>
                    <dl>
                        <div style="--cols-default: repeat(1, minmax(0, 1fr)); --cols-lg: repeat(2, minmax(0, 1fr));"
                            class="grid grid-cols-[--cols-default] lg:grid-cols-[--cols-lg] fi-fo-component-ctn gap-6">
                            <div style="--col-span-default: span 1 / span 1;" class="col-[--col-span-default]">
                                <div class="fi-in-entry-wrp">
                                    <div class="grid gap-y-2">
                                        <div class="flex items-center justify-between gap-x-3">
                                            <dt class="fi-in-entry-wrp-label inline-flex items-center gap-x-3">
                                                <span
                                                    class="text-sm font-medium leading-6 text-gray-950 dark:text-white">
                                                    Nome
                                                </span>
                                            </dt>
                                        </div>
                                        <div class="grid gap-y-2">
                                            <dd class="">
                                                <div class="fi-in-text w-full">
                                                    <div class="fi-in-affixes flex">
                                                        <div class="min-w-0 flex-1">
                                                            <div class="flex ">
                                                                <div class="flex max-w-max">
                                                                    <div
                                                                        class="fi-in-text-item inline-flex items-center gap-1.5 ">
                                                                        <div class="text-sm leading-6 text-gray-950 dark:text-white  "
                                                                            style="">
                                                                            {{ $this->manifestation->name }}
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </dd>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div style="--col-span-default: span 1 / span 1;" class="col-[--col-span-default]">
                                <div class="fi-in-entry-wrp">
                                    <div class="grid gap-y-2">
                                        <div class="flex items-center justify-between gap-x-3">
                                            <dt class="fi-in-entry-wrp-label inline-flex items-center gap-x-3">
                                                <span
                                                    class="text-sm font-medium leading-6 text-gray-950 dark:text-white">
                                                    CPF
                                                </span>
                                            </dt>
                                        </div>
                                        <div class="grid gap-y-2">
                                            <dd class="">
                                                <div class="fi-in-text w-full">
                                                    <div class="fi-in-affixes flex">
                                                        <div class="min-w-0 flex-1">
                                                            <div class="flex ">
                                                                <div class="flex max-w-max">
                                                                    <div
                                                                        class="fi-in-text-item inline-flex items-center gap-1.5 ">
                                                                        <div class="text-sm leading-6 text-gray-950 dark:text-white  "
                                                                            style="">
                                                                            {{ $this->manifestation->cpf }}
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </dd>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div style="--col-span-default: span 1 / span 1;" class="col-[--col-span-default]">
                                <div class="fi-in-entry-wrp">
                                    <div class="grid gap-y-2">
                                        <div class="flex items-center justify-between gap-x-3">
                                            <dt class="fi-in-entry-wrp-label inline-flex items-center gap-x-3">
                                                <span
                                                    class="text-sm font-medium leading-6 text-gray-950 dark:text-white">
                                                    Endereço
                                                </span>
                                            </dt>
                                        </div>
                                        <div class="grid gap-y-2">
                                            <dd class="">
                                                <div class="fi-in-text w-full">
                                                    <div class="fi-in-affixes flex">
                                                        <div class="min-w-0 flex-1">
                                                            <div class="flex ">
                                                                <div class="flex max-w-max">
                                                                    <div
                                                                        class="fi-in-text-item inline-flex items-center gap-1.5 ">
                                                                        <div class="text-sm leading-6 text-gray-950 dark:text-white  "
                                                                            style="">
                                                                            {{ $this->manifestation->address }}
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </dd>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div style="--col-span-default: span 1 / span 1;" class="col-[--col-span-default]">
                                <div class="fi-in-entry-wrp">
                                    <div class="grid gap-y-2">
                                        <div class="flex items-center justify-between gap-x-3">
                                            <dt class="fi-in-entry-wrp-label inline-flex items-center gap-x-3">
                                                <span
                                                    class="text-sm font-medium leading-6 text-gray-950 dark:text-white">
                                                    Telefone
                                                </span>
                                            </dt>
                                        </div>
                                        <div class="grid gap-y-2">
                                            <dd class="">
                                                <div class="fi-in-text w-full">
                                                    <div class="fi-in-affixes flex">
                                                        <div class="min-w-0 flex-1">
                                                            <div class="flex ">
                                                                <div class="flex max-w-max">
                                                                    <div
                                                                        class="fi-in-text-item inline-flex items-center gap-1.5 ">
                                                                        <div class="text-sm leading-6 text-gray-950 dark:text-white  "
                                                                            style="">
                                                                            {{ $this->manifestation->phone }}
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </dd>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div style="--col-span-default: span 1 / span 1;" class="col-[--col-span-default]">
                                <div class="fi-in-entry-wrp">
                                    <div class="grid gap-y-2">
                                        <div class="flex items-center justify-between gap-x-3">
                                            <dt class="fi-in-entry-wrp-label inline-flex items-center gap-x-3">
                                                <span
                                                    class="text-sm font-medium leading-6 text-gray-950 dark:text-white">
                                                    E-mail
                                                </span>
                                            </dt>
                                        </div>
                                        <div class="grid gap-y-2">
                                            <dd class="">
                                                <div class="fi-in-text w-full">
                                                    <div class="fi-in-affixes flex">
                                                        <div class="min-w-0 flex-1">
                                                            <div class="flex ">
                                                                <div class="flex max-w-max">
                                                                    <div
                                                                        class="fi-in-text-item inline-flex items-center gap-1.5 ">
                                                                        <div class="text-sm leading-6 text-gray-950 dark:text-white  "
                                                                            style="">
                                                                            {{ $this->manifestation->email }}
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </dd>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </dl>
                </fieldset>
            </div>
        @endif
   
    @endif
</x-filament-panels::page.simple>
