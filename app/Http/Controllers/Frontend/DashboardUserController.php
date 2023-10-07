<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;

class DashboardUserController extends Controller
{
    public function index()
    {
        $produk = Produk::latest()->get();
        return view('frontend.dashboard.index', compact('produk'));
    }

    public function getImageUser($filename)
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
}
