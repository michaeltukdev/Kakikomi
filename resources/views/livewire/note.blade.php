<div class="container mx-auto">
    <form wire:submit='save'>
        <div class="flex gap-20 items-center">
            <input @if ($locked) disabled @endif placeholder='Craft your next masterpiece....'
                wire:model='title' type="text"
                class="bg-transparent border-none outline-none appearance-none text-white text-2xl font-medium leading-5 tracking-[0.4px] w-full p-0">

            <div class="flex gap-3">
                <button @click="$wire.star()" type="button">
                    <svg width="18" height="18" viewBox="0 0 15 15" fill="@if($starred) #FFD700 @else #32343A @endif"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M7.04522 1.33379C7.19955 0.888735 7.80047 0.888735 7.9548 1.33379L9.26335 5.10692C9.33077 5.30133 9.5042 5.43332 9.70156 5.44041L13.5319 5.57793C13.9837 5.59415 14.1694 6.19277 13.813 6.48405L10.7913 8.95351C10.6357 9.08069 10.5694 9.29431 10.624 9.49312L11.6827 13.3512C11.8076 13.8063 11.3215 14.1762 10.9468 13.9112L7.77086 11.6643C7.60724 11.5485 7.39278 11.5485 7.22916 11.6643L4.05319 13.9112C3.67857 14.1762 3.19241 13.8063 3.31729 13.3512L4.37607 9.49312C4.43062 9.29431 4.36437 9.08069 4.20868 8.95351L1.18704 6.48405C0.830621 6.19277 1.01632 5.59415 1.46812 5.57793L5.29846 5.44041C5.49583 5.43332 5.66927 5.30133 5.73669 5.10692L7.04522 1.33379Z"
                            stroke="@if($starred) #FFD700 @else white @endif" stroke-linejoin="round" />
                    </svg>
                </button>

                <div x-data="{ open: false }" class="relative">
                    <button class="py-4" @click="open = true">
                        <svg width="18" height="4" viewBox="0 0 18 4" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path d="M2 2V2.05" stroke="white" stroke-width="2.5" stroke-linecap="round" />
                            <path d="M9 2V2.05" stroke="white" stroke-width="2.5" stroke-linecap="round" />
                            <path d="M16 2V2.05" stroke="white" stroke-width="2.5" stroke-linecap="round" />
                        </svg>
                    </button>

                    <div class="absolute top-8 space-y-4 right-0 bg-container border-border border-1 z-10 w-[140px] py-4 px-4 rounded-lg shadow-2xl"
                        x-show="open" @click.away="open = false" x-transition>
                        <button class="w-full text-start hover:text-white transition"
                            @click="$wire.lock(); open = false">
                            @if ($locked)
                                Unlock Note
                            @else
                                Lock Note
                            @endif
                        </button>
                        <button class="text-red-400 hover:text-red-500 w-full text-start transition"
                            @click="$wire.delete()">Delete</button>
                    </div>
                </div>
            </div>

        </div>
        <div class="w-full h-px bg-[#32343A] my-5"></div>
        <div x-data="{ input: '' }" class="font-normal leading-[35px] text-base">
            <textarea @if ($locked) disabled @endif wire:model='content'
                placeholder="Explore your thoughts on your creative canvas..." x-autosize class="w-full bg-transparent outline-none"
                x-on:input="$el.style.height = 'auto'; $el.style.height = $el.scrollHeight + 'px'"></textarea>
        </div>

        @if (!$locked)
            <div class="flex justify-end mt-8">
                <button class="py-2 px-4 bg-white rounded-lg text-background hover:bg-slate-200 transition">Save
                    Note</button>
            </div>
        @endif
    </form>
</div>
