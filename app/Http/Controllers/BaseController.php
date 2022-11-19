<?php

namespace App\Http\Controllers;

use App\Models\Candidate;
use App\Models\Setting;
use Carbon\Carbon;
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

    public function home()
    {
        return view('home');
    }

    public function logout(Request $request)
    {
        $request->user()->activity()->create([
            'user_id' => $request->user()->id,
            'details' => 'Log out success at ' . Carbon::now('Asia/Jakarta')->locale('id'),
            'userIp' => isset($_SERVER['HTTP_X_FORWARDED_FOR']) ? $_SERVER['HTTP_X_FORWARDED_FOR'] : $request->getClientIp()
        ]);
        Auth::logout();
        return redirect()->route('login');
    }
}
