<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use App\Models\PhieuXuatDetails;

class ThongKePhieuXuatVTExcel implements FromView
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
    	$PhieuXuatDetail = new PhieuXuatDetails;
        $PhieuXuatDetails = $PhieuXuatDetail->getListBCTKPX($a);
        return view('exports.ThongKePhieuXuatVT', [
            'PhieuXuatDetails' => $PhieuXuatDetails, 'a' => $a
        ]);
    }
}