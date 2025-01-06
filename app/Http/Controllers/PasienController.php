<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use App\Models\Pasien;
 
class PasienController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pasien = Pasien::orderBy('created_at', 'DESC')->get();
 
        return view('pasiens.index', compact('pasien'));
    }
 
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pasiens.create');
    }
 
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Pasien::create($request->all());
 
        return redirect()->route('admin/pasiens')->with('success', 'pasien added successfully');
    }
 
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $pasien = Pasien::findOrFail($id);
 
        return view('pasiens.show', compact('pasien'));
    }
 
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $pasien = Pasien::findOrFail($id);
 
        return view('pasiens.edit', compact('pasien'));
    }
 
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $pasien = Pasien::findOrFail($id);
 
        $pasien->update($request->all());
 
        return redirect()->route('admin/pasiens')->with('success', 'Pasien updated successfully');
    }
 
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $pasien = Pasien::findOrFail($id);
 
        $pasien->delete();
 
        return redirect()->route('admin/pasiens')->with('success', 'Pasien deleted successfully');
    }
}