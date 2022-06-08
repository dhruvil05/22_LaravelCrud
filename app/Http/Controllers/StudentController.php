<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class StudentController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Student::latest()->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->filter(function ($instance) use ($request) {
                    // if (!empty($request->get('email'))) {
                    //     $instance->collection = $instance->collection->filter(function ($row) use ($request) {
                    //         return Str::contains($row['email'], $request->get('email')) ? true : false;
                    //     });
                    // }

                    if (!empty($request->get('search'))) {
                        $instance->collection = $instance->collection->filter(function ($row) use ($request) {
                            if (Str::contains(Str::lower($row['name']), Str::lower($request->get('search')))) {
                                return true;
                            } else if (Str::contains(Str::lower($row['email']), Str::lower($request->get('search')))) {
                                return true;
                            } else if (Str::contains(Str::lower($row['dob']), Str::lower($request->get('search')))) {
                                return true;
                            }else if (Str::contains(Str::lower($row['gender']), Str::lower($request->get('search')))) {
                                return true;
                            }else if (Str::contains(Str::lower($row['favsport']), Str::lower($request->get('search')))) {
                                return true;
                            }else if (Str::contains(Str::lower($row['country']), Str::lower($request->get('search')))) {
                                return true;
                            }else if (Str::contains(Str::lower($row['state']), Str::lower($request->get('search')))) {
                                return true;
                            }else if (Str::contains(Str::lower($row['address']), Str::lower($request->get('search')))) {
                                return true;
                            }else if (Str::contains(Str::lower($row['hobby']), Str::lower($request->get('search')))) {
                                return true;
                            }else if (Str::contains(Str::lower($row['created_at']), Str::lower($request->get('search')))) {
                                return true;
                            }
                            

                            return false;
                        });
                    }
                })
                ->editColumn('gender', function ($row) {
                    if ($row->gender == "M") {
                        return "Male";
                    } elseif ($row->gender == "F") {
                        return "Female";
                    } else {
                        return "Other";
                    }
                })
                ->editColumn('dob', function ($row) {
                    $formatedDate = get_formatted_date($row->dob, 'd/m/Y');
                    return $formatedDate;
                })
                ->editColumn('created_at', function ($row) {
                    $formatedDate = get_formatted_date($row->created_at, 'd/m/Y');
                    return $formatedDate;
                })
                ->addColumn('action', function ($row) {

                    $btn = '<a href="   " class="edit btn btn-primary btn-sm">Edit</a>
                           <a href="students/delete-student/' . $row->id . '" class="edit btn btn-danger btn-sm mt-2">Delete</a>';

                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('home');
    }

    public function accessDenied()
    {

        return view('access');
    }

    public function allSession()
    {
        $session = session()->all();
        
        return redirect('students');
    }

    public function setSession(Request $request)
    {
        $request->session()->put('user', 'CRUD');
        $request->session()->put('id', '123');
        return redirect('students');
    }

    public function destroySession()
    {
        session()->forget(['user', 'id']);
        // session()->forget('user_id');
        return redirect('students');
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
        $student->favsport = implode(',', (array)$request['favsport']);
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
        $sport = explode(',', $student->favsport);
        return view('update', compact('student','sport'));
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
        $student->favsport =implode(',',(array)$request->input('favsport'));
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
