<div class="p-6 bg-white rounded-md shadow-md">
    <input type="text" wire:model="vehicleReg" placeholder="Enter Vehicle Reg. (e.g., AN01A1234)"
        class="border border-gray-300 p-3 rounded-md w-full focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors duration-200 ease-in-out shadow-sm mb-4">
    <button wire:click="trackVehicle"
        class="bg-gradient-to-r from-blue-500 to-blue-700 text-white py-3 px-6 rounded-md shadow-md hover:shadow-lg focus:outline-none focus:ring-2 focus:ring-blue-400 transition-all duration-200 ease-in-out w-full">
        Submit to Track
    </button>

    @if (session()->has('message'))
        <div class="text-red-500 mt-4">
            {{ session('message') }}
        </div>
    @endif

    @if ($positions)
        <div class="mt-6">
            <h3 class="font-semibold text-gray-700 mb-4">Vehicle Positions:</h3>
            <ul class="list-disc pl-5 space-y-3">
                @php
                    // Sort positions by date and time in descending order
                    $sortedPositions = collect($positions)->sortByDesc(function ($position) {
                        return strtotime($position['date'] . ' ' . $position['time']);
                    });
                    // Generate a set of subtle pastel colors
                    $colors = ['bg-blue-100', 'bg-green-100', 'bg-yellow-100', 'bg-purple-100', 'bg-pink-100'];
                @endphp
                @foreach ($sortedPositions as $index => $position)
                    <li
                        class="flex items-start p-3 rounded-md shadow-sm hover:shadow-md transition-all duration-150 ease-in-out {{ $colors[$index % count($colors)] }}">
                        <div class="text-gray-800">
                            <span class="font-semibold">📅 {{ date('d F, Y', strtotime($position['date'])) }}</span> -
                            <span class="text-blue-500">🕒 {{ date('h:i A', strtotime($position['time'])) }}</span> -
                            <span class="text-red-500">🚦{{ $position['location'] }}</span>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
    @endif
</div>
