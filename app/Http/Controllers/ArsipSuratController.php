<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ArsipSurat;
use App\Models\Kategori;
use Illuminate\Support\Facades\Storage;

class ArsipSuratController extends Controller
{
    public function index(Request $request)
    {
        $query = ArsipSurat::with('kategori');
        
        if ($request->has('search') && $request->search != '') {
            $query->where('judul', 'like', '%' . $request->search . '%');
        }
        
        $arsipSurat = $query->orderBy('waktu_pengarsipan', 'desc')->get();
        
        return view('arsip.index', compact('arsipSurat'));
    }
    
    public function create()
    {
        $kategoris = Kategori::all();
        return view('arsip.form', compact('kategoris'));
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'nomor_surat' => 'required|string|max:255',
            'kategori_id' => 'required|exists:kategoris,id',
            'judul' => 'required|string|max:255',
            'file_surat' => 'required|file|mimes:pdf|max:10240'
        ]);
        
        try {
            $file = $request->file('file_surat');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $filePath = $file->storeAs('surat_pdf', $fileName, 'public');
            
            ArsipSurat::create([
                'nomor_surat' => $request->nomor_surat,
                'kategori_id' => $request->kategori_id,
                'judul' => $request->judul,
                'file_path' => $filePath,
                'waktu_pengarsipan' => now()
            ]);
            
            return redirect()->route('arsip.index')->with('success', 'Data berhasil disimpan');
        } catch (\Exception $e) {
            return back()->with('error', 'Terjadi kesalahan saat menyimpan data');
        }
    }
    
    public function show($id)
    {
        $arsipSurat = ArsipSurat::with('kategori')->findOrFail($id);
        return view('arsip.detail', compact('arsipSurat'));
    }
    
    public function download($id)
    {
        $arsipSurat = ArsipSurat::findOrFail($id);
        
        if (Storage::disk('public')->exists($arsipSurat->file_path)) {
            return response()->download(storage_path('app/public/' . $arsipSurat->file_path));
        } else {
            return back()->with('error', 'File tidak ditemukan');
        }
    }
    
    public function destroy($id)
    {
        try {
            $arsipSurat = ArsipSurat::findOrFail($id);
            
            // Hapus file dari storage
            if (Storage::disk('public')->exists($arsipSurat->file_path)) {
                Storage::disk('public')->delete($arsipSurat->file_path);
            }
            
            // Hapus record dari database
            $arsipSurat->delete();
            
            return redirect()->route('arsip.index')->with('success', 'Data berhasil dihapus');
        } catch (\Exception $e) {
            return back()->with('error', 'Terjadi kesalahan saat menghapus data');
        }
    }
    
    public function about()
    {
        return view('about');
    }
}
