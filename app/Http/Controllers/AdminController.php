<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Doctor;
use App\Models\Appointment;
use Illuminate\Support\Facades\DB;   // ---- added
use Notification;   // ---- added
use App\Notifications\SendEmailNotification;    // ---- added

class AdminController extends Controller
{
    //
    public function addDoctor()
    {
        return view('admin.add-doctor');
    }

    // upload doctor -----
    public function uploadDoctor(Request $request)
    {
        $doctor = new doctor;

        $filename='';
        if($request->hasFile('image')){
            $filename = time() . '.' . $request->image->extension();
            $request->image->move(public_path('/assets/img/'), $filename);  // stock image in img folder
        }

        $doctor->name=$request->name;
        $doctor->phone=$request->phone;
        $doctor->specialite=$request->specialite;
        $doctor->room=$request->room;
        $doctor->image=$filename;

        $doctor->save();
        return redirect()->back()->with('message','medecin ajouté avec succéss !');
    }

    // ----- appointments liste
    public function showAppointments()
    {
        $data=appointment::all();
        return view('admin.showAppointments',compact('data'));
    }
    // ---- delete appointment
    public function deleteAppoint($id)
    {
        $data = appointment::findOrFail($id);
        $data->delete();
        return redirect()->back()->with('message','rendez vous suprimé avec success !');
    }

    // ----- approve appointment
    public function approve($id)
    {
        $data = appointment::find($id);
        $data->status='confirmé';
        $data->save();
        return redirect()->back();
    }

    // ---- list doctors
    public function doctorList()
    {
        $data = doctor::all();
        return view('admin.list-doctor',compact('data'));
    }

    // ------- delete doctor
    public function deleteDoctor($id)
    {
        $data = doctor::FindOrFail($id);
        $data = delete();
        return redirect()->back()->with('message','medecin vous suprimé avec success !');
    }

    // ----- edit doctor
    public function editDoctor(Request $request)
    {
        $doctor = DB::table('doctors')->where('id', $request->id)->first(); // Get current doctor
        $filename = $doctor->image; // Keep existing image if no new image is uploaded

        if($request->hasFile('image')){
            $filename = time() . '.' . $request->image->extension();
            $request->image->move(public_path('/assets/img/'), $filename);  // stock image in img folder
        } 
        $update=[
            'id'     => $request->id,
            'name'   => $request->name,
            'phone'  => $request->phone,
            'specialite' => $request->speciality,
            'room'       =>$request->room,
            'image'     => $filename,
        ];
        DB::table('doctors')->where('id',$request->id)->update($update);
        //return redirect()->back()->with(['message','medecin modifiée avec succéss', 'new_image' => $filename]);
        return response()->json(['message' => 'Médecin modifiée avec succès', 'new_image' => $filename]);
    }

    // ---- email features
    public function emailview($id)
    {
        //$data = appointment::find($id);
        $appoint = appointment::findOrFail($id);
       return view('admin.email_view',compact('appoint')); 
    }

    public function sendemail(Request $request,$id)
    {
        $data=appointment::find($id);

        $details=[
            'introduction' => $request->introduction,
            'body'         => $request->body,
            'actiontext'   => $request->actiontext,
            'actionurl'    => $request->actionurl,
            'endpart'      => $request->endpart
        ];
        Notification::send($data,new SendEmailNotification($details));
        return redirect()->back()->with('message','message envoyée avec success');
    }
}
