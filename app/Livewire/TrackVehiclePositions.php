<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class TrackVehiclePositions extends Component
{
    public $vehicleReg;
    public $positions = [];

    public function trackVehicle()
    {
        // Load JSON data from the file
        $vehicleData = json_decode(Storage::disk('public')->get('traffic_management_data.json'), true);

        // Check if vehicle registration number exists in the data
        if (isset($vehicleData['vehicles'][$this->vehicleReg])) {
            $this->positions = $vehicleData['vehicles'][$this->vehicleReg]['positions'];
        } else {
            $this->positions = [];
            session()->flash('message', 'Vehicle not found.');
        }
    }

    public function render()
    {
        return view('livewire.track-vehicle-positions');
    }
}
