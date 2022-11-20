<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use App\Models\User;
use App\Rules\MatchOldPassword;
use Illuminate\Support\Facades\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class SettingController extends Controller
{
    public function __construct()
    {
        $data = Setting::all();
        View::share('setting', $data);
    }

    public function index()
    {
        $data = Setting::select('nama_instansi', 'periode', 'nama_kegiatan', 'active')->get();
        return view('dashboard.settings.index', compact('data'));
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                'nama_instansi' => 'required|max:120|min:4',
                'nama_kegiatan' => 'required|max:120|min:6',
                'periode' => 'required|max:24|min:4'
            ],
            [
                'nama_instansi.required' => 'Nama instansi harus diisi!',
                'nama_instansi.max' => 'Nama instansi harus kurang dari 120 karakter!',
                'nama_instansi.min' => 'Nama instansi harus lebih dari 4 karakter!',
                'nama_kegiatan.required' => 'Nama kegiatan harus diisi!',
                'nama_kegiatan.max' => 'Nama kegiatan harus kurang dari 120 karakter!',
                'nama_kegiatan.min' => 'Nama kegiatan harus lebih dari 6 karakter!',
                'periode.required' => 'Periode harus diisi!',
                'periode.max' => 'Periode harus kurang dari 24 karakter!',
                'periode.min' => 'Periode harus lebih dari 4 karakter!',
            ]
        );

        Setting::updateOrCreate(
            [
                'id' => 1
            ],
            [
                'nama_instansi' => $request->nama_instansi,
                'nama_kegiatan' => $request->nama_kegiatan,
                'periode' => $request->periode
            ]
        );

        return redirect()->back();
    }

    public function active(Request $request)
    {
        $request->validate(
            [
                'active' => 'required|boolean'
            ],
            [
                'active.required' => 'toggle required!',
                'active.boolean' => 'toggle value must be boolean!'
            ]
        );

        Setting::updateOrCreate(
            [
                'id' => 1
            ],
            [
                'active' => $request->active
            ]
        );

        return response()->json(["status" => 'ok']);
    }

    public function changepassword(Request $request)
    {
        $request->validate([
            'current_password' => ['required', new MatchOldPassword],
            'new_password' => ['required'],
            'new_confirm_password' => ['same:new_password'],
        ]);

        User::whereRoleIs('super-administrator')->find(auth()->user()->id)->update(['password' => Hash::make($request->new_password)]);
        Alert::toast('Sukses ganti password', 'success');
        return redirect()->back();
    }
}
