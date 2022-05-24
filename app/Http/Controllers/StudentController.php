<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

use Illuminate\Support\Facades\File;

class StudentController extends Controller
{
    public function index()
    {
        $student = Student::all();
        return view('home', compact('student'));
    }

    public function create()
    {
        return view('form');
    }

    public function store(Request $request)
    {

        // echo "<pre>";
        // print_r($request->all());
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => "required",
            'Cpassword' => 'required|same:password',
            'dob' => 'required|before:6 years ago',
            'address' => 'required',
            // 'hobby' => 'required'
        ]);
        $student = new Student;
        $student->name = $request['name'];
        $student->email = $request['email'];
        $student->password = $request['password'];
        $student->dob = $request['dob'];
        $student->gender = $request['gender'];
        $student->fav_sport = $request['favsport'];
        $student->country = $request['country'];
        $student->state = $request['state'];
        $student->address = $request['address'];
        $student->hobby = $request['hobby'];

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extention = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extention;
            $file->move('uploads/cover/', $filename);
            $student->image = $filename;
        }
        $student->save();

        return redirect()->back()->with('status', 'Student Data Added Successfully');
    }

    public function edit($id)
    {
        $student = Student::find($id);
        return view('update', compact('student'));
    }

    public function update(Request $request, $id)
    {
        $student = Student::find($id);

        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'dob' => 'required|before:today',
            'address' => 'required',
            // 'hobby' => 'required'
        ]);
        $student = new Student;
        $student->name = $request['name'];
        $student->email = $request['email'];
        $student->dob = $request['dob'];
        $student->gender = $request['gender'];
        $student->fav_sport = $request['favsport'];
        $student->country = $request['country'];
        $student->state = $request['state'];
        $student->address = $request['address'];
        $student->hobby = $request['hobby'];

        if ($request->hasFile('image')) {
            $destination = 'uploads/cover/' . $student->image;
            if (File::exists($destination)) {
                File::delete($destination);
            }
            $file = $request->file('image');
            $extention = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extention;
            $file->move('uploads/cover/', $filename);
            $student->image = $filename;
        }
        $student->update();

        return redirect()->back()->with('status', 'Student Data Updated Successfully');
    }

    public function delete($id)
    {
        $student = Student::find($id);
        $destination = 'uploads/cover/' . $student->image;
        if (File::exists($destination)) {
            File::delete($destination);
        }
        $student->delete();
        return redirect()->back()->with('status', 'Student Image Deleted Successfully');
    }
}
