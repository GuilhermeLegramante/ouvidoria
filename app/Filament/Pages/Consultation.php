<?php

namespace App\Filament\Pages;

use App\Filament\Forms\DefaultForm;
use App\Models\Manifestation;
use App\Models\ManifestationMovement;
use App\Repositories\ManifestationRepository;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Infolist;
use Filament\Notifications\Notification;
use Filament\Pages\SimplePage;
use Filament\Support\Enums\MaxWidth;
use Illuminate\Database\Eloquent\Collection;
use Livewire\WithFileUploads;

class Consultation extends SimplePage
{
    use WithFileUploads;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'filament.pages.consultation';

    protected static ?string $title = 'Consulta de Manifestação';

    public ?array $data = [];

    public Manifestation $manifestation;

    public Collection $movements;

    public bool $registerNotFound = false;

    public function mount()
    {
        $this->manifestation = new Manifestation();

        $this->movements = new Collection();
    }

    protected function getForms(): array
    {
        return [
            'form',
        ];
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('protocol_number')
                    ->label('Número do Protocolo')
                    ->required(),
            ])
            ->statePath('data');
    }

    public static function infolist(Infolist $infolist): Infolist
    {
        $data = [
            Fieldset::make('Informações Gerais')
                ->schema([
                    TextEntry::make('protocol_number')->label(__('fields.protocol_number')),
                    TextEntry::make('status.name')->label(__('fields.status')),
                    TextEntry::make('type.name')->label(__('fields.manifestation_type')),
                    TextEntry::make('reported')->label('Atos praticados por')
                        ->formatStateUsing(fn (string $state): string => __("reported.{$state}")),
                    TextEntry::make('description')->label(__('fields.description')),
                    TextEntry::make('requestReason.description')->label(__('fields.request_reason')),
                ])
        ];

        // dd($infolist->record);

        if ($infolist->record->comunication_type !== 'anonymous') {
            array_push(
                $data,
                Fieldset::make('Informações Pessoais')
                    ->schema([
                        TextEntry::make('name')->label(__('fields.name')),
                        TextEntry::make('cpf')->label(__('fields.cpf')),
                        TextEntry::make('address')->label(__('fields.address')),
                        TextEntry::make('phone')->label(__('fields.phone')),
                        TextEntry::make('email')->label(__('fields.email')),
                    ])
            );
        }

        return $infolist
            ->schema($data);
    }

    public function submit(): void
    {
        $data = $this->form->getState();

        $manifestation = Manifestation::with('status')->where('protocol_number', $data['protocol_number'])->get()->first();

        if (isset($manifestation)) {
            $this->manifestation = $manifestation;
            $this->movements = ManifestationMovement::with('manifestation')->where('manifestation_id', $this->manifestation->id)->get();

            Notification::make()
                ->title('Sucesso!')
                ->body('Dados encontrados')
                ->success()
                ->send();
        } else {
            $this->registerNotFound = true;

            Notification::make()
                ->title('Registro não encontrado!')
                ->body('Número de protocolo inexistente')
                ->danger()
                ->send();
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
