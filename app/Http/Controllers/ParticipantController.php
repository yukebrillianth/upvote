<?php

namespace App\Http\Controllers;

use App\Exports\UsersExport;
use App\Imports\UsersImport;
use Maatwebsite\Excel\Facades\Excel as Excel;
use App\Models\Kelas;
use App\Models\Setting;
use App\Models\User;
use App\Models\Vote;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\View;
use Rainwater\Active\Active;
use RealRashid\SweetAlert\Facades\Alert;

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
        $admin = User::whereRoleIs('super-administrator')->count();
        $res =  Active::users()->count();
        return response($res - $admin);
    }

    public function index()
    {
        $data = User::whereRoleIs('participant')->get();
        return view('dashboard.users.index', compact('data'));
    }

    public function create()
    {
        $class = Kelas::get();
        return view('dashboard.users.add', compact('class'));
    }

    public function store(Request $request)
    {
        $request["email_peserta"] = strtolower(str_replace(' ', '', $request["email_peserta"])) . "@up.vote";
        $validatedData = $request->validate(
            [
                'nama_peserta' => 'required|max:45|min:4',
                'email_peserta' => 'required|max:45|min:6|unique:users,email',
                'password' => 'required|max:16|min:8'
            ],
            [
                'nama_peserta.required' => 'Nama harus diisi!',
                'nama_peserta.max' => 'Nama harus kurang dari 45 karakter!',
                'nama_peserta.min' => 'Nama harus lebih dari 4 karakter!',
                'email_peserta.required' => 'Email harus diisi!',
                'email_peserta.max' => 'Email harus kurang dari 45 karakter!',
                'email_peserta.min' => 'Email harus lebih dari 6 karakter!',
                'email_peserta.unique' => 'Email tidak boleh sama!',
                'password.required' => 'Password harus diisi!',
                'password.max' => 'Password harus kurang dari 16 karakter!',
                'password.min' => 'Password harus lebih dari 8 karakter!',
            ]
        );

        $user = User::create([
            'name' => $request->nama_peserta,
            'email' => $request->email_peserta,
            'kelas_id' => $request->kelas_id,
            'password' => Hash::make($request->password)
        ]);
        $user->attachRole('participant');

        Alert::success('Data Berhasil Ditambahkan!');
        return redirect()->route('peserta');
    }

    public function edit($id)
    {
        $class = kelas::all();
        $data = User::whereRoleIs('participant')->findOrfail($id);

        return view('dashboard.users.edit', compact('data', 'class'));
    }

    public function update(Request $request, $id)
    {
        $request["email_peserta"] = strtolower(str_replace(' ', '', $request["email_peserta"])) . "@up.vote";
        $validatedData = $request->validate(
            [
                'nama_peserta' => 'required|max:45|min:4',
                'email_peserta' => 'required|max:45|min:6',
                'password' => 'required|max:16|min:8'
            ],
            [
                'nama_peserta.required' => 'Nama harus diisi!',
                'nama_peserta.max' => 'Nama harus kurang dari 45 karakter!',
                'nama_peserta.min' => 'Nama harus lebih dari 4 karakter!',
                'email_peserta.required' => 'Email harus diisi!',
                'email_peserta.max' => 'Email harus kurang dari 45 karakter!',
                'email_peserta.min' => 'Email harus lebih dari 6 karakter!',
                'password.required' => 'Password harus diisi!',
                'password.max' => 'Password harus kurang dari 16 karakter!',
                'password.min' => 'Password harus lebih dari 8 karakter!',
            ]
        );

        $user = User::findOrfail($id)->update([
            'name' => $request->nama_peserta,
            'email' => $request->email_peserta,
            'kelas_id' => $request->kelas_id,
            'password' => Hash::make($request->password)
        ]);

        Alert::success('Data Berhasil Dirubah!');
        return redirect()->route('peserta');
    }

    public function blacklist($id)
    {
        $user = User::whereRoleIs('participant')
            ->findOrfail($id)
            ->update(['has_blacklisted' => true]);

        return redirect()->route('peserta');
    }

    public function resetStatus($id)
    {
        $user = User::whereRoleIs('participant')->findOrfail($id);
        $user->update([
            'has_blacklisted' => false,
            'has_voted' => false
        ]);
        Vote::where('users_id', $id)->delete();

        return redirect()->route('peserta');
    }

    public function destroy($id)
    {
        $data = User::whereRoleIs('participant')
            ->findOrfail($id)
            ->delete();

        Alert::success('Peserta Berhasil Dihapus!');
        return redirect()->route('peserta');
    }

    public function deleteAll()
    {
        User::whereRoleIs('participant')->delete();

        Alert::success('Data berhasil dihapus!');
        return redirect()->back();
    }

    public function export()
    {
        return Excel::download(new UsersExport, 'peserta.xlsx');
    }

    public function import() 
    {
        Excel::import(new UsersImport, request()->file('file'));
        
        return response()->json([
            'code' => 201,
            'status' => 'success'
            ]);
    }
}
