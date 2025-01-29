<?php if(Auth::check() && Auth::user()->is_admin): ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="<?php echo e(asset('css/bootstrap.min.css')); ?>">
    <style>
        body {
            background-color: #f8f9fa;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            margin: 0;
        }
        .dashboard-container {
            margin-top: 50px;
            flex: 1;
        }
        .card {
            border: none;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }
        footer {
            background-color: #343a40;
            color: #ffffff;
            text-align: center;
            padding: 15px 0;
            margin-top: auto;
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
                        <a class="nav-link" href="<?php echo e(route('appointments.index')); ?>">Manage Appointments</a>
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



    <div class="container dashboard-container">
        <div class="row g-4">
            <div class="col-md-6 col-lg-4">
                <div class="card text-center">
                    <div class="card-body">
                        <h5 class="card-title">Total Appointments</h5>
                        <p class="card-text display-4"><?php echo e($totalAppointments); ?></p>
                        <a href="<?php echo e(route('appointments.index')); ?>" class="btn btn-primary">View Details</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="card text-center">
                    <div class="card-body">
                        <h5 class="card-title">Pending Approvals</h5>
                        <p class="card-text display-4"><?php echo e($pendingApprovals); ?></p>
                        <a href="<?php echo e(route('appointments.index')); ?>" class="btn btn-primary">Review Now</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="card text-center">
                    <div class="card-body">
                        <h5 class="card-title">Revenue</h5>
                        <p class="card-text display-4"><?php echo e($revenue); ?> DH</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-4 text-center">
            <button class="btn btn-success" onclick="document.getElementById('addAdminForm').style.display = 'block';">Add New Admin</button>
        </div>

         <!-- Flash message for success -->
    <?php if(session('success')): ?>
    <div class="alert alert-success" role="alert">
        <?php echo e(session('success')); ?>

    </div>
<?php endif; ?>

        <div class="container">
            <h1>Add New Admin</h1>
        
            <?php if($errors->any()): ?>
                <div class="alert alert-danger">
                    <ul>
                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><?php echo e($error); ?></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
            <?php endif; ?>
        
            <form method="POST" action="<?php echo e(route('admin.addAdmin')); ?>">
                <?php echo csrf_field(); ?>
        
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" class="form-control" required>
                </div>
        
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" class="form-control" required>
                </div>
        
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" class="form-control" required>
                </div>
        
                <div class="form-group">
                    <label for="password_confirmation">Confirm Password</label>
                    <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" required>
                </div>
        
                <button type="submit" class="btn btn-primary">Add Admin</button>
            </form>
        </div>

    <footer>
        <p>&copy; <?php echo e(date('Y')); ?> Doctor Appointment System. All Rights Reserved.</p>
    </footer>

    <script src="<?php echo e(asset('js/bootstrap.bundle.min.js')); ?>"></script>
</body>
</html>
<?php else: ?>
    <p>You do not have permission to view this page.</p>
<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\doctor-appointment\resources\views/admin/dashboard.blade.php ENDPATH**/ ?>