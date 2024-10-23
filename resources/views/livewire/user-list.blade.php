<div>

    @livewire(App\Livewire\CreatePost::class)
    {{-- The whole world belongs to you. --}}
    <ul>
        @foreach ($users as $user)    
            <div wire:key="{{ $user->id }}">
                <li>{{ $user->name }}</li>
            </div>
        @endforeach
    </ul>
</div>
