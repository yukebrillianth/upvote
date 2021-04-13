<?php

namespace App\Http\Controllers;

use App\Models\Candidate;
use App\Models\Kelas;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\View;

class CandidateController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $data = Setting::all();
        View::share('setting', $data);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Candidate::get();
        return view('dashboard.candidate.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
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
                'nama_kandidat' => 'required|max:45|min:4',
                'visi' => 'required|min:20|max:9000|',
                'misi' => 'required|min:20|max:9000|',
                'program_kerja' => 'required|min:20|max:6000|',
                'image' => 'required|max:4000|mimes:png,jpg,jpeg',
            ],
            [
                'nama_kandidat.required' => 'Nama harus diisi!',
                'nama_kandidat.max' => 'Nama harus kurang dari 45 karakter!',
                'nama_kandidat.min' => 'Nama harus lebih dari 4 karakter!',
                'visi.required' => 'Visi harus diisi!',
                'visi.min' => 'Visi harus lebih dari 20 karakter!',
                'visi.max' => 'Visi harus kurang dari 900 karakter!',
                'misi.required' => 'Misi harus diisi!',
                'misi.min' => 'Misi harus lebih dari 20 karakter!',
                'misi.max' => 'Misi harus kurang dari 900 karakter!',
                'program_kerja.required' => 'Program kerja harus diisi!',
                'program_kerja.min' => 'Program kerja harus lebih dari 20 karakter!',
                'program_kerja.max' => 'Program kerja harus kurang dari 900 karakter!',
                'image.required' => 'Gambar harus diisi!',
                'image.max' => 'Ukuran maksimal 4 MB!',
                'image.mimes' => 'Format hanya boleh png, jpg, jpeg!',

            ]
        );


        if ($validatedData['image']) {
            $image = $validatedData['image']->store('candidate_image', 'public');
        } else {
            $image = null;
        }

        Candidate::create([
            'nama_kandidat' => $request->nama_kandidat,
            'visi' => $request->get('visi'),
            'misi' => $request->get('misi'),
            'program_kerja' => $request->get('program_kerja'),
            'image' => $image,
            'kelas_id' => $request->get('kelas_id')
        ]);

        Alert::success('Data Berhasil Ditambahkan!');
        return redirect()->route('kandidat');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $class = kelas::all();
        $data = Candidate::where('id', $id)->first();

        return view('dashboard.candidate.edit', compact('data', 'class'));
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
                'nama_kandidat' => 'required|max:45|min:4',
                'class_id' => 'required',
                'visi' => 'required|min:20|max:9000|',
                'misi' => 'required|min:20|max:9000|',
                'image' => 'max:4000|mimes:png,jpg,jpeg',
            ],
            [
                'nama_kandidat.required' => 'Nama harus diisi!',
                'nama_kandidat.max' => 'Nama harus kurang dari 45 karakter!',
                'nama_kandidat.min' => 'Nama harus lebih dari 4 karakter!',
                'class_id.required' => 'Kelas Harus diisi!',
                'visi.required' => 'Visi harus diisi!',
                'visi.min' => 'Visi harus lebih dari 20 karakter!',
                'visi.max' => 'Visi harus kurang dari 900 karakter!',
                'misi.required' => 'Misi harus diisi!',
                'misi.min' => 'Misi harus lebih dari 20 karakter!',
                'misi.max' => 'Misi harus kurang dari 900 karakter!',
                'image.max' => 'Ukuran maksimal 4 MB!',
                'image.mimes' => 'Format hanya boleh png, jpg, jpeg!',

            ]
        );


        $data = Candidate::findOrfail($id);
        if (isset($validatedData['image'])) {
            $image = $validatedData['image']->store('candidate_image', 'public');
            if ($data->image) {
                Storage::delete(['public/' . $data->image]);
                $data->image = $image;
            } else {
                $data->image = $image;
            }
            $data->save();
        } else {
            $image = $data->image;
        }

        Candidate::findOrfail($id)->update([
            'nama_kandidat' => $request->nama_kandidat,
            'visi' => $request->get('visi'),
            'misi' => $request->get('misi'),
            'image' => $image,
            'class_id' => $request->get('class_id')
        ]);

        Alert::success('Data Berhasil Diubah!');
        return redirect()->route('kandidat');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Candidate::findOrfail($id);
        Storage::delete(['public/' . $data->image]);
        $data->delete();

        Alert::success('Data Berhasil Dihapus!');
        return redirect()->route('kandidat');
    }

    public function deleteAll()
    {
        $files = Candidate::all();
        foreach ($files as $file) {
            Storage::delete(['public/' . $file->image]);
        }
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Candidate::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        Alert::success('Data berhasil dihapus!');
        return redirect()->back();
    }
}
