<?php

namespace App\View\Components\Landing;

use App\Models\Destination;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Footer extends Component
{
    private Destination $destination;
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->destination = new Destination();
    }


    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $destinations = $this->destination->query()->get();
        return view('components.landing.footer', \compact('destinations'));
    }
}
