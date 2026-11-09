<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\jenjang;
use App\Models\jurusan;
use App\Models\Kelas;
use App\Models\User;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    /**
     * Display a listing of the resource.
     */

public function index()
{
    $kelass = Kelas::with('user')->paginate(10);

    return view('kelas.index', compact('kelass'));
}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = User::all();
        $jenjang = jenjang::all();
        $jurusan = jurusan::all();


        return view('kelas.create', compact('user', 'jenjang', 'jurusan'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_kelas' => 'required|string|max:255',
            'user_id' => 'required|exists:users,id',
            'jurusan_id' => 'required|exists:jurusan,id',
            'jenjang_id' => 'required|exists:jenjang,id',
            'status' => 'required|in:aktif,nonaktif',

        ]);

        Kelas::create($request->all());

        return redirect()->route('kelas.index')->with('success', 'Data Kelas berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $kelas = Kelas::findOrFail($id);

        return view('kelas.show', compact('kelas'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $kelas = Kelas::findOrFail($id);

        $user = User::all();
        $jenjang = jenjang::all();
        $jurusan = jurusan::all();

        return view('kelas.edit', compact('kelas', 'user', 'jenjang', 'jurusan'));
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_kelas' => 'required|string|max:255',
            'user_id' => 'required|exists:users,id',
            'jurusan_id' => 'required|exists:jurusan,id',
            'jenjang_id' => 'required|exists:jenjang,id',
            'status' => 'required|in:aktif,nonaktif',
        ]);

        $kelas = Kelas::findOrFail($id);

        $kelas->update([
            'nama_kelas' => 'required|string|max:255',
            'user_id' => 'required|exists:users,id',
            'jurusan_id' => 'required|exists:jurusan,id',
            'jenjang_id' => 'required|exists:jenjang,id',
            'status' => 'required|in:aktif,nonaktif',
        ]);
        return redirect()->route('kelas.index')->with('success', 'Data Kelas berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $kelas = Kelas::findOrFail($id);

        $kelas->delete();

        return redirect()->route('kelas.index')->with('success', 'Kelas berhasil dihapus!');
    }
}
