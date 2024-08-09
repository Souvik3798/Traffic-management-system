<div class="p-6 bg-white shadow-md rounded-lg w-full w-full mx-auto">
    <div class="flex flex-col space-y-4 md:flex-row md:space-y-0 md:space-x-4">
        <input type="text" wire:model="vehicleRegForRoute" placeholder="Enter Vehicle Registration"
            class="border p-3 rounded-lg w-full focus:ring-2 focus:ring-blue-500 focus:outline-none">
        <input type="text" wire:model="destinationSignal" placeholder="Enter Destination Signal"
            class="border p-3 rounded-lg w-full focus:ring-2 focus:ring-blue-500 focus:outline-none">
        <button wire:click="setFastestRoute"
            class="bg-blue-600 text-white p-3 rounded-lg w-full md:w-auto transition duration-300 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
            Calculate Route
        </button>
    </div>

    @if ($route)
        <div class="mt-6 bg-gray-100 p-4 rounded-lg border border-gray-300">
            @if (strpos($route, 'Hypothetical') !== false)
                <p class="text-red-500 font-semibold mb-4">Note: The route below is hypothetical due to the absence of a
                    direct route.</p>
            @endif

            <div class="flex flex-wrap items-center justify-center space-x-2 space-y-2">
                @foreach (explode('->', str_replace('Fastest route:', '', $route)) as $index => $signal)
                    <div class="flex items-center">
                        <div class="bg-blue-500 text-white p-2 rounded-full">
                            {{ trim($signal) }}
                        </div>
                        @if ($index !== count(explode('->', str_replace('Fastest route:', '', $route))) - 1)
                            <div class="mx-2">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor" class="w-6 h-6 text-blue-500">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 5l7 7-7 7" />
                                </svg>
                            </div>
                        @endif
                    </div>
                    @if (($index + 1) % 5 == 0)
                        <div class="w-full"></div>
                    @endif
                @endforeach
            </div>
        </div>
    @endif
</div>
