<?php

namespace App\Filament\Resources\ManifestationResource\RelationManagers;

use App\Models\Manifestation;
use App\Models\ManifestationMovement;
use Filament\Tables\Actions\CreateAction;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class MovementsRelationManager extends RelationManager
{
    protected static string $relationship = 'movements';

    protected static ?string $title = 'Movimentos';

    protected static ?string $label = 'Movimento';

    protected static ?string $pluralLabel = 'Movimentos';

    protected static bool $isLazy = false;

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('current_manifestation_status_id')
                    ->hint('Novo status para a manifestação')
                    ->label(__('fields.status'))
                    ->preload()
                    ->required()
                    ->relationship(name: 'currentStatus', titleAttribute: 'name')
                    ->createOptionForm([TextInput::make('name')
                        ->label(__('fields.name'))
                        // ->afterStateUpdated(function (TextInput $component, string $state) {
                        //     $component->state(mb_strtoupper($state));
                        // })
                        ->required()
                        ->maxLength(255)])
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('description')
                    ->label('Descrição')
                    ->hint('Informe os detalhes do movimento')
                    ->required()
                    ->columnSpanFull()
                    ->maxLength(255),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('description')
            ->columns([
                Tables\Columns\TextColumn::make('description')->label('Descrição'),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                CreateAction::make()
                    ->using(function (array $data, string $model): ManifestationMovement {
                        // Atualiza o status da manifestação
                        $manifestation = Manifestation::find($this->getOwnerRecord()->id);

                        $manifestation->manifestation_status_id = $data['current_manifestation_status_id'];

                        $manifestation->save();

                        return ManifestationMovement::create([
                            'manifestation_id' => $manifestation->id,
                            'previous_manifestation_status_id' => $this->getOwnerRecord()->manifestation_status_id,
                            'current_manifestation_status_id' => $data['current_manifestation_status_id'],
                            'description' => $data['description'],
                            'created_at' => now()
                        ]);
                    }),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }



    public function isReadOnly(): bool
    {
        return false;
    }
}
