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
        // Load JSON data from the file
        $trafficData = json_decode(Storage::disk('public')->get('traffic-data.json'), true);

        // If a specific signal number is provided, filter by that
        if ($this->signalNumber && isset($trafficData['signals'][$this->signalNumber])) {
            $this->lanes = $trafficData['signals'][$this->signalNumber]['lanes'];
        } else {
            $this->lanes = [];
        }
    }

    public function render()
    {
        return view('livewire.signal-status', [
            'lanes' => $this->lanes,
            'signalNumber' => $this->signalNumber,
        ]);
    }
}
