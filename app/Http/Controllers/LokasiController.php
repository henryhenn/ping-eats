<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class LokasiController extends Controller
{
    public function index()
    {
        $users = User::role("Pedagang Kaki Lima")->where('lokasi', 'like', '%' . request('search') . '%')->get();

        return view('lokasi.index', compact('users'));
    }
}
