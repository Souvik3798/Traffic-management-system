<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Traffic Management Dashboard</title>
    @vite('resources/css/app.css')
    <style>
        .gradient-bg-1 {
            background: linear-gradient(135deg, #f3a683, #f7d794);
        }

        .gradient-bg-2 {
            background: linear-gradient(135deg, #77b9f2, #2e86de);
        }

        .gradient-bg-3 {
            background: linear-gradient(135deg, #6a89cc, #b8e994);
        }

        .gradient-bg-4 {
            background: linear-gradient(135deg, #ff6b81, #f06595);
        }

        .header {
            background: #2e86de;
            color: white;
            padding: 1rem 0;
            text-align: center;
        }

        .footer {
            background: #2e86de;
            color: white;
            padding: 1rem 0;
            text-align: center;
            margin-top: auto;
        }

        /* Flexbox for full-height layout */
        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        main {
            flex-grow: 1;
        }
    </style>
</head>

<body class="bg-gray-100">
    <!-- Header -->
    <!-- Header -->
    <header class="header">
        <h1 class="text-4xl font-bold">🚦 Traffic Management Dashboard 🚦</h1>
        <p class="text-lg">Your comprehensive tool for efficient traffic management</p>
        <div class="flex justify-end py-2">
            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"
                onclick="window.location.href='{{ url('/admin') }}'">Master Data Entry</button>
        </div>
    </header>

    <main>
        <div class="container mx-auto py-8 px-6 md:px-10">
            <!-- First Grid: Vehicle Search and Signal Status -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-10">
                <div class="gradient-bg-1 p-6 rounded-lg shadow-md">
                    <h2 class="text-2xl font-semibold text-white mb-4 text-center">🔍 Vehicle Search</h2>
                    <p class="text-gray-200 mb-4 text-center">Search for vehicles using their registration number. This
                        module helps you quickly locate vehicle details.</p>
                    <div class="flex justify-center">
                        <livewire:vehicle-search />
                    </div>
                </div>
                <div class="gradient-bg-2 p-6 rounded-lg shadow-md">
                    <h2 class="text-2xl font-semibold text-white mb-4 text-center">📊 Signal Status</h2>
                    <p class="text-gray-200 mb-4 text-center">Check the current status of traffic signals. Stay updated
                        with real-time signal information to manage traffic efficiently.</p>
                    <div class="flex justify-center">
                        <livewire:signal-status />
                    </div>
                </div>
            </div>

            <!-- Second Grid: Region Traffic -->
            <div class="gradient-bg-3 p-6 rounded-lg shadow-md mb-10">
                <h2 class="text-2xl font-semibold text-white mb-4 text-center">🌍 Region Traffic</h2>
                <p class="text-gray-200 mb-4 text-center">Monitor traffic conditions in different regions. This module
                    provides insights into traffic flow and congestion levels.</p>
                <div class="flex justify-center">
                    <livewire:region-traffic />
                </div>
            </div>

            <!-- Third Grid: New Modules -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-10">
                <!-- Module 4: Track Vehicle Positions -->
                <div class="gradient-bg-4 p-6 rounded-lg shadow-md">
                    <h2 class="text-2xl font-semibold text-white mb-4 text-center">📍 Track Vehicle Positions</h2>
                    <p class="text-gray-200 mb-4 text-center">Track the real-time positions of vehicles. This module
                        provides live updates on vehicle locations to enhance monitoring.</p>
                    <div class="flex justify-center">
                        <livewire:track-vehicle-positions />
                    </div>
                </div>

                <!-- Module 5: Check Region for Special Vehicle Movement -->
                <div class="gradient-bg-4 p-6 rounded-lg shadow-md">
                    <h2 class="text-2xl font-semibold text-white mb-4 text-center">🚛 Check Special Vehicle Movement
                    </h2>
                    <p class="text-gray-200 mb-4 text-center">Identify and track special vehicle movements in specific
                        regions. Useful for monitoring high-priority vehicles.</p>
                    <div class="flex justify-center">
                        <livewire:check-special-movement />
                    </div>
                </div>
            </div>

            <!-- Module 6: Set Fastest Route to Destination Signal -->
            <div class="gradient-bg-4 p-6 rounded-lg shadow-md">
                <h2 class="text-2xl font-semibold text-white mb-4 text-center">🛣️ Set Fastest Route</h2>
                <p class="text-gray-200 mb-4 text-center">Calculate the fastest route to your destination based on
                    current traffic conditions. Optimize travel time effectively.</p>
                <div class="flex justify-center">
                    <div class="w-full max-w-screen-xl">
                        <livewire:set-fastest-route />
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- Footer -->
    <footer class="footer">
        <p><a href="/admin">©</a> 2024 Traffic Management System. All rights reserved.</p>
    </footer>
</body>

</html>
