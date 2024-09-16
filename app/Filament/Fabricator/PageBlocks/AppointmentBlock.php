<?php

namespace App\Filament\Fabricator\PageBlocks;

use App\Models\Service;
use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\TextInput;
use Z3d0X\FilamentFabricator\PageBlocks\PageBlock;

class AppointmentBlock extends PageBlock
{
    public static function getBlockSchema(): Block
    {
        return Block::make('appointment')
            ->schema([
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
                Group::make([
                    TextInput::make('label')
                        ->label('Menu label')
                        ->placeholder('Enter the menu label of the section')
                        ->default('Appointment'),
                    TextInput::make('title')
                        ->label('Section title')
                        ->placeholder('Enter the title of the section')
                        ->default('Book an appointment'),
                    TextInput::make('button_text')
                        ->placeholder('Appointment Button Text')
                        ->default('Submit')
                        ->required(),
                ])
                    ->columns(3),
            ]);
    }

    public static function mutateData(array $data): array
    {
        return $data + [
            'services' => Service::all(),
        ];
    }
}
