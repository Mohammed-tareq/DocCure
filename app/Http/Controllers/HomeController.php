<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Doctor;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */



    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = Auth::user();
        $appointments = Appointment::with('doctor','user')->where('user_id','like', Auth::user()->id)->get();
        return view('user.index', compact('user','appointments'));
    }



    public function password($id){
        $user = User::find($id);

        return view('user.changepass', compact('user'));
    }

    public function userchangepass(Request $request , $id){
        $request->validate([
            'password' => ['required', 'min:8', 'confirmed'],
        ]);
        $user = User::find($id);
        $input = $request->only('password');
        $input['password'] = Hash::make($request->password);

        $user->update($input);
        return redirect()->route('home');
    }


    public function edit()
    {
        $user = Auth::user();
        $bloodgroups = ['A+', 'A-', 'B+', 'B-', 'AB+', 'AB-', 'O+', 'O-'];
        $genders = ['male', 'female'];
        return view('user.edit', compact('user' , 'bloodgroups', 'genders'));
    }


    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $input = $request->except('image');

        if($request->hasFile('image')){

            $image = $request->file('image');
            $path = $image->getClientOriginalExtension();
            $imagename = uniqid() .".". $path;
            $image->move(public_path('images/'), $imagename);
            $input['image'] = asset('images/' . $imagename);
        }
        $user->update($input);

        return redirect()->route('home');
    }


    public function doctors(){
        $doctors = Doctor::all();
        return view('user.doctors', compact('doctors' ));
    }


    public function showProfileToUser($id){
        $doctor = Doctor::find($id);
        return view('user.doctorprofile', compact('doctor'));

    }


    public function book($id){
        $doctor = Doctor::find($id);
        return view('user.booking', compact('doctor'));
    }

    public function makeappointment(Request $request){

        $input = $request->all();
        $input['user_id'] = Auth::user()->id;

        Appointment::create($input);

        $appointments = Appointment::with('doctor','user')->where('user_id','like', Auth::user()->id)->where('doctor_id','like', $input['doctor_id'])->first();
        return view('user.choosepay', compact('appointments') );
    }

    public function cashpayment($doctor_id){
        $input = $doctor_id;
        $appointments = Appointment::with('doctor','user')->where('user_id','like', Auth::user()->id)->where('doctor_id','like', $input['doctor_id'])->first();

        return view('user.booksucc', compact('appointments') );
    }

    public function booksucc(Request $request ){
        $input = $request->all();
        $appointments = Appointment::with('doctor','user')->where('user_id','like', Auth::user()->id)->where('doctor_id','like', $input['doctor_id'])->first();
        return view('user.booksucc', compact('appointments') );
    }


    

    public function cancelappointment($id){
        Appointment::find($id)->delete();
        return back();
    }
}
