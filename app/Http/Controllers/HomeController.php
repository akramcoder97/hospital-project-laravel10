<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Doctor;
use App\Models\Appointment;

class HomeController extends Controller
{
    //
    public function redirect() 
    {
        if (Auth::id()) 
        {
            if (Auth::user()->usertype == '0') 
            {
                $doctor = doctor::all();
                //return redirect()->route('user.home');
                return view('user.userHome',compact('doctor'));
            } 
            else if (Auth::user()->usertype == '1') 
            {
                return redirect()->route('admin.home');
            }
        }
        return redirect()->back();
    }

    // index page ----
    public function index()
    {
        if(Auth::id())
        {
            //return redirect('home');
            return redirect()->route('admin.home');
        }
        else{
            $doctor = Doctor::all();
            return view('user.userHome',compact('doctor'));
            //return view('user.userHome');  
        }   
    }
    
    // Log out the user ---
    public function logout(Request $request) 
   {
    Auth::logout();

    // Invalidate the session and regenerate the CSRF token
    $request->session()->invalidate();
    $request->session()->regenerateToken();

    // Redirect the user to the login page (or wherever you want)
    return redirect('/')->with('message', 'You have been logged out.');
    }

    public function appointment(Request $request)
    {
        $data = new appointment;

        $data->name=$request->name;
        $data->email=$request->email;
        $data->date=$request->date;
        $data->phone=$request->phone;
        $data->message=$request->message;
        $data->doctor=$request->doctor;
        $data->status='in progress';
        if(Auth::id())
        {
            $data->user_id=Auth::user()->id;
        }
        $data->save();

        return redirect()->back()->with('message','rdv fixée avec succées !');
    }

    public function myAppointment()
    {
        if(Auth::id())
        {
            if(Auth::user()->usertype== '0')
            {
                $userid=Auth::user()->id;
                $appoint=appointment::where('user_id',$userid)->get();  // ma3naha get the appointment where the userid and user_id matched 
                return view('user/myAppointment',compact('appoint')); 
            }
            else{
                return 'not allowed !';
            }
        }
        else
        {
            return redirect()->back();
        }
    }

    public function cancel_appoint($id)
    {
       /*  $data=appointment::find($id);
        $data->delete();
        return redirect()->back();
 */
        $data = appointment::findOrFail($id);
        $data->delete();
        //return redirect()->back()->with('message','produit ajouté avec succéss !');
        return response()->json(['success' => 'Product deleted successfully']);
    }
}
