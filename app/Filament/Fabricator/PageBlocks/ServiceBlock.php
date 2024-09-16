<?php

namespace App\Filament\Fabricator\PageBlocks;

use App\Models\Service;
use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\TextInput;
use Z3d0X\FilamentFabricator\PageBlocks\PageBlock;

class ServiceBlock extends PageBlock
{
    public static function getBlockSchema(): Block
    {
        return Block::make('service')
            ->schema([
                TextInput::make('label')
                    ->label('Menu label')
                    ->placeholder('Enter the menu label of the section')
                    ->default('Services'),
                TextInput::make('title')
                    ->label('Section title')
                    ->placeholder('Enter the title of the section')
                    ->default('Services we provide')
                    ->columnSpan(2),
            ])
            ->columns(3);
    }

    public static function mutateData(array $data): array
    {
        return $data + [
            'services' => Service::all(),
        ];
    }
}
