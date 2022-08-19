<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\AppointmentT;
class UserController extends Controller
{
    public function MakeAppointmentFunction(Request $request)
    {
        $AppointmentT = new AppointmentT;
        $AppointmentT->PatientName = Auth::user()->username;
        $AppointmentT->Address = Auth::user()->adress;
        $AppointmentT->ContactNumber = Auth::user()->phone;
        $AppointmentT->Age = $request->Age;
        $AppointmentT->AppointmentType = $request->AppointmentType;
        $AppointmentT->status = 'Pending';
        $AppointmentT->gender = Auth::user()->gender;


        $AppointmentT->save();
        return redirect()->back()->with('confirmation', 'Appointment Sent Successfully Please wait for Doctor Response');
    }



    public function DoctorHelpFunction()
    {
        return view('user.GetDoctorHelp');
    }
}
