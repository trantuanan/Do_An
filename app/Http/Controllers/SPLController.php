<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreateTTSXRequest;
use App\Models\Tiendosanxuat;
use App\Models\Sanphamloi;

class SPLController extends Controller
{
    public $spl;

    public function __construct(Sanphamloi $spl) 
    {
        $this->middleware('auth');
        $this->spl = $spl;
    }

    public function index(Request $request)
    {
        $this->authorize('Q3_4');
        $spls = $this->spl->getList($request->all());
        return view('BackEnd.QLSX.sanphamloi', ['spls' => $spls]);
    }

    public function create()
    {
        $this->authorize('Q3_4');
        $tdsx = new Tiendosanxuat;
        $tdsxs = $tdsx->getListTDSXSL();
        return view('BackEnd.TacVu.CreateSanphamloi', ['tdsxs' => $tdsxs]);
    }

    public function store(CreateTTSXRequest $request)
    {
        $this->authorize('Q3_4');
        $tdsx = new Tiendosanxuat;
        $tdsx->addSPL($request->tdsx_id,$request->soluong);
        $spls = $this->spl->createSPL($request->all());
        flash('Thêm sản phẩm lỗi thành công.')->success();
        return redirect()->route('quanlysanphamloi.index');
    }

    public function destroy(Request $request, $id)
    {
        $this->authorize('Q3_4');
        $tdsx = new Tiendosanxuat;
        $check = $tdsx->where('id','=',$request->tdsx_id)->get();
        foreach ($check as $key => $value) {
            if ($value->tiendo == 1) {
                $tdsx->addTTSX($request->tdsx_id,$request->soluong);
            }
        }
        $spls = $this->spl->deleteSPL($id);
        flash('Xóa sản phẩm lỗi thành công.')->success();
        return redirect()->route('quanlysanphamloi.index');
        
    }

}
