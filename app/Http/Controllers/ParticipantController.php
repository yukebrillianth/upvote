<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\View;
use Rainwater\Active\Active;


class ParticipantController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth');
        $data = Setting::all();
        View::share('setting', $data);
    }

    public static function onlineUsers()
    {
        $res =  Active::users()->count();
        return response($res - 1);
    }
}
