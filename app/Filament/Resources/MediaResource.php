<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MediaResource\Pages;
use App\Models\Media;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class MediaResource extends Resource
{
    protected static ?string $model = Media::class;

    protected static ?string $navigationIcon = 'heroicon-o-document-duplicate';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Group::make([
                    Select::make('type')
                        ->options([
                            'image' => 'Image',
                            'video' => 'Video',
                        ])
                        ->required()
                        ->default('image')
                        ->native(false)
                        ->live(),

                    TextInput::make('group')
                        ->placeholder('Enter the group of the media')
                        ->required(),
                ])->columns(2),

                FileUpload::make('path')
                    ->label('')
                    ->image()
                    ->imageEditor()
                    ->placeholder('Upload an image or <span class="filepond--label-action" tabindex="0"> Browse </span>')
                    ->imageEditorAspectRatios([
                        null,
                        '16:9',
                        '4:3',
                        '1:1',
                    ])
                    ->required()
                    ->hidden(fn (Get $get) => $get('type') !== 'image'),

                FileUpload::make('path')
                    ->label('')
                    ->placeholder('Upload a video or <span class="filepond--label-action" tabindex="0"> Browse </span>')
                    ->acceptedFileTypes(['video/*'])
                    ->required()
                    ->maxSize(200*1024)
                    ->hidden(fn (Get $get) => $get('type') !== 'video'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('path')
                    ->label('Media')
                    ->alignCenter(),
                Tables\Columns\TextColumn::make('group')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('type')
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
            'index' => Pages\ListMedia::route('/'),
            'create' => Pages\CreateMedia::route('/create'),
            'edit' => Pages\EditMedia::route('/{record}/edit'),
        ];
    }

    /**
     * @return array<class-string<Widget>>
     */
    public static function getWidgets(): array
    {
        return [
            //
        ];
    }
}
