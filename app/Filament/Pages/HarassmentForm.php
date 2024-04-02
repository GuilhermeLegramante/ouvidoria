<?php

namespace App\Filament\Pages;

use App\Filament\Forms\DefaultForm;
use App\Repositories\ManifestationRepository;
use Filament\Forms\Form;
use Filament\Pages\SimplePage;
use Filament\Support\Enums\MaxWidth;
use Livewire\WithFileUploads;

class HarassmentForm extends SimplePage
{
    use WithFileUploads;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'filament.pages.form-mock';

    protected static ?string $title = 'Denúncia sobre assédio ou violência contra mulheres';

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
            ->schema(DefaultForm::form('DENÚNCIA SOBRE ASSÉDIO OU VIOLÊNCIA CONTRA MULHERES'))
            ->statePath('data');
    }

    public function submit(): void
    {
        $data = $this->form->getState();
        ManifestationRepository::create($data, 2);
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
