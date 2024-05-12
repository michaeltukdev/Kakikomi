<div class="z-10 flex items-center justify-between w-full px-4 border-b bg-container border-border">
    <div class="flex gap-2 my-5">
        <button type="button" wire:click="close('main')" class="h-3 w-3 bg-[#FE6059] hover:bg-[#e95951] transition rounded-full cursor-pointer"></button>
        <button type="button" class="h-3 w-3 bg-[#FCBB2B] hover:bg-[#e8b32b] transition rounded-full"></button>
        <button type="button" class="h-3 w-3 bg-[#2CCC46] hover:bg-[#29c04f] transition rounded-full"></button>
    </div>
    <div class="ml-6">
        <input wire:model.live="search" class="px-3 py-2 text-sm leading-none rounded-lg outline-none bg-tertiary" type="text" placeholder="Search...">
    </div>    
    <div class="w-full h-full" style="-webkit-app-region: drag;"></div>
    <a wire:navigate class="text-sm transition hover:text-white text-nowrap" href="{{ route('note') }}">New Note</a>
</div>