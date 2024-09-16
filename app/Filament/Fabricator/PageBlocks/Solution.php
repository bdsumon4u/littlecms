<?php

namespace App\Filament\Fabricator\PageBlocks;

use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Z3d0X\FilamentFabricator\PageBlocks\PageBlock;

class Solution extends PageBlock
{
    public static function getBlockSchema(): Block
    {
        return Block::make('solution')
            ->schema([
                FileUpload::make('image')
                    ->label('')
                    ->image()
                    ->imageEditor()
                    ->placeholder('Upload bg image or <span class="filepond--label-action" tabindex="0"> Browse </span>')
                    ->helperText('The recommended resolution is 1920x960 pixels')
                    ->imageEditorAspectRatios([
                        null,
                        '16:9',
                        '4:3',
                        '1:1',
                    ]),
                Group::make([
                    TextInput::make('title')
                        ->placeholder('Solution Title')
                        ->default('Book an appointment'),
                    TextInput::make('button_text')
                        ->placeholder('Solution Button Text')
                        ->default('Book Now'),
                    TextInput::make('button_trigger')
                        ->placeholder('Solution Button Trigger')
                        ->default('#appointment'),
                ])
                    ->columns(3),
                Textarea::make('text')->placeholder('Solution Text'),
            ]);
    }

    public static function mutateData(array $data): array
    {
        return $data;
    }
}
