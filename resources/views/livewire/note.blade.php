<div class="container mx-auto">

    @if (!$revealed)
        <div x-data="{ passwordEntered: false }" class="text-center">
            <form wire:submit.prevent="verifyPassword">
                <input type="password" wire:model.defer="viewingPassword" placeholder="Enter password to view" 
                class="w-full max-w-xl px-4 py-2 text-base rounded-lg outline-none bg-border">
                <button type="submit" class="block w-full max-w-xl px-4 py-2 mx-auto mt-4 transition rounded-lg bg-primary hover:bg-secondary text-background">Unlock</button>
                @error('viewingPassword')<p class="mt-4 text-red-400">{{ $message }}</p> @enderror
            </form>
        </div>
    @endif

    @if ($revealed)
        <form wire:submit.prevent="save">
            <div class="flex items-center gap-20">
                <input type="text" wire:model="title" placeholder="Craft your next masterpiece...."
                    class="bg-transparent border-none outline-none appearance-none text-white text-2xl font-medium leading-5 tracking-[0.4px] w-full p-0"
                    @if ($locked) disabled @endif>

                <div class="flex gap-3">
                    <!-- Star Button -->
                    <button type="button" @click="$wire.star()">
                        @if ($starred)
                            @svg('heroicon-o-star', 'h-5 w-5 fill-yellow stroke-yellow')
                        @else
                            @svg('heroicon-o-star', 'h-5 w-5 hover:fill-yellow hover:stroke-yellow')
                        @endif
                    </button>

                    <!-- Lock Button -->
                    <button class="py-4" @click="$dispatch('password-modal')"
                        type="button">@svg('heroicon-o-lock-closed', 'h-5 w-5')</button>

                    <!-- More Options -->
                    <div x-data="{ open: false }" class="relative">
                        <button @click="open = true" class="py-4">
                            @svg('heroicon-o-ellipsis-horizontal', 'h-5 w-5')
                        </button>

                        <div x-show="open" @click.away="open = false" x-transition x-cloak
                            class="absolute top-8 right-0 bg-container border-border border w-[140px] py-4 px-4 rounded-lg shadow-2xl space-y-4">
                            <button type="button" @click="$wire.lock(); open = false"
                                class="w-full transition text-start hover:text-white">
                                {{ $locked ? 'Unlock Note' : 'Lock Note' }}
                            </button>
                            <button type="button" @click="$wire.delete()"
                                class="w-full text-red-400 transition hover:text-red-500 text-start">Delete</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="w-full h-px bg-[#32343A] my-5"></div>

            <!-- Note Content -->
            <div x-data="{ input: '' }" class="font-normal leading-[35px] text-base">
                <textarea wire:model="content" placeholder="Explore your thoughts on your creative canvas..." x-autosize
                    class="w-full bg-transparent outline-none" @if ($locked) disabled @endif
                    x-on:input="$el.style.height = 'auto'; $el.style.height = $el.scrollHeight + 'px'"></textarea>
            </div>

            <!-- Save Button for Note -->
            @if (!$locked)
                <div class="flex justify-end mt-8">
                    <button class="px-4 py-2 transition bg-white rounded-lg text-background hover:bg-slate-200">Save
                        Note</button>
                </div>
            @endif
        </form>
    @endif

    <div @click="show = false" x-data="{ show: false }" @password-modal.window="show = true" x-show="show" x-transition
        x-cloak class="absolute top-0 left-0 z-50 flex items-center justify-center w-screen h-screen backdrop-blur-sm"
        x-ref="background">
        <div @click.stop class="max-w-xl px-8 py-4 border rounded-lg shadow-lg bg-container border-border">
            <h3 class="text-xl font-semibold text-white">Password protect your note</h3>
            <p class="mt-1 text-sm text-gray">Enter a password below and your note will be encrypted, you will have to
                enter this password every time you want to access the note.</p>

            <form wire:submit.prevent="encryptNote" class="mt-4">
                <input placeholder="Password" type="password"
                    class="w-full px-4 py-2 text-sm rounded-lg outline-none bg-border" wire:model.defer="password">
                <input placeholder="Confirm Password" type="password"
                    class="w-full px-4 py-2 mt-3 text-sm rounded-lg outline-none bg-border"
                    wire:model.defer="password_confirmation">
                <button type="submit"
                    class="w-full px-4 py-2 mt-4 text-sm transition rounded-lg bg-primary text-background hover:bg-secondary">Save</button>
            </form>
        </div>
    </div>
</div>
