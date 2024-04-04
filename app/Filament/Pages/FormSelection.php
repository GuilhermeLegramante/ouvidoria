<?php

namespace App\Filament\Pages;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Split;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\View;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Pages\Page;
use Filament\Pages\SimplePage;
use Filament\Support\Enums\MaxWidth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\HtmlString;
use Livewire\WithFileUploads;

class FormSelection extends SimplePage
{
    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'filament.pages.form-mock';

    protected static ?string $title = 'Canal de Ouvidoria';

    public ?array $data = [];

    protected function getForms(): array
    {
        return [
            'form',
        ];
    }

    public function form(Form $form): Form
    {
        $clientName = 'HARDSOFT SISTEMAS';
        
        return $form
            ->schema([
                Placeholder::make('documentation')
                    ->label('')
                    ->content(new HtmlString(
                        "
                        <div >
                            <h3 class='text-justify'>
                                O canal de Ouvidoria da <strong>" . $clientName . "</strong> é um instrumento 
                                de integridade corporativa que faz parte do Programa de <i>Compliance</i> da empresa.
                                Sua finalidade é estabelecer um canal de comunicação entre a empresa e a sociedade, de modo
                                a viabilizar o aperfeiçoamento institucional e colaborar para um ambiente positivo e ético de negócios na
                                organização e no país.
                            </h3>
                            <h3 class='text-center'>
                                <br>
                                <i>
                                    Este serviço também recebe as manifestações previstas na Lei 12.846/2013 e Lei Estadual (RS) 15.228/2018,
                                    e suas regulamentações municipais, além de denúncias sobre assédio, nos termos da Lei 14.457/22.
                                    O Canal de Ouvidoria também permite manifestações sobre uso de dados pessoais, 
                                    em atendimento à LGPD.
                                </i>
                            </h3>
                        </div>
                        "
                    )),

                Group::make([
                    Select::make('manifestation')
                        ->preload(false)
                        ->searchable(false)
                        ->label('Tipo de manifestação que deseja realizar')
                        ->live()
                        ->debounce(100)
                        ->options([
                            1 => 'Denúncia (probidade empresarial)',
                            2 => 'Denúncia (assédio ou violência contra mulheres)',
                            3 => 'Elogio, reclamação ou sugestão',
                            4 => 'Pedido sobre proteção de dados pessoais'
                        ])
                        ->required()
                        ->columnSpan(6),
                ])->columns(6),
            ])
            ->statePath('data');
    }

    public function submit()
    {
        $data = $this->form->getState();

        if ($data['manifestation'] == 1 ) {
            return redirect()->route('probity-form');
        }

        if ($data['manifestation'] == 2) {
            return redirect()->route('harassment-form');
        }

        if ($data['manifestation'] == 3) {
            return redirect()->route('praise-form');
        }

        if ($data['manifestation'] == 4) {
            return redirect()->route('data-protection-request-form');
        }
    }

    public function hasLogo(): bool
    {
        return false;
    }

    public function getMaxWidth(): MaxWidth | string | null
    {
        return '4xl';
    }
}
