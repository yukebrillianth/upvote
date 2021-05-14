<?php

namespace App\Http\Controllers;

use App\Models\Candidate;
use App\Models\Setting;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
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
            $participants = User::whereRoleIs('participant')->count();
            $candidates = Candidate::get()->count();
            $has_voted = User::where('has_voted', true)->whereRoleIs('participant')->count();
            $no_voted = User::where('has_voted', false)->whereRoleIs('participant')->count();
            $data = [
                "peserta" => $participants,
                "kandidat" => $candidates,
                "sudah_memilih" => $has_voted,
                "belum_memilih" => $no_voted
            ];
            return view('dashboard.index', compact('data'));
        }
    }
}
