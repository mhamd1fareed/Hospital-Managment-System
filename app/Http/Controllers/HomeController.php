<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Doctor;
use App\Models\Appointment;
class HomeController extends Controller
{
    //redirect
    public function redirect(){
        if(Auth::id()){
            if(Auth::user()->type=='0'){
                $doctors = Doctor::all();
                return view('user.home',compact('doctors'));
            }
            else{
                return view('admin.home');
            }
        }
        else{
            return redirect()->back();
        }
    }
    public function index(){
        if(Auth::id()){
            return redirect('home');
        }
        else{
        $doctors = Doctor::all();
        return view('user.home',compact('doctors'));}
    }
    public function appointment(Request $request){
        $appointment = new Appointment();

        $appointment->name =$request->name; 
        $appointment->phone =$request->number; 
        $appointment->email =$request->email; 
        $appointment->date =$request->date; 
        $appointment->message =$request->message; 
        $appointment->doctor =$request->doctor; 
        $appointment->status ='In Progress'; 
        if(Auth::id()){
            $appointment->user_id =Auth::user()->id; 
        }

        $appointment->save();

        return redirect()->back()->with('message','Appointment request successfully
        .We will contact with you soon');
        

    }
    public function myAppointments(){
        if(Auth::id()){
            $id = Auth::user()->id;
            $appointments = Appointment::where(["user_id"=>$id])->get();
            return view('user.my_appointments',compact('appointments'));
        }
        else{
            return redirect()->back();
        }
    }
    public function cancelAppointment($id){
        $appointment = Appointment::find($id);
        $appointment->delete();
        return redirect()->back();
    }
}
