<?php

namespace App\Filament\Fabricator\PageBlocks;

use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Z3d0X\FilamentFabricator\PageBlocks\PageBlock;

class AboutBlock extends PageBlock
{
    public static function getBlockSchema(): Block
    {
        return Block::make('about')
            ->schema([
                Group::make([
                    Group::make([
                        TextInput::make('label')
                            ->label('Menu label')
                            ->placeholder('Enter the menu label of the section')
                            ->default('About Us'),
                        TextInput::make('title')
                            ->label('Section title')
                            ->placeholder('Enter the title of the section')
                            ->default('Our success story')
                            ->columnSpan(2),
                    ])
                        ->columns(3),
                    Textarea::make('site_description')
                        ->default(setting('site_description'))
                        ->rows(5),
                    Group::make([
                        TextInput::make('button_label'),
                        TextInput::make('button_action'),
                    ])
                        ->columns(2),
                ]),
                FileUpload::make('image')
                    ->label('')
                    ->image()
                    ->imageEditor()
                    ->placeholder('Upload an image or <span class="filepond--label-action" tabindex="0"> Browse </span>')
                    ->hint('The recommended resolution is 300x300 pixels')
                    ->imageEditorAspectRatios([
                        null,
                        '16:9',
                        '4:3',
                        '1:1',
                    ])
                    ->required(),
            ])
            ->columns(2);
    }

    public static function mutateData(array $data): array
    {
        return $data;
    }
}
