<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{
    public function index()
    {
        $data = User::first();

        return view('user.index', compact('data'));
    }

    public function store(Request $request, $id)
    {
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
        ], [
            'name.required' => 'Nama tidak boleh kosong',
            'email.required' => 'Email tidak boleh kosong',
            'email.email' => 'Format Email salah',
            'password.required' => 'Password tidak boleh kosong',
        ]);

        DB::beginTransaction();
        try {

            $simpan = User::where('id', $id)->update([
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password)
            ]);
            DB::commit();
            Alert::success('Sukses', 'Profil Berhasil Diupdate');
            return redirect(route('user.index'));
        } catch (\Exception $e) {
            DB::rollBack();
            report($e);
            Alert::error('Gagal', 'Profil Gagal Diupdate!');
            return back()->withInput();
        }
    }
}
