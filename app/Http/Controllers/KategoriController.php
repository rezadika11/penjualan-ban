<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\Produk;
use Illuminate\Validation\Rule;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    // public function data(Request $request)
    // {
    //     $data = Kategori::orderBy('nama_kategori', 'asc')->get();
    //     return view('kategori.index', compact('data'));
    // }

    public function index()
    {
        $data = Kategori::latest()->get();
        return view('kategori.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('kategori.create');
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
            'nama_kategori' => 'required|unique:kategori,nama_kategori',
        ], [
            'nama_kategori.required' => 'Kategori tidak boleh kosong',
            'nama_kategori.unique' => 'Kategori tidak boleh sama'
        ]);

        DB::beginTransaction();
        try {

            $simpan = Kategori::create($data);
            DB::commit();
            Alert::success('Sukses', 'Data Kategori Berhasil Ditambahkan');
            return redirect(route('kategori.index'));
        } catch (\Exception $e) {
            DB::rollBack();
            report($e);
            Alert::error('Gagal', 'Data Kategori Gagal Ditambahkan');
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
        $data = Kategori::where('id_kategori', $id)->first();
        return view('kategori.edit', compact('data'));
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
            'nama_kategori' => ['required', Rule::unique('kategori', 'nama_kategori')->ignore($id, 'id_kategori')],
        ], [
            'nama_kategori.required' => 'Kategori tidak boleh kosong',
            'nama_kategori.unique' => 'Kategori tidak boleh sama'
        ]);

        DB::beginTransaction();
        try {

            $simpan = Kategori::where('id_kategori', $id)
                ->update([
                    'nama_kategori' => $request->nama_kategori
                ]);
            DB::commit();
            Alert::success('Sukses', 'Data Kategori Berhasil Diubah');
            return redirect(route('kategori.index'));
        } catch (\Exception $e) {
            DB::rollBack();
            report($e);
            Alert::error('Gagal', 'Data Kategori Gagal Diubah!');
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
            $simpan = Kategori::where('id_kategori', $id)->delete();
            Produk::where('id_kategori', $id)->delete();
            DB::commit();
            Alert::success('Sukses', 'Data Kategori Berhasil Dihapus');
            return redirect(route('kategori.index'));
        } catch (\Exception $e) {
            DB::rollBack();
            report($e);
            Alert::error('Gagal', 'Data Kategori Gagal Dihapus!');
            return back()->withInput();
        }
    }
}
