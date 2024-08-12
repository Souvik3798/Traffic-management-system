<div class="p-6 bg-white rounded-md">
    <div class="flex flex-col md:flex-row md:items-center space-y-4 md:space-y-0 md:space-x-4">
        <select wire:model="region"
            class="border border-gray-300 p-3 rounded-md w-full md:w-2/3 focus:ring-2 focus:ring-primary focus:border-transparent transition-all duration-200 ease-in-out shadow-sm">
            <option value="">🌍 Select Region</option>
            @foreach ($regions as $regionKey)
                <option value="{{ $regionKey }}">{{ ucwords(str_replace('_', ' ', $regionKey)) }}</option>
            @endforeach
        </select>
        <button wire:click="search"
            class="bg-gradient-to-r from-blue-500 to-blue-700 text-white py-3 px-6 rounded-md shadow-md hover:shadow-lg focus:outline-none focus:ring-2 focus:ring-blue-400 transition-all duration-200 ease-in-out overflow-hidden">
            <span>Submit</span>
        </button>
    </div>

    @if ($signals)
        <div class="mt-6">
            <h4 class="font-semibold text-lg mb-4">🚦 Traffic Data for {{ ucwords(str_replace('_', ' ', $region)) }}</h4>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <!-- High Congestion -->
                <div
                    class="p-4 border-l-4 border-red-500 rounded-md bg-gradient-to-br from-red-200 via-red-100 to-red-50">
                    <h5 class="font-medium text-red-700 mb-3 flex items-center">
                        🚨 High Congestion
                    </h5>
                    @foreach ($signals as $signalName => $signalData)
                        @php
                            $redLanes = collect($signalData['lanes'])->filter(
                                fn($lane) => $lane['congestion'] == 'red',
                            );
                        @endphp
                        @if ($redLanes->isNotEmpty())
                            <div class="mt-3 bg-white p-3 rounded-md shadow-sm">
                                <h6 class="font-medium">🚦 {{ $signalName }}</h6>
                                <ul class="list-none ml-5 mt-2 space-y-2">
                                    @foreach ($redLanes as $laneName => $laneData)
                                        <li class="text-red-700 flex items-center">
                                            🚗 <span class="ml-2">{{ $laneName }} -
                                                <strong>{{ $laneData['vehicles'] }} vehicles</strong></span>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    @endforeach
                </div>

                <!-- Medium Congestion -->
                <div
                    class="p-4 border-l-4 border-yellow-500 rounded-md bg-gradient-to-br from-yellow-200 via-yellow-100 to-yellow-50">
                    <h5 class="font-medium text-yellow-700 mb-3 flex items-center">
                        ⚠️ Medium Congestion
                    </h5>
                    @foreach ($signals as $signalName => $signalData)
                        @php
                            $yellowLanes = collect($signalData['lanes'])->filter(
                                fn($lane) => $lane['congestion'] == 'yellow',
                            );
                        @endphp
                        @if ($yellowLanes->isNotEmpty())
                            <div class="mt-3 bg-white p-3 rounded-md shadow-sm">
                                <h6 class="font-medium">🚦 {{ $signalName }}</h6>
                                <ul class="list-none ml-5 mt-2 space-y-2">
                                    @foreach ($yellowLanes as $laneName => $laneData)
                                        <li class="text-yellow-700 flex items-center">
                                            🚗 <span class="ml-2">{{ $laneName }} -
                                                <strong>{{ $laneData['vehicles'] }} vehicles</strong></span>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    @endforeach
                </div>

                <!-- Low Congestion -->
                <div
                    class="p-4 border-l-4 border-green-500 rounded-md bg-gradient-to-br from-green-200 via-green-100 to-green-50">
                    <h5 class="font-medium text-green-700 mb-3 flex items-center">
                        ✅ Low Congestion
                    </h5>
                    @foreach ($signals as $signalName => $signalData)
                        @php
                            $greenLanes = collect($signalData['lanes'])->filter(
                                fn($lane) => $lane['congestion'] == 'green',
                            );
                        @endphp
                        @if ($greenLanes->isNotEmpty())
                            <div class="mt-3 bg-white p-3 rounded-md shadow-sm">
                                <h6 class="font-medium">🚦 {{ $signalName }}</h6>
                                <ul class="list-none ml-5 mt-2 space-y-2">
                                    @foreach ($greenLanes as $laneName => $laneData)
                                        <li class="text-green-700 flex items-center">
                                            🚗 <span class="ml-2">{{ $laneName }} -
                                                <strong>{{ $laneData['vehicles'] }} vehicles</strong></span>
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
