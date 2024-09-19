<?php

namespace App\Filament\Pages;

use Filament\Forms\Components\Section;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Pages\Page;
use Illuminate\Support\Arr;

class ContactUs extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-map';

    protected static string $view = 'filament.pages.contact-us';

    public ?array $data = [];

    public function mount(): void
    {
        $this->form->fill(
            Arr::only(setting('more_configs', []), [
                'label', 'email_label', 'phone_label',
                'location_label', 'location', 'hours_label', 'hours',
            ]) + [
                'support_email' => setting('support_email'),
                'support_phone' => setting('support_phone'),
            ],
        );
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make([
                    TextInput::make('label')
                        ->label('Menu label')
                        ->placeholder('Enter the menu label of the section')
                        ->required()
                        ->columnSpanFull(),
                    Section::make('Email')
                        ->schema([
                            TextInput::make('email_label')
                                ->required()
                                ->label('Label'),
                            TextInput::make('support_email')
                                ->required(),
                        ])
                        ->columnSpan(1),
                    Section::make('Phone')
                        ->schema([
                            TextInput::make('phone_label')
                                ->required()
                                ->label('Label'),
                            TextInput::make('support_phone')
                                ->required(),
                        ])
                        ->columnSpan(1),
                    Section::make('Address/Location')
                        ->schema([
                            TextInput::make('location_label')
                                ->required()
                                ->label('Label'),
                            Textarea::make('location')
                                ->required()
                                ->rows(3),
                        ])
                        ->columnSpan(1),
                    Section::make('Opening Hours')
                        ->schema([
                            TextInput::make('hours_label')
                                ->required()
                                ->label('Label'),
                            Textarea::make('hours')
                                ->required()
                                ->rows(3),
                        ])
                        ->columnSpan(1),
                ])
                    ->heading('Edit contact section')
                    ->columns(2),
            ])
            ->statePath('data');
    }

    public function save(): void
    {
        $data = $this->form->getState();

        setting()->update([
            'more_configs' => Arr::only($data, [
                'label', 'email_label', 'phone_label', 'location_label', 'location', 'hours_label', 'hours',
            ]) + setting('more_configs', []),
        ]);

        Notification::make()
            ->success()
            ->title('Section Updated')
            ->send();
    }
}
