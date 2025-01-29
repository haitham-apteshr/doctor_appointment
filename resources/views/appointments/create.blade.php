<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Appointment</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .form-container {
            max-width: 600px;
            margin: 50px auto;
            background: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }
        .form-container h1 {
            font-size: 2rem;
            margin-bottom: 20px;
            text-align: center;
            color: #343a40;
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
        <div class="form-container">
            <h1>Book an Appointment</h1>
            <form method="POST" action="{{ route('appointment.store') }}">
                @csrf
                <div class="mb-3">
                    <label for="client_name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="client_name" name="client_name" placeholder="Enter your name" required>
                </div>
                <div class="mb-3">
                    <label for="client_email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="client_email" name="client_email" placeholder="Enter your email" required>
                </div>
                <div class="mb-3">
                    <label for="client_phone" class="form-label">Phone</label>
                    <input type="text" class="form-control" id="client_phone" name="client_phone" placeholder="Enter your phone number" required>
                </div>
                <div class="mb-3">
                    <label for="appointment_date" class="form-label">Preferred Date & Time</label>
                    <input 
                        type="datetime-local" 
                        class="form-control" 
                        id="appointment_date" 
                        name="appointment_date" 
                        min="{{ now()->format('Y-m-d') }}T09:00" 
                        max="{{ now()->addYear()->format('Y-m-d') }}T19:00" 
                        step="1800" 
                        required>
                </div>
                
                <div class="mb-3">
                    <label for="reason" class="form-label">Reason</label>
                    <textarea class="form-control" id="reason" name="reason" rows="4" placeholder="Describe your reason (optional)"></textarea>
                </div>
                <button type="submit" class="btn btn-primary w-100">Submit</button>
            </form>
        </div>
    </div>

    <!-- Bootstrap JS Bundle -->
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>
