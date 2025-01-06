@extends('layouts.app')

@section('title',
    'Laravel 10 Login SignUp with User Roles and Permissions with Admin CRUD | Tailwind CSS Custom Login
    register')

@section('contents')
    <div>
        <h1 class="font-bold text-2xl ml-3">Dashboard</h1>
    </div>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Status Pemeriksaan</title>
        <link href="{{ asset('admin_assets/css/home.css') }}" rel="stylesheet">
    </head>

    <body>
        <?php
        // Data pasien dan status pemeriksaan
        $patient = [
            'name' => '',
            'age' => '',
            'gender' => ''
        ];

        $examination_status = [
            'device_status' => '',
            'ahi' => ''
        ];

        $sensor_data = [
            'breathing_activity' => [
                'rpm' => '',
                'log' => ''
            ],
            'heart_activity' => [
                'bpm' => '',
                'log' => ''
            ],
            'brain_activity' => [
                'status' => '',
                'log' => ''
            ],
            'oxygen_level' => [
                'average' => '',
                'log' => ''
            ]
        ];
    ?>

        <div class="container">
            <!-- Identitas Pasien -->
            <div class="section identity-section">
                <h2>Identitas Pasien</h2>
                <p>Nama: {{ auth()->user()->name }}</p>
                <p>Umur: <?php echo $patient['age']; ?></p>
                <p>Jenis Kelamin: <?php echo $patient['gender']; ?></p>
            </div>

            <!-- Status Pemeriksaan -->
            <div class="section status-section">
                <h2>Status Pemeriksaan</h2>
                <p>Status Device: <?php echo $examination_status['device_status']; ?></p>
                <p>AHI: <?php echo $examination_status['ahi']; ?></p>
            </div>

            <!-- Status dari Sensor -->
            <div class="section sensor-section">
                <h2>Status Dari Sensor</h2>
                <div class="sensor-grid">
                    <!-- Aktivitas Pernapasan -->
                    <div class="card">
                        <h3>Aktivitas Pernapasan</h3>
                        <p>RPM: <?php echo $sensor_data['breathing_activity']['rpm']; ?></p>
                        <p>Log Pernapasan: <?php echo $sensor_data['breathing_activity']['log']; ?></p>
                    </div>

                    <!-- Aktivitas Detak Jantung -->
                    <div class="card">
                        <h3>Aktivitas Detak Jantung</h3>
                        <p>BPM: <?php echo $sensor_data['heart_activity']['bpm']; ?></p>
                        <p>Log Detak Jantung: <?php echo $sensor_data['heart_activity']['log']; ?></p>
                    </div>

                    <!-- Aktivitas Otak -->
                    <div class="card">
                        <h3>Aktivitas Otak</h3>
                        <p>Status: <?php echo $sensor_data['brain_activity']['status']; ?></p>
                        <p>Log Aktivitas Otak: <?php echo $sensor_data['brain_activity']['log']; ?></p>
                    </div>

                    <!-- Kadar Oksigen Dalam Darah -->
                    <div class="card">
                        <h3>Kadar Oksigen Dalam Darah</h3>
                        <p>Rata-rata Kadar Oksigen: <?php echo $sensor_data['oxygen_level']['average']; ?></p>
                        <p>Log Kadar Oksigen Dalam Darah: <?php echo $sensor_data['oxygen_level']['log']; ?></p>
                    </div>
                </div>
            </div>
        </div>
    </body>

    </html>

@endsection
