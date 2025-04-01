<?php

namespace App\Providers\Filament;

use Filament\FontProviders\GoogleFontProvider;
use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\AuthenticateSession;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Pages;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\Support\Colors\Color;
use Filament\Widgets;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;

class AdminPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->default()
            ->id('admin')
            ->path('dashboard')
            ->login()
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
            ->font('Exo 2', provider: GoogleFontProvider::class) //Font Family: Exo 2, Raleway
            ->viteTheme('resources/css/filament/admin/theme.css')
            //->maxContentWidth('7xl')
            ->colors([
                'custom' => '#087260',
                'primary' => Color::Indigo,
                'danger' => Color::Red,
                'gray' => Color::Zinc,
                'info' => Color::Blue,
                'success' => Color::Teal,
                'warning' => Color::Amber,
                'custom' => '#087260',
                
                // Violet
                'violet-50' => '#f5f3ff',
                'violet-100' => '#ede9fe',
                'violet-200' => '#ddd6fe',
                'violet-300' => '#c4b5fd',
                'violet-400' => '#a78bfa',
                'violet-500' => '#8b5cf6',
                'violet-600' => '#7c3aed',
                'violet-700' => '#6d28d9',
                'violet-800' => '#5b21b6',
                'violet-900' => '#4c1d95',

                // Blue
                'blue-50' => '#eff6ff',
                'blue-100' => '#dbeafe',
                'blue-200' => '#bfdbfe',
                'blue-300' => '#93c5fd',
                'blue-400' => '#60a5fa',
                'blue-500' => '#3b82f6',
                'blue-600' => '#2563eb',
                'blue-700' => '#1d4ed8',
                'blue-800' => '#1e40af',
                'blue-900' => '#1e3a8a',

                // Sky
                'sky-50' => '#f0f9ff',
                'sky-100' => '#e0f2fe',
                'sky-200' => '#bae6fd',
                'sky-300' => '#7dd3fc',
                'sky-400' => '#38bdf8',
                'sky-500' => '#0ea5e9',
                'sky-600' => '#0284c7',
                'sky-700' => '#0369a1',
                'sky-800' => '#075985',
                'sky-900' => '#0c4a6e',

                // Cyan
                'cyan-50' => '#ecfeff',
                'cyan-100' => '#cffafe',
                'cyan-200' => '#a5f3fc',
                'cyan-300' => '#67e8f9',
                'cyan-400' => '#22d3ee',
                'cyan-500' => '#06b6d4',
                'cyan-600' => '#0891b2',
                'cyan-700' => '#0e7490',
                'cyan-800' => '#155e75',
                'cyan-900' => '#164e63',

                // Teal
                'teal-50' => '#f0fdfa',
                'teal-100' => '#ccfbf1',
                'teal-200' => '#99f6e4',
                'teal-300' => '#5eead4',
                'teal-400' => '#2dd4bf',
                'teal-500' => '#14b8a6',
                'teal-600' => '#0d9488',
                'teal-700' => '#0f766e',
                'teal-800' => '#115e59',
                'teal-900' => '#134e4a',

                // Emerald
                'emerald-50' => '#ecfdf5',
                'emerald-100' => '#d1fae5',
                'emerald-200' => '#a7f3d0',
                'emerald-300' => '#6ee7b7',
                'emerald-400' => '#34d399',
                'emerald-500' => '#10b981',
                'emerald-600' => '#059669',
                'emerald-700' => '#047857',
                'emerald-800' => '#065f46',
                'emerald-900' => '#064e3b',

                // Green
                'green-50' => '#f0fdf4',
                'green-100' => '#dcfce7',
                'green-200' => '#bbf7d0',
                'green-300' => '#86efac',
                'green-400' => '#4ade80',
                'green-500' => '#22c55e',
                'green-600' => '#16a34a',
                'green-700' => '#15803d',
                'green-800' => '#166534',
                'green-900' => '#14532d',

                // Yellow
                'yellow-50' => '#fefce8',
                'yellow-100' => '#fef9c3',
                'yellow-200' => '#fef08a',
                'yellow-300' => '#fde047',
                'yellow-400' => '#facc15',
                'yellow-500' => '#eab308',
                'yellow-600' => '#ca8a04',
                'yellow-700' => '#a16207',
                'yellow-800' => '#854d0e',
                'yellow-900' => '#713f12',

                // Orange
                'orange-50' => '#fff7ed',
                'orange-100' => '#ffedd5',
                'orange-200' => '#fed7aa',
                'orange-300' => '#fdba74',
                'orange-400' => '#fb923c',
                'orange-500' => '#f97316',
                'orange-600' => '#ea580c',
                'orange-700' => '#c2410c',
                'orange-800' => '#9a3412',
                'orange-900' => '#7c2d12',

                // Red
                'red-50' => '#fef2f2',
                'red-100' => '#fee2e2',
                'red-200' => '#fecaca',
                'red-300' => '#fca5a5',
                'red-400' => '#f87171',
                'red-500' => '#ef4444',
                'red-600' => '#dc2626',
                'red-700' => '#b91c1c',
                'red-800' => '#991b1b',
                'red-900' => '#7f1d1d',

                // Rose
                'rose-50' => '#fff1f2',
                'rose-100' => '#ffe4e6',
                'rose-200' => '#fecdd3',
                'rose-300' => '#fda4af',
                'rose-400' => '#fb7185',
                'rose-500' => '#f43f5e',
                'rose-600' => '#e11d48',
                'rose-700' => '#be123c',
                'rose-800' => '#9f1239',
                'rose-900' => '#881337',

                // Pink
                'pink-50' => '#fdf2f8',
                'pink-100' => '#fce7f3',
                'pink-200' => '#fbcfe8',
                'pink-300' => '#f9a8d4',
                'pink-400' => '#f472b6',
                'pink-500' => '#ec4899',
                'pink-600' => '#db2777',
                'pink-700' => '#be185d',
                'pink-800' => '#9d174d',
                'pink-900' => '#831843',

                // Fuchsia
                'fuchsia-50' => '#fdf4ff',
                'fuchsia-100' => '#fae8ff',
                'fuchsia-200' => '#f5d0fe',
                'fuchsia-300' => '#f0abfc',
                'fuchsia-400' => '#e879f9',
                'fuchsia-500' => '#d946ef',
                'fuchsia-600' => '#c026d3',
                'fuchsia-700' => '#a21caf',
                'fuchsia-800' => '#86198f',
                'fuchsia-900' => '#701a75',

                // Purple
                'purple-50' => '#faf5ff',
                'purple-100' => '#f3e8ff',
                'purple-200' => '#e9d5ff',
                'purple-300' => '#d8b4fe',
                'purple-400' => '#c084fc',
                'purple-500' => '#a855f7',
                'purple-600' => '#9333ea',
                'purple-700' => '#7e22ce',
                'purple-800' => '#6b21a8',
                'purple-900' => '#581c87',

                // Indigo
                'indigo-50' => '#eef2ff',
                'indigo-100' => '#e0e7ff',
                'indigo-200' => '#c7d2fe',
                'indigo-300' => '#a5b4fc',
                'indigo-400' => '#818cf8',
                'indigo-500' => '#6366f1',
                'indigo-600' => '#4f46e5',
                'indigo-700' => '#4338ca',
                'indigo-800' => '#3730a3',
                'indigo-900' => '#312e81',

                // Lime
                'lime-50' => '#f7fee7',
                'lime-100' => '#ecfccb',
                'lime-200' => '#d9f99d',
                'lime-300' => '#bef264',
                'lime-400' => '#a3e635',
                'lime-500' => '#84cc16',
                'lime-600' => '#65a30d',
                'lime-700' => '#4d7c0f',
                'lime-800' => '#3f6212',
                'lime-900' => '#365314',

                // Slate
                'slate-50' => '#f8fafc',
                'slate-100' => '#f1f5f9',
                'slate-200' => '#e2e8f0',
                'slate-300' => '#cbd5e1',
                'slate-400' => '#94a3b8',
                'slate-500' => '#64748b',
                'slate-600' => '#475569',
                'slate-700' => '#334155',
                'slate-800' => '#1e293b',
                'slate-900' => '#0f172a',

                // Stone
                'stone-50' => '#fafaf9',
                'stone-100' => '#f5f5f4',
                'stone-200' => '#e7e5e4',
                'stone-300' => '#d6d3d1',
                'stone-400' => '#a8a29e',
                'stone-500' => '#78716c',
                'stone-600' => '#57534e',
                'stone-700' => '#44403c',
                'stone-800' => '#292524',
                'stone-900' => '#1c1917',
            ])
            ->navigationGroups([
                'Store',
                'Content Management',
                'Inventory Management',
                'Marketing Management',
                'User Management',
                'System',
            ])
            ->authMiddleware([
                Authenticate::class,
            ]);
    }
}