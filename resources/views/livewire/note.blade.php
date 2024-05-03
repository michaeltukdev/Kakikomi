<div class="container mx-auto">

    @if (!$revealed)
        <div x-data="{ passwordEntered: false }" class="text-center">
            <form wire:submit.prevent="verifyPassword">
                <input type="password" wire:model.defer="viewingPassword" placeholder="Enter password to view" 
                class="rounded-lg w-full max-w-xl bg-border text-base py-2 px-4 outline-none">
                <button type="submit" class="block mx-auto w-full max-w-xl bg-primary py-2 px-4 rounded-lg hover:bg-secondary transition text-background mt-4">Unlock</button>
                @error('viewingPassword')<p class="mt-4 text-red-400">{{ $message }}</p> @enderror
            </form>
        </div>
    @endif

    @if ($revealed)
        <form wire:submit.prevent="save">
            <div class="flex gap-20 items-center">
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
                                class="w-full text-start hover:text-white transition">
                                {{ $locked ? 'Unlock Note' : 'Lock Note' }}
                            </button>
                            <button type="button" @click="$wire.delete()"
                                class="text-red-400 hover:text-red-500 w-full text-start transition">Delete</button>
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
                    <button class="py-2 px-4 bg-white rounded-lg text-background hover:bg-slate-200 transition">Save
                        Note</button>
                </div>
            @endif
        </form>
    @endif

    <div @click="show = false" x-data="{ show: false }" @password-modal.window="show = true" x-show="show" x-transition
        x-cloak class="absolute top-0 left-0 h-screen w-screen backdrop-blur-sm z-50 flex items-center justify-center"
        x-ref="background">
        <div @click.stop class="py-4 px-8 bg-container shadow-lg border border-border rounded-lg max-w-xl">
            <h3 class="text-xl font-semibold text-white">Password protect your note</h3>
            <p class="text-sm text-gray mt-1">Enter a password below and your note will be encrypted, you will have to
                enter this password every time you want to access the note.</p>

            <form wire:submit.prevent="encryptNote" class="mt-4">
                <input placeholder="Password" type="password"
                    class="rounded-lg w-full bg-border text-sm py-2 px-4 outline-none" wire:model.defer="password">
                <input placeholder="Confirm Password" type="password"
                    class="rounded-lg w-full mt-3 bg-border text-sm py-2 px-4 outline-none"
                    wire:model.defer="password_confirmation">
                <button type="submit"
                    class="bg-primary rounded-lg w-full text-sm py-2 px-4 text-background hover:bg-secondary transition mt-4">Save</button>
            </form>
        </div>
    </div>
</div>
