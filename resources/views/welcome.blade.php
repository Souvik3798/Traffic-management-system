<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Traffic Management Dashboard</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-gray-100">
    <div class="container mx-auto py-8">
        <!-- Heading -->
        <h1 class="text-3xl font-bold text-center text-gray-800 mb-8">Traffic Management Dashboard</h1>

        <!-- First Grid: Vehicle Search and Signal Status -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-8">
            <div class="bg-white p-6 rounded-lg shadow-md flex items-center justify-center">
                <div class="w-full text-center">
                    <h2 class="text-2xl font-semibold text-gray-700 mb-4">Vehicle Search</h2>
                    <div class="flex justify-center">
                        <livewire:vehicle-search />
                    </div>
                </div>
            </div>
            <div class="bg-white p-6 rounded-lg shadow-md flex items-center justify-center">
                <div class="w-full text-center">
                    <h2 class="text-2xl font-semibold text-gray-700 mb-4">Signal Status</h2>
                    <div class="flex justify-center">
                        <livewire:signal-status />
                    </div>
                </div>
            </div>
        </div>

        <!-- Second Grid: Region Traffic -->
        <div class="grid grid-cols-1 gap-8">
            <div class="bg-white p-6 rounded-lg shadow-md flex items-center justify-center">
                <div class="w-full text-center">
                    <h2 class="text-2xl font-semibold text-gray-700 mb-4">Region Traffic</h2>
                    <div class="flex justify-center">
                        <livewire:region-traffic />
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
