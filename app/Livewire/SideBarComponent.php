<?php

namespace App\Livewire;

use Livewire\Component;

class SideBarComponent extends Component
{

     public $openGroups = [];

    public function mount()
    {
        // Optionally initialize open groups, e.g. Dashboard expanded by default
        $this->openGroups = [
            'transactions' => true,
            'inventory' => true,
            'accounts' => false,
            'system' => false,
        ];
    }

    public function toggleGroup($group)
    {
        $this->openGroups[$group] = !($this->openGroups[$group] ?? false);
    }


    public function render()
    {
        return view('livewire.side-bar-component');
    }
}






