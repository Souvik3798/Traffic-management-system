<div class="p-6 bg-white rounded-md shadow-md w-full">
    <select wire:model="selectedRegion"
        class="border border-gray-300 p-3 rounded-md w-full focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors duration-200 ease-in-out mb-4">
        <option>Select Region</option>
        @foreach ($regions as $region)
            <option value="{{ $region }}">{{ $region }}</option>
        @endforeach
    </select>
    <button wire:click="checkSpecialMovement"
        class="bg-gradient-to-r from-blue-500 to-blue-700 text-white py-3 px-6 rounded-md shadow-md hover:shadow-lg focus:outline-none focus:ring-2 focus:ring-blue-400 transition-all duration-200 ease-in-out w-full">
        Submit
    </button>

    @if (session()->has('message'))
        <div class="text-red-500 mt-4">
            {{ session('message') }}
        </div>
    @endif

    @if ($specialMovement)
        <div class="mt-6">
            <h3 class="font-semibold text-gray-700 mb-4">🚨 Special Vehicle Movement Detected:</h3>
            @foreach ($specialMovement as $lane => $vehicles)
                <div class="mt-4">
                    <p class="font-semibold text-blue-600 flex items-center">
                        🛣️ {{ $lane }}
                    </p>
                    @if (count($vehicles) > 0)
                        <ul class="pl-5 space-y-3">
                            @php
                                // Generate a set of subtle pastel colors for vehicles
                                $colors = [
                                    'bg-blue-100',
                                    'bg-green-100',
                                    'bg-yellow-100',
                                    'bg-purple-100',
                                    'bg-pink-100',
                                ];
                            @endphp
                            @foreach ($vehicles as $index => $vehicle)
                                <li
                                    class="flex items-center p-3 rounded-md shadow-sm hover:shadow-md transition-all duration-150 ease-in-out {{ $colors[$index % count($colors)] }}">
                                    🚗 <span class="ml-2 font-medium text-gray-700">{{ $vehicle }}</span>
                                </li>
                            @endforeach
                        </ul>
                    @else
                        <p class="italic text-gray-600 ml-7">No special vehicles detected.</p>
                    @endif
                </div>
            @endforeach
        </div>
    @endif
</div>
