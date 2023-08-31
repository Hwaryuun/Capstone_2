<?php

namespace App\Http\Livewire\Extentions;

use Livewire\Component;

class SwitchInfo extends Component
{

    public $status = 0;


    public function render()
    {
        return view('livewire.extentions.switch-info');
    }
}
