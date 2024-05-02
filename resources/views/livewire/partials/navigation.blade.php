<nav class="py-5 px-3.5 space-y-5 max-h-[calc(100vh-110px)] overflow-y-scroll">
    @foreach ($notes as $note)
        <a wire:navigate href="{{ route('note', $note->id) }}" 
           class="text-gray font-normal text-md flex gap-3 items-center justify-between hover:text-white transition"
           aria-label="Note titled {{ $note->title }}">
            
            <div class="flex gap-3 items-center">
                <svg class="-mt-1" width="12" height="15" viewBox="0 0 12 15" fill="none"
                     xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                    <path d="M3.92499 11.075H7.82499" stroke="#D7D7D7" stroke-linecap="round" />
                    <path d="M3.92499 8.47498H7.82499" stroke="#D7D7D7" stroke-linecap="round" />
                    <path d="M3.92499 5.875H7.82499" stroke="#D7D7D7" stroke-linecap="round" />
                    <path d="M1 1.975V13.025C1 13.5635 1.43652 14 1.975 14H9.775C10.3135 14 10.75 13.5635 10.75 13.025V4.52874C10.75 4.2694 10.6466 4.02075 10.4629 3.83778L7.8978 1.28404C7.71509 1.10213 7.46776 1 7.20991 1H1.975C1.43652 1 1 1.43652 1 1.975Z" stroke="#D7D7D7" stroke-linecap="square" />
                </svg>
                <span>{{ $note->password ? 'Protected note' : Str::limit($note->title, 20) }}</span>
            </div>
            
            @if($note->starred)
                @svg('heroicon-o-star', 'h-5 w-5 fill-yellow stroke-yellow')
            @endif
        </a>
    @endforeach
</nav>
