<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PhieuXuatRequest;
use App\Models\PhieuXuat;
use App\Models\PhieuXuatDetails;
use App\Models\Khohang;
use App\Models\Supplies;
use Session;

class PhieuxuatController extends Controller
{
    public $phieuxuat;

    public function __construct(PhieuXuat $phieuxuat) {
        $this->middleware('auth');
        $this->phieuxuat = $phieuxuat;
    }

    public function index(Request $request)
    {
        $this->authorize('Q4_3');
        $phieuxuats = $this->phieuxuat->getList($request->all());
        return view('BackEnd.QLKH.Phieuxuat', ['phieuxuats' => $phieuxuats]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('Q4_3');
        $kh = new Khohang;
        $khohang = $kh->getListKH();
        $vattu = Session::get('phieuxuat_detail');
        return view('BackEnd.TacVu.CreatePhieuXuat', ['khohang' => $khohang, 'vattu' => $vattu]);
    }

    public function refresh()
    {
        $this->authorize('Q4_3');
        $vattu = Session::get('phieuxuat_detail');
        return Response($vattu);
    }

    public function selectKho(Request $request)
    {
        $this->authorize('Q4_3');
        $supplie = new Supplies;
        $supplies = $supplie->getListSuppliesXK($request->khohang_id);
        return Response($supplies);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PhieuXuatRequest $request)
    {
        $this->authorize('Q4_3');
        $vattu = Session::get('phieuxuat_detail');
        $phieuxuats = $this->phieuxuat->createPhieuXuat($request->all());
        foreach ($vattu as $key => $item) {
            $PXD = new PhieuXuatDetails;
            $PXD->phieuxuat_id = $phieuxuats->id;
            $PXD->khohang_id = $phieuxuats->khohang_id;
            $PXD->supplie_id =  $item['supplie'];
            $PXD->soluong = $item['soluong'];
            $PXD->dongia = $item['dongia'];
            $PXD->save();
        }
        Session::flush();
        flash('Thêm phiếu xuất mới thành công.')->success();
        return redirect()->route('quanlyphieuxuat.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->authorize('Q4_3');
        $kh = new Khohang;
        $supplie = new Supplies;
        $PXD = new PhieuXuatDetails;
        $khohang = $kh->getListKH();
        $supplies = $supplie->getListSupplies();
        $phieuxuats = $this->phieuxuat->getPhieuXuat($id);
        $phieuxuatdetails = $PXD->getPhieuXuatDetails($id);
        return view('BackEnd.TacVu.EditPhieuXuat', ['khohang' => $khohang, 'supplies' => $supplies, 'phieuxuatdetails' => $phieuxuatdetails, 'phieuxuats' => $phieuxuats]);
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
        $this->authorize('Q4_3');
        $phieuxuats = $this->phieuxuat->updatePhieuXuat($request->all(),$id);
        flash('Sửa phiếu xuất thành công.')->success();
        return redirect()->route('quanlyphieuxuat.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->authorize('Q4_3');
        $phieuxuats = $this->phieuxuat->deletePhieuXuat($id);
        flash('Xóa phiếu xuất thành công.')->success();
        return redirect()->route('quanlyphieuxuat.index');
    }
}
