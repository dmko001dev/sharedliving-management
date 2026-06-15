<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ContentListItemResource\Pages;
use App\Models\ContentListItem;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class ContentListItemResource extends Resource
{
    protected static ?string $model = ContentListItem::class;

    protected static ?string $navigationIcon = 'heroicon-o-list-bullet';

    protected static ?string $navigationLabel = 'Content Lists';

    protected static ?string $navigationGroup = 'Content';

    protected static ?int $navigationSort = 5;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('page')
                    ->options([
                        'properties' => 'Properties',
                        'services' => 'Services',
                    ])
                    ->required(),
                Forms\Components\Select::make('section')
                    ->options([
                        'included' => 'Properties — What Is Included',
                        'residents_benefits' => 'Services — Resident Benefits',
                        'partners_benefits' => 'Services — Partner Benefits',
                        'apply_steps' => 'Services — How to Apply (numbered)',
                        'requirements' => 'Services — Move-In Requirements',
                    ])
                    ->required(),
                Forms\Components\Select::make('type')
                    ->options([
                        'bullet' => 'Bullet list',
                        'numbered' => 'Numbered list',
                    ])
                    ->default('bullet')
                    ->required(),
                Forms\Components\Textarea::make('content')
                    ->required()
                    ->rows(3),
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
                Tables\Columns\TextColumn::make('page')->badge(),
                Tables\Columns\TextColumn::make('section')->badge(),
                Tables\Columns\TextColumn::make('content')->limit(60),
                Tables\Columns\TextColumn::make('type'),
                Tables\Columns\TextColumn::make('sort_order')->sortable(),
                Tables\Columns\IconColumn::make('is_active')->boolean(),
            ])
            ->defaultSort('sort_order')
            ->filters([
                Tables\Filters\SelectFilter::make('page')
                    ->options(['properties' => 'Properties', 'services' => 'Services']),
                Tables\Filters\SelectFilter::make('section')
                    ->options([
                        'included' => 'What Is Included',
                        'residents_benefits' => 'Resident Benefits',
                        'partners_benefits' => 'Partner Benefits',
                        'apply_steps' => 'How to Apply',
                        'requirements' => 'Move-In Requirements',
                    ]),
            ])
            ->reorderable('sort_order')
            ->actions([Tables\Actions\EditAction::make(), Tables\Actions\DeleteAction::make()])
            ->bulkActions([Tables\Actions\BulkActionGroup::make([Tables\Actions\DeleteBulkAction::make()])]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListContentListItems::route('/'),
            'create' => Pages\CreateContentListItem::route('/create'),
            'edit' => Pages\EditContentListItem::route('/{record}/edit'),
        ];
    }
}
