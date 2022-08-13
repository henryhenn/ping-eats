<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardTransaksiController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:Pedagang Kaki Lima');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): View
    {
//        $transaksi = Transaksi::latest()->with(['user', 'produk_dagang'])->where('produk_dagang.user_id', auth()->id())->paginate(5);
        $transaksi = DB::table('transaksi')
            ->join('users', 'transaksi.user_id', 'users.id')
            ->join('produk_dagang', 'transaksi.produk_dagang_id', 'produk_dagang.id')
            ->where('produk_dagang.user_id', auth()->id())
            ->select(
                'transaksi.id',
                'produk_dagang.nama as nama_produk',
                'users.nama as nama_user',
                'users.lokasi as lokasi_user',
                'kuantitas_beli',
                'status',
                'jenis_transaksi',
                'transaksi.created_at')
            ->paginate(20);

        return view('dashboard.transaksi.index', compact('transaksi'));
    }

    public function update(Request $request, Transaksi $transaksi)
    {
        $status = $request->validate([
            'status' => 'required|string'
        ]);
        $transaksi->update($status);

        return back()->with('success', 'Data pemesanan berhasil diupdate!');
    }

//    public function getTransaksi()
//    {
//        return response()->json(
//            ['transaksi' => Transaksi::latest()->with(['user', 'produk_dagang'])->get()]
//        );
//    }
}
