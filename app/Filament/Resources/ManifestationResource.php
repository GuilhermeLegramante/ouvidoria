<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ManifestationResource\Pages;
use App\Filament\Resources\ManifestationResource\RelationManagers;
use App\Models\Manifestation;
use Filament\Forms;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Infolists\Components\Fieldset;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Infolist;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ManifestationResource extends Resource
{
    protected static ?string $model = Manifestation::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $recordTitleAttribute = 'protocol_number';

    protected static ?string $modelLabel = 'manifestação';

    protected static ?string $pluralModelLabel = 'manifestações';

    protected static ?string $slug = 'manifestacoes';


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Dados da Manifestação')
                    ->schema([
                        TextInput::make('protocol_number')
                            ->label(__('fields.protocol_number')),
                        Select::make('manifestation_status_id')
                            ->label(__('fields.status'))
                            ->relationship(name: 'status', titleAttribute: 'name'),
                        Select::make('manifestation_type_id')
                            ->label(__('fields.manifestation_type'))
                            ->relationship(name: 'type', titleAttribute: 'name'),
                        Select::make('comunication_type')
                            ->label("Tipo de Comunicação")
                            ->options([
                                'anonymous' => 'Anônima',
                                'confidential' => 'Sigilosa',
                                'public' => 'Pública',
                            ]),
                        TextInput::make('name')
                            ->label('Nome')
                            ->visible(fn (Get $get): bool => $get('comunication_type') != 'anonymous'),
                        TextInput::make('cpf')
                            ->label('CPF')
                            ->visible(fn (Get $get): bool => $get('comunication_type') != 'anonymous'),
                        TextInput::make('address')
                            ->label('Endereço')
                            ->visible(fn (Get $get): bool => $get('comunication_type') != 'anonymous'),
                        TextInput::make('phone')
                            ->label('Telefone')
                            ->visible(fn (Get $get): bool => $get('comunication_type') != 'anonymous'),
                        TextInput::make('email')
                            ->label('E-mail')
                            ->visible(fn (Get $get): bool => $get('comunication_type') != 'anonymous'),
                        TextInput::make('requestReason.description')
                            ->label('Motivo da Solicitação')
                            ->visible(fn (Get $get): bool => $get('request_reason_id') != null),
                        Select::make('reported')
                            ->label('Denúncia contra atos praticados por:')
                            ->required()
                            ->live()
                            ->options([
                                'management' => 'Membros da Direção',
                                'employees' => 'Empregados',
                                'outsourced' => 'Terceirizados',
                                'agents' => 'Prepostos',
                                'others' => 'Mais de uma categoria anterior ou outros',
                            ]),
                        Textarea::make('description')
                            ->required()
                            ->label('Manifestação')

                    ])->columnSpan(2),
                Section::make()
                    ->hidden(fn (string $operation): bool => $operation === 'create')
                    ->schema([
                        Group::make()
                            ->schema([
                                Placeholder::make('created_at')
                                    ->label('Data de Criação')
                                    ->content(fn (Manifestation $manifestation): ?string => $manifestation->created_at?->isoFormat('LLL')),

                                Placeholder::make('updated_at')
                                    ->label('Data de Modificação')
                                    ->content(fn (Manifestation $manifestation): ?string => $manifestation->updated_at?->isoFormat('LLL')),
                            ])
                    ])->columnSpan(1)
            ])
            ->columns(3);
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

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('protocol_number')
                    ->label(__('fields.protocol_number'))
                    ->sortable(),
                TextColumn::make('created_at')
                    ->label(__('fields.created_at'))
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: false),
                TextColumn::make('updated_at')
                    ->label(__('fields.updated_at'))
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->defaultSort('created_at', 'desc')
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageManifestations::route('/'),
            'view' => Pages\ViewManifestation::route('/{record}'),
            'edit' => Pages\EditManifestation::route('/{record}/editar'),

        ];
    }

    public static function getRelations(): array
    {
        return [
            RelationManagers\DocumentsRelationManager::class,
            RelationManagers\MovementsRelationManager::class,
        ];
    }

    public static function canCreate(): bool
    {
        return false;
    }
}
