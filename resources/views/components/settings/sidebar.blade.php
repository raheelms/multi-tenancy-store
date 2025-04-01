@php
use App\Filament\Resources\SettingResource;
$currentRoute = request()->route()->getName();
$currentSegment = request()->segment(5);
@endphp
<div class="md:w-64 flex-shrink-0">
    <x-filament::section>
        <nav class="space-y-1">
            <a href="{{ \App\Filament\Resources\SettingResource::getUrl('general') }}" 
            class="flex items-center gap-3 px-3 py-2 text-sm font-medium rounded-md {{ $currentRoute === 'filament.admin.resources.setting.general' ? 'bg-indigo-50 text-blue-950 hover:bg-indigo-100' : 'text-blue-950 hover:bg-indigo-50 dark:text-gray-300 dark:hover:bg-gray-800' }}">
            <x-heroicon-o-cog-6-tooth class="mr-3 h-5 w-5 flex-shrink-0" />
            {{ __('General') }}
            </a>
            <a href="{{ \App\Filament\Resources\SettingResource::getUrl('store') }}" 
            class="flex items-center gap-3 px-3 py-2 text-sm font-medium rounded-md {{ $currentRoute === 'filament.admin.resources.setting.store' ? 'bg-indigo-50 text-blue-950 hover:bg-indigo-100' : 'text-blue-950 hover:bg-indigo-50 dark:text-gray-300 dark:hover:bg-gray-800' }}">
                <x-heroicon-o-shopping-bag class="mr-3 h-5 w-5 flex-shrink-0" />
                {{ __('Store') }}
            </a>
        
            <a href="{{ \App\Filament\Resources\SettingResource::getUrl('mail') }}" 
            class="flex items-center gap-3 px-3 py-2 text-sm font-medium rounded-md {{ $currentRoute === 'filament.admin.resources.setting.mail' ? 'bg-indigo-50 text-blue-950 hover:bg-indigo-100' : 'text-blue-950 hover:bg-indigo-50 dark:text-gray-300 dark:hover:bg-gray-800' }}">
                <x-heroicon-o-envelope class="mr-3 h-5 w-5 flex-shrink-0" />
                {{ __('Mail') }}
            </a>
            
            <a href="{{ \App\Filament\Resources\SettingResource::getUrl('payment') }}" 
            class="flex items-center gap-3 px-3 py-2 text-sm font-medium rounded-md {{ $currentRoute === 'filament.admin.resources.setting.payment' ? 'bg-indigo-50 text-blue-950 hover:bg-indigo-100' : 'text-blue-950 hover:bg-indigo-50 dark:text-gray-300 dark:hover:bg-gray-800' }}">
                <x-heroicon-o-credit-card class="mr-3 h-5 w-5 flex-shrink-0" />
                {{ __('Payment') }}
            </a>
        </nav>
    </x-filament::section>
</div>