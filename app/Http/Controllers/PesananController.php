<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pesanan;

class PesananController extends Controller
{
    // Menampilkan semua pesanan
    public function index()
    {
        $pesanan = Pesanan::all();
        return response()->json($pesanan, 200);
    }

    // Membuat pesanan baru
    public function store(Request $request)
    {
        $request->validate([
            'nama_pelanggan' => 'required',
            'alamat_pengiriman' => 'required',
        ]);

        $pesanan = new Pesanan([
            'nama_pelanggan' => $request->nama_pelanggan,
            'alamat_pengiriman' => $request->alamat_pengiriman,
        ]);

        $pesanan->save();

        return response()->json(['message' => 'Pesanan berhasil dibuat'], 201);
    }

    // Menampilkan detail pesanan berdasarkan ID
    public function show($id)
    {
        $pesanan = Pesanan::find($id);

        if (!$pesanan) {
            return response()->json(['message' => 'Pesanan tidak ditemukan'], 404);
        }

        return response()->json($pesanan, 200);
    }

    // Mengupdate pesanan berdasarkan ID
    public function update(Request $request, $id)
    {
        $pesanan = Pesanan::find($id);

        if (!$pesanan) {
            return response()->json(['message' => 'Pesanan tidak ditemukan'], 404);
        }

        $request->validate([
            'nama_pelanggan' => 'required',
            'alamat_pengiriman' => 'required',
        ]);

        $pesanan->nama_pelanggan = $request->nama_pelanggan;
        $pesanan->alamat_pengiriman = $request->alamat_pengiriman;
        $pesanan->save();

        return response()->json(['message' => 'Pesanan berhasil diperbarui'], 200);
    }

    // Menghapus pesanan berdasarkan ID
    public function destroy($id)
    {
        $pesanan = Pesanan::find($id);

        if (!$pesanan) {
            return response()->json(['message' => 'Pesanan tidak ditemukan'], 404);
        }

        $pesanan->delete();

        return response()->json(['message' => 'Pesanan berhasil dihapus'], 200);
    }
}
