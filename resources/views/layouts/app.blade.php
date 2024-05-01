<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @vite('resources/css/app.css')
</head>

<body class="bg-background font-nunito text-gray">

    <div class="flex flex-col h-screen">

        <div class="bg-container w-full p-4 z-10 flex items-center justify-between border-b border-border">
            <div class="flex gap-2">
                <button class="h-3 w-3 bg-[#FE6059] hover:bg-[#e95951] transition rounded-full"></button>
                <button class="h-3 w-3 bg-[#FCBB2B] hover:bg-[#e8b32b] transition rounded-full"></button>
                <button class="h-3 w-3 bg-[#2CCC46] hover:bg-[#29c04f] transition rounded-full"></button>
            </div>
            <a class="hover:text-white transition text-sm" href="#">New Note</a>
        </div>





        <div class="flex flex-1 overflow-hidden">
            <div class="bg-container border-r border-border text-white w-full max-w-80 left-0 transform flex flex-col justify-between">
                <nav class="py-5 px-3.5 space-y-5">
                    <a wire:navigate class="text-gray font-norma text-md flex gap-3 hover:text-white transition">

                        <svg class="mt-1" width="12" height="15" viewBox="0 0 12 15" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path d="M3.92499 11.075H7.82499" stroke="#D7D7D7" stroke-linecap="round" />
                            <path d="M3.92499 8.47498H7.82499" stroke="#D7D7D7" stroke-linecap="round" />
                            <path d="M3.92499 5.875H7.82499" stroke="#D7D7D7" stroke-linecap="round" />
                            <path
                                d="M1 1.975V13.025C1 13.5635 1.43652 14 1.975 14H9.775C10.3135 14 10.75 13.5635 10.75 13.025V4.52874C10.75 4.2694 10.6466 4.02075 10.4629 3.83778L7.8978 1.28404C7.71509 1.10213 7.46776 1 7.20991 1H1.975C1.43652 1 1 1.43652 1 1.975Z"
                                stroke="#D7D7D7" stroke-linecap="square" />
                        </svg>

                        Influences Of Envrioment On...
                    </a>
                </nav>

                <div class="border-t border-border p-4">
                    <a wire:navigate class="text-gray hover:text-white transition flex gap-2" href="{{ route('note.create') }}">

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
