<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use Illuminate\Http\Request;

class KaryawanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $karyawans = Karyawan::latest()->paginate(5);
        return view('karyawans.index', compact('karyawans'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('karyawans.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'ktp' => 'required',
            'address'=> 'required',
            'nohp'=> 'required',
            'tgl'=> 'required',
        ]);
        Karyawan::create($request->all());
        return redirect()->route('karyawans.index')
            ->with('success', 'Karyawan created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Karyawan $karyawan)
    {
        return view('karyawans.show', compact('karyawan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Karyawan $karyawan)
    {
        return view('karyawans.edit', compact('karyawan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Karyawan $karyawan)
    {
        $request->validate([
            'name' => 'required',
            'ktp' => 'required',
            'address'=> 'required',
            'nohp'=> 'required',
            'tgl'=> 'required',
        ]);
        $karyawan->update($request->all());
        return redirect()->route('karyawans.index')
            ->with('success', 'Karyawan updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Karyawan $karyawan)
    {
        $karyawan->delete();
        return redirect()->route('karyawans.index')
            ->with('success', 'Karyawan deleted successfully');
    }
}
