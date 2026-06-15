<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PageSectionResource\Pages;
use App\Models\PageSection;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class PageSectionResource extends Resource
{
    protected static ?string $model = PageSection::class;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static ?string $navigationLabel = 'Page Sections';

    protected static ?string $navigationGroup = 'Content';

    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('page')
                    ->options([
                        'properties' => 'Properties',
                        'services' => 'Services',
                    ])
                    ->required()
                    ->disabled(fn (?PageSection $record) => $record !== null),
                Forms\Components\TextInput::make('section_key')
                    ->required()
                    ->maxLength(255)
                    ->disabled(fn (?PageSection $record) => $record !== null),
                Forms\Components\TextInput::make('label')
                    ->maxLength(255)
                    ->visible(fn (Get $get) => self::usesField($get('section_key'), 'label')),
                Forms\Components\TextInput::make('title')
                    ->maxLength(255)
                    ->visible(fn (Get $get) => self::usesField($get('section_key'), 'title')),
                Forms\Components\Textarea::make('subtitle')
                    ->rows(3)
                    ->visible(fn (Get $get) => self::usesField($get('section_key'), 'subtitle')),
                Forms\Components\Textarea::make('description')
                    ->rows(4)
                    ->visible(fn (Get $get) => self::usesField($get('section_key'), 'description')),
                Forms\Components\Textarea::make('lead')
                    ->rows(4)
                    ->visible(fn (Get $get) => self::usesField($get('section_key'), 'lead')),
                Forms\Components\Textarea::make('intro')
                    ->rows(2)
                    ->visible(fn (Get $get) => self::usesField($get('section_key'), 'intro')),
                Forms\Components\FileUpload::make('image')
                    ->disk('public')
                    ->directory('pages')
                    ->image()
                    ->maxSize(5120)
                    ->visible(fn (Get $get) => self::usesField($get('section_key'), 'image')),
                Forms\Components\TextInput::make('button_text')
                    ->maxLength(255)
                    ->visible(fn (Get $get) => self::usesField($get('section_key'), 'button_text')),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('page')->badge(),
                Tables\Columns\TextColumn::make('section_key')->searchable(),
                Tables\Columns\TextColumn::make('title')->limit(40),
                Tables\Columns\TextColumn::make('updated_at')->dateTime()->sortable(),
            ])
            ->defaultSort('page')
            ->actions([Tables\Actions\EditAction::make()])
            ->bulkActions([]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPageSections::route('/'),
            'edit' => Pages\EditPageSection::route('/{record}/edit'),
        ];
    }

    public static function canCreate(): bool
    {
        return false;
    }

    private static function usesField(?string $key, string $field): bool
    {
        $map = [
            'properties_hero' => ['label', 'title', 'subtitle', 'image'],
            'properties_gallery' => ['label', 'title', 'description'],
            'properties_room_types' => ['label', 'title'],
            'properties_included' => ['label', 'title'],
            'properties_cta' => ['title', 'subtitle', 'button_text'],
            'services_hero' => ['label', 'title', 'subtitle', 'image'],
            'services_residents' => ['label', 'title', 'lead', 'intro', 'image'],
            'services_serve' => ['label', 'title', 'description'],
            'services_partners' => ['label', 'title', 'description', 'intro', 'button_text'],
            'services_partners_referral' => ['title', 'description'],
            'services_apply' => ['label', 'title'],
            'services_requirements' => ['label', 'title'],
            'services_faq' => ['label', 'title'],
        ];

        return in_array($field, $map[$key] ?? [], true);
    }
}
