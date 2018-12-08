<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PhieuNhapRequest;
use App\Models\PhieuNhap;
use App\Models\PhieuNhapDetails;
use App\Models\Khohang;
use App\Models\Supplies;
use App\Models\NCC;
use Session;

class PhieuNhapController extends Controller
{
    public $phieunhap;

    public function __construct(PhieuNhap $phieunhap) {
        $this->middleware('auth');
        $this->phieunhap = $phieunhap;
    }

    public function index(Request $request)
    {
        $this->authorize('Q4_2');
        $phieunhaps = $this->phieunhap->getList($request->all());
        return view('BackEnd.QLKH.PhieuNhap', ['phieunhaps' => $phieunhaps]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->authorize('Q4_2');
        $kh = new Khohang;
        $ncc = new NCC;
        $supplie = new Supplies;
        $khohang = $kh->getListKH();
        $nccs = $ncc->getListNCC($request->all());
        $supplies = $supplie->getListSupplies();
        $vattu = Session::get('phieunhau_detail');
        return view('BackEnd.TacVu.CreatePhieunhap', ['khohang' => $khohang, 'nccs' => $nccs, 'supplies' => $supplies, 'vattu' => $vattu]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PhieuNhapRequest $request)
    {
        $this->authorize('Q4_2');
        $vattu = Session::get('phieunhau_detail');
        $phieunhaps = $this->phieunhap->createPhieuNhap($request->all());
        foreach ($vattu as $key => $item) {
            $PND = new PhieuNhapDetails;
            $PND->phieunhap_id = $phieunhaps->id;
            $PND->khohang_id = $phieunhaps->khohang_id;
            $PND->supplie_id =  $item['supplie'];
            $PND->soluong = $item['soluong'];
            $PND->dongia = $item['dongia'];
            $PND->baohanh = $item['baohanh'];
            $PND->save();
        }
        Session::flush();
        flash('Thêm phiếu nhập mới thành công.')->success();
        return redirect()->route('quanlyphieunhap.index');
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
        $this->authorize('Q4_2');
        $kh = new Khohang;
        $ncc = new NCC;
        $supplie = new Supplies;
        $PND = new PhieuNhapDetails;
        $khohang = $kh->getListKH();
        $nccs = $ncc->getListNCC1();
        $supplies = $supplie->getListSupplies();
        $phieunhaps = $this->phieunhap->getPhieuNhap($id);
        $phieunhapdetails = $PND->getPhieuNhapDetails($id);
        return view('BackEnd.TacVu.EditPhieunhap', ['khohang' => $khohang, 'nccs' => $nccs, 'supplies' => $supplies, 'phieunhapdetails' => $phieunhapdetails, 'phieunhaps' => $phieunhaps]);
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
        $this->authorize('Q4_2');
        $phieunhaps = $this->phieunhap->updatePhieuNhap($request->all(),$id);
        flash('Sửa phiếu nhập thành công.')->success();
        return redirect()->route('quanlyphieunhap.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->authorize('Q4_2');
        $phieunhaps = $this->phieunhap->deletePhieuNhap($id);
        flash('Xóa phiếu nhập thành công.')->success();
        return redirect()->route('quanlyphieunhap.index');
    }
}
