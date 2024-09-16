<?php

namespace App\Filament\Fabricator\PageBlocks;

use App\Models\Person;
use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\TextInput;
use Z3d0X\FilamentFabricator\PageBlocks\PageBlock;

class TeamBlock extends PageBlock
{
    public static function getBlockSchema(): Block
    {
        return Block::make('team')
            ->schema([
                TextInput::make('label')
                    ->label('Menu label')
                    ->placeholder('Enter the menu label of the section')
                    ->default('Team'),
                TextInput::make('title')
                    ->label('Section title')
                    ->placeholder('Enter the title of the section')
                    ->default('Our smart team')
                    ->columnSpan(2),
            ])
            ->columns(3);
    }

    public static function mutateData(array $data): array
    {
        return $data + [
            'people' => Person::all(),
        ];
    }
}
