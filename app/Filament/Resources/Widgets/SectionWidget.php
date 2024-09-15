<?php

namespace App\Filament\Resources\Widgets;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Widgets\Widget;
use Illuminate\Support\Arr;

class SectionWidget extends Widget implements HasForms
{
    use InteractsWithForms;

    public string $label;

    protected static bool $isLazy = false;

    protected static string $view = 'filament.widgets.section-widget';

    public ?array $data = [];

    public function mount(): void
    {
        $this->form->fill(
            Arr::get(setting('more_configs'), $this->label, []),
        );
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('label')
                    ->label('Menu label')
                    ->placeholder('Enter the menu label of the section')
                    ->required(),
                TextInput::make('title')
                    ->label('Section title')
                    ->placeholder('Enter the title of the section'),
                Toggle::make('is_active')
                    ->label('Active')
                    ->default(true),
            ])
            ->statePath('data');
    }

    public function save(): void
    {
        setting()->update([
            'more_configs' => [
                $this->label => $this->form->getState(),
            ] + setting('more_configs'),
        ]);

        Notification::make()
            ->success()
            ->title('Section Updated')
            ->send();
    }
}
