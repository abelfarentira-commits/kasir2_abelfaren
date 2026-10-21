<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jurusan;

class JurusanController extends Controller
{
    public function index(Request $request)
    {
        $jurusans = Jurusan::query()
            ->when($request->search, function ($query, $search) {
                $query->where(function ($q) use ($search) {
                    $q->where('nama_jurusan', 'like', "%{$search}%")
                      ->orWhere('kode_jurusan', 'like', "%{$search}%");
                });
            })
            ->paginate(10);

        return view('jurusan.index', compact('jurusans'));
    }

    public function create()
    {
        return view('jurusan.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nama_jurusan' => 'required|string|max:255',
            'kode_jurusan' => 'required|string|max:10|unique:jurusans,kode_jurusan',
            'keterangan' => 'required|string|max:100',
            'status' => 'required|string|max:50',
        ]);

        Jurusan::create($data);

        return redirect()->route('jurusan.index')
            ->with('success', 'Data jurusan berhasil ditambahkan.');
    }

    public function show(Jurusan $jurusan)
    {
        return view('jurusan.show', compact('jurusan'));
    }

    public function edit(Jurusan $jurusan)
    {
        return view('jurusan.edit', compact('jurusan'));
    }

    public function update(Request $request, Jurusan $jurusan)
    {
        $data = $request->validate([
            'nama_jurusan' => 'required|string|max:255',
            'kode_jurusan' => 'required|string|max:20|unique:jurusans,kode_jurusan,' . $jurusan->id,
            'keterangan' => 'required|string|max:100',
            'status' => 'required|string|max:50',
        ]);

        $jurusan->update($data);

        return redirect()->route('jurusan.index')
            ->with('success', 'Data jurusan berhasil diperbarui.');
    }

    public function destroy(Jurusan $jurusan)
    {
        $jurusan->delete();

        return redirect()->route('jurusan.index')
            ->with('success', 'Data jurusan berhasil dihapus.');
    }
}
