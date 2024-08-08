<div class="p-4 bg-white shadow rounded">
    <select wire:model="region" class="border p-2 rounded w-full md:w-2/3 focus:ring focus:ring-blue-200">
        <option value="">Select Region</option>
        @foreach ($regions as $regionKey)
            <option value="{{ $regionKey }}">{{ ucwords(str_replace('_', ' ', $regionKey)) }}</option>
        @endforeach
    </select>
    <button wire:click="search"
        class="bg-blue-500 text-white p-2 rounded ml-2 hover:bg-blue-600 transition-colors">Submit</button>

    @if ($signals)
        <div class="mt-4">
            <h4 class="font-bold text-lg mb-4">Traffic Data for {{ ucwords(str_replace('_', ' ', $region)) }}</h4>

            <!-- Display signals based on congestion level -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <!-- Red Congestion Box -->
                <div class="p-4 border-2 border-red-500 rounded bg-red-50 flex items-center justify-center">
                    <div>
                        <h5 class="font-bold text-red-500 flex items-center">
                            <svg class="h-6 w-6 text-red-500 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-11H9v4h2V7zm0 6H9v2h2v-2z" />
                            </svg>
                            High Congestion
                        </h5>
                        @foreach ($signals as $signalName => $signalData)
                            @if ($signalData['congestion'] == 'red')
                                <div class="mt-4 bg-white p-3 rounded shadow">
                                    <h6 class="font-bold">{{ $signalName }}</h6>
                                    <ul class="list-none ml-5 space-y-1">
                                        @foreach ($signalData['lanes'] as $lane)
                                            <li class="flex items-center">
                                                <svg class="h-5 w-5 text-red-500 mr-2" fill="currentColor"
                                                    viewBox="0 0 20 20">
                                                    <path
                                                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-11H9v4h2V7zm0 6H9v2h2v-2z" />
                                                </svg>
                                                {{ $lane }}
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>

                <!-- Yellow Congestion Box -->
                <div class="p-4 border-2 border-yellow-500 rounded bg-yellow-50">
                    <h5 class="font-bold text-yellow-500 flex items-center">
                        <svg class="h-6 w-6 text-yellow-500 mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-11H9v4h2V7zm0 6H9v2h2v-2z" />
                        </svg>
                        Medium Congestion
                    </h5>
                    @foreach ($signals as $signalName => $signalData)
                        @if ($signalData['congestion'] == 'yellow')
                            <div class="mt-4 bg-white p-3 rounded shadow">
                                <h6 class="font-bold">{{ $signalName }}</h6>
                                <ul class="list-none ml-5 space-y-1">
                                    @foreach ($signalData['lanes'] as $lane)
                                        <li class="flex items-center">
                                            <svg class="h-5 w-5 text-yellow-500 mr-2" fill="currentColor"
                                                viewBox="0 0 20 20">
                                                <path
                                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-11H9v4h2V7zm0 6H9v2h2v-2z" />
                                            </svg>
                                            {{ $lane }}
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    @endforeach
                </div>

                <!-- Green Congestion Box -->
                <div class="p-4 border-2 border-green-500 rounded bg-green-50">
                    <h5 class="font-bold text-green-500 flex items-center">
                        <svg class="h-6 w-6 text-green-500 mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-11H9v4h2V7zm0 6H9v2h2v-2z" />
                        </svg>
                        Low Congestion
                    </h5>
                    @foreach ($signals as $signalName => $signalData)
                        @if ($signalData['congestion'] == 'green')
                            <div class="mt-4 bg-white p-3 rounded shadow">
                                <h6 class="font-bold">{{ $signalName }}</h6>
                                <ul class="list-none ml-5 space-y-1">
                                    @foreach ($signalData['lanes'] as $lane)
                                        <li class="flex items-center">
                                            <svg class="h-5 w-5 text-green-500 mr-2" fill="currentColor"
                                                viewBox="0 0 20 20">
                                                <path
                                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-11H9v4h2V7zm0 6H9v2h2v-2z" />
                                            </svg>
                                            {{ $lane }}
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    @endif
</div>
