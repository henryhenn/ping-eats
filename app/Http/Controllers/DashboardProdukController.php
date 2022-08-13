<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProdukRequest;
use App\Models\ProdukDagang;
use Illuminate\Contracts\View\View;

class DashboardProdukController extends Controller
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
        $produk = ProdukDagang::where('user_id', auth()->id())->latest()->paginate(5);

        return view('dashboard.produk.index', compact('produk'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProdukRequest $request)
    {
        $data = $request->validated();
        $data['user_id'] = auth()->id();
        $data['url_foto'] = $request->file('url_foto')->store('product-images');
        $produk = ProdukDagang::create($data);

        if ($produk) {
            return back()->with('success', 'Produk berhasil ditambahkan!');
        }

        return back()->with('failed', 'Produk Gagal Ditambahkan. Silakan Coba Lagi!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProdukDagang  $produkDagang
     * @return \Illuminate\Http\Response
     */
    public function edit(ProdukDagang $produkDagang)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProdukDagang  $produkDagang
     * @return \Illuminate\Http\Response
     */
    public function update(ProdukRequest $request, ProdukDagang $produkDagang)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProdukDagang  $produkDagang
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProdukDagang $produkDagang)
    {
        $produkDagang->delete();

        return back()->with('success', 'Produk berhasil dihapus!');
    }
}
