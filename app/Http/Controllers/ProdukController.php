<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;
use Illuminate\Validation\Rule;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $produk = Produk::leftJoin('kategori', 'kategori.id_kategori', 'produk.id_kategori')
            ->orderBy('kode_produk', 'asc')->get();

        return view('produk.index', compact('produk'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kategori = Kategori::orderBy('nama_kategori', 'asc')->get();
        return view('produk.create', compact('kategori'));
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
            'nama_produk' => 'required|unique:produk,nama_produk',
            'id_kategori' => 'required',
            'harga_beli' => 'required|numeric',
            'gambar' => 'required|max:2048',
            'harga_jual' => 'required|numeric',
            'stok' => 'required|numeric',
        ], [
            'nama_produk.required' => 'Produk tidak boleh kosong',
            'nama_produk.unique' => 'Produk tidak boleh sama',
            'id_kategori.required' => 'Kategori tidak boleh kosong',
            'harga_beli.required' => 'Harga beli tidak boleh kosong',
            'harga_jual.required' => 'Harga jual tidak boleh kosong',
            'stok.required' => 'Stok tidak boleh kosong',
            'gambar.max' => 'Gambar maksimal 2 mb'
        ]);

        $lastValue = Produk::orderBy('id_produk', 'desc')->first('id_produk');

        if ($lastValue) {
            $counter = Str::after($lastValue->id_produk, '-') + 1;
            $newKode = 'P' . '-' . str_pad($counter, 4, '0', STR_PAD_LEFT);
        } else {
            $newKode = "P-0001";
        }
        DB::beginTransaction();
        try {

            $ekstensi = $request->gambar->extension();
            $nama = $request->gambar->getClientOriginalName();
            $sekarang = date('mdYHis') . Auth::user()->id;
            $ekstensifile = explode('.', $nama);
            $ekstensifileupload = $ekstensifile[count($ekstensifile) - 1];
            if ($ekstensi == 'bin' and $ekstensi != $ekstensifileupload) {
                $namaok = $sekarang . "." . $ekstensifileupload;
            } else {
                $namaok = $sekarang . "." . $ekstensi;
            }
            Storage::putFileAs('\gambar', $request->file('gambar'), $namaok);


            $simpan = Produk::create([
                'nama_produk' => $request->nama_produk,
                'id_kategori' => $request->id_kategori,
                'kode_produk' => $newKode,
                'harga_beli' => $request->harga_beli,
                'merk' => $request->merk,
                'harga_jual' => $request->harga_jual,
                'diskon' => $request->diskon,
                'stok' => $request->stok,
                'gambar' => $namaok
            ]);

            DB::commit();
            Alert::success('Sukses', 'Data Produk Berhasil Ditambahkan');
            return redirect(route('produk.index'));
        } catch (\Exception $e) {
            DB::rollBack();
            report($e);
            Alert::error('Gagal', 'Data Produk Gagal Ditambahkan!');
            return back()->withInput();
        }
    }

    public function getImage($filename)
    {
        $path = storage_path('app/gambar/' . $filename);

        if (!File::exists($path)) {
            abort(404);
        }

        $file = File::get($path);
        $type = File::mimeType($path);

        $response = Response::make($file, 200);
        $response->header("Content-Type", $type);

        return $response;
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
        $produk = Produk::where('id_produk', $id)->first();
        $kategori = Kategori::orderBy('nama_kategori', 'asc')->get();
        return view('produk.edit', compact('produk', 'kategori'));
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
            'nama_produk' => ['required', Rule::unique('produk', 'nama_produk')->ignore($id, 'id_produk')],
            'id_kategori' => 'required',
            'harga_beli' => 'required|numeric',
            'harga_jual' => 'required|numeric',
            'stok' => 'required|numeric',
        ], [
            'nama_produk.required' => 'Produk tidak boleh kosong',
            'nama_produk.unique' => 'Produk tidak boleh sama',
            'id_kategori.required' => 'Kategori tidak boleh kosong',
            'harga_beli.required' => 'Harga beli tidak boleh kosong',
            'harga_jual.required' => 'Harga jual tidak boleh kosong',
            'stok.required' => 'Stok tidak boleh kosong',
        ]);

        DB::beginTransaction();
        try {
            $simpan = Produk::where('id_produk', $id)
                ->update([
                    'nama_produk' => $request->nama_produk,
                    'id_kategori' => $request->id_kategori,
                    'harga_beli' => $request->harga_beli,
                    'merk' => $request->merk,
                    'harga_jual' => $request->harga_jual,
                    'diskon' => $request->diskon,
                    'stok' => $request->stok,
                ]);

            DB::commit();
            Alert::success('Sukses', 'Data Produk Berhasil Diubah');
            return redirect(route('produk.index'));
        } catch (\Exception $e) {
            DB::rollBack();
            report($e);
            Alert::error('Gagal', 'Data Produk Gagal Diubah!');
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
            $simpan = Produk::where('id_produk', $id)
                ->delete();
            DB::commit();
            Alert::success('Sukses', 'Data Produk Berhasil Dihapus');
            return redirect(route('produk.index'));
        } catch (\Exception $e) {
            DB::rollBack();
            report($e);
            Alert::error('Gagal', 'Data Produk Gagal Dihapus!');
            return back()->withInput();
        }
    }
}
