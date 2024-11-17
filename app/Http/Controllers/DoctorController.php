<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Doctor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $appointments = Appointment::with('user')->where('doctor_id','like', Auth::guard('doctor')->user()->id)->where('status','like','pending')->get();
        return view('doctor.index', compact('appointments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {

    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Doctor $doctor)
    {
        $doctor = Auth::guard('doctor')->user();
        return view('doctor.edit', compact('doctor'));
    }

    /**
     * Update the specified resource in storage.
     * update from for doctor profile sitting
     */
    public function update(Request $request, $id)
    {
        $doctor = Doctor::find($id);
        $input = $request->except('image');

        if($request->hasFile('image')){

            $image = $request->file('image');
            $path = $image->getClientOriginalExtension();
            $imagename = uniqid() .".". $path;
            $image->move(public_path('images/'), $imagename);
            $input['image'] = asset('images/' . $imagename);
        }

        $doctor->update($input);

        return redirect()->route('doctor.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy()
    {

    }

    public function logout(){

        Auth::guard('doctor')->logout();
        return redirect()->route('doctor.login');


    }

    public function login(){

        return view('doctor.login');
    }

    public function register(){

        return view('doctor.register');
    }



    public function makedoctorregister(Request $request){
        $request->validate([
            'name'=>'required',
            'email'=>'required | unique:doctors,email',
            'password'=>'required | min:8'
        ]);

        $input = $request->except('password');
        $input['password'] = Hash::make($request->password);
        Doctor::create($input);
        return redirect()->route('doctor.login');
    }

    public function makedoctorlogin(Request $request){

        $request->validate([

            'email' => 'required',
            'password' => 'required'
        ]);

            $input =$request->only('email','password');

            if(Auth::guard('doctor')->attempt($input)){
                return redirect()->route('doctor.index');
            }
            else{
                return redirect()->route('doctor.login');
            }

    }


    public function showProfileToDoctor($id){
        $doctor = Doctor::find($id);
        return view('doctor.showpro', compact('doctor'));


    }
}
