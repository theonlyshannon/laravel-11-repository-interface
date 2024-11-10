<?php

namespace App\Repositories;

use App\Models\User;
use App\Models\Student;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Interfaces\AuthRepositoryInterface;
use RealRashid\SweetAlert\Facades\Alert as Swal;

class AuthRepository implements AuthRepositoryInterface
{
    public function register(array $data)
    {
        DB::beginTransaction();

        $user = User::create($data);

        if ($data['role'] == 'student') {
            $user->assignRole('student');
        }

        DB::commit();

        return $user;
    }

    public function login(array $data)
    {
        $credentials = [
            'email' => $data['email'],
            'password' => $data['password']
        ];

        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            if ($user->hasRole('admin')) {
                return redirect()->route('admin.dashboard');
            }

            return redirect()->route('app.dashboard');
        }

        Swal::toast('Email atau password salah', 'error')->timerProgressBar();
        return redirect()->back();
    }



    public function logout()
    {
        auth()->guard()->logout();

        return redirect()->route('login');
    }

    public function user(array $data)
    {
        return auth()->guard()->user();
    }
}
