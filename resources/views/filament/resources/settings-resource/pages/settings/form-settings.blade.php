<!-- This is a reusable form template for settings -->
<div>
    @if(isset($title))
        <h2 class="text-xl font-bold tracking-tight mb-4">{{ $title }}</h2>
    @endif
    
    @if(isset($description))
        <p class="text-gray-500 mb-4">{{ $description }}</p>
    @endif
    
    <div class="space-y-6">
        {{ $slot }}
    </div>
</div>