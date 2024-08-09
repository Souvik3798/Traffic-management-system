<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class SetFastestRoute extends Component
{
    public $destinationSignal;
    public $vehicleRegForRoute;
    public $route;

    public function setFastestRoute()
    {
        // Append "Signal" to the user input for destinationSignal
        $destinationSignal = "Signal " . $this->destinationSignal;

        // Load the vehicle data from JSON
        $vehicleData = json_decode(Storage::disk('public')->get('traffic_management_data.json'), true);

        if (isset($vehicleData['vehicles'][$this->vehicleRegForRoute])) {
            // Get the current position of the vehicle
            $currentPosition = $vehicleData['vehicles'][$this->vehicleRegForRoute]['positions'][0]['location'];

            if (isset($vehicleData['signals'][$destinationSignal])) {
                // Calculate the fastest route
                $this->route = $this->calculateFastestRoute($currentPosition, $destinationSignal, $vehicleData['signals']);
            } else {
                $this->route = 'Invalid destination signal or data not available.';
            }
        } else {
            $this->route = 'Vehicle not found or unable to calculate the route.';
        }
    }

    private function calculateFastestRoute($currentPosition, $destinationSignal, &$signals)
    {
        if ($currentPosition === $destinationSignal) {
            return "Vehicle is already at the destination: $destinationSignal";
        }

        // Use BFS to find the route
        $visited = [];
        $queue = [[$currentPosition]];

        while (!empty($queue)) {
            $path = array_shift($queue);
            $signal = end($path);

            // If the signal is the destination, return the path
            if ($signal === $destinationSignal) {
                return "Fastest route: " . implode(' -> ', $path);
            }

            // If signal is already visited, skip it
            if (in_array($signal, $visited)) {
                continue;
            }

            $visited[] = $signal;

            // Add connected signals to the queue
            foreach ($signals[$signal]['connected_signals'] as $connectedSignal) {
                $newPath = $path;
                $newPath[] = $connectedSignal;
                $queue[] = $newPath;
            }
        }

        // No direct route available, create a new hypothetical route (not saving to JSON)
        $newRoute = array_merge($visited, [$destinationSignal]);
        return "Hypothetical route:" . "\n " . implode(' -> ', $newRoute);
    }

    public function render()
    {
        return view('livewire.set-fastest-route');
    }
}
