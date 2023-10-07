<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class SettingController extends Controller
{
    public function index()
    {
        $data = Setting::first();
        $tipeNota = [
            1 => 'Nota Kecil',
            2 => 'Nota Besar',
        ];

        return view('setting.index', compact('data', 'tipeNota'));
    }

    public function store(Request $request, $id)
    {
        $data = $request->validate([
            'nama_perusahaan' => 'required',
            'telepon' => 'required|numeric',
            'alamat' => 'required',
            'diskon' => 'required',
            'tipe_nota' => 'required'
        ], [
            'nama_perusahaan.required' => 'Nama toko tidak boleh kosong',
            'telepon.required' => 'Telepon tidak boleh kosong',
            'telepon.numeric' => 'Telepon harus angka',
            'alamat.required' => 'Alamat tidak boleh kosong',
            'diskon.required' => 'Diskon tidak boleh kosong',
            'tipe_nota.required' => 'Nota tidak boleh kosong',
        ]);

        DB::beginTransaction();
        try {

            $simpan = Setting::where('id_setting', $id)->update([
                'nama_perusahaan' => $request->nama_perusahaan,
                'telepon' => $request->telepon,
                'alamat' => $request->alamat,
                'diskon' => $request->diskon,
                'tipe_nota' => $request->tipe_nota
            ]);
            DB::commit();
            Alert::success('Sukses', 'Toko Berhasil Diupdate');
            return redirect(route('setting.index'));
        } catch (\Exception $e) {
            DB::rollBack();
            report($e);
            Alert::error('Gagal', 'Toko Berhasil Gagal Diupdate!');
            return back()->withInput();
        }
    }
}
