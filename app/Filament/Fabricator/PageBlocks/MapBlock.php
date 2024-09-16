<?php

namespace App\Filament\Fabricator\PageBlocks;

use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\Textarea;
use Illuminate\Support\Arr;
use Z3d0X\FilamentFabricator\PageBlocks\PageBlock;

class MapBlock extends PageBlock
{
    public static function getBlockSchema(): Block
    {
        return Block::make('map')
            ->schema([
                Textarea::make('map')
                    ->placeholder('Google map embed code')
                    ->default(Arr::get(setting('more_configs'), 'map'))
                    ->rows(5),
            ]);
    }

    public static function mutateData(array $data): array
    {
        return $data;
    }
}
