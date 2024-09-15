<?php

namespace App\Filament\Pages;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Pages\Page;
use Illuminate\Support\Arr;

class Pricing extends Page implements HasForms
{
    use InteractsWithForms;

    public string $label = 'pricing';

    protected static ?string $navigationIcon = 'heroicon-o-banknotes';

    protected static string $view = 'filament.pages.pricing';

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
                Section::make([
                    Group::make([
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
                    ]),
                    FileUpload::make('bg_image')
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
                ])
                    ->heading('Edit pricing section')
                    ->columns(2),
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
