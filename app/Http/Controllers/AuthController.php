<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthRequest;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;

class AuthController extends Controller
{
    public function register(): View
    {
        $roles = Role::all();

        return view('auth.register', compact('roles'));
    }

    public function store(AuthRequest $request)
    {
        $data = $request->validated();
        $data['profpict'] = $request->file('profpict')->store('profile-picture');
        $data['password'] = bcrypt($data['password']);

        if ($data['role'] === 'Pembeli') {
            $user = User::create($data);
            $user->assignRole('Pembeli');
        } else if ($data['role'] === 'Pedagang Kaki Lima') {
            $user = User::create($data);
            $user->assignRole('Pedagang Kaki Lima');
        }

        return redirect()->route('auth.login')->with('success', 'Registrasi Berhasil. Silakan Login!');
    }

    public function login(): View
    {
        return view('auth.login');
    }

    public function authenticate(Request $request)
    {
        $user = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8'
        ]);

        if (Auth::attempt($user)) {
            if (auth()->user()->hasRole('Pembeli')) {
                $request->session()->regenerate();

                return redirect()->intended('/')->with('success', 'Selamat datang, ' . auth()->user()->nama . ' !');
            } else if (auth()->user()->hasRole('Pedagang Kaki Lima')) {
                $request->session()->regenerate();

                return redirect()->intended('/dashboard')->with('success', 'Selamat datang, ' . auth()->user()->nama . ' !');
            }
        }

        return back()->with('failed', 'Gagal Login. Silakan Coba Lagi!');
    }


    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('auth.login')->with('success', 'Berhasil Logout. Terima kasih sudah berkunjung!');
    }
}
