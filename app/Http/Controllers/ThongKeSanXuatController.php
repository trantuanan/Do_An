<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Thuctesanxuat;
use App\Models\Sanphamloi;

class ThongKeSanXuatController extends Controller
{
    public function index(Request $request)
    {
        $this->authorize('Q5_2');
        $ttsx = new Thuctesanxuat;
        $spl = new Sanphamloi;
        $a = ['loai'=>$request->loai];
        if ($request->loai > 1) {
        	$ttsxs = $spl->getList($request->all());
        } else {
        	$ttsxs = $ttsx->getList($request->all());
        }
        return view('BackEnd.BCTK.Thongkesanxuat', ['ttsxs' => $ttsxs, 'a' => $a]);
    }
}
