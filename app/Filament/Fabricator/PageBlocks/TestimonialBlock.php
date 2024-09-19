<?php

namespace App\Filament\Fabricator\PageBlocks;

use App\Models\Testimonial;
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

class TestimonialBlock extends PageBlock
{
    public static function getBlockSchema(): Block
    {
        return Block::make('testimonial')
            ->schema([
                TextInput::make('label')
                    ->label('Menu label')
                    ->placeholder('Enter the menu label of the section')
                    ->default('Client'),
                TextInput::make('title')
                    ->label('Section title')
                    ->placeholder('Enter the title of the section')
                    ->default('What our clients say!')
                    ->columnSpan(2),
                Toggle::make('custom')
                    ->label('Use custom content')
                    ->helperText('If enabled, you can add custom content to the section')
                    ->live()
                    ->columnSpanFull(),
                Repeater::make('content')
                    ->schema([
                        Group::make([
                            TextInput::make('name')
                                ->placeholder('Enter the name of the client')
                                ->required(),
                            Textarea::make('speech')
                                ->placeholder('Enter the speech of the client')
                                ->required(),
                        ]),
                        FileUpload::make('image')
                            ->label('')
                            ->image()
                            ->imageEditor()
                            ->placeholder('Upload the image of the client or <span class="filepond--label-action" tabindex="0"> Browse </span>')
                            ->hint('The image must have a minimum resolution of 150x150 pixels')
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
            $data['testimonials'] = Arr::get($data, 'content', []);
        } else {
            $data['testimonials'] = Testimonial::all();
        }

        return $data;
    }
}
