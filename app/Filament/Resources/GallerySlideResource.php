<?php

namespace App\Filament\Resources;

use App\Filament\Resources\GallerySlideResource\Pages;
use App\Models\GallerySlide;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class GallerySlideResource extends Resource
{
    protected static ?string $model = GallerySlide::class;

    protected static ?string $navigationIcon = 'heroicon-o-photo';

    protected static ?string $navigationGroup = 'Properties Page';

    protected static ?int $navigationSort = 3;

    protected static ?string $navigationLabel = 'Gallery Slides';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('caption')
                    ->required()
                    ->maxLength(255),
                Forms\Components\FileUpload::make('image')
                    ->disk('public')
                    ->directory('gallery')
                    ->image()
                    ->maxSize(5120),
                Forms\Components\TextInput::make('sort_order')
                    ->numeric()
                    ->default(0),
                Forms\Components\Toggle::make('is_active')
                    ->default(true),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('image')
                    ->disk('public')
                    ->defaultImageUrl(fn (GallerySlide $record) => $record->imageUrl()),
                Tables\Columns\TextColumn::make('caption')->searchable(),
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
            'index' => Pages\ListGallerySlides::route('/'),
            'create' => Pages\CreateGallerySlide::route('/create'),
            'edit' => Pages\EditGallerySlide::route('/{record}/edit'),
        ];
    }
}
