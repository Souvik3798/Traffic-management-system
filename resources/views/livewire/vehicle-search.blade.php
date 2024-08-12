<div class="p-6 bg-white shadow-lg rounded-lg">
    <div class="flex flex-col md:flex-row md:items-center space-y-4 md:space-y-0">
        <input type="text" wire:model.lazy="vehicleReg" placeholder="e.g., AN01A1234"
            class="border border-gray-300 p-3 rounded-lg w-full focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors duration-200 ease-in-out shadow-sm">
    </div>

    <div class="mt-4">
        <button wire:click="search"
            class="bg-gradient-to-r from-blue-400 to-blue-600 text-white py-2 px-6 w-full rounded-lg hover:from-blue-500 hover:to-blue-700 transition-all duration-300 ease-in-out transform hover:scale-105 shadow-md flex items-center justify-center">
            <svg wire:loading wire:target="search" class="animate-spin h-5 w-5 text-white mr-2"
                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3"></path>
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M12 6.5v-2m0 13v2m4.3-4.3l1.4 1.4M6.3 6.3L4.9 4.9m10.1 10.1l1.4 1.4M6.3 17.7l1.4-1.4"></path>
            </svg>
            <span>Submit</span>
        </button>
    </div>

    @if ($output)
        <div class="mt-6 bg-gray-50 p-5 rounded-lg shadow-inner transition-all duration-300 ease-in-out">
            @if (isset($output['error']))
                <p class="text-red-500 text-lg font-semibold flex items-center">
                    <span class="text-red-500 mr-2">❌</span>
                    {{ $output['error'] }}
                </p>
            @else
                <div class="space-y-3">
                    <div class="flex items-center">
                        <span class="text-green-500 mr-2">🚦</span>
                        <span class="font-semibold">Signal: </span> {{ $output['signal'] }}
                    </div>
                    <div class="flex items-center">
                        <span class="text-blue-500 mr-2">📅</span>
                        <span class="font-semibold">Date: </span> {{ date('d M, Y', strtotime($output['date'])) }}
                    </div>
                    <div class="flex items-center">
                        <span class="text-yellow-500 mr-2">⏰</span>
                        <span class="font-semibold">Time: </span> {{ date('h:i A', strtotime($output['time'])) }}
                    </div>
                </div>
            @endif
        </div>
    @endif
</div>
