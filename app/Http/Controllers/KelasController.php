<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Setting;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use RealRashid\SweetAlert\Facades\Alert;

class KelasController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $data = Setting::all();
        View::share('setting', $data);
    }

    /**
     * Menampilkan data kelas
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Kelas::get();
        return view('dashboard.class.index', compact('data'));
    }

    /**
     * Menampilkan form untuk membuat data kelas baru
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $class = Kelas::get();
        return view('dashboard.candidate.add', compact('class'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate(
            [
                'class_name' => 'required|max:45|min:2',
            ],
            [
                'class_name.required' => 'Nama harus diisi!',
                'class_name.max' => 'Nama harus kurang dari 45 karakter!',
                'class_name.min' => 'Nama harus lebih dari 4 karakter!',

            ]
        );

        Kelas::create([
            'class_name' => $request->class_name,
        ]);

        Alert::success('Data Berhasil Ditambahkan!');
        return redirect()->route('kelas');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $class = kelas::where('id', $id)->pluck('class_name');

        return response()->json($class);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate(
            [
                'class_name' => 'required|max:45|min:2',
            ],
            [
                'class_name.required' => 'Nama harus diisi!',
                'class_name.max' => 'Nama harus kurang dari 45 karakter!',
                'class_name.min' => 'Nama harus lebih dari 2 karakter!',

            ]
        );


        $data = Kelas::findOrfail($id);

        Kelas::findOrfail($id)->update([
            'class_name' => $request->class_name
        ]);
        return response()->json("Data berhasil diubah!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Kelas::findOrfail($id);
        $data->delete();

        Alert::success('Data Berhasil Dihapus!');
        return redirect()->route('kelas');
    }

    /**
     * Remove all resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function deleteAll()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Kelas::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        Alert::success('Data berhasil dihapus!');
        return redirect()->back();
    }
}
