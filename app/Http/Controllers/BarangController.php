<?php

namespace App\Http\Controllers;

use App\Models\Master\Barang;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDO;

class BarangController extends Controller
{
    public function index()
    {
        $barang = Barang::all();
        return view('pages.barang.index',compact('barang'));
    }

    public function store(Request $request)
    {
       
    }
    public function create()
    {
        return view('pages.barang.create');
    }
}
