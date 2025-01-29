<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointment;
use App\Models\User; // Import the User model
use Illuminate\Support\Facades\Hash;


class AdminController extends Controller
{
    public function dashboard()
    {
        $appointments = Appointment::all();
        return view('admin.dashboard', compact('appointments'));
    }

    public function index()
    {
        $appointments = Appointment::paginate(10);
        return view('admin.appointments.index', compact('appointments'));
    }

    public function edit($id)
    {
        $appointment = Appointment::findOrFail($id);
        return view('admin.appointments.update', compact('appointment'));
    }
    
    public function update(Request $request, $id)
    {
        $request->validate([
            'client_name' => 'required|string|max:255',
            'client_email' => 'required|email',
            'client_phone' => 'required|string|max:15',
            'appointment_date' => 'required|date',
            'reason' => 'required|string',
            'status' => 'required|string',
        ]);
    
        $appointment = Appointment::findOrFail($id);
        $appointment->update([
            'client_name' => $request->client_name,
            'client_email' => $request->client_email,
            'client_phone' => $request->client_phone,
            'appointment_date' => $request->appointment_date,
            'reason' => $request->reason,
            'status' => $request->status,
        ]);
    
        return redirect()->route('appointments.index')->with('success', 'Appointment updated successfully!');
    }
    


    public function destroy($id)
    {
        $appointment = Appointment::findOrFail($id);
        $appointment->delete();

        return redirect()->route('appointments.index')->with('success', 'Appointment deleted successfully!');
    }
    public function adminDashboard() {
        $totalAppointments = Appointment::count();
        $pendingApprovals = Appointment::where('status', 'Pending')->count();
        $revenue = $totalAppointments * 300; // Fixed price per appointment
        return view('admin.dashboard', compact('totalAppointments', 'pendingApprovals', 'revenue'));
    }
    /*public function __construct()
{
    $this->middleware(['auth', 'admin']);
}*/

    // Function to add a new admin
    public function addAdmin(Request $request)
    {
        if ($request->isMethod('post')) {
            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'required|string|min:8|confirmed',
            ]);

            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'is_admin' => true, // Assuming you have an 'is_admin' column in the users table
            ]);

            return redirect()->route('admin.dashboard')->with('success', 'New admin added successfully!');
        }

        return view('admin.add-admin');
    }
    
}
