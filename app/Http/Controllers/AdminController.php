<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Doctor;
use App\Models\Appointment;
class AdminController extends Controller
{

    public function addView(){
        return view('admin.add_doctor');
    }
    public function upload(Request $request){


        $doctor = new Doctor();

        $image = $request->file;
        $image_name = time().'.'.$image->getClientoriginalExtension();
        $request->file->move('doctors_images',$image_name);
        $doctor->image = $image_name;

        $doctor->name=$request->name;
        $doctor->phone=$request->number;
        $doctor->speciality=$request->speciality;
        $doctor->room=$request->room;

        $doctor->save();

        return redirect()->back()->with('message','Doctor added sucessfully!!');
    }
    public function showAppointments(){
        $appointments = Appointment::all();
        return view('admin.show_appointments',compact('appointments'));
    }
    public function approve($id){
        $appointment = Appointment::find($id);
        $appointment->status = 'approved';
        $appointment->save();
        return redirect()->back();
    }
    public function cancel($id){
        $appointment = Appointment::find($id);
        $appointment->status = 'cancelled';
        $appointment->save();
        return redirect()->back();
    }
    public function showDoctors(){
        $doctors = Doctor::all();
        return view('admin.doctors',compact('doctors'));
    }
    public function delete($id){
        $doctor = Doctor::find($id);      
        $doctor->delete();
        return redirect()->back();
    }
    public function update($id){
        $doctor = Doctor::find($id);
        return view('admin.update_doctor',compact('doctor'));
    }
    public function edit(Request $request,$id){
        $doctor = Doctor::find($id);

        $doctor->name = $request->name;
        $doctor->phone = $request->phone;
        $doctor->speciality = $request->speciality;
        $doctor->room = $request->room;
        
        $image = $request->file;
        if($image){
        $image_name = time().'.'.$image->getClientoriginalExtension();
        $request->file->move('doctors_images',$image_name);
        $doctor->image = $image_name;
        }
        $doctor->save();
        return redirect()->back()->with('message','Updated Successfully');

        
    }
}
