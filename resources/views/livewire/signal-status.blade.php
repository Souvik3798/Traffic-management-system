<div class="p-4 bg-white shadow rounded">
    <input type="text" wire:model="signalNumber" placeholder="Enter Signal Number"
        class="border p-2 rounded w-full md:w-2/3 focus:ring focus:ring-blue-200">
    <button wire:click="search"
        class="bg-blue-500 text-white p-2 rounded ml-2 hover:bg-blue-600 transition-colors">Submit</button>

    @if (!empty($lanes))
        <div class="mt-4 bg-gray-50 p-4 rounded shadow-inner">
            <h4 class="font-bold text-lg mb-2 flex items-center">
                <svg class="h-6 w-6 text-green-500 mr-2" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-11H9v4h2V7zm0 6H9v2h2v-2z" />
                </svg>
                Signal {{ $signalNumber }} Status
            </h4>
            <ul class="list-disc ml-5 space-y-2">
                @foreach ($lanes as $lane => $count)
                    <li class="flex items-center">
                        <svg class="h-5 w-5 text-blue-500 mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-11H9v4h2V7zm0 6H9v2h2v-2z" />
                        </svg>
                        <span>{{ $lane }}: <span class="font-semibold">{{ $count }}
                                vehicles</span></span>
                    </li>
                @endforeach
            </ul>
        </div>
    @else
        @if ($signalNumber)
            <p class="mt-4 text-red-500 flex items-center">
                <svg class="h-5 w-5 text-red-500 mr-2" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd"
                        d="M18 8a8 8 0 11-16 0 8 8 0 0116 0zm-9-3a1 1 0 00-2 0v4a1 1 0 102 0V5zm0 6a1 1 0 100 2 1 1 0 000-2z"
                        clip-rule="evenodd" />
                </svg>
                No data available for Signal {{ $signalNumber }}
            </p>
        @endif
    @endif
</div>
