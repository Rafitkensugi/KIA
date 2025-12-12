<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>KIA Dashboard</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #f5f6fa;
        }

        /* MAIN CONTENT */
        .main {
            margin-left: 260px;
            padding: 30px;
            min-height: 100vh;
        }

        /* HEADER */
        .header {
            background: white;
            padding: 25px 30px;
            border-radius: 10px;
            margin-bottom: 30px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.08);
        }

        .header h1 {
            margin: 0;
            font-size: 28px;
            font-weight: 600;
            color: #2c3e50;
        }

        /* DASHBOARD CARDS */
        .cards {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            margin-top: 20px;
        }

        .card {
            background: white;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.08);
            border-left: 4px solid #3498db;
            transition: transform 0.2s;
        }

        .card h3 {
            margin: 0 0 15px 0;
            font-size: 16px;
            color: #7f8c8d;
            font-weight: 500;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .card p {
            font-size: 36px;
            font-weight: 700;
            margin: 0;
            color: #2c3e50;
        }

        .card:nth-child(1) {
            border-left-color: #3498db;
        }

        .card:nth-child(2) {
            border-left-color: #2ecc71;
        }

        .card:nth-child(3) {
            border-left-color: #f39c12;
        }

        .card:nth-child(4) {
            border-left-color: #e74c3c;
        }

        /* Responsif */
        @media (max-width: 768px) {
            .main {
                margin-left: 0;
                padding: 15px;
            }

            .header {
                padding: 20px;
            }

            .header h1 {
                font-size: 22px;
            }

            .cards {
                grid-template-columns: 1fr;
            }

            .card p {
                font-size: 30px;
            }
        }
    </style>
</head>
<body>

    <!-- LOAD SIDEBAR COMPONENT -->
    <?php $this->load->view('layout/sidebar'); ?>

    <!-- MAIN CONTENT -->
    <div class="main">
        <div class="header">
            <h1>Dashboard Utama</h1>
        </div>

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