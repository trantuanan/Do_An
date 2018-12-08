<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use App\Models\Supplies;

class BaoCaoTonKhoExcel implements FromView
{
    // use Exportable;

    public function __construct(string $tungay, string $denngay)
    {
        $this->tungay = $tungay;
        $this->denngay = $denngay;
    }

    public function view(): View
    {
    	if ( $this->tungay == 1 && $this->denngay == 1) {
    		$a = [];
    	} else {
    		$a = [ 'tungay' => $this->tungay, 'denngay' => $this->denngay];
    	}
    	$supplie = new Supplies;
        $vattu = $supplie->getListVTTK($a);
        return view('exports.BaoCaoTonKho', [
            'vattu' => $vattu, 'a' => $a
        ]);
    }
}