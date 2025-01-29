<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointment;

class ClientController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function create()
    {
        return view('appointments.create');
    }

    public function store(Request $request)
    {
        // Validate the input
        $request->validate([
            'client_name' => 'required|string|max:255',
            'client_email' => 'required|email',
            'client_phone' => 'required',
            'appointment_date' => 'required|date',
            'reason' => 'nullable|string',
        ]);
    
        // Parse the appointment date using Carbon
        $appointmentDate = \Carbon\Carbon::parse($request->appointment_date);
    
        // Check if the appointment is outside working hours
        if ($appointmentDate->hour < 9 || $appointmentDate->hour > 19 || ($appointmentDate->hour == 19 && $appointmentDate->minute > 0)) {
            return back()->with('error', 'Please choose a time between 9 AM and 7 PM.');
        }
    
        // Check if the appointment is on a Sunday
        if ($appointmentDate->isSunday()) {
            return back()->with('error', 'We are closed on Sundays. Please choose another date.');
        }
    
        // Check if the time slot is already reserved
        $existingAppointment = Appointment::where('appointment_date', $appointmentDate)->first();
    
        if ($existingAppointment) {
            return back()->with('error', 'This time slot is already reserved. Please choose another date or time.');
        }
    
        // Create the appointment
        $appointment = Appointment::create([
            'client_name' => $request->client_name,
            'client_email' => $request->client_email,
            'client_phone' => $request->client_phone,
            'appointment_date' => $appointmentDate,
            'reason' => $request->reason,
        ]);
    
        // Redirect to a success page
        return view('appointments.success', ['appointment' => $appointment]);
    }
}

