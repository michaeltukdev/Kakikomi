<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @vite('resources/css/app.css')
</head>

<body class="bg-background font-nunito text-gray" >
    <div class="flex flex-col h-screen ">

        @livewire('partials.breadcrumbs')

        <div class="flex flex-1 overflow-hidden">
            <div class="left-0 flex flex-col justify-between w-full text-white transform border-r bg-container border-border max-w-80">
                @livewire('partials.navigation')

                <div class="p-4 border-t border-border">
                    <a wire:navigate class="flex gap-2 transition text-gray hover:text-white" href="{{ route('note') }}">

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
