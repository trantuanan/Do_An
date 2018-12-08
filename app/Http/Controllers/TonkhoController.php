<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Supplies;
use App\Models\Khohang;

class TonkhoController extends Controller
{
    public function index(Request $request)
    {
        $this->authorize('Q4_4');
        $supplie = new Supplies;
        $kh = new Khohang;
        $khohang = $kh->getListKH();
        $vattu = $supplie->getListTK($request->all());
        return view('BackEnd.QLKH.Tonkho', ['vattu' => $vattu, 'khohang' => $khohang]);
    }
}
