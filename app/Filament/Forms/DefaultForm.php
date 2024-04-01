<?php

namespace App\Filament\Forms;

use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\Radio;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Get;
use Illuminate\Support\HtmlString;

class DefaultForm
{
    public static function requestDataProtectionForm(): array
    {
        return [
            Placeholder::make('documentation')
                ->label('')
                ->content(new HtmlString(
                    '
                    <div >
                        <h3 class="text-justify">
                        Você optou por fazer um PEDIDO SOBRE PROTEÇÃO DE DADOS PESSOAIS. As informações aqui postadas são sigilosas. 
                        Em nenhuma hipótese você será identificado, salvo com sua autorização.
                        Ao preencher este formulário você autoriza o tratamento de seus dados com o objetivo de atendimento ao art. 18 da Lei nº 13.709/2018. 
                        </h3>
                    </div>
                    '
                )),
            TextInput::make('name')
                ->label('Nome')
                ->required(),
            TextInput::make('cpf')
                ->label('CPF')
                ->required(),
            TextInput::make('address')
                ->label('Endereço')
                ->required(),
            TextInput::make('phone')
                ->label('Telefone')
                ->required(),
            TextInput::make('email')
                ->label('E-mail')
                ->required(),

            Radio::make('reason')
                ->label('Motivo da solicitação')
                ->options([
                    1 => 'Confirmação da existência de tratamento de meus dados pessoais',
                    2 => 'Acesso aos meus dados pessoais',
                    3 => 'Correção dos meus dados, incompletos, inexatos ou desatualizados',
                    4 => 'Anonimização, bloqueio ou eliminação de dados desnecessários, excessivos ou tratados em desconformidade com a lei',
                    5 => 'Portabilidade dos dados a outro fornecedor de serviço ou produto, mediante requisição expressa, de acordo com a regulamentação da autoridade nacional, observados os segredos comercial e industrial',
                    6 => 'Eliminação dos dados pessoais tratados com o consentimento, exceto nas hipóteses previstas no art. 16 da Lei.',
                    7 => 'Informação das entidades públicas e privadas com as quais o controlador realizou uso compartilhado de dados dos quais sou titular',
                    8 => 'Informação sobre a possibilidade de não fornecer consentimento e sobre as consequências da negativa',
                    9 => 'Revogação do consentimento, nos termos do § 5º do art. 8º da Lei 13.709',
                ]),
            self::manifestationTextAreaField(),
            self::filesField(),
        ];
    }

    public static function form($title): array
    {
        return [
            Select::make('type')
                ->label("Você optou por fazer uma {$title}. Escolha o tipo de comunicação que pretende realizar:")
                ->options([
                    'anonymous' => 'Anônima – você não será identificado e não poderá acompanhar a apuração da denúncia.',
                    'confidential' => 'Sigilosa – sua identificação será protegida e você receberá informações sobre a apuração da sua denúncia.',
                    'public' => 'Pública – você será identificado e o denunciado poderá ter acesso aos seus dados. Você receberá informações acerca da denúncia.',
                ])
                ->live()
                ->afterStateUpdated(fn (Select $component) => $component
                    ->getContainer()
                    ->getComponent('dynamicTypeFields')
                    ->getChildComponentContainer()
                    ->fill()),
            Grid::make(1)
                ->schema(fn (Get $get): array => match ($get('type')) {
                    'anonymous' => DefaultForm::manifestationFields(),
                    'confidential' => DefaultForm::fullFields(),
                    'public' => DefaultForm::fullFields(),
                    default => [],
                })
                ->key('dynamicTypeFields'),
        ];
    }

    public static function fullFields(): array
    {
        return [
            TextInput::make('name')
                ->label('Nome')
                ->required(),
            TextInput::make('cpf')
                ->label('CPF')
                ->required(),
            TextInput::make('address')
                ->label('Endereço')
                ->required(),
            TextInput::make('phone')
                ->label('Telefone')
                ->required(),
            TextInput::make('email')
                ->label('E-mail')
                ->required(),
            self::manifestationTypeSelectField(),
            self::manifestationTextAreaField(),
            self::filesField(),
        ];
    }

    public static function filesField(): FileUpload
    {
        return  FileUpload::make('files')
            ->label('Anexar documentos')
            ->multiple();
    }

    public static function manifestationTextAreaField(): Textarea
    {
        return Textarea::make('manifestation')
            ->required()
            ->label('Manifestação');
    }

    public static function manifestationTypeSelectField(): Select
    {
        return Select::make('manifestationType')
            ->label('Denúncia contra atos praticados por:')
            ->required()
            ->live()
            ->options([
                1 => 'Membros da Direção',
                2 => 'Empregados',
                3 => 'Terceirizados',
                4 => 'Prepostos',
                5 => 'Mais de uma categoria anterior ou outros',
            ])
            ->required();
    }

    public static function manifestationFields(): array
    {
        return [
            self::manifestationTypeSelectField(),
            self::manifestationTextAreaField(),
            self::filesField(),
        ];
    }
}
