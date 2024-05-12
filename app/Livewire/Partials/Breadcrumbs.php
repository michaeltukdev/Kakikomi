<?php

namespace App\Livewire\Partials;

use Livewire\Component;
use Native\Laravel\Facades\Window;

class Breadcrumbs extends Component
{
    public function close(string $window = null)
    {
        Window::close($window);
    }

    public function render()
    {
        return view('livewire.partials.breadcrumbs');
    }
}
