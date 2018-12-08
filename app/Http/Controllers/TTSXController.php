<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreateTTSXRequest;
use App\Models\Thuctesanxuat;
use App\Models\Tiendosanxuat;

class TTSXController extends Controller
{
    public $ttsx;

    public function __construct(Thuctesanxuat $ttsx) 
    {
        $this->middleware('auth');
        $this->ttsx = $ttsx;
    }

    public function index(Request $request)
    {
        $this->authorize('Q3_4');
        $ttsxs = $this->ttsx->getList($request->all());
        return view('BackEnd.QLSX.thuctesanxuat', ['ttsxs' => $ttsxs]);
    }

    public function create()
    {
        $this->authorize('Q3_4');
        $tdsx = new Tiendosanxuat;
        $tdsxs = $tdsx->getListTDSX();
        return view('BackEnd.TacVu.CreateThuctesanxuat', ['tdsxs' => $tdsxs]);
    }

    public function destroy(Request $request, $id)
    {
        $this->authorize('Q3_4');
        $tdsx = new Tiendosanxuat;
        $check = $tdsx->where('id','=',$request->tdsx_id)->get();
        foreach ($check as $key => $value) {
            if ($value->tiendo == 1) {
                $tdsx->addSPL($request->tdsx_id,$request->soluong);
            }
        }
        $ttsxs = $this->ttsx->deleteTTSX($id);
        flash('Xóa sản phẩm sản xuất thành công.')->success();
        return redirect()->route('quanlysanphamsx.index');
        
    }

    public function store(CreateTTSXRequest $request)
    {
        $this->authorize('Q3_4');
        $tdsx = new Tiendosanxuat;
        $tdsx->addTTSX($request->tdsx_id,$request->soluong);
        $ttsxs = $this->ttsx->createTTSX($request->all());
        flash('Thêm sản phẩm sản xuất thành công.')->success();
        return redirect()->route('quanlysanphamsx.index');
    }


}
