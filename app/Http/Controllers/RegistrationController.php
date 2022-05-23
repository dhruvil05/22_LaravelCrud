<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Peoples;
class RegistrationController extends Controller
{
    public function index()
    {
        return view('form');
    }

    public function register(Request $request)
    {

        $request->validate(
            [
                'name' => "required",
                'email' => "required|email",
                'password' => "required",
                'Cpassword' => "required|same:password",
                'dob'=>"required",
                'country' => "required"

            ]
        );
        echo "<pre>";
        print_r($request->all());

        $peoples = new Peoples;
        $peoples->name=$request["name"];
        $peoples->email=$request["email"];
        $peoples->password=$request["password"];
        $peoples->gender=$request["gender"];
        $peoples->dob=$request["dob"];
        $peoples->country=$request["country"];
        $peoples->state=$request["state"];
        $peoples->address=$request["address"];
        // $peoples->file=$request["file"];
        $peoples->like=$request["hobbies"];



    }
}
