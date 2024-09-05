<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SlideResource\Pages;
use App\Filament\Resources\SlideResource\RelationManagers;
use App\Models\Slide;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SlideResource extends Resource
{
    protected static ?string $model = Slide::class;

    protected static ?string $navigationIcon = 'heroicon-o-photo';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                FileUpload::make('image')
                    ->label('')
                    ->image()
                    ->imageEditor()
                    ->placeholder('Upload the image of the slide or <span class="filepond--label-action" tabindex="0"> Browse </span>')
                    ->hint('The image must have a minimum resolution of 1920x960 pixels')
                    ->imageEditorAspectRatios([
                        null,
                        '16:9',
                        '4:3',
                        '1:1',
                    ])
                    ->required()
                    ->columnSpanFull(),
                Group::make([TextInput::make('title')->placeholder('Enter the title of the slide'),
                    TextInput::make('heading')->placeholder('Enter the heading of the slide'),
                    Group::make([
                        TextInput::make('button_text')->placeholder('Enter the button text of the slide'),
                        TextInput::make('button_url')->placeholder('Enter the button URL of the slide'),
                    ])->columns(2),
                ]),
                Textarea::make('paragraph')
                    ->rows(8)
                    ->placeholder('Enter the paragraph of the slide'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('image')
                    ->label('Image')
                    ->alignCenter(),
                TextColumn::make('title')
                    ->label('Title')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('heading')
                    ->label('Heading')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('button_text')
                    ->url(fn (Slide $record) => $record->button_url)
                    ->label('Button')
                    ->searchable()
                    ->sortable(),
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
            'index' => Pages\ListSlides::route('/'),
            'create' => Pages\CreateSlide::route('/create'),
            'edit' => Pages\EditSlide::route('/{record}/edit'),
        ];
    }
}
