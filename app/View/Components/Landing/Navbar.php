<?php

namespace App\View\Components\Landing;

use App\Models\Country;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Navbar extends Component
{
    private Country $country;
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->country = new Country();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $countries = $this->country->query()->get();
        return view('components.landing.navbar', \compact('countries'));
    }
}
