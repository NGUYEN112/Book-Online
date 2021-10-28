<?php

namespace App\Http\Controllers\Managers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ManagerHomeController extends Controller
{
    public function managerHomePage() {
        return view('managers.home');
    }
}
