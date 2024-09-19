<?php

namespace App\Filament\Fabricator\PageBlocks;

use App\Models\Testimonial;
use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\TextInput;
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
            ])
            ->columns(3);
    }

    public static function mutateData(array $data): array
    {
        return $data + [
            'testimonials' => Testimonial::all(),
        ];
    }
}
