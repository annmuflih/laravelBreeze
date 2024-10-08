<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        if (Auth::check())
        {
            $usertype = Auth::user()->usertype;

            if ($usertype == 'user')
            {
                return view('dashboard');
            }
            else if ($usertype == 'admin')
            {
                return view('admin.dashboard');
            }
            else if ($usertype == 'tim')
            {
                return view('tim.dashboard');
            }
            else
            {
                return redirect()->back();
            }
        }
        else
        {
            return redirect('login');
        }
    }
    public function post() {
        return view('admin.post');
    }
}

