<?php

namespace App\Http\Controllers;

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
        $email = $request->email;
        $password = $request->password;
        if (Auth::attempt(['email' => $email, 'password' => $password])) {
            if (Auth::user()->role_id == null) {
                return redirect('/');
            } else {
                return redirect('/manager');
            }
        } else {
            return redirect('/auth/login');
        }
    }
    

    public function registerPage(){
        return view('auths.register');
    }

    public function register(Request $request) {
        $attributes = [
            'full_name' => $request->full_name,
            'email'     => $request->email,
            'password'  => bcrypt($request->password),
            'phone_number' => $request->phone_number,
            'role'      => null
        ];
        $this->userRepository->create($attributes);
        return redirect('/auth/login');
    } 
    public function logOut() {
        Auth::logout();

        return redirect('/');
    }
}
