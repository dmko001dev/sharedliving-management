<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PropertyResource\Pages;
use App\Models\Property;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class PropertyResource extends Resource
{
    protected static ?string $model = Property::class;

    protected static ?string $navigationIcon = 'heroicon-o-home-modern';

    protected static ?string $navigationGroup = 'Properties Page';

    protected static ?int $navigationSort = 2;

    protected static ?string $navigationLabel = 'Property Cards';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Property Details')
                    ->schema([
                        Forms\Components\TextInput::make('title')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('location')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('badge')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('pricing_text')
                            ->default('Contact us for pricing')
                            ->maxLength(255),
                        Forms\Components\TagsInput::make('tags')
                            ->placeholder('Add a tag'),
                        Forms\Components\FileUpload::make('image')
                            ->disk('public')
                            ->directory('properties')
                            ->image()
                            ->maxSize(5120)
                            ->helperText('Recommended: 600×400 px. You can also paste an external URL in the database if needed.'),
                        Forms\Components\TextInput::make('sort_order')
                            ->numeric()
                            ->default(0),
                        Forms\Components\Toggle::make('is_active')
                            ->default(true),
                    ])->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('image')
                    ->disk('public')
                    ->defaultImageUrl(fn (Property $record) => $record->imageUrl()),
                Tables\Columns\TextColumn::make('title')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('badge'),
                Tables\Columns\TextColumn::make('location'),
                Tables\Columns\TextColumn::make('sort_order')->sortable(),
                Tables\Columns\IconColumn::make('is_active')->boolean(),
            ])
            ->defaultSort('sort_order')
            ->reorderable('sort_order')
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

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListProperties::route('/'),
            'create' => Pages\CreateProperty::route('/create'),
            'edit' => Pages\EditProperty::route('/{record}/edit'),
        ];
    }
}
