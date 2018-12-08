<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Charts\SampleChart;
use App\Models\Bills;
class ThongKeWebsiteController extends Controller
{
    public function index(Request $request)
    {
        $this->authorize('Q5_2');
        $a = ['loai'=>$request->loai];
    	$chart = new SampleChart;
    	$bill = new Bills;
    	$vl = $bill->getTKDH();
    	$ar = [];
    	foreach ($vl as $key => $value) {
    		$ar[$value->ngayht] = $value->donhang;
    	}
    	$chart->labels(array_keys($ar))->dataset('Số đơn hàng theo ngày', 'line', array_values($ar))->Color('Red');
        
        
        return view('BackEnd.BCTK.Thongkewebsite', ['chart' => $chart, 'a' => $a]);
    }
}
