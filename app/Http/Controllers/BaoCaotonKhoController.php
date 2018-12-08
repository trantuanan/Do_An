<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Supplies;
use App\Exports\BaoCaoTonKhoExcel;
use App\Exports\ThongKePhieuNhapExcel;
use App\Exports\ThongKePhieuXuatExcel;
use App\Exports\ThongKePhieuNhapVTExcel;
use App\Exports\ThongKePhieuXuatVTExcel;
use Excel;
use App\Models\PhieuNhap;
use App\Models\PhieuXuat;
use App\Models\PhieuNhapDetails;
use App\Models\PhieuXuatDetails;
use Helper;
use Carbon\Carbon;

class BaoCaotonKhoController extends Controller
{
    public function index(Request $request)
    {
        $this->authorize('Q5_1');
        $supplie = new Supplies;
        $a = ['tungay' => $request->tungay, 'denngay'=>$request->denngay];
        $vattu = $supplie->getListVTTK($request->all());
        return view('BackEnd.BCTK.Baocaotonkho', ['vattu' => $vattu, 'a' => $a]);
    }

    public function phieunhap(Request $request)
    {
        $this->authorize('Q5_1');
        if ($request->loai > 1) {
            $PhieuNhapDetail = new PhieuNhapDetails;
            $a = ['tungay' => $request->tungay, 'denngay'=>$request->denngay, 'loai'=>$request->loai];
            $PhieuNhapDetails = $PhieuNhapDetail->getListBCTKPN($request->all());
            return view('BackEnd.BCTK.TK.TKPN_PhieunhapVT', ['PhieuNhapDetails' => $PhieuNhapDetails, 'a' => $a]);
        } else {
            $PhieuNhap = new PhieuNhap;
            $a = ['tungay' => $request->tungay, 'denngay'=>$request->denngay, 'loai'=>$request->loai];
            $phieunhaps = $PhieuNhap->getListTKBCPN($request->all());
            return view('BackEnd.BCTK.TK.TKPN_Phieunhap', ['phieunhaps' => $phieunhaps, 'a' => $a]);
        }        
    }

    public function phieuxuat(Request $request)
    {
        $this->authorize('Q5_1');
        if ($request->loai > 1) {
            $PhieuXuatDetail = new PhieuXuatDetails;
            $a = ['tungay' => $request->tungay, 'denngay'=>$request->denngay, 'loai'=>$request->loai];
            $PhieuXuatDetails = $PhieuXuatDetail->getListBCTKPX($request->all());
            return view('BackEnd.BCTK.TK.TKPX_PhieuxuatVT', ['PhieuXuatDetails' => $PhieuXuatDetails, 'a' => $a]);
        } else {
            $PhieuXuat = new PhieuXuat;
            $a = ['tungay' => $request->tungay, 'denngay'=>$request->denngay, 'loai'=>$request->loai];
            $PhieuXuats = $PhieuXuat->getListTKBCPX($request->all());
            return view('BackEnd.BCTK.TK.TKPX_Phieuxuat', ['phieuxuats' => $PhieuXuats, 'a' => $a]);
        }  
    }

    public function ExportExcel(Request $request)
    {
        $this->authorize('Q5_1');
        ob_end_clean();
        if ($request->tungay=='' || $request->denngay=='') {
        	$request->tungay = "1";
        	$request->denngay = "1";
        }
        ob_start();
        return Excel::download(new BaoCaoTonKhoExcel($request->tungay,$request->denngay), 'Baocaotonkho('.Helper::formatDate_namefile(Carbon::now()).').xlsx');
    }

    public function ExportExcelPN(Request $request)
    {
        $this->authorize('Q5_1');
        ob_end_clean();
        if ($request->tungay=='' || $request->denngay=='') {
            $request->tungay = "1";
            $request->denngay = "1";
        }
        if ($request->loai == '') {
            $request->loai = "1";
        }
        ob_start();
        if ($request->loai > 1) {
        return Excel::download(new ThongKePhieuNhapVTExcel($request->tungay, $request->denngay, $request->loai), 'ThongKePhieuNhapVT('.Helper::formatDate_namefile(Carbon::now()).').xlsx');
        } else {
        return Excel::download(new ThongKePhieuNhapExcel($request->tungay, $request->denngay, $request->loai), 'ThongKePhieuNhap('.Helper::formatDate_namefile(Carbon::now()).').xlsx');
        }
    }

    public function ExportExcelPX(Request $request)
    {
        $this->authorize('Q5_1');
        ob_end_clean();
        if ($request->tungay=='' || $request->denngay=='') {
            $request->tungay = "1";
            $request->denngay = "1";
        }
        if ($request->loai == '') {
            $request->loai = "1";
        }
        ob_start();
        if ($request->loai > 1) {
        return Excel::download(new ThongKePhieuXuatVTExcel($request->tungay, $request->denngay, $request->loai), 'ThongKePhieuNhapVT('.Helper::formatDate_namefile(Carbon::now()).').xlsx');
        } else {
        return Excel::download(new ThongKePhieuXuatExcel($request->tungay, $request->denngay, $request->loai), 'ThongKePhieuXuat('.Helper::formatDate_namefile(Carbon::now()).').xlsx');
        }
    }
}
