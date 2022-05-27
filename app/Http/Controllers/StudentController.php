<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

use Illuminate\Support\Facades\File;

class StudentController extends Controller
{
    public function index(Request $request)
    {
        $page = $request['page'];
        $search = $request['search']?? "";
        if($search != ""){
            $student = Student::where('name', "LIKE", "%$search%")->orWhere('email', "LIKE", "%$search%")->orWhere('gender', "LIKE", "%$search%")->orWhere('dob', "LIKE", "%$search%")->orWhere('fav_sport', "LIKE", "%$search%")->orWhere('country', "LIKE", "%$search%")->orWhere('state', "LIKE", "%$search%")->orWhere('address', "LIKE", "%$search%")->orWhere('hobby', "LIKE", "%$search%") ->simplePaginate(); 
        }else{

            $student = Student::simplePaginate(15);
        }

        return view('home', compact('student', 'search', 'page'));
    }

    public function create()
    {
        return view('form');
    }

    public function store(Request $request)
    {
       
        // p($request->all()); 
        // <--- or --->
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

        return redirect('students')->with('status', 'Student Data Added Successfully');
    }

    public function edit($id)
    {
        $student = Student::find($id);
        return view('update', compact('student'));
    }

    public function update(Request $request, $id)
    {
        // $student = Student::find($id);

        // echo "<pre>";
        // print_r($request->all());


        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'dob' => 'required|before:6 years ago',
            'address' => 'required',

        ]);

        $student = Student::find($id);
        $student->name = $request->input('name');
        $student->email = $request->input('email');
        $student->dob = $request->input('dob');
        $student->gender = $request->input('gender');
        $student->fav_sport = $request->input('favsport');
        $student->country = $request->input('country');
        $student->state = $request->input('state');
        $student->address = $request->input('address');
        $student->hobby = $request->input('hobby');

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

        if ($student->update()) {

            return redirect('students')->with('status', 'Student Data Updated Successfully');
        } else {

            return redirect('students')->with('failed', 'Student Data not Updated ');
        }
    }

    public function delete($id)
    {
        $student = Student::find($id);
        $destination = 'uploads/cover/' . $student->image;


        if (File::exists($destination)) {
            File::delete($destination);
        }
        $student->delete();
        return redirect('students')->with('status', 'Student Data Deleted Successfully');
    }
}
