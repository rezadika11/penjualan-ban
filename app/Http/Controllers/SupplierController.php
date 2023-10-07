<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Supplier::latest()->get();
        return view('supplier.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('supplier.create');
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
            'nama' => 'required',
            'telepon' => 'required|numeric',
            'alamat' => 'required',
        ], [
            'nama.required' => 'Nama tidak boleh kosong',
            'telepon.required' => 'Telepon tidak boleh kosong',
            'telepon.numeric' => 'Telepon harus angka',
            'alamat.required' => 'Alamat tidak boleh kosong',
        ]);

        DB::beginTransaction();
        try {

            $simpan = Supplier::create($data);
            DB::commit();
            Alert::success('Sukses', 'Data Supplier Berhasil Ditambahkan');
            return redirect(route('supplier.index'));
        } catch (\Exception $e) {
            DB::rollBack();
            report($e);
            Alert::error('Gagal', 'Data Supplier Gagal Ditambahkan!');
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
        $data = Supplier::where('id_supplier', $id)->first();
        return view('supplier.edit', compact('data'));
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
            'nama' => 'required',
            'telepon' => 'required|numeric',
            'alamat' => 'required',
        ], [
            'nama.required' => 'Nama tidak boleh kosong',
            'telepon.required' => 'Telepon tidak boleh kosong',
            'telepon.numeric' => 'Telepon harus angka',
            'alamat.required' => 'Alamat tidak boleh kosong',
        ]);

        DB::beginTransaction();
        try {

            $simpan = Supplier::where('id_supplier', $id)
                ->update([
                    'nama' => $request->nama,
                    'telepon' => $request->telepon,
                    'alamat' => $request->alamat
                ]);
            DB::commit();
            Alert::success('Sukses', 'Data Supplier Berhasil Diubah');
            return redirect(route('supplier.index'));
        } catch (\Exception $e) {
            DB::rollBack();
            report($e);
            Alert::error('Gagal', 'Data Supplier Gagal Diubah!');
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
            $simpan = Supplier::where('id_supplier', $id)->delete();
            DB::commit();
            Alert::success('Sukses', 'Data Supplier Berhasil Dihapus');
            return redirect(route('supplier.index'));
        } catch (\Exception $e) {
            DB::rollBack();
            report($e);
            Alert::error('Gagal', 'Data Supplier Gagal Dihapus!');
            return back()->withInput();
        }
    }
}
