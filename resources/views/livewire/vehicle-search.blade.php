<div class="p-4 bg-white shadow rounded">
    <input type="text" wire:model="vehicleReg" placeholder="e.g., AN01A1234"
        class="border p-2 rounded w-full md:w-2/3 focus:ring focus:ring-blue-200">
    @error('vehicleReg')
        <span class="text-red-500 text-sm mt-2">{{ $message }}</span>
    @enderror
    <button wire:click="search"
        class="bg-blue-500 text-white p-2 rounded ml-2 hover:bg-blue-600 transition-colors">Submit</button>

    @if ($output)
        <div class="mt-4 bg-gray-50 p-4 rounded shadow-inner">
            @if (isset($output['error']))
                <p class="text-red-500 text-sm font-semibold flex items-center">
                    <svg class="h-5 w-5 text-red-500 mr-2" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M18 8a8 8 0 11-16 0 8 8 0 0116 0zm-9-3a1 1 0 00-2 0v4a1 1 0 102 0V5zm0 6a1 1 0 100 2 1 1 0 000-2z"
                            clip-rule="evenodd" />
                    </svg>
                    {{ $output['error'] }}
                </p>
            @else
                <ul class="list-disc list-inside space-y-2">
                    <li class="flex items-center">
                        <svg class="h-5 w-5 text-green-500 mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-11H9v4h2V7zm0 6H9v2h2v-2z" />
                        </svg>
                        <span class="font-semibold">Signal: </span> {{ $output['signal'] }}
                    </li>
                    <li class="flex items-center">
                        <svg class="h-5 w-5 text-blue-500 mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M10 18a8 8 0 100-16 8 8 0 000 16zm2-11H8v2h4V7zm0 4H8v2h4v-2z" />
                        </svg>
                        <span class="font-semibold">Date: </span> {{ date('d m, Y', strtotime($output['date'])) }}
                    </li>
                    <li class="flex items-center">
                        <svg class="h-5 w-5 text-yellow-500 mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M10 18a8 8 0 100-16 8 8 0 000 16zm-1-7h2v5h-2v-5zm0-4h2v2h-2V7z" />
                        </svg>
                        <span class="font-semibold">Time: </span> {{ date('h:i A', strtotime($output['time'])) }}
                    </li>
                </ul>
            @endif
        </div>
    @endif
</div>
