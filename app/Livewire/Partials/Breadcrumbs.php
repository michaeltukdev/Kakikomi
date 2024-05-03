<?php

namespace App\Livewire\Partials;

use Livewire\Component;
use Native\Laravel\Facades\Window;

class Breadcrumbs extends Component
{
    public function close()
    {
        Window::close();
    }

    public function minimise()
    {
        Window::hide();
    }

    public function render()
    {
        return view('livewire.partials.breadcrumbs');
    }
}
