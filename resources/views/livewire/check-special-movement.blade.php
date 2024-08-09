<div class="p-4 bg-white shadow rounded w-full">
    <select wire:model="selectedRegion" class="border p-2 rounded w-full mb-4">
        <option>Select Region</option>
        @foreach ($regions as $region)
            <option value="{{ $region }}">{{ $region }}</option>
        @endforeach
    </select>
    <button wire:click="checkSpecialMovement" class="bg-blue-500 text-white p-2 rounded w-full">Submit</button>

    @if (session()->has('message'))
        <div class="text-red-500 mt-4">
            {{ session('message') }}
        </div>
    @endif

    @if ($specialMovement)
        <div class="mt-4">
            <h3 class="font-semibold text-gray-700">Special Vehicle Movement Detected:</h3>
            @foreach ($specialMovement as $lane => $vehicles)
                <div class="mt-4">
                    <p class="font-semibold text-blue-600 flex items-center">
                        <i class="fas fa-road mr-2"></i>{{ $lane }}
                    </p>
                    @if (count($vehicles) > 0)
                        <ul class="pl-5 space-y-2">
                            @foreach ($vehicles as $vehicle)
                                <li class="flex items-center p-3 bg-blue-100 rounded hover:bg-blue-200">
                                    <i class="fas fa-car mr-2 text-blue-500"></i>
                                    <span class="font-medium text-gray-700">{{ $vehicle }}</span>
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
