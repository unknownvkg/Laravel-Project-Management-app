<?php

namespace App\Http\Controllers;

use App\Models\addUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\TaskAssign;


class AddUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $addUser = addUser::get();
        // return view('afterloginpage', ['user' => $addUser]);
    }
    public function adduser(Request $request)
    {
        $request->validate([
            'firstname' => 'required|alpha',
            'lastname' => 'required|alpha',
            'email' => 'required|email|unique:add_users',
            'contactnumber' => 'required|numeric|min:10',
            'image' => 'nullable',
        ]);

        // store data into database
        $addUser = new addUser; //Student = model name
        $addUser->firstname = $request->firstname;
        $addUser->lastname = $request->lastname;
        $addUser->email = $request->email;
        $addUser->contactnumber = $request->contactnumber;
        $addUser->password = $request->password;
        $addUser->gender = $request->gender;
        // $addUser->status = 1;

        $result = $addUser->save();

        return redirect(route('add'))->with('success', 'User added successfully');
    }

    public function userLogin(Request $request)
    {       //function 4
        // form validation-login page
        // $request->validate([
        //     'username' => 'required|alpha',
        //     'password' => 'required|min:8'
        // ]);

        $addUser = addUser::where('email', '=', $request->email)->first();
        if ($addUser) {
            if ($request->password === $addUser->password) {
                $request->session()->put('loginId', $addUser->id);
                return redirect('userData');
            } else {
                return back()->with('fail', 'Password does not match');
            }
        } else {
            return back()->with('fail', 'This username is not registered');
        }
    }



    public function userData()
    {       //function 5
        // return 1;
        $data = array();
        if (Session::has('loginId')) {
            $Udata = addUser::where('id', '=', Session::get('loginId'))->first();
        }
        // return view('studentData');
        $loginId = Session::get('loginId');
        $addUser = TaskAssign::where('user_id', $loginId)->get();       
        return view('User.userDetail', ['user' => $addUser]);
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, addUser $addUser)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(addUser $addUser)
    {
        //
    }
}
