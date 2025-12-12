<?php

namespace App\View\Components;

use App\Models\Status;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Filter extends Component
{
    public function __construct()
    {
        //
    }

    public function render(): View|Closure|string
    {
        $statuses = Status::all();
        return view('components.filter', compact('statuses'));
    }
}
