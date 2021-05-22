<?php

namespace App\Http\Controllers;

use App\Models\Candidate;
use App\Models\Setting;
use App\Models\User;
use App\Models\Vote;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use RealRashid\SweetAlert\Facades\Alert;

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
            if (Auth::user()->has_blacklisted == 1) {
                Auth::logout();
                Alert::error('Anda Diblacklist Oleh Admin!');
                return redirect()->route('login');
            } elseif (Auth::user()->has_voted) {
                Auth::logout();
                Alert::error('Anda Sudah Memilih!');
                return redirect()->route('home');
            } else {
                $data = Candidate::all();
                $vote = Vote::all()->count();
                return view('form', compact('data'));
            }
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
