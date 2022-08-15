<?php

namespace App\Http\Controllers;

use App\Http\Requests\PaymentRequest;
use App\Models\ProdukDagang;
use App\Models\Transaksi;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index(Request $request): View
    {
    $products = ProdukDagang::with('user')->search(request('search'))->latest()->paginate(20)->withQueryString();

        return view('home.index', compact('products'));
    }

    public function show(Request $request, $id): View
    {
        $product = ProdukDagang::findOrFail($id);

        return view('home.detail', compact("product"));
    }


    public function detailUser($id): View
    {
        $user = User::findOrFail($id);
        $produk = DB::table('produk_dagang')
            ->where('user_id', $id)
            ->select(
                'id',
                'nama as nama_produk',
                'harga',
                'deskripsi',
                'url_foto')
            ->paginate(10);

        return view('home.profil-user', compact(['user', 'produk']));
    }
}
