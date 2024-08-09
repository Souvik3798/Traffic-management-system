<div class="p-4 bg-white shadow rounded">
    <input type="text" wire:model="vehicleReg" placeholder="Enter Vehicle Reg. (e.g., AN01A1234)"
        class="border p-2 rounded w-full mb-4">
    <button wire:click="trackVehicle" class="bg-blue-500 text-white p-2 rounded w-full">Submit to Track</button>

    @if (session()->has('message'))
        <div class="text-red-500 mt-4">
            {{ session('message') }}
        </div>
    @endif

    @if ($positions)
        <div class="mt-4">
            <h3 class="font-semibold text-gray-700">Vehicle Positions:</h3>
            <ul class="list-disc pl-5">
                @php
                    // Sort positions by date and time in descending order
                    $sortedPositions = collect($positions)->sortByDesc(function ($position) {
                        return strtotime($position['date'] . ' ' . $position['time']);
                    });
                @endphp
                @foreach ($sortedPositions as $position)
                    <li class="flex items-start p-3 mb-2 bg-gray-100 rounded hover:bg-gray-200">
                        <div class="mr-4">
                            <i class="fas fa-calendar-alt text-blue-500"></i>
                        </div>
                        <div class="text-gray-800">
                            <span class="font-semibold">{{ date('d F, Y', strtotime($position['date'])) }}</span> -
                            <i class="fas fa-clock text-blue-500"></i>
                            {{ date('h:i A', strtotime($position['time'])) }} -
                            <i class="fas fa-map-marker-alt text-blue-500"></i>
                            <span class="font-semibold">{{ $position['location'] }}</span>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
    @endif
</div>
