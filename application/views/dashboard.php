<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>KIA Dashboard</title>

    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #f5f6fa;
        }

        /* SIDEBAR */
        .sidebar {
            width: 230px;
            height: 100%;
            background: #2c3e50;
            position: fixed;
            left: 0;
            top: 0;
            padding-top: 20px;
            color: white;
        }

        .sidebar h2 {
            text-align: center;
            margin-bottom: 30px;
            font-size: 20px;
            letter-spacing: 2px;
        }

        .sidebar a {
            display: block;
            padding: 14px 20px;
            color: white;
            text-decoration: none;
            font-size: 15px;
        }

        .sidebar a:hover {
            background: #34495e;
        }

        /* MAIN CONTENT */
        .main {
            margin-left: 230px;
            padding: 20px;
        }

        /* HEADER */
        .header {
            background: white;
            padding: 12px 20px;
            border-radius: 8px;
            margin-bottom: 20px;
            box-shadow: 0px 2px 6px rgba(0,0,0,0.1);
        }

        .header h1 {
            margin: 0;
            font-size: 24px;
            font-weight: bold;
        }

        /* DASHBOARD CARDS */
        .cards {
            display: flex;
            gap: 20px;
            margin-top: 20px;
        }

        .card {
            background: white;
            flex: 1;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 2px 6px rgba(0,0,0,0.1);
        }

        .card h3 {
            margin: 0;
            font-size: 18px;
            color: #555;
        }

        .card p {
            font-size: 30px;
            font-weight: bold;
            margin-top: 10px;
            color: #2c3e50;
        }
    </style>
</head>
<body>

    <!-- SIDEBAR -->
    <div class="sidebar">
        <h2>KIA SYSTEM</h2>

        <a href="<?= site_url('dashboard') ?>">🏠 Dashboard</a>
        <a href="<?= site_url('patients') ?>">🧑 Patients</a>
        <a href="<?= site_url('registrations') ?>">📝 Registrations</a>
        <a href="<?= site_url('queue') ?>">📋 Queue</a>
        <a href="<?= site_url('medical') ?>">⚕️ Medical</a>
    </div>

    <!-- MAIN CONTENT -->
    <div class="main">
        
        <!-- HEADER -->
        <div class="header">
            <h1>Dashboard Utama</h1>
        </div>

        <!-- STAT CARDS -->
        <div class="cards">
            <div class="card">
                <h3>Total Patients</h3>
                <p>120</p>
            </div>

            <div class="card">
                <h3>Total Registrations</h3>
                <p>87</p>
            </div>

            <div class="card">
                <h3>Queue Today</h3>
                <p>32</p>
            </div>

            <div class="card">
                <h3>Medical Records</h3>
                <p>140</p>
            </div>
        </div>

    </div>

</body>
</html>
