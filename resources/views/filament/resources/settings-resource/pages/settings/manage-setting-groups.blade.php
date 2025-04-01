<x-filament-panels::page>
    <div class="flex flex-col md:flex-row gap-6">
        <!-- Sidebar -->
        <x-settings.sidebar />
        
        <!-- Main Content -->
        <div class="flex-1 space-y-6">
            <x-filament::section>
                <h2 class="text-xl font-bold tracking-tight mb-4">Manage Setting Groups</h2>
                <p class="text-gray-500 mb-6">Organize your settings by updating group information.</p>
                
                <form wire:submit.prevent="save">
                    {{ $this->form }}
                    
                    <div class="mt-6 flex justify-end">
                        <x-filament::button type="submit">
                            Save
                        </x-filament::button>
                    </div>
                </form>
            </x-filament::section>
            
            <x-filament::section class="mt-6">
                <div class="prose max-w-none">
                    <h3>Adding New Groups</h3>
                    <p>
                        To add a new settings group, you need to update the <code>config/settings.php</code> file.
                        Add your new group to the <code>groups</code> array with the following structure:
                    </p>
                    
                    <pre><code>'your_group_key' => [
                        'label' => 'Your Group Name',
                        'icon' => 'heroicon-o-category-icon',
                        'description' => 'Description of your settings group',
                    ],</code></pre>
                    
                    <p>
                        Once added, the new group will appear in this list and you can start adding settings to it.
                    </p>
                </div>
            </x-filament::section>
        </div>
    </div>
</x-filament-panels::page>