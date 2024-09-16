<?php

namespace App\Filament\Fabricator\PageBlocks;

use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\RichEditor;
use Z3d0X\FilamentFabricator\PageBlocks\PageBlock;

class RichTextBlock extends PageBlock
{
    public static function getBlockSchema(): Block
    {
        return Block::make('rich-text')
            ->schema([
                RichEditor::make('content')
                    ->label('')
                    ->placeholder('Write something...')
                    ->required(),
            ]);
    }

    public static function mutateData(array $data): array
    {
        return $data;
    }
}
