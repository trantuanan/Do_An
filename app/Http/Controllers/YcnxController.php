<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Yeucauxuatnhap;
use App\Models\yeucauxuatnhapDetails;
use App\Models\Khohang;
use App\Http\Requests\YCNXRequest;
use App\Models\Supplies;
use Session;

class YcnxController extends Controller
{
    public $ycxn;

    public function __construct(Yeucauxuatnhap $ycxn) {
        $this->middleware('auth');
        $this->ycxn = $ycxn;
    }

    public function index(Request $request)
    {
        $this->authorize('Q4_1');
        $ycxns = $this->ycxn->getList($request->all());
        return view('BackEnd.QLKH.Yeucauxuatnhap',['ycxns' => $ycxns]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('Q4_1');
        $kh = new Khohang;
        $supplie = new Supplies;
        $khohang = $kh->getListKH();
        $supplies = $supplie->getListSupplies();
        $vattu = Session::get('yeucauxuatnhap_detail');
        return view('BackEnd.TacVu.CreateYeucauxuatnhap', ['khohang' => $khohang, 'vattu' => $vattu, 'supplies' => $supplies]);
    }

    public function refresh()
    {
        $this->authorize('Q4_1');
        $vattu = Session::get('yeucauxuatnhap_detail');
        return Response($vattu);
    }

    public function store(YCNXRequest $request)
    {
        $this->authorize('Q4_1');
        $vattu = Session::get('yeucauxuatnhap_detail');
        $ycxns = $this->ycxn->createYCXN($request->all());
        foreach ($vattu as $key => $item) {
            $YCXN = new yeucauxuatnhapDetails;
            $YCXN->ycxn_id = $ycxns->id;
            $YCXN->khohang_id = $ycxns->khohang_id;
            $YCXN->supplie_id =  $item['supplie'];
            $YCXN->soluong = $item['soluong'];
            $YCXN->dongia = $item['dongia'];
            $YCXN->save();
        }
        Session::flush();
        flash('Thêm phiếu yêu cầu thành công.')->success();
        return redirect()->route('yeucauxuatnhap.index');
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
        $this->authorize('Q4_1');
        $kh = new Khohang;
        $YCXN = new yeucauxuatnhapDetails;
        $detai = $YCXN->geListYCXND($id);
        $khohang = $kh->getListKH();
        $vattu = Session::get('yeucauxuatnhap_detail');
        $ycxns = $this->ycxn->geYCXN($id);
        return view('BackEnd.TacVu.EditYeucauxuatnhap', ['khohang' => $khohang, 'vattu' => $vattu, 'ycxns' => $ycxns, 'detai' => $detai]);
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->authorize('Q4_1');
        $ycxns = $this->ycxn->deleteYCXN($id);
        flash('Xóa phiếu yêu cầu xuất nhập thành công.')->success();
        return redirect()->route('yeucauxuatnhap.index');
    }
}
