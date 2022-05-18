<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\student;

class laravelCRUDController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['student'] = student::orderBy('id', 'desc')->paginate(5);
        return view('student.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('student.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'contact' => 'required',
            'dateOfBirth' => 'required',
            'gender' => 'required',
            'country' => 'required',
            'favSport' => 'required',
            'image' => 'required',
            'address' => 'required'
        ]);
        $student = new student;
        $student->name = $request->name;
        $student->email = $request->email;
        $student->contact = $request->contact;
        $student->dateOfBirth = $request->dateOfBirth;
        $student->gender = $request->gender;
        $student->country = $request->country;
        $student->favSport = $request->favSport;
        $student->image = $request->image;
        $student->address = $request->address;
        $student->save();
        return redirect()->route('student.index')
            ->with('success', 'Student has been created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        return view('student.show', compact('student'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        return view('student.edit', compact('student'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'contact' => 'required',
            'dateOfBirth' => 'required',
            'gender' => 'required',
            'country' => 'required',
            'favSport' => 'required',
            'image' => 'required',
            'address' => 'required'
        ]);
        $student = student::find($id);
        $student->name = $request->name;
        $student->email = $request->email;
        $student->contact = $request->contact;
        $student->dateOfBirth = $request->dateOfBirth;
        $student->gender = $request->gender;
        $student->country = $request->country;
        $student->favSport = $request->favSport;
        $student->image = $request->image;
        $student->address = $request->address;
        $student->save();
        return redirect()->route('student.index')
            ->with('success', 'Student Has Been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function destroy($id)
    // {
    //     $student->delete();
    //     return redirect()->route('student.index')
    //         ->with('success', 'Student has been deleted successfully');
    // }
}
