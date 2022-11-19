<?php

namespace App\Http\Controllers;

use App\Models\Candidate;
use App\Models\Setting;
use App\Models\User;
use App\Models\Vote;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\View;
use Rainwater\Active\Active;
use RealRashid\SweetAlert\Facades\Alert;

class VoteController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $data = Setting::all();
        View::share('setting', $data);
    }

    public function voting(Request $request)
    {
        if (Setting::get()[0]->active == false) {
            Alert::error('Belum saatnya memilih!');
            return redirect()->route('home')->with('error', 'Belum saatnya memilih!');
        }

        $vote = Vote::create([
            'candidates_id' => $request->candidate_id,
            'users_id' => $request->participant_id
        ]);

        $status = User::findOrfail($request->participant_id)->update([
            'has_voted' => 1
        ]);

        Cache::forget('participant');

        $request->user()->activity()->create([
            'user_id' => $request->user()->id,
            'details' => 'Voting success at ' . Carbon::now('Asia/Jakarta')->locale('id'),
            'userIp' => isset($_SERVER['HTTP_X_FORWARDED_FOR']) ? $_SERVER['HTTP_X_FORWARDED_FOR'] : $request->getClientIp(),
            'vote_id' => $vote->id
        ]);
        Auth::logout();
        Alert::success('Anda Berhasil Memilih!');
        return redirect()->route('home')->with('success', 'Anda Berhasil Memilih!');
    }

    public function livecount()
    {
        $this->middleware('guest');
        $participants = User::whereRoleIs('participant')->count();
        $candidates = Candidate::get()->count();
        $has_voted = User::where('has_voted', true)->whereRoleIs('participant')->count();
        $no_voted = User::where('has_voted', false)->whereRoleIs('participant')->count();
        $admin = User::whereRoleIs('super-administrator')->count();
        $onlineUsers = Active::users()->count() - $admin;
        $data = [
            "peserta" => $participants,
            "online_users" => $onlineUsers,
            "sudah_memilih" => $has_voted,
            "belum_memilih" => $no_voted,
        ];
        $vote = Candidate::withCount('jumlah_pemilih')->get();
        return view('livecount', compact('data', 'vote'));
    }
}
