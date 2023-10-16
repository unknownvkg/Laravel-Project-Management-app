<?php

namespace App\Http\Controllers;

// use App\Models\AuthenticationSystem;
use App\Models\Authentication;
use App\Models\addUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class AuthenticationController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function Userlogin()
    {    //function 1
        return view('user.Userlogin');
    }

    public function admin()
    {     //function 2
        return view('admin');
    }
    public function register()
    {     //function 2
        return view('register');
    }
    public function registeruser(Request $request)
    {     //function 3
        // form validation-register page
        $request->validate([
            'firstname' => 'required|alpha',
            'lastname' => 'required|alpha',
            'username' => 'required|alpha|unique:admin',
            'password' => 'required|min:8|same:confirmpassword',
            'confirmpassword' => 'required|min:8'
        ]);
        // store data into database
        $Authentication = new Authentication; 
        $Authentication->firstname = $request->firstname;
        $Authentication->lastname = $request->lastname;
        // $CustomAuthenticationSystem->gender = $request->gender;
        $Authentication->username = $request->username;
        $Authentication->password = Hash::make($request->password); //Hash::make() is use for secure your password
        $result = $Authentication->save();
        // after register instant login
        $Authentication = Authentication::where('username', '=', $request->username)->first();
        if ($Authentication) {
            Hash::check($request->password, $Authentication->password);
            $request->session()->put('loginId', $Authentication->id);
            return redirect('afterloginpage');
        } else {
            return "Something goes wrong";
        }

        // if($result){
        //     return back()->with('success','You have login successfully');
        // }else{
        //     return back()->with('fail', 'Something goes wrong');
        // }
    }

    public function loginuser(Request $request)
    {       //function 4
        // form validation-login page
        $request->validate([
            'username' => 'required|alpha',
            'password' => 'required|min:8'
        ]);

        $Authentication = Authentication::where('username', '=', $request->username)->first();
        if ($Authentication) {
            if (Hash::check($request->password, $Authentication->password)) {
                $request->session()->put('loginId', $Authentication->id);
                return redirect('studentData');
            } else {
                return back()->with('fail', 'Password does not match');
            }
        } else {
            return back()->with('fail', 'This username is not registered');
        }
    }
    public function studentData()
    {       //function 5
        $data = array();
        if (Session::has('loginId')) {
            $data = Authentication::where('id', '=', Session::get('loginId'))->first();
        }
        // return view('studentData');
        $addUser = addUser::get();
        return view('studentData', ['user' => $addUser]);
        // return view('studentData', ['data' =>$data]);
    }
    public function addUser()
    {    //function 1
        // return 1;
        return view('addUser');
    }
    public function logout()
    {
        Auth::logout();
    
        return redirect('/'); // Redirect to the desired page after logout
    }
}
