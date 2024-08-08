<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class RegionTraffic extends Component
{
    public $region;
    public $signals = [];
    public $regions = [];

    public function mount()
    {
        // Load JSON data from the file
        $trafficData = json_decode(Storage::disk('public')->get('traffic-data.json'), true);

        // Extract region names for the dropdown
        $this->regions = array_keys($trafficData['regions']);
    }

    public function search()
    {
        // Load JSON data from the file
        $trafficData = json_decode(Storage::disk('public')->get('traffic-data.json'), true);

        // Update signals based on selected region
        $this->signals = $trafficData['regions'][$this->region]['signals'] ?? [];
    }

    public function render()
    {
        return view('livewire.region-traffic');
    }
}
