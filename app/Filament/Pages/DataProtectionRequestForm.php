<?php

namespace App\Filament\Pages;

use App\Filament\Forms\DefaultForm;
use App\Repositories\ManifestationRepository;
use Filament\Forms\Form;
use Filament\Pages\SimplePage;
use Filament\Support\Enums\MaxWidth;
use Livewire\WithFileUploads;

class DataProtectionRequestForm extends SimplePage
{
    use WithFileUploads;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'filament.pages.form-mock';

    protected static ?string $title = 'Pedido sobre proteção de dados';

    public ?array $data = [];

    public ?string $formType = '';

    protected function getForms(): array
    {
        return [
            'form',
        ];
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema(DefaultForm::requestDataProtectionForm())
            ->statePath('data');
    }

    public function submit(): void
    {
        $data = $this->form->getState();
        ManifestationRepository::create($data, 4);
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
