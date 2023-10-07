<?php

namespace App\Http\Controllers;

use App\Models\Pengeluaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class PengeluaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Pengeluaran::latest()->get();
        return view('pengeluaran.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pengeluaran.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'deskripsi' => 'required',
            'nominal' => 'required',
        ], [
            'deskripsi.required' => 'Deskripsi tidak boleh kosong',
            'nominal.required' => 'Nominal tidak boleh kosong',
        ]);

        DB::beginTransaction();
        try {

            $simpan = Pengeluaran::create($data);
            DB::commit();
            Alert::success('Sukses', 'Data Pengeluaran Berhasil Ditambahkan');
            return redirect(route('pengeluaran.index'));
        } catch (\Exception $e) {
            DB::rollBack();
            report($e);
            Alert::error('Gagal', 'Data Pengeluaran Gagal Ditambahkan!');
            return back()->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Pengeluaran::where('id_pengeluaran', $id)->first();
        return view('pengeluaran.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'deskripsi' => 'required',
            'nominal' => 'required',
        ], [
            'deskripsi.required' => 'Deskripsi tidak boleh kosong',
            'nominal.required' => 'Nominal tidak boleh kosong',
        ]);

        DB::beginTransaction();
        try {

            $simpan = Pengeluaran::where('id_pengeluaran', $id)->update([
                'deskripsi' => $request->deskripsi,
                'nominal' => $request->nominal
            ]);
            DB::commit();
            Alert::success('Sukses', 'Data Pengeluaran Berhasil Diubah');
            return redirect(route('pengeluaran.index'));
        } catch (\Exception $e) {
            DB::rollBack();
            report($e);
            Alert::error('Gagal', 'Data Pengeluaran Gagal Diubah!');
            return back()->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::beginTransaction();
        try {
            $simpan = Pengeluaran::where('id_pengeluaran', $id)->delete();
            DB::commit();
            Alert::success('Sukses', 'Data Pengeluaran Berhasil Dihapus');
            return redirect(route('pengeluaran.index'));
        } catch (\Exception $e) {
            DB::rollBack();
            report($e);
            Alert::error('Gagal', 'Data Pengeluaran Gagal Dihapus!');
            return back()->withInput();
        }
    }
}
