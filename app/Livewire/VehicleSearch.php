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
        $trafficData = json_decode(Storage::disk('public')->get('traffic_management_data.json'), true);

        // Find the vehicle data based on the registration number
        $vehicleData = $trafficData['vehicles'][$this->vehicleReg]['positions'] ?? null;

        if ($vehicleData) {
            // Sort the positions by date and time in descending order to get the latest record
            usort($vehicleData, function ($a, $b) {
                $dateTimeA = strtotime($a['date'] . ' ' . $a['time']);
                $dateTimeB = strtotime($b['date'] . ' ' . $b['time']);
                return $dateTimeB <=> $dateTimeA;
            });

            // Get the latest record
            $latestRecord = $vehicleData[0];

            $this->output = [
                'signal' => $latestRecord['location'],
                'date' => $latestRecord['date'],
                'time' => $latestRecord['time'],
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
