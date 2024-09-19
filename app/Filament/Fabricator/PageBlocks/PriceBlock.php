<?php

namespace App\Filament\Fabricator\PageBlocks;

use App\Models\Service;
use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Get;
use Illuminate\Support\Arr;
use Z3d0X\FilamentFabricator\PageBlocks\PageBlock;

class PriceBlock extends PageBlock
{
    public static function getBlockSchema(): Block
    {
        return Block::make('price')
            ->schema([
                Group::make([
                    Group::make([
                        TextInput::make('label')
                            ->label('Menu label')
                            ->placeholder('Enter the menu label of the section')
                            ->default('Pricing'),
                        TextInput::make('title')
                            ->label('Section title')
                            ->placeholder('Enter the title of the section')
                            ->default('Our pricing')
                            ->columnSpan(2),
                    ])
                        ->columns(3),
                ]),
                FileUpload::make('image')
                    ->label('')
                    ->image()
                    ->imageEditor()
                    ->placeholder('Upload bg image or <span class="filepond--label-action" tabindex="0"> Browse </span>')
                    ->helperText('The recommended resolution is 1920x1280 pixels')
                    ->imageEditorAspectRatios([
                        null,
                        '16:9',
                        '4:3',
                        '1:1',
                    ]),
                Toggle::make('custom')
                    ->label('Use custom content')
                    ->helperText('If enabled, you can add custom content to the section')
                    ->live(),
                Repeater::make('content')
                    ->schema([
                        Group::make([
                            TextInput::make('title')
                                ->placeholder('Enter the title of the service')
                                ->required()
                                ->columnSpanFull(),
                            TextInput::make('remark')
                                ->placeholder('Enter the remark of the service'),
                            TextInput::make('price')
                                ->placeholder('Enter the price of the service')
                                ->required(),
                        ])
                            ->columns(2),
                        FileUpload::make('image')
                            ->label('')
                            ->image()
                            ->imageEditor()
                            ->placeholder('Upload the image of the service or <span class="filepond--label-action" tabindex="0"> Browse </span>')
                            ->hint('The image must have a minimum resolution of 330x256 pixels')
                            ->imageEditorAspectRatios([
                                null,
                                '16:9',
                                '4:3',
                                '1:1',
                            ])
                            ->required(),
                    ])
                    ->columns(2)
                    ->hidden(fn (Get $get) => !$get('custom')),
            ]);
    }

    public static function mutateData(array $data): array
    {
        if (Arr::get($data, 'custom')) {
            $data['services'] = Arr::get($data, 'content', []);
        } else {
            $data['services'] = Service::all();
        }

        return $data;
    }
}
