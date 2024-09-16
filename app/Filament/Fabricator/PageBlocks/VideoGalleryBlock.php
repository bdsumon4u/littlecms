<?php

namespace App\Filament\Fabricator\PageBlocks;

use App\Models\Media;
use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\TextInput;
use Z3d0X\FilamentFabricator\PageBlocks\PageBlock;

class VideoGalleryBlock extends PageBlock
{
    public static function getBlockSchema(): Block
    {
        return Block::make('video-gallery')
            ->schema([
                TextInput::make('label')
                    ->label('Menu label')
                    ->placeholder('Enter the menu label of the section')
                    ->default('Videos'),
                TextInput::make('title')
                    ->label('Section title')
                    ->placeholder('Enter the title of the section')
                    ->default('Our video gallery')
                    ->columnSpan(2),
            ])
            ->columns(3);
    }

    public static function mutateData(array $data): array
    {
        return $data + [
            'videos' => Media::query()->where('type', 'video')->get()->groupBy('group'),
        ];
    }
}
