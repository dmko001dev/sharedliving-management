<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ServiceAudienceCardResource\Pages;
use App\Models\ServiceAudienceCard;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class ServiceAudienceCardResource extends Resource
{
    protected static ?string $model = ServiceAudienceCard::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-group';

    protected static ?string $navigationGroup = 'Services Page';

    protected static ?int $navigationSort = 2;

    protected static ?string $navigationLabel = 'Who We Serve Cards';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')->required()->maxLength(255),
                Forms\Components\Textarea::make('description')->required()->rows(3),
                Forms\Components\TextInput::make('sort_order')->numeric()->default(0),
                Forms\Components\Toggle::make('is_active')->default(true),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')->searchable(),
                Tables\Columns\TextColumn::make('description')->limit(50),
                Tables\Columns\TextColumn::make('sort_order')->sortable(),
                Tables\Columns\IconColumn::make('is_active')->boolean(),
            ])
            ->defaultSort('sort_order')
            ->reorderable('sort_order')
            ->actions([Tables\Actions\EditAction::make(), Tables\Actions\DeleteAction::make()])
            ->bulkActions([Tables\Actions\BulkActionGroup::make([Tables\Actions\DeleteBulkAction::make()])]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListServiceAudienceCards::route('/'),
            'create' => Pages\CreateServiceAudienceCard::route('/create'),
            'edit' => Pages\EditServiceAudienceCard::route('/{record}/edit'),
        ];
    }
}
