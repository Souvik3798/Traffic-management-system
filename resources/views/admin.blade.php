<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Traffic Management Input Forms</title>
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

        .gradient-bg-5 {
            background: linear-gradient(135deg, #f78fb3, #e77f67);
        }

        .gradient-bg-6 {
            background: linear-gradient(135deg, #63cdda, #3dc1d3);
        }

        .header {
            background: #2e86de;
            color: white;
            padding: 1rem 2rem;
            display: flex;
            justify-content: center;
            align-items: center;
            position: relative;
        }

        .header h1 {
            margin: 0;
            text-align: center;
            flex: 1;
        }

        .home-link {
            position: absolute;
            right: 20px;
            background-color: white;
            color: #2e86de;
            padding: 10px 20px;
            border-radius: 5px;
            text-decoration: none;
            font-weight: bold;
            transition: background-color 0.3s;
        }

        .home-link:hover {
            background-color: #2165b5;
            color: white;
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

        .form-container {
            max-width: 800px;
            margin: auto;
            padding: 20px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            font-weight: bold;
            margin-bottom: 8px;
            display: block;
        }

        .form-group input,
        .form-group select,
        .form-group textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
            margin-bottom: 10px;
        }

        .form-group button {
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            background-color: #2e86de;
            color: white;
            cursor: pointer;
            font-size: 16px;
        }

        .form-group button:hover {
            background-color: #2165b5;
        }

        .congestion-level {
            margin-bottom: 20px;
            padding: 15px;
            border-radius: 5px;
        }

        .high-congestion {
            background-color: #ffcccc;
        }

        .medium-congestion {
            background-color: #fff2cc;
        }

        .low-congestion {
            background-color: #ccffcc;
        }
    </style>
</head>

<body class="bg-gray-100">
    <!-- Header -->
    <header class="header">
        <h1 class="text-4xl font-bold">🚦 Traffic Management Input Forms 🚦</h1>
        <a href="{{ url('/') }}" class="home-link">Home</a>
    </header>

    <main>
        <div class="form-container">
            <!-- Module 1: Vehicle Registration and Location History -->
            <div class="gradient-bg-1 p-6 rounded-lg shadow-md mb-8">
                <h2 class="text-2xl font-semibold text-white mb-4">🔍 Vehicle Registration and Location History</h2>
                <form class="form-group">
                    <label for="vehicleReg">Vehicle Registration Number</label>
                    <input type="text" id="vehicleReg" placeholder="e.g., AN01A1234">

                    <label for="locationHistory">Location History (Enter multiple records)</label>
                    <textarea id="locationHistory" rows="5"
                        placeholder="Date, Time, Signal Number (e.g., 2024-08-12, 14:30, Signal 5)"></textarea>

                    <button type="submit">Submit Vehicle Data</button>
                </form>
            </div>

            <!-- Module 2: Signal and Lane Data -->
            <div class="gradient-bg-2 p-6 rounded-lg shadow-md mb-8">
                <h2 class="text-2xl font-semibold text-white mb-4">📊 Signal and Lane Data</h2>
                <form class="form-group">
                    <label for="signalNumber">Signal Number</label>
                    <input type="text" id="signalNumber" placeholder="Enter Signal Number">

                    <label for="laneData">Lane Data (Enter multiple lanes)</label>
                    <textarea id="laneData" rows="5" placeholder="Lane Name, Total Vehicles (e.g., Lane 1, 20 vehicles)"></textarea>

                    <button type="submit">Submit Signal Data</button>
                </form>
            </div>

            <!-- Module 3: Region and Congestion Levels -->
            <div class="gradient-bg-3 p-6 rounded-lg shadow-md mb-8">
                <h2 class="text-2xl font-semibold text-white mb-4">🌍 Region and Congestion Levels</h2>
                <form class="form-group">
                    <label for="regionName">Region Name</label>
                    <input type="text" id="regionName" placeholder="Enter Region Name">

                    <!-- High Congestion -->
                    <div class="congestion-level high-congestion">
                        <h3 class="text-lg font-semibold text-red-800 mb-2">High Congestion</h3>
                        <label for="highCongestionSignal">Signal Number (High Congestion)</label>
                        <input type="text" id="highCongestionSignal" placeholder="Enter Signal Number">
                        <label for="highCongestionLaneData">Lane Data (High Congestion)</label>
                        <textarea id="highCongestionLaneData" rows="3" placeholder="Lane Name, Total Vehicles"></textarea>
                    </div>

                    <!-- Medium Congestion -->
                    <div class="congestion-level medium-congestion">
                        <h3 class="text-lg font-semibold text-yellow-800 mb-2">Medium Congestion</h3>
                        <label for="mediumCongestionSignal">Signal Number (Medium Congestion)</label>
                        <input type="text" id="mediumCongestionSignal" placeholder="Enter Signal Number">
                        <label for="mediumCongestionLaneData">Lane Data (Medium Congestion)</label>
                        <textarea id="mediumCongestionLaneData" rows="3" placeholder="Lane Name, Total Vehicles"></textarea>
                    </div>

                    <!-- Low Congestion -->
                    <div class="congestion-level low-congestion">
                        <h3 class="text-lg font-semibold text-green-800 mb-2">Low Congestion</h3>
                        <label for="lowCongestionSignal">Signal Number (Low Congestion)</label>
                        <input type="text" id="lowCongestionSignal" placeholder="Enter Signal Number">
                        <label for="lowCongestionLaneData">Lane Data (Low Congestion)</label>
                        <textarea id="lowCongestionLaneData" rows="3" placeholder="Lane Name, Total Vehicles"></textarea>
                    </div>

                    <button type="submit">Submit Region Data</button>
                </form>
            </div>

            <!-- Module 5: Vehicle History -->
            <div class="gradient-bg-5 p-6 rounded-lg shadow-md mb-8">
                <h2 class="text-2xl font-semibold text-white mb-4">📜 Vehicle History</h2>
                <form class="form-group">
                    <label for="vehicleHistoryReg">Vehicle Registration Number</label>
                    <input type="text" id="vehicleHistoryReg" placeholder="e.g., AN01A1234">

                    <label for="vehicleHistory">Last 5 Locations</label>
                    <textarea id="vehicleHistory" rows="5"
                        placeholder="Date, Time, Signal Number (e.g., 2024-08-12, 14:30, Signal 5)"></textarea>

                    <button type="submit">Submit Vehicle History</button>
                </form>
            </div>

            <!-- Module 6: Special Vehicle Information -->
            <div class="gradient-bg-6 p-6 rounded-lg shadow-md mb-8">
                <h2 class="text-2xl font-semibold text-white mb-4">🚨 Special Vehicle Information</h2>
                <form class="form-group">
                    <label for="regionNameSpecial">Region Name</label>
                    <input type="text" id="regionNameSpecial" placeholder="Enter Region Name">

                    <label for="laneNumber">Lane Number</label>
                    <input type="text" id="laneNumber" placeholder="Enter Lane Number">

                    <label for="vehicleType">Vehicle Type</label>
                    <select id="vehicleType">
                        <option value="ambulance">Ambulance</option>
                        <option value="vip">VIP</option>
                    </select>

                    <button type="submit">Submit Special Vehicle Info</button>
                </form>
            </div>
        </div>
    </main>

    <!-- Footer -->
    <footer class="footer">
        <p>© 2024 Traffic Management System. All rights reserved.</p>
    </footer>
</body>

</html>
