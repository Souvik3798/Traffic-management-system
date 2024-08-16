<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class SignalStatus extends Component
{
    public $signalNumber;
    public $lanes = [];

    public function search()
    {
        $signal = 'Signal ' . $this->signalNumber;
        // Load JSON data from the file
        $trafficData = json_decode(Storage::disk('public')->get('traffic-data.json'), true);

        // If a specific signal number is provided, filter by that
        if ($signal && isset($trafficData['signals'][$signal])) {
            $this->lanes = $trafficData['signals'][$signal]['lanes'];
        } else {
            $this->lanes = [];
        }
    }

    public function render()
    {
        return view('livewire.signal-status', [
            'lanes' => $this->lanes,
            'signalNumber' => 'Signal ' . $this->signalNumber,
        ]);
    }
}
