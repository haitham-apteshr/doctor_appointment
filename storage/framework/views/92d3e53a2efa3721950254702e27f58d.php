<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Appointment Confirmed</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?php echo e(asset('css/bootstrap.min.css')); ?>">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .confirmation-container {
            max-width: 600px;
            margin: 50px auto;
            background: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        .confirmation-container h1 {
            font-size: 2rem;
            margin-bottom: 20px;
            color: #28a745;
        }
        .confirmation-container p {
            margin-bottom: 10px;
        }
        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }
        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #004085;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="confirmation-container">
            <h1>Your Appointment Was Placed Successfully!</h1>
            <p><strong>Name:</strong> <?php echo e($appointment->client_name); ?></p>
            <p><strong>Email:</strong> <?php echo e($appointment->client_email); ?></p>
            <p><strong>Phone:</strong> <?php echo e($appointment->client_phone); ?></p>
            <p><strong>Date & Time:</strong> <?php echo e($appointment->appointment_date); ?></p>
            <p><strong>Reason:</strong> <?php echo e($appointment->reason ?? 'Not specified'); ?></p>
            <a href="<?php echo e(route('home')); ?>" class="btn btn-primary mt-4">Back to Home</a>
        </div>
    </div>

    <!-- Bootstrap JS Bundle -->
    <script src="<?php echo e(asset('js/bootstrap.bundle.min.js')); ?>"></script>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\doctor-appointment\resources\views/appointments/success.blade.php ENDPATH**/ ?>