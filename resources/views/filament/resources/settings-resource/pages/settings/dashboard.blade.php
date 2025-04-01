<x-filament-panels::page>
    <div class="flex flex-col md:flex-row gap-6">
        
        <!-- Main Content -->
        <div class="flex-1 space-y-6">
            
            <x-filament::section>
                <h2 class="text-xl font-bold tracking-tight mb-4">{{ __('Settings Groups') }}</h2>
                
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    @foreach($settingsGroups as $group)
                        <a href="{{ $group['url'] }}" class="block p-6 border border-gray-200 rounded-xl hover:bg-gray-50 transition-colors">
                            <div class="flex items-center gap-4">
                                <div class="flex-shrink-0 p-3 bg-primary-50 rounded-lg">
                                    <!-- Render icon based on group key -->
                                    @if($group['key'] === 'general')
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-primary-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                        </svg>
                                    @elseif($group['key'] === 'store')
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-primary-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                                        </svg>
                                    @elseif($group['key'] === 'mail')
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-primary-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                        </svg>
                                    @elseif($group['key'] === 'payment')
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-primary-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" />
                                        </svg>
                                    @elseif($group['key'] === 'shipping')
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-primary-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path d="M9 17a2 2 0 11-4 0 2 2 0 014 0zM19 17a2 2 0 11-4 0 2 2 0 014 0z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M13 16V6a1 1 0 00-1-1H4a1 1 0 00-1 1v10a1 1 0 001 1h1m8-1a1 1 0 01-1 1H9m4-1V8a1 1 0 011-1h2.586a1 1 0 01.707.293l3.414 3.414a1 1 0 01.293.707V16a1 1 0 01-1 1h-1m-6-1a1 1 0 001 1h1M5 17a2 2 0 104 0m-4 0a2 2 0 114 0m6 0a2 2 0 104 0m-4 0a2 2 0 114 0" />
                                        </svg>
                                    @elseif($group['key'] === 'localization')
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-primary-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                    @else
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-primary-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4" />
                                        </svg>
                                    @endif
                                </div>
                                <div>
                                    <h3 class="font-semibold text-lg">{{ $group['label'] }}</h3>
                                    <p class="text-sm text-gray-500">{{ $group['description'] }}</p>
                                    <div class="mt-2">
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-primary-100 text-primary-800">
                                            {{ $group['count'] }} settings
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>
            </x-filament::section>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mb-6">
                <x-filament::section>
                    <div class="flex items-center justify-between">
                        <div>
                            <h2 class="text-lg font-bold tracking-tight">Total Settings</h2>
                            <p class="text-sm text-gray-500">All settings in the system</p>
                        </div>
                        <div class="text-3xl font-bold">{{ $stats['total'] }}</div>
                    </div>
                </x-filament::section>
                
                <x-filament::section>
                    <div class="flex items-center justify-between">
                        <div>
                            <h2 class="text-lg font-bold tracking-tight">Public Settings</h2>
                            <p class="text-sm text-gray-500">Publicly accessible settings</p>
                        </div>
                        <div class="text-3xl font-bold">{{ $stats['public'] }}</div>
                    </div>
                </x-filament::section>
                
                <x-filament::section>
                    <div class="flex items-center justify-between">
                        <div>
                            <h2 class="text-lg font-bold tracking-tight">Private Settings</h2>
                            <p class="text-sm text-gray-500">Non-public settings</p>
                        </div>
                        <div class="text-3xl font-bold">{{ $stats['private'] }}</div>
                    </div>
                </x-filament::section>
                
                <x-filament::section>
                    <div class="flex items-center justify-between">
                        <div>
                            <h2 class="text-lg font-bold tracking-tight">Setting Groups</h2>
                            <p class="text-sm text-gray-500">Configuration categories</p>
                        </div>
                        <div class="text-3xl font-bold">{{ $stats['groups'] }}</div>
                    </div>
                </x-filament::section>
            </div>

        </div>
    </div>
</x-filament-panels::page>