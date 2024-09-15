<?php

namespace App\Filament\Pages;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Pages\Page;
use Illuminate\Support\Arr;

class AboutUs extends Page implements HasForms
{
    use InteractsWithForms;

    public string $label = 'about';

    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'filament.pages.about-us';

    public ?array $data = [];

    public function mount(): void
    {
        $this->form->fill(
            Arr::get(setting('more_configs'), $this->label, []) + [
                'site_description' => setting('site_description'),
            ],
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
                        Textarea::make('site_description')
                            ->rows(5),
                        Group::make([
                            TextInput::make('button_label'),
                            TextInput::make('button_action'),
                        ])
                            ->columns(2),
                        Toggle::make('is_active')
                            ->label('Active')
                            ->default(true),
                    ]),
                    FileUpload::make('image')
                        ->label('')
                        ->image()
                        ->imageEditor()
                        ->placeholder('Upload an image or <span class="filepond--label-action" tabindex="0"> Browse </span>')
                        ->hint('The image must have a minimum resolution of 300x300 pixels')
                        ->imageEditorAspectRatios([
                            null,
                            '16:9',
                            '4:3',
                            '1:1',
                        ])
                        ->required(),
                ])
                    ->heading('Edit about section')
                    ->columns(2),
            ])
            ->statePath('data');
    }

    public function save(): void
    {
        $data = $this->form->getState();

        setting()->update([
            'site_description' => Arr::pull($data, 'site_description'),
            'more_configs' => [
                $this->label => $data,
            ] + setting('more_configs'),
        ]);

        Notification::make()
            ->success()
            ->title('Section Updated')
            ->send();
    }
}
