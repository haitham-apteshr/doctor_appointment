<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Appointment</title>
    <link rel="stylesheet" href="<?php echo e(asset('css/bootstrap.min.css')); ?>">
    <style>
        body {
            background-color: #f8f9fa;
        }
        h1 {
            margin-top: 20px;
            text-align: center;
            font-weight: bold;
        }
        .form-group {
            margin: 20px;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Admin Dashboard</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo e(route('dashboard')); ?>">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <form method="POST" action="<?php echo e(route('logout')); ?>">
                            <?php echo csrf_field(); ?>
                            <button class="nav-link btn btn-link" type="submit">Logout</button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <h1>Update Appointment</h1>
    <div class="container">
        <form method="POST" action="<?php echo e(route('appointments.update', $appointment->id)); ?>">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>

            <!-- Client Name -->
            <div class="form-group">
                <label for="client_name">Client Name</label>
                <input type="text" name="client_name" id="client_name" class="form-control" value="<?php echo e(old('client_name', $appointment->client_name)); ?>">
            </div>

            <!-- Client Email -->
            <div class="form-group">
                <label for="client_email">Client Email</label>
                <input type="email" name="client_email" id="client_email" class="form-control" value="<?php echo e(old('client_email', $appointment->client_email)); ?>">
            </div>

            <!-- Client Phone -->
            <div class="form-group">
                <label for="client_phone">Client Phone</label>
                <input type="text" name="client_phone" id="client_phone" class="form-control" value="<?php echo e(old('client_phone', $appointment->client_phone)); ?>">
            </div>

            <!-- Appointment Date -->
            <div class="form-group">
                <label for="appointment_date">Appointment Date</label>
                <input type="datetime-local" name="appointment_date" id="appointment_date" class="form-control" value="<?php echo e(old('appointment_date', $appointment->appointment_date)); ?>">
            </div>

            <!-- Reason -->
            <div class="form-group">
                <label for="reason">Reason</label>
                <textarea name="reason" id="reason" class="form-control"><?php echo e(old('reason', $appointment->reason)); ?></textarea>
            </div>

            <!-- Status -->
            <div class="form-group">
                <label for="status">Status</label>
                <select name="status" id="status" class="form-select">
                    <option value="Pending" <?php echo e($appointment->status == 'Pending' ? 'selected' : ''); ?>>Pending</option>
                    <option value="Approved" <?php echo e($appointment->status == 'Approved' ? 'selected' : ''); ?>>Approved</option>
                    <option value="Completed" <?php echo e($appointment->status == 'Completed' ? 'selected' : ''); ?>>Completed</option>
                    <option value="Cancelled" <?php echo e($appointment->status == 'Cancelled' ? 'selected' : ''); ?>>Cancelled</option>
                </select>
            </div>

            <!-- Submit Button -->
            <div class="form-group text-center">
                <button type="submit" class="btn btn-primary">Update Appointment</button>
            </div>
        </form>
    </div>

    <script src="<?php echo e(asset('js/bootstrap.bundle.min.js')); ?>"></script>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\doctor-appointment\resources\views/admin/appointments/update.blade.php ENDPATH**/ ?>