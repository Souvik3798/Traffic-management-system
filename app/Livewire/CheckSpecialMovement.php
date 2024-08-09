<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class CheckSpecialMovement extends Component
{
    public $selectedRegion;
    public $specialMovement = [];
    public $regions = [];

    public function mount()
    {
        // Load JSON data from the file
        $movementData = json_decode(Storage::disk('public')->get('traffic_management_data.json'), true);

        // Load regions into the $regions property
        $this->regions = array_keys($movementData['regions']);
    }

    public function checkSpecialMovement()
    {
        // Load JSON data from the file
        $movementData = json_decode(Storage::disk('public')->get('traffic_management_data.json'), true);

        // Check if the selected region has any special vehicle movements
        if (isset($movementData['regions'][$this->selectedRegion])) {
            $this->specialMovement = $movementData['regions'][$this->selectedRegion]['lanes'];
        } else {
            $this->specialMovement = [];
            session()->flash('message', 'No special movement found in this region.');
        }
    }

    public function render()
    {
        return view('livewire.check-special-movement', [
            'regions' => $this->regions
        ]);
    }
}
