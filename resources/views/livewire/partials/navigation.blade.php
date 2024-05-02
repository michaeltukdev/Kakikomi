<nav class="py-5 px-3.5 space-y-5 max-h-[calc(100vh-110px)] overflow-y-scroll">
    @foreach ($notes as $note)
        <a wire:navigate href="{{ route('note', $note->id) }}" 
           class="text-gray font-normal text-md flex gap-3 items-center justify-between hover:text-white transition"
           aria-label="Note titled {{ $note->title }}">
            
            <div class="flex gap-3 items-center">
                <svg class="mt-1" width="12" height="15" viewBox="0 0 12 15" fill="none"
                     xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                    <path d="M3.92499 11.075H7.82499" stroke="#D7D7D7" stroke-linecap="round" />
                    <path d="M3.92499 8.47498H7.82499" stroke="#D7D7D7" stroke-linecap="round" />
                    <path d="M3.92499 5.875H7.82499" stroke="#D7D7D7" stroke-linecap="round" />
                    <path d="M1 1.975V13.025C1 13.5635 1.43652 14 1.975 14H9.775C10.3135 14 10.75 13.5635 10.75 13.025V4.52874C10.75 4.2694 10.6466 4.02075 10.4629 3.83778L7.8978 1.28404C7.71509 1.10213 7.46776 1 7.20991 1H1.975C1.43652 1 1 1.43652 1 1.975Z" stroke="#D7D7D7" stroke-linecap="square" />
                </svg>
                <span>{{ Str::limit($note->title, 20) }}</span>
            </div>
            
            @if($note->starred)
                <svg width="18" height="18" viewBox="0 0 15 15" fill="#FFD700" xmlns="http://www.w3.org/2000/svg">
                    <path d="M7.04522 1.33379C7.19955 0.888735 7.80047 0.888735 7.9548 1.33379L9.26335 5.10692C9.33077 5.30133 9.5042 5.43332 9.70156 5.44041L13.5319 5.57793C13.9837 5.59415 14.1694 6.19277 13.813 6.48405L10.7913 8.95351C10.6357 9.08069 10.5694 9.29431 10.624 9.49312L11.6827 13.3512C11.8076 13.8063 11.3215 14.1762 10.9468 13.9112L7.77086 11.6643C7.60724 11.5485 7.39278 11.5485 7.22916 11.6643L4.05319 13.9112C3.67857 14.1762 3.19241 13.8063 3.31729 13.3512L4.37607 9.49312C4.43062 9.29431 4.36437 9.08069 4.20868 8.95351L1.18704 6.48405C0.830621 6.19277 1.01632 5.59415 1.46812 5.57793L5.29846 5.44041C5.49583 5.43332 5.66927 5.30133 5.73669 5.10692L7.04522 1.33379Z" stroke="#FFD700" stroke-linejoin="round" />
                </svg>
            @endif
        </a>
    @endforeach
</nav>
