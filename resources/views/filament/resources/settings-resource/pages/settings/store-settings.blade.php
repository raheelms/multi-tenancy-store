<x-filament-panels::page>
    <div class="flex flex-col md:flex-row gap-6">
        <!-- Sidebar -->
        <x-settings.sidebar />
        
        <!-- Main Content -->
        <div class="flex-1 space-y-6">
            <x-filament::section>
                <h2 class="text-xl font-bold tracking-tight mb-4">Store Settings</h2>
                <p class="text-gray-500 mb-6">Configure your store settings including currency, tax rates, and more.</p>
                
                <form wire:submit.prevent="save">
                    {{ $this->form }}
                    
                    <div class="mt-6 flex justify-end">
                        <x-filament::button type="submit">
                            Save
                        </x-filament::button>
                    </div>
                </form>
            </x-filament::section>
        </div>
    </div>
</x-filament-panels::page>