<?php

namespace App\Filament\Pages;

use Filament\Forms\Components\Placeholder;
use Filament\Forms\Form;
use Filament\Pages\SimplePage;
use Filament\Support\Enums\MaxWidth;
use Illuminate\Support\HtmlString;

class Home extends SimplePage
{
    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'filament.pages.home';

    protected static ?string $title = '';

    public ?array $data = [];

    public function form(Form $form): Form
    {
        $clientName = 'HARDSOFT SISTEMAS';

        $clientEmail = 'contato@hardsoft.com';

        return $form
            ->schema([
                Placeholder::make('documentation')
                    ->label('')
                    ->content(new HtmlString(
                        "
                        <div >
                            <p class='text-justify'>
                                A <strong>" . $clientName . "</strong> busca o mais alto nível de transparência e ética em suas atividades. Para tanto, estruturou um Programa de Integridade 
                                Corporativa que promove valores positivos no ambiente empresarial e no relacionamento com o Poder Público.
                            </p>
                            <br>
                            <p class='text-justify'>
                                O Programa de Compliance é conduzido pela Comitê de Integridade e Ética (CIE) da <strong>" . $clientName . "</strong>, responsável também pelas apurações 
                                internas de comunicados recebidos por meio do seu Canal de Ouvidoria. O CIE pode ser contactado, também pelo e-mail 
                                <strong>" . $clientEmail . "</strong>.
                            </p>
                            <br>
                            <p class='text-justify'>
                                Os links abaixo são instrumentos que compõem o Programa de Compliance da <strong>" . $clientName . "</strong>, e visam a tornar público o 
                                nosso compromisso com a integridade empresarial:
                            </p>
                        </div>
                        "
                    )),
            ])
            ->statePath('data');
    }

    public function redirectToFormSelection()
    {
        return redirect()->route("form-selection");
    }

    public function hasLogo(): bool
    {
        return true;
    }

    public function getMaxWidth(): MaxWidth | string | null
    {
        return '7xl';
    }
}
