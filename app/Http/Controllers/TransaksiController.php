<?php

namespace App\Http\Controllers;

use App\Http\Requests\PaymentRequest;
use Illuminate\Http\Request;
use App\Models\Transaksi;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transaksi = Transaksi::latest()->where('user_id', auth()->id())->paginate(10);

        return view('transaksi.index', compact('transaksi'));
    }

    public function ping(Request $request, $produk_id)
    {
        Transaksi::create([
            'produk_dagang_id' => $produk_id,
            'user_id' => auth()->id(),
            'status' => 'Belum Dikonfirmasi Gerobakan',
            'kuantitas_beli' => 0,
            'jenis_transaksi' => 'PING',
            'alamat_ping' => auth()->user()->lokasi
        ]);

        return back()->with('success', 'Pedagang Berhasil di-PING. Silakan Menunggu!');
    }

    public function payment(PaymentRequest $request)
    {
        // Set your Merchant Server Key
        $transaksi = $request->validated();
        \Midtrans\Config::$serverKey = 'SB-Mid-server-tmlX4T1S4jykfYvJ3iRzHXwk';
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = false; // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = true; // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = true;
        $params = array(
            'transaction_details' => array(
                'order_id' => date('dmY') . rand(),
            ),
            "item_details" => array(
                [
                    "id" => $transaksi['produk_dagang_id'],
                    "price" => $transaksi['harga'],
                    "quantity" => $transaksi['kuantitas_beli'],
                    "name" => $transaksi['nama'],
                ]
            ),
            'customer_details' => array(
                'first_name' => auth()->user()->nama,
                'last_name' => '',
                'email' => auth()->user()->email,
                'phone' => auth()->user()->no_telp,
                'shipping_address' => array(
                    'address' => $transaksi['alamat'] ?? auth()->user()->lokasi,
                    'phone' => auth()->user()->no_telp,
                )
            ),
            'callbacks' => array(
                'finish' => 'https://ping-eats.test'
            ),
        );
        $snapToken = \Midtrans\Snap::getSnapToken($params);

        $transaksi = $request->validated();
        $transaksi['user_id'] = auth()->id();
        $transaksi['jenis_transaksi'] = "Pembelian";
        $transaksi['status'] = 'Belum Dikonfirmasi Gerobakan';
        Transaksi::create($transaksi);

        return view('home.transaksi', compact('snapToken'));
    }
}
