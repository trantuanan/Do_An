<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tiendosanxuat;
use App\Models\Yeucausanxuat;
use App\Models\Bills;

class TdsxController extends Controller
{
    public $tdsx;

    public function __construct(Tiendosanxuat $tdsx) {
        $this->middleware('auth');
        $this->tdsx = $tdsx;
    }

    public function index(Request $request)
    {
        $this->authorize('Q3_3');
        $tdsxs = $this->tdsx->getList($request->all());
        return view('BackEnd.QLSX.tiendosanxuat', ['tdsxs' => $tdsxs]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    public function done(Request $request, $id)
    {
        $this->authorize('Q3_3');
        $ycsx = new Yeucausanxuat;
        $bill = new Bills;
        $tdsxs = $this->tdsx->Done($id);
        $check = $this->tdsx->CheckTDSX($request->ycsx_id);
        if (count($check) == 0) {
            $bill_id = $ycsx->getBillId($request->ycsx_id);
            $a = ['id' => $request->ycsx_id, 'trangthai' =>  3];
            $ycsx->editTrangthai($a);
            foreach ($bill_id as $key => $value) {
                $b = ['id' => $value->bill_id, 'tiendo' =>  5];
                $bill->duyetBill($b);
            }
        }
        return redirect()->route('quanlytiendo.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        $this->authorize('Q3_3');
        $tdsxs = $this->tdsx->deleteTDSX($id);
        flash('Xóa tiến độ sản xuất thành công.')->success();
        return redirect()->route('quanlytiendo.index');
    }
}
