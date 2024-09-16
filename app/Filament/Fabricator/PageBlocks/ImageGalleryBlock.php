<?php

namespace App\Filament\Fabricator\PageBlocks;

use App\Models\Media;
use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\TextInput;
use Z3d0X\FilamentFabricator\PageBlocks\PageBlock;

class ImageGalleryBlock extends PageBlock
{
    public static function getBlockSchema(): Block
    {
        return Block::make('image-gallery')
            ->schema([
                TextInput::make('label')
                    ->label('Menu label')
                    ->placeholder('Enter the menu label of the section')
                    ->default('Images'),
                TextInput::make('title')
                    ->label('Section title')
                    ->placeholder('Enter the title of the section')
                    ->default('Our image gallery')
                    ->columnSpan(2),
            ])
            ->columns(3);
    }

    public static function mutateData(array $data): array
    {
        return $data + [
            'images' => Media::query()->where('type', 'image')->get()->groupBy('group'),
        ];
    }
}
