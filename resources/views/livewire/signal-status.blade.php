<div class="p-4 bg-white shadow rounded">
    <input type="text" wire:model="signalNumber" placeholder="Enter Signal Number" class="border p-2 rounded">
    <button wire:click="search" class="bg-blue-500 text-white p-2 rounded ml-2">Submit</button>

    @if (!empty($lanes))
        <div class="mt-4">
            <h4 class="font-bold">Signal {{ $signalNumber }} Status</h4>
            <ul class="list-disc ml-5">
                @foreach ($lanes as $lane => $count)
                    <li>{{ $lane }}: {{ $count }} vehicles</li>
                @endforeach
            </ul>
        </div>
    @else
        @if ($signalNumber)
            <p class="mt-4 text-red-500">No data available for Signal {{ $signalNumber }}</p>
        @endif
    @endif
</div>
