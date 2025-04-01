<x-filament-panels::page>
    <div class="flex flex-col md:flex-row gap-6 container mx-auto max-w-7xl">
        <!-- Settings Navigation Sidebar -->
        @include('components.settings.sidebar')

        <!-- Main Content -->
        <div class="flex-1 space-y-6">
            <x-filament::section>
                <h2 class="text-xl font-bold tracking-tight mb-4">{{ __('General Settings') }}</h2>
                <p class="text-gray-500 mb-6">{{ __("Manage your application's general settings") }}</p>

                <form wire:submit="save">
                    {{ $this->form }}
                    
                    <div class="mt-6 flex justify-end gap-3">
                        <x-filament::button 
                            type="button" 
                            color="gray" 
                            tag="a" 
                            href="{{ \App\Filament\Resources\SettingResource::getUrl('index') }}" 
                            icon="heroicon-o-arrow-left">
                            {{ __('Back') }}
                        </x-filament::button>
                    
                        <x-filament::button type="submit" color="primary">
                            {{ __('Save Settings') }}
                        </x-filament::button>
                    </div>
                </form>
            </x-filament::section>
        </div>
    </div>
</x-filament-panels::page>