<div class="p-4 bg-white shadow rounded">
    <input type="text" wire:model="vehicleReg" placeholder="e.g., AN01A1234" class="border p-2 rounded w-full md:w-2/3">
    @error('vehicleReg')
        <span class="text-red-500 text-sm">{{ $message }}</span>
    @enderror
    <button wire:click="search" class="bg-blue-500 text-white p-2 rounded ml-2">Submit</button>

    @if ($output)
        <div class="mt-4">
            @if (isset($output['error']))
                <p class="text-red-500">{{ $output['error'] }}</p>
            @else
                <p><strong>Signal:</strong> {{ $output['signal'] }}</p>
                <p><strong>Date:</strong> {{ $output['date'] }}</p>
                <p><strong>Time:</strong> {{ $output['time'] }}</p>
            @endif
        </div>
    @endif
</div>
