<?php

namespace App\Http\Controllers;

use App\Models\UserActivity;
use Illuminate\Http\Request;

class UserActivityController extends Controller
{
    public function get()
    {
        return UserActivity::with('user')->latest()->take(10)->get();
    }
}
