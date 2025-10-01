<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;

class KategoriController extends Controller
{
    public function index(Request $request)
    {
        $query = Kategori::query();
        
        if ($request->has('search') && $request->search != '') {
            $query->where('nama_kategori', 'like', '%' . $request->search . '%');
        }
        
        $kategoris = $query->orderBy('id')->get();
        
        return view('kategori.index', compact('kategoris'));
    }
    
    public function create()
    {
        return view('kategori.form');
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'nama_kategori' => 'required|string|max:255',
            'keterangan' => 'nullable|string'
        ]);
        
        Kategori::create($request->all());
        
        return redirect()->route('kategori.index')->with('success', 'Data kategori berhasil disimpan');
    }
    
    public function edit($id)
    {
        $kategori = Kategori::findOrFail($id);
        return view('kategori.form', compact('kategori'));
    }
    
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_kategori' => 'required|string|max:255',
            'keterangan' => 'nullable|string'
        ]);
        
        $kategori = Kategori::findOrFail($id);
        $kategori->update($request->all());
        
        return redirect()->route('kategori.index')->with('success', 'Data kategori berhasil diperbarui');
    }
    
    public function destroy($id)
    {
        try {
            $kategori = Kategori::findOrFail($id);
            
            // Cek apakah kategori masih digunakan
            if ($kategori->arsipSurat()->count() > 0) {
                return back()->with('error', 'Kategori tidak dapat dihapus karena masih digunakan');
            }
            
            $kategori->delete();
            
            return redirect()->route('kategori.index')->with('success', 'Data kategori berhasil dihapus');
        } catch (\Exception $e) {
            return back()->with('error', 'Terjadi kesalahan saat menghapus data');
        }
    }
}
