<?php

namespace App\Http\Controllers;

use App\Models\Candidate;
use App\Models\Setting;
use GuzzleHttp\Middleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\View;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $data = Setting::all();
        View::share('setting', $data);
    }

    public function index()
    {
        /*
        Jika role = user, maka akan menampilkan form
        Jika role = super-administrator, maka akan menampilkan dashboard
        */
        if (Auth::user()->hasRole('participant')) {
            $data = Candidate::all();
            return view('form', compact('data'));
        } elseif (Auth::user()->hasRole('super-administrator')) {
            return 'Dashboard';
        }
    }
}
