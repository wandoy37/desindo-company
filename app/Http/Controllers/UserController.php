<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserController extends Controller
{
    public function edit($id)
    {
        $user = User::find($id);
        return view('auth.user.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);

        // Validator
        $validator = Validator::make(
            $request->all(),
            [
                'username' => 'required|unique:users,username,' . $user->id,
                'email' => 'required|unique:users,email,' . $user->id,
            ],
            [
                'username.required' => 'Username wajib diisi',
                'username.unique' => 'Username ' . $request->username . ' sudah dimiliki.',
                'email.required' => 'Email wajib diisi',
                'email.unique' => 'Email ' . $request->email . ' sudah dimiliki.',
            ],
        );

        // if request or update password
        if (request('password')) {
            $validator = Validator::make(
                $request->all(),
                [
                    'password' => 'required|confirmed|min:6',
                ],
                [
                    'password.required' => 'Password wajib diisi',
                    'password.confirmed' => 'Konfirmasi password tidak cocok',
                    'password.min' => 'Password minimal 6 huruf',
                ],
            );
        }

        // kondisi jika validasi gagal dilewati.
        if ($validator->fails()) {
            return redirect()->back()->withInput($request->all())->withErrors($validator);
        }

        DB::beginTransaction();
        try {
            // New password
            if (request('password')) {
                $newPassword = Hash::make($request->password);
            }

            $user->update([
                'username' => $request->username,
                'email' => $request->email,
                'password' => $newPassword ?? $user->password,
            ]);
            return redirect()->route('dashboard.index')->with('success', $request->username . ' berhasil diupdate');
        } catch (\Throwable $th) {
            return redirect()->route('dashboard.index')->with('fails', $request->username . ' gagal diupdate');
        } finally {
            DB::commit();
        }
    }
}
