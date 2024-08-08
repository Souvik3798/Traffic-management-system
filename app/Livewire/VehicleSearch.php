<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class VehicleSearch extends Component
{
    public $vehicleReg;
    public $output = [];

    protected $rules = [
        'vehicleReg' => 'required|regex:/^AN\d{2}[A-Z]\d{4}$/i',
    ];

    public function search()
    {
        $this->validate();

        // Load JSON data from the file
        $trafficData = json_decode(Storage::disk('public')->get('traffic-data.json'), true);

        // Find the vehicle data based on the registration number
        $vehicleData = $trafficData['vehicles'][$this->vehicleReg] ?? null;

        if ($vehicleData) {
            $this->output = [
                'signal' => $vehicleData['signal'],
                'date' => $vehicleData['date'],
                'time' => $vehicleData['time'],
            ];
        } else {
            $this->output = ['error' => 'Vehicle not found'];
        }
    }

    public function render()
    {
        return view('livewire.vehicle-search');
    }
}
