<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class PengunjungController extends Controller
{
    public function index()
    {
        $users = User::all(); // Mengambil semua data users
        return view('welcome', compact('users')); // Mengirimkan data ke view
    }

    public function store(Request $request)
    {
        \Log::info('Memulai proses penyimpanan data pengunjung.');
    
        // Validasi tanpa mengecek unique di users, agar pengunjung tetap bisa disimpan
        $request->validate([
            'nim' => 'required|string',
            'nama' => 'required|string',
            'kategori' => 'required|string',
            'prodi' => 'required|string',
            'keperluan' => 'required|string',
            'kritiksaran' => 'nullable|string',
        ]);
        \Log::info('Validasi data pengunjung berhasil.');
    
        // Simpan data Pengunjung terlebih dahulu
        $pengunjung = \App\Models\Pengunjung::create([
            'nim' => $request->nim,
            'nama' => $request->nama,
            'kategori' => $request->kategori,
            'prodi' => $request->prodi,
            'keperluan' => $request->keperluan,
            'kritiksaran' => $request->kritiksaran,
        ]);
        \Log::info('Data pengunjung berhasil disimpan.', ['pengunjung' => $pengunjung]);
    
        // Cek apakah NIM sudah ada di tabel users
        $user = User::where('nim_nik', $request->nim)->first();
        \Log::info('Pengecekan NIM di tabel users.', ['nim' => $request->nim, 'user_exists' => $user ? true : false]);
    
        if (!$user) {
            $user = User::create([
                'nim_nik' => $request->nim,
                'name' => $request->nama,
                'email' => $request->nim . '@student.stikomyos.ac.id',
                'password' => Hash::make($request->nim),
                'kategori' => $request->kategori,
                'prodi' => $request->prodi,
            ]);
            \Log::info('User baru berhasil dibuat.', ['user' => $user]);
        } else {
            \Log::info('User sudah ada di database.', ['user' => $user]);
        }
    
        return redirect()->back()->with('success', 'Hasil Kunjungan Berhasil disimpan.');
    }
    
    
}
