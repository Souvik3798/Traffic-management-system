<div class="p-4 bg-white shadow rounded">
    <select wire:model="region" class="border p-2 rounded">
        <option value="">Select Region</option>
        @foreach ($regions as $regionKey)
            <option value="{{ $regionKey }}">{{ ucwords(str_replace('_', ' ', $regionKey)) }}</option>
        @endforeach
    </select>
    <button wire:click="search" class="bg-blue-500 text-white p-2 rounded ml-2">Submit</button>

    @if ($signals)
        <div class="mt-4">
            <h4 class="font-bold">Traffic Data for {{ ucwords(str_replace('_', ' ', $region)) }}</h4>

            <!-- Display signals based on congestion level -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <!-- Red Congestion Box -->
                <div class="p-4 border border-red-500 rounded">
                    <h5 class="font-bold text-red-500">Red (High Congestion)</h5>
                    @foreach ($signals as $signalName => $signalData)
                        @if ($signalData['congestion'] == 'red')
                            <div class="mt-2">
                                <h6 class="font-bold">{{ $signalName }}</h6>
                                <ul class="list-disc ml-5">
                                    @foreach ($signalData['lanes'] as $lane)
                                        <li>{{ $lane }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    @endforeach
                </div>

                <!-- Yellow Congestion Box -->
                <div class="p-4 border border-yellow-500 rounded">
                    <h5 class="font-bold text-yellow-500">Yellow (Medium Congestion)</h5>
                    @foreach ($signals as $signalName => $signalData)
                        @if ($signalData['congestion'] == 'yellow')
                            <div class="mt-2">
                                <h6 class="font-bold">{{ $signalName }}</h6>
                                <ul class="list-disc ml-5">
                                    @foreach ($signalData['lanes'] as $lane)
                                        <li>{{ $lane }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    @endforeach
                </div>

                <!-- Green Congestion Box -->
                <div class="p-4 border border-green-500 rounded">
                    <h5 class="font-bold text-green-500">Green (Low Congestion)</h5>
                    @foreach ($signals as $signalName => $signalData)
                        @if ($signalData['congestion'] == 'green')
                            <div class="mt-2">
                                <h6 class="font-bold">{{ $signalName }}</h6>
                                <ul class="list-disc ml-5">
                                    @foreach ($signalData['lanes'] as $lane)
                                        <li>{{ $lane }}</li>
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
