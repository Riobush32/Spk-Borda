<?php

namespace App\Filament\Resources;

use Filament\Forms;
use App\Models\News;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Illuminate\Support\Str;
use Filament\Resources\Resource;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TagsInput;
use Filament\Tables\Columns\ImageColumn;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Illuminate\Database\Eloquent\Builder;
use Filament\Forms\Components\ColorPicker;
use App\Filament\Resources\NewsResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Malzariey\FilamentLexicalEditor\Enums\ToolbarItem;
use App\Filament\Resources\NewsResource\RelationManagers;
use Malzariey\FilamentLexicalEditor\FilamentLexicalEditor;

class NewsResource extends Resource
{
    protected static ?string $model = News::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')
                    ->label('Judul Berita')
                    ->required(),
                Forms\Components\TextInput::make('author')
                    ->label('Penulis')
                    ->required(),
                Select::make('kategori_berita_id')
                    ->label('Kategori')
                    ->relationship('kategori_berita', 'nama_kategori') // Relasi ke model
                    ->searchable()
                    ->preload()
                    ->createOptionForm([
                        Forms\Components\TextInput::make('nama_kategori')
                            ->required()
                            ->label('Nama Kategori'),
                        ColorPicker::make('color')
                    ])
                    ->createOptionAction(function ($action) {
                        return $action
                            ->modalHeading('Tambah Kategori Baru')
                            ->modalButton('Simpan')
                            ->label('Tambah Baru');
                    })
                    ->required(),
                TagsInput::make('tags')
                    ->separator(','),
                FileUpload::make('image')
                    ->label('Upload Gambar')
                    ->image()
                    ->directory('images/berita') // Simpan di subfolder
                    ->disk('public')
                    ->imageEditor()
                    ->imageEditorMode(2)
                    ->maxSize(2048) // 2MB
                    ->rules(['image', 'max:2048'])
                    ->downloadable()
                    ->openable()
                    ->visibility('public'),
                FilamentLexicalEditor::make('content')
                    ->enabledToolbars([
                        ToolbarItem::UNDO,
                        ToolbarItem::REDO,
                        ToolbarItem::FONT_FAMILY,
                        ToolbarItem::NORMAL,
                        ToolbarItem::H1,
                        ToolbarItem::H2,
                        ToolbarItem::H3,
                        ToolbarItem::H4,
                        ToolbarItem::H5,
                        ToolbarItem::H6,
                        ToolbarItem::BULLET,
                        ToolbarItem::NUMBERED,
                        ToolbarItem::QUOTE,
                        ToolbarItem::CODE,
                        ToolbarItem::FONT_SIZE,
                        ToolbarItem::BOLD,
                        ToolbarItem::ITALIC,
                        ToolbarItem::UNDERLINE,
                        ToolbarItem::ICODE,
                        ToolbarItem::LINK,
                        ToolbarItem::TEXT_COLOR,
                        ToolbarItem::BACKGROUND_COLOR,
                        ToolbarItem::LOWERCASE,
                        ToolbarItem::UPPERCASE,
                        ToolbarItem::CAPITALIZE,
                        ToolbarItem::STRIKETHROUGH,
                        ToolbarItem::SUBSCRIPT,
                        ToolbarItem::SUPERSCRIPT,
                        ToolbarItem::CLEAR,
                        ToolbarItem::LEFT,
                        ToolbarItem::CENTER,
                        ToolbarItem::RIGHT,
                        ToolbarItem::JUSTIFY,
                        ToolbarItem::START,
                        ToolbarItem::END,
                        ToolbarItem::INDENT,
                        ToolbarItem::OUTDENT,
                        ToolbarItem::HR,
                        ToolbarItem::IMAGE
                    ])
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('image')
                    ->label('Gambar')
                    ->disk('public')
                    ->width(100)
                    ->height(80)
                    ->url(fn($record) => $record->image_url),
                Tables\Columns\TextColumn::make('author')
                    ->label('Penulis')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('title')
                    ->label('Judul Berita')
                    ->formatStateUsing(fn($state) => Str::words(strip_tags($state), 4, '...'))
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Tanggal Dibuat')
                    ->dateTime('d F Y')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('kategori_berita.nama_kategori')
                    ->label('Kategori')
                    ->sortable()
                    ->searchable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListNews::route('/'),
            'create' => Pages\CreateNews::route('/create'),
            'edit' => Pages\EditNews::route('/{record}/edit'),
        ];
    }
}
