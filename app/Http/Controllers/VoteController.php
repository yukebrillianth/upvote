<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use App\Models\User;
use App\Models\Vote;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
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
        $vote = Vote::create([
            'candidates_id' => $request->candidate_id,
            'users_id' => $request->participant_id
        ]);

        $status = User::findOrfail($request->participant_id)->update([
            'has_voted' => 1
        ]);

        Auth::logout();
        Alert::success('Anda Berhasil Memilih!');
        return redirect()->route('login');
    }
}
