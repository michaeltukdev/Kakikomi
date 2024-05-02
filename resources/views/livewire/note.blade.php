<div class="container mx-auto">
    <form wire:submit='save'>
        <div class="flex gap-20 items-center">
            <input placeholder='Craft your next masterpiece....' wire:model='title' type="text"
                class="bg-transparent border-none outline-none appearance-none text-white text-2xl font-medium leading-5 tracking-[0.4px] w-full p-0">

            <div x-data="{ open: false }" class="relative">
                <button @click="open = true">
                    <svg width="18" height="4" viewBox="0 0 18 4" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M2 2V2.05" stroke="white" stroke-width="2.5" stroke-linecap="round" />
                        <path d="M9 2V2.05" stroke="white" stroke-width="2.5" stroke-linecap="round" />
                        <path d="M16 2V2.05" stroke="white" stroke-width="2.5" stroke-linecap="round" />
                    </svg>
                </button>

                <div class="absolute top-8 right-0 bg-container border-border border-1 z-10 w-[140px] py-2 px-4 rounded-lg shadow-2xl" x-show="open" @click.away="open = false" x-transition>
                    <button class="text-red-400 hover:text-red-500"  @click="$wire.delete()">Delete</button>
                </div>
            </div>

        </div>
        <div class="w-full h-px bg-[#32343A] my-5"></div>
        <div x-data="{ input: '' }" class="font-normal leading-[35px] text-base">
            <textarea wire:model='content' placeholder="Explore your thoughts on your creative canvas..." x-autosize
                class="w-full bg-transparent outline-none"
                x-on:input="$el.style.height = 'auto'; $el.style.height = $el.scrollHeight + 'px'"></textarea>
        </div>

        <div class="flex justify-end mt-8">
            <button class="py-2 px-4 bg-white rounded-lg text-background hover:bg-slate-200 transition">Save
                Note</button>
        </div>
    </form>
</div>
