<?php

namespace App\Filament\Fabricator\PageBlocks;

use App\Models\Service;
use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Get;
use Illuminate\Support\Arr;
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
                Toggle::make('custom')
                    ->label('Use custom content')
                    ->helperText('If enabled, you can add custom content to the section')
                    ->live()
                    ->columnSpanFull(),
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
                                ->placeholder('Enter the price of the service'),
                            Textarea::make('description')
                                ->placeholder('Enter the description of the service')
                                ->required()
                                ->columnSpanFull(),
                            TextInput::make('button_label')
                                ->placeholder('Enter the button label of the service'),
                            TextInput::make('button_action')
                                ->placeholder('Enter the button action of the service'),
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
                    ->columnSpanFull()
                    ->hidden(fn(Get $get) => !$get('custom')),
            ])
            ->columns(3);
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
