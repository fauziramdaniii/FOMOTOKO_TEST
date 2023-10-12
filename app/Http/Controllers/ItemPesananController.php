<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ItemPesanan;
use App\Models\Pesanan;

class ItemPesananController extends Controller
{
    // Menampilkan semua item pesanan berdasarkan ID pesanan
    public function index($pesanan_id)
    {
        $itemPesanan = ItemPesanan::where('pesanan_id', $pesanan_id)->get();

        if ($itemPesanan->isEmpty()) {
            return response()->json(['message' => 'Item pesanan tidak ditemukan'], 404);
        }

        return response()->json($itemPesanan, 200);
    }

    // Menambahkan item pesanan baru ke pesanan tertentu
    public function store(Request $request, $pesanan_id)
    {
        // Validasi pesanan
        $pesanan = Pesanan::find($pesanan_id);

        if (!$pesanan) {
            return response()->json(['message' => 'Pesanan tidak ditemukan'], 404);
        }

        // Validasi item pesanan
        $request->validate([
            'nama_barang' => 'required',
            'jumlah' => 'required|integer',
        ]);

        // Simpan item pesanan
        $itemPesanan = new ItemPesanan([
            'nama_barang' => $request->nama_barang,
            'jumlah' => $request->jumlah,
            'pesanan_id' => $pesanan_id,
        ]);

        $itemPesanan->save();

        return response()->json(['message' => 'Item pesanan berhasil ditambahkan'], 201);
    }

    // Menampilkan detail item pesanan berdasarkan ID
    public function show($pesanan_id, $item_pesanan_id)
    {
        $itemPesanan = ItemPesanan::where('pesanan_id', $pesanan_id)
            ->find($item_pesanan_id);

        if (!$itemPesanan) {
            return response()->json(['message' => 'Item pesanan tidak ditemukan'], 404);
        }

        return response()->json($itemPesanan, 200);
    }

    // Mengupdate item pesanan berdasarkan ID
    public function update(Request $request, $pesanan_id, $item_pesanan_id)
    {
        $itemPesanan = ItemPesanan::where('pesanan_id', $pesanan_id)
            ->find($item_pesanan_id);

        if (!$itemPesanan) {
            return response()->json(['message' => 'Item pesanan tidak ditemukan'], 404);
        }

        $request->validate([
            'nama_barang' => 'required',
            'jumlah' => 'required|integer',
        ]);

        $itemPesanan->nama_barang = $request->nama_barang;
        $itemPesanan->jumlah = $request->jumlah;
        $itemPesanan->save();

        return response()->json(['message' => 'Item pesanan berhasil diperbarui'], 200);
    }

    // Menghapus item pesanan berdasarkan ID
    public function destroy($pesanan_id, $item_pesanan_id)
    {
        $itemPesanan = ItemPesanan::where('pesanan_id', $pesanan_id)
            ->find($item_pesanan_id);

        if (!$itemPesanan) {
            return response()->json(['message' => 'Item pesanan tidak ditemukan'], 404);
        }

        $itemPesanan->delete();

        return response()->json(['message' => 'Item pesanan berhasil dihapus'], 200);
    }
}
