<div class="p-6 bg-white shadow-lg rounded-lg">
    <div class="flex flex-col md:flex-row md:items-center space-y-4 md:space-y-0 md:space-x-4">
        <input type="text" wire:model.lazy="signalNumber" placeholder="Enter Signal Number"
            class="border border-gray-300 p-3 rounded-lg w-full md:w-auto flex-grow focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors duration-200 ease-in-out shadow-sm">
        <button wire:click="search"
            class="bg-gradient-to-r from-blue-400 to-blue-600 text-white py-3 px-6 rounded-lg hover:from-blue-500 hover:to-blue-700 transition-all duration-300 ease-in-out transform hover:scale-105 shadow-md flex items-center justify-center">
            <span>Submit</span>
        </button>
    </div>

    @if (!empty($lanes))
        <div class="mt-6 bg-gray-50 p-5 rounded-lg shadow-inner">
            <h4 class="font-bold text-lg mb-4 flex items-center">
                🚦{{ $signalNumber }} Status
            </h4>
            <ul class="list-disc ml-5 space-y-3">
                @foreach ($lanes as $lane => $details)
                    <li class="flex items-center">
                        <span> 🛣️ {{ $lane }}:
                            <span class="font-semibold">
                                🚘 {{ $details['vehicles'] ?? 0 }} vehicles
                            </span>
                            <span class="ml-2">
                                🧭 Direction: {{ $details['direction'] ?? 'Unknown' }}
                            </span>
                        </span>
                    </li>
                @endforeach
            </ul>
        </div>
    @else
        @if ($signalNumber)
            <p class="mt-6 text-red-500 flex items-center">
                🚦 No data available for {{ $signalNumber }}
            </p>
        @endif
    @endif
</div>
