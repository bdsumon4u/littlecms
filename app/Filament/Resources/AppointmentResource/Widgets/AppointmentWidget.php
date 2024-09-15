<?php

namespace App\Filament\Resources\AppointmentResource\Widgets;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Widgets\Widget;
use Illuminate\Support\Arr;

class AppointmentWidget extends Widget implements HasForms
{
    use InteractsWithForms;

    protected int|string|array $columnSpan = 'full';

    protected static bool $isLazy = false;

    protected static string $view = 'filament.resources.appointment-resource.widgets.appointment-widget';

    public ?array $data = [];

    public function mount(): void
    {
        $this->form->fill(
            Arr::get(setting('more_configs'), 'appointment', []),
        );
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Grid::make()->schema([
                    Section::make('Pre-Appointment')
                        ->schema([
                            FileUpload::make('pre_bg_image')
                                ->label('')
                                ->image()
                                ->imageEditor()
                                ->placeholder('Upload bg image or <span class="filepond--label-action" tabindex="0"> Browse </span>')
                                ->helperText('The recommended resolution is 1920x960 pixels')
                                ->imageEditorAspectRatios([
                                    null,
                                    '16:9',
                                    '4:3',
                                    '1:1',
                                ]),
                            TextInput::make('pre_title')->placeholder('Pre-Appointment Title'),
                            Textarea::make('pre_text')->placeholder('Pre-Appointment Text'),
                            TextInput::make('pre_button_text')->placeholder('Pre-Appointment Button Text'),
                        ])
                        ->columnSpan(1),
                    Group::make([
                        Section::make('Appointment Form')
                            ->schema([
                                FileUpload::make('form_bg_image')
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
                                TextInput::make('form_title')->placeholder('Form Title'),
                                TextInput::make('form_button_text')->placeholder('Form Button Text'),
                            ])
                            ->columnSpan(1),
                        TextInput::make('label')
                            ->label('Menu label')
                            ->placeholder('Enter the menu label of the section')
                            ->required(),
                        Toggle::make('is_active')
                            ->label('Active')
                            ->default(true),
                    ]),
                ]),
            ])
            ->statePath('data');
    }

    public function save(): void
    {
        setting()->update([
            'more_configs' => [
                'appointment' => $this->form->getState(),
            ] + setting('more_configs'),
        ]);

        Notification::make()
            ->success()
            ->title('Section Updated')
            ->send();
    }
}
