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

    }

    public function store(Request $request)
    {

       
    }

    public function show(Jurusan $jurusan)
    {

    }

    public function edit(Jurusan $jurusan)
    {

    }

    public function update(Request $request, Jurusan $jurusan)
    {


    }

    public function destroy(Jurusan $jurusan)
    {

    }
}
