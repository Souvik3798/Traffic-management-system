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

        .guidelines {
            font-size: 14px;
            color: white;
            margin-bottom: 10px;
        }

        .guidelines h3 {
            margin-top: 0;
            font-size: 16px;
            color: white;
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
            <!-- Vehicle Number -->
            <div class="gradient-bg-1 p-6 rounded-lg shadow-md mb-8">
                <h2 class="text-2xl font-semibold text-white mb-4">🚗 Vehicle Number</h2>

                <!-- Guidelines Section -->
                <div class="guidelines">
                    <h3>Guidelines:</h3>
                    <ul>
                        <li>Enter the vehicle number in the format: <strong>AN01A1234</strong>.</li>
                        <li>Ensure there are no spaces between characters.</li>
                        <li>The vehicle number should match the registration plate exactly.</li>
                    </ul>
                </div>

                <form class="form-group">
                    <label for="vehicleNumber">Vehicle Number</label>
                    <input type="text" id="vehicleNumber" placeholder="e.g., AN01A1234">
                    <button type="submit">Submit Vehicle Number</button>
                </form>
            </div>

            <!-- Signal and Incoming Lane -->
            <div class="gradient-bg-2 p-6 rounded-lg shadow-md mb-8">
                <h2 class="text-2xl font-semibold text-white mb-4">🚦 Signal and Incoming Lane</h2>

                <!-- Guidelines Section -->
                <div class="guidelines">
                    <h3>Guidelines:</h3>
                    <ul>
                        <li>Enter the signal number accurately as per the system records.</li>
                        <li>Provide the incoming lane number and name, ensuring it corresponds to the correct signal.
                        </li>
                        <li>Double-check the lane name for spelling accuracy.</li>
                    </ul>
                </div>

                <form class="form-group">
                    <label for="signalNumber">Signal Number</label>
                    <input type="text" id="signalNumber" placeholder="Enter Signal Number">

                    <label for="incomingLaneNumber">Incoming Lane Number</label>
                    <input type="text" id="incomingLaneNumber" placeholder="Enter Incoming Lane Number">

                    <label for="incomingLaneName">Incoming Lane Name</label>
                    <input type="text" id="incomingLaneName" placeholder="Enter Incoming Lane Name">

                    <button type="submit">Submit Signal and Incoming Lane</button>
                </form>

            </div>

            <!-- Signal Number and Address -->
            <div class="gradient-bg-3 p-6 rounded-lg shadow-md mb-8">
                <h2 class="text-2xl font-semibold text-white mb-4">📍 Signal Number and Address</h2>

                <!-- Guidelines Section -->
                <div class="guidelines">
                    <h3>Guidelines:</h3>
                    <ul>
                        <li>Enter the signal number associated with the address.</li>
                        <li>Provide a complete and accurate address to avoid any confusion.</li>
                        <li>Use standard address format and include landmarks if necessary.</li>
                    </ul>
                </div>

                <form class="form-group">
                    <label for="signalAddress">Signal Number</label>
                    <input type="text" id="signalAddress" placeholder="Signal Number">
                    <label for="signalAddress">Address</label>
                    <textarea placeholder="Address"></textarea>
                    <button type="submit">Submit Signal Address</button>
                </form>
            </div>

            <!-- Lane Number and Signal Time Adjustment -->
            <div class="gradient-bg-1 p-6 rounded-lg shadow-md mb-8">
                <h2 class="text-2xl font-semibold text-white mb-4">⏲️ Lane Number and Signal Time Adjustment</h2>

                <!-- Guidelines Section -->
                <div class="guidelines">
                    <h3>Guidelines:</h3>
                    <ul>
                        <li>Enter the lane number that needs the signal time adjustment.</li>
                        <li>Provide the exact time adjustment required, in hours and minutes.</li>
                        <li>Ensure the time adjustment is based on traffic flow data or expert recommendations.</li>
                    </ul>
                </div>

                <form class="form-group">
                    <label for="laneTimeAdjustment">Lane Number</label>
                    <input type="text" id="laneTimeAdjustment" placeholder="Lane Number">
                    <label for="laneTimeAdjustment">Signal Time Adjustment</label>
                    <input type="time" id="signalTimeAdjustment">
                    <button type="submit">Submit Time Adjustment</button>
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
