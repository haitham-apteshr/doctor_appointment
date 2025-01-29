<?php if(Auth::check() && Auth::user()->is_admin): ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Appointments</title>
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
        .table {
            margin: 20px auto;
            width: 95%;
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
                        <a class="nav-link" href="<?php echo e(route('admin.dashboard')); ?>">Dashboard</a>
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

    <h1>Manage Appointments</h1>
    <div class="table-responsive">
        <table class="table table-striped table-hover">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Client Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Appointment Date</th>
                    <th>Reason</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $appointments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $appointment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($appointment->id); ?></td>
                        <td><?php echo e($appointment->client_name); ?></td>
                        <td><?php echo e($appointment->client_email); ?></td>
                        <td><?php echo e($appointment->client_phone); ?></td>
                        <td><?php echo e($appointment->appointment_date); ?></td>
                        <td><?php echo e($appointment->reason); ?></td>
                        <td>
                            <form method="POST" action="<?php echo e(route('appointments.update', $appointment->id)); ?>" class="d-inline">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('PUT'); ?>
                                <select name="status" class="form-select form-select-sm" onchange="this.form.submit()">
                                    <option <?php echo e($appointment->status == 'Pending' ? 'selected' : ''); ?>>Pending</option>
                                    <option <?php echo e($appointment->status == 'Approved' ? 'selected' : ''); ?>>Approved</option>
                                    <option <?php echo e($appointment->status == 'Completed' ? 'selected' : ''); ?>>Completed</option>
                                    <option <?php echo e($appointment->status == 'Cancelled' ? 'selected' : ''); ?>>Cancelled</option>
                                </select>
                            </form>
                        </td>
                        <td>
                            <form method="POST" action="<?php echo e(route('appointments.destroy', $appointment->id)); ?>" class="d-inline">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                            <form method="GET" action="<?php echo e(route('appointments.edit', $appointment->id)); ?>" class="d-inline">
                                <button type="submit" class="btn btn-sm btn-primary">Update</button>
                            </form>
                            
                            
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>

    <div class="d-flex justify-content-center">
        <?php echo e($appointments->links()); ?>

    </div>
    
    <script src="<?php echo e(asset('js/bootstrap.bundle.min.js')); ?>"></script>
</body>
</html>
<?php else: ?>
    <p>You do not have permission to view this page.</p>
<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\doctor-appointment\resources\views/admin/appointments/index.blade.php ENDPATH**/ ?>