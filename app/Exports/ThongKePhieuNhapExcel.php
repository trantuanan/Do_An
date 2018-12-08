<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use App\Models\PhieuNhap;

class ThongKePhieuNhapExcel implements FromView
{
    // use Exportable;

    public function __construct(string $tungay, string $denngay, string $loai)
    {
        $this->tungay = $tungay;
        $this->denngay = $denngay;
        $this->loai = $loai;
    }

    public function view(): View
    {
    	if ( $this->tungay == 1 && $this->denngay == 1) {
    		$a = [ 'loai' => $this->loai];
    	} else {
    		$a = [ 'tungay' => $this->tungay, 'denngay' => $this->denngay, 'loai' => $this->loai];
    	}
    	$phieunhap = new PhieuNhap;
        $phieunhaps = $phieunhap->getListTKBCPN($a);
        return view('exports.ThongKePhieuNhap', [
            'phieunhaps' => $phieunhaps, 'a' => $a
        ]);
    }
}