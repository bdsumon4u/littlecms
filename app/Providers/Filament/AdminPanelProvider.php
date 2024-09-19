<?php

namespace App\Providers\Filament;

use Datlechin\FilamentMenuBuilder\FilamentMenuBuilderPlugin;
use Datlechin\FilamentMenuBuilder\MenuPanel\StaticMenuPanel;
use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Pages;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\Support\Colors\Color;
use Filament\Support\Facades\FilamentView;
use Filament\Tables\Table;
use Filament\View\PanelsRenderHook;
use Filament\Widgets;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\AuthenticateSession;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;
use Joaopaulolndev\FilamentGeneralSettings\FilamentGeneralSettingsPlugin;
use Z3d0X\FilamentFabricator\FilamentFabricatorPlugin;

class AdminPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->default()
            ->id('admin')
            ->homeUrl('/')
            ->path('admin')
            ->login()
            ->colors([
                'primary' => Color::Neutral,
            ])
            ->plugins([
                FilamentFabricatorPlugin::make(),
                FilamentMenuBuilderPlugin::make()
                    ->addLocations([
                        'main' => 'Main',
                    ])
                    ->addMenuPanels([
                        StaticMenuPanel::make()
                            ->addMany([
                                'Home' => '#home',
                                'Service' => '#service',
                                'About' => '#about',
                                'Team' => '#team',
                                'Price' => '#price',
                                'Client' => '#testimonial',
                                'Images' => '#images',
                                'Videos' => '#videos',
                                'Appointment' => '#appointment',
                            ]),
                    ]),
            ])
            ->discoverResources(in: app_path('Filament/Resources'), for: 'App\\Filament\\Resources')
            ->discoverPages(in: app_path('Filament/Pages'), for: 'App\\Filament\\Pages')
            ->pages([
                Pages\Dashboard::class,
            ])
            ->discoverWidgets(in: app_path('Filament/Widgets'), for: 'App\\Filament\\Widgets')
            ->widgets([
                Widgets\AccountWidget::class,
                Widgets\FilamentInfoWidget::class,
            ])
            ->plugins([
                FilamentGeneralSettingsPlugin::make()
                    ->setIcon('heroicon-o-cog')
                    ->setNavigationGroup('Settings')
                    ->setTitle('General Settings')
                    ->setNavigationLabel('General Settings'),
            ])
            ->middleware([
                EncryptCookies::class,
                AddQueuedCookiesToResponse::class,
                StartSession::class,
                AuthenticateSession::class,
                ShareErrorsFromSession::class,
                VerifyCsrfToken::class,
                SubstituteBindings::class,
                DisableBladeIconComponents::class,
                DispatchServingFilamentEvent::class,
            ])
            ->authMiddleware([
                Authenticate::class,
            ])
            ->sidebarWidth('20rem')
            ->spa();
    }

    public function boot(): void
    {
        Table::$defaultCurrency = 'bdt';
        Table::$defaultDateDisplayFormat = 'd-M-Y';
        Table::$defaultTimeDisplayFormat = 'h:i A';
        Table::$defaultDateTimeDisplayFormat = 'd-M-Y h:i A';

        FilamentView::registerRenderHook(
            PanelsRenderHook::TOPBAR_START,
            fn () => '<a href="/" target="_blank" class="flex items-center space-x-2 text-sm font-medium text-gray-900 hover:text-gray-900 transition-colors duration-200">
                <span>Visit Site</span>
            </a>',
        );
    }
}
