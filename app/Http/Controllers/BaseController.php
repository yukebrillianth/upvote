<?php

namespace App\Http\Controllers;

use App\Models\Candidate;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\View;

class BaseController extends Controller
{
    public function __construct()
    {
        $data = Setting::all();
        View::share('setting', $data);
    }

    public function dashboard()
    {
        /*
        Jika role = user, maka akan menampilkan form
        Jika role = super-administrator, maka akan menampilkan dashboard
        */
        if (Auth::user()->hasRole('participant')) {
            return redirect()->action([BaseController::class, 'form']);
        } elseif (Auth::user()->hasRole('super-administrator')) {
            return 'Dashboard';
        }
    }

    public function index()
    {
        // user yang login tidak boleh ke halaman home
        if (Auth::user()->hasRole('participant')) {
            return redirect()->route('dashboard');
        }
        return view('home');
    }

    public function form()
    {
        $data = Candidate::all();
        return view('form', compact('data'));
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
