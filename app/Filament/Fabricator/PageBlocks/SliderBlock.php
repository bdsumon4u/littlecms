<?php

namespace App\Filament\Fabricator\PageBlocks;

use App\Models\Slide;
use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\Toggle;
use Z3d0X\FilamentFabricator\PageBlocks\PageBlock;

class SliderBlock extends PageBlock
{
    public static function getBlockSchema(): Block
    {
        return Block::make('slider')
            ->schema([
                Toggle::make('condensed'),
            ]);
    }

    public static function mutateData(array $data): array
    {
        return $data + [
            'slides' => Slide::all(),
        ];
    }
}
