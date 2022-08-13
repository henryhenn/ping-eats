<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateProfilRequest;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Storage;

class DashboardProfilController extends Controller
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
        return view('dashboard.profil.index');
    }


    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\User $user
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProfilRequest $request, User $user)
    {
        $data = $request->validated();
        if ($request->file('profpict')) {
            Storage::delete(auth()->user()->profpict);
            $data['profpict'] = $request->file('profpict') ? $request->file('profpict')->store('profile-picture') : auth()->user()->profpict;
        }
        $data['password'] = bcrypt($data['password']);
        $user->update($data);

        return back()->with('success', 'Profil Anda Berhasil Diperbarui!');
    }
}
