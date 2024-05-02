<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @vite('resources/css/app.css')
</head>

<body class="bg-background font-nunito text-gray" >
    <div class="flex flex-col h-screen ">

        <div class="bg-container w-full p-4 z-10 flex items-center justify-between border-b border-border" style="-webkit-app-region: drag;">
            <div class="flex gap-2">
                <button class="h-3 w-3 bg-[#FE6059] hover:bg-[#e95951] transition rounded-full"></button>
                <button class="h-3 w-3 bg-[#FCBB2B] hover:bg-[#e8b32b] transition rounded-full"></button>
                <button class="h-3 w-3 bg-[#2CCC46] hover:bg-[#29c04f] transition rounded-full"></button>
            </div>
            <a class="hover:text-white transition text-sm" href="#">New Note</a>
        </div>





        <div class="flex flex-1 overflow-hidden">
            <div class="bg-container border-r border-border text-white w-full max-w-80 left-0 transform flex flex-col justify-between">
                @livewire('partials.navigation')

                <div class="border-t border-border p-4">
                    <a wire:navigate class="text-gray hover:text-white transition flex gap-2" href="{{ route('note') }}">

                        <svg class="mt-1" width="12" height="13" viewBox="0 0 12 13" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path d="M1 6.5H11Z" fill="#D7D7D7" />
                            <path d="M1 6.5H11" stroke="#D7D7D7" stroke-width="1.1" stroke-linecap="round" />
                            <path d="M6 11.5V1.5Z" fill="#D7D7D7" />
                            <path d="M6 11.5V1.5" stroke="#D7D7D7" stroke-width="1.1" stroke-linecap="round" />
                        </svg>

                        New Note
                    </a>
                </div>
            </div>

            <main class="overflow-x-hidden overflow-y-auto py-12 px-[70px] w-full">
                {{$slot}}
            </main>

        </div>

    </div>
</body>

</html>
