<?php

namespace App\Http\Controllers;

use App\Http\Requests\FormRegisterRequest;
use App\Repositories\Contracts\UsersRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    protected $userRepository;
    public function __construct(UsersRepository $usersRepository)
    {
        $this->userRepository = $usersRepository;
    }
    public function loginPage(){
        return view('auths.login');
    }

    public function login(Request $request) {
        $this->validate($request,[
            'email'             => 'required|email',
            'password'          => 'required|min:6',
        ],[
            'required'          => 'This is required',
            'password.min'      => 'Password must be at least 6 characters.',
        ]);
        $email = $request->email;
        $password = $request->password;
        if (Auth::attempt(['email' => $email, 'password' => $password])) {
            if (Auth::user()->role == null) {
                return redirect('/');
            } else if(auth()->user()->role == 0){
                return redirect('/manager');
            }
        } else {
            return back()->with("failed", "Failed! Email or Password not correct!");
        }
    }
    

    public function registerPage(){
        return view('auths.register');
    }

    public function register( Request $request) {
        $this->validate($request,[
            'full_name'         => 'required|min:2|max:25',
            'email'             => 'required|email|unique:users',
            'password'          => 'required|min:6',
            'phone_number'      => 'required|min:9|max:11'
        ],[
            'required'          => 'This is required',
            'full_name.min'     => 'Name must be at least 2 characters.',
            'full_name.max'     => 'Name should not be greater than 50 characters.',
            'password.min'      => 'Password must be at least 6 characters.',
            'phone_number.min'  => 'Phone number must be at least 6 to not greater then 11 characters',
            'phone_number.max'  => 'Phone number must be at least 6 to not greater then 11 characters'
        ]);
        $attributes = [
            'full_name' => $request->full_name,
            'email'     => $request->email,
            'password'  => bcrypt($request->password),
            'phone_number' => $request->phone_number,
            'role'      => null
        ];
        $users = $this->userRepository->create($attributes);
       
        return back()->with("success", "Success! Registration completed");
    } 
    public function logOut() {
        Auth::logout();

        return redirect('/');
    }
}
