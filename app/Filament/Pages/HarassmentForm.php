<?php

namespace App\Filament\Pages;

use App\Filament\Forms\DefaultForm;
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

        dd($data);
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
