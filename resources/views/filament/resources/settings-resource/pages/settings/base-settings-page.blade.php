<x-filament-panels::page>
    <div class="flex flex-col md:flex-row gap-6">
        <!-- Sidebar -->
        <x-settings.sidebar />
        
        <!-- Main Content -->
        <div class="flex-1 space-y-6">
            <x-filament::section>
                <form wire:submit="save">
                    {{ $this->form }}
                    
                    <div class="mt-6 flex justify-end">
                        {{ $this->getFormActions() }}
                    </div>
                </form>
            </x-filament::section>
        </div>
    </div>
</x-filament-panels::page>