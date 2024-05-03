<div class="bg-container w-full p-4 z-10 flex items-center justify-between border-b border-border">
    <div class="flex gap-2">
        <button type="button" wire:click="close" class="h-3 w-3 bg-[#FE6059] hover:bg-[#e95951] transition rounded-full cursor-pointer"></button>
        <button type="button" wire:click="minimise"  class="h-3 w-3 bg-[#FCBB2B] hover:bg-[#e8b32b] transition rounded-full"></button>
        <button type="button" wire:click="close"  class="h-3 w-3 bg-[#2CCC46] hover:bg-[#29c04f] transition rounded-full"></button>
    </div>
    <div class="w-full h-full" style="-webkit-app-region: drag;"></div>
    <a class="hover:text-white transition text-sm text-nowrap" href="#">New Note</a>
</div>