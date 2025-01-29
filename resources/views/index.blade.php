<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor Appointment</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .hero-section {
            background: url('{{ asset('images/doctor-bg.jpg') }}') no-repeat center center;
            background-size: cover;
            color: white;
            text-shadow: 2px 2px 8px rgba(0, 0, 0, 0.7);
            padding: 100px 20px;
        }
        .hero-section h1 {
            font-size: 3rem;
        }
        .features-section {
            margin-top: 50px;
        }
        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }
        .admin-icon {
            position: absolute;
            top: 20px;
            right: 20px;
            z-index: 1000;
        }
        .admin-icon a {
            color: #343a40;
            text-decoration: none;
        }
        .admin-icon a:hover {
            color: #007bff;
        }
    </style>
</head>
<body>
    <!-- Admin Icon -->
    <div class="admin-icon">
        <a href="{{ route('login') }}" title="Admin Login">
            <img src="{{ asset('images/admin-icon.png') }}" alt="Admin Login" style="width: 40px; height: 40px;">
        </a>
    </div>

    <!-- Hero Section -->
    <div class="hero-section text-center">
        <h1>Welcome to Doctor Appointment System</h1>
        <p class="lead">Book your appointment with ease and convenience!</p>
        <a href="{{ route('appointment.create') }}" class="btn btn-primary btn-lg mt-4">Book an Appointment</a>
    </div>

    <!-- Features Section -->
    <div class="container features-section">
        <h2 class="text-center mb-5">Why Choose Us?</h2>
        <div class="row">
            <div class="col-md-4 text-center">
                <img src="{{ asset('images/easy-booking.jpg') }}" alt="Easy Booking" class="img-fluid rounded-circle mb-3" style="width: 150px; height: 150px;">
                <h5>Easy Booking</h5>
                <p>Our streamlined system ensures hassle-free appointment booking.</p>
            </div>
            <div class="col-md-4 text-center">
                <img src="{{ asset('images/experienced-doctors.jpg') }}" alt="Experienced Doctors" class="img-fluid rounded-circle mb-3" style="width: 150px; height: 150px;">
                <h5>Experienced Doctors</h5>
                <p>Get access to a network of highly qualified and experienced doctors.</p>
            </div>
            <div class="col-md-4 text-center">
                <img src="{{ asset('images/24-7-support.jpg') }}" alt="24/7 Support" class="img-fluid rounded-circle mb-3" style="width: 150px; height: 150px;">
                <h5>24/7 Support</h5>
                <p>Our support team is available round the clock to assist you.</p>
            </div>
        </div>
    </div>

    <!-- Footer Section -->
    <footer class="text-center py-4 mt-5" style="background-color: #343a40; color: white;">
        <p>© 2025 Doctor Appointment System. All Rights Reserved.</p>
    </footer>

    <!-- Bootstrap JS -->
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>
