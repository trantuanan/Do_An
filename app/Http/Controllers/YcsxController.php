<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreateYCSXRequest;
use App\Models\Yeucausanxuat;
use App\Models\yeucausanxuatDetails;
use App\Models\Bills;
use App\Models\BillsDetails;
use App\Models\Products;
use App\Models\Designs;
use App\Models\Tiendosanxuat;
use App\Models\Kehoachvattu;
use App\Models\Material;

class YcsxController extends Controller
{
    public $ycsx;

    public function __construct(Yeucausanxuat $ycsx) {
        $this->middleware('auth');
        $this->ycsx = $ycsx;
    }

    public function index(Request $request)
    {
        // dd($request);
        $this->authorize('Q3_1');
        $a = ['loai'=>$request->loai];
        $ycsx = $this->ycsx->getList($request->all());
        return view('BackEnd.QLSX.yeucausanxuat', ['ycsx' => $ycsx, 'a' => $a]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('Q3_1');
        $bill = new Bills;
        $bills = $bill->getListBillSX();
        return view('BackEnd.TacVu.CreateYeucausanxuat', ['bills' => $bills]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateYCSXRequest $request)
    {
        $this->authorize('Q3_1');
        if ($request->has('bill_id')) {
            $bill = new Bills;
            $billsDetails = new BillsDetails;
            $ycsx = $this->ycsx->createYCSX($request->all());
            //tạo chi tiết yêu cầu sản xuất
            $bd = $billsDetails->getBillDetails($request->bill_id);
            if (count($bd) > 0) {
                foreach ($bd as $key => $item) {
                    $ycsxDetails = new yeucausanxuatDetails;
                    $ycsxDetails->ycsx_id = $ycsx->id;
                    $ycsxDetails->product_id = $item->product_id;
                    $ycsxDetails->soluong = $item->soluong;
                    $ycsxDetails->design_id = $item->design_id;
                    $ycsxDetails->save();


                }
            }
            $a = ['id' => $request->bill_id, 'tiendo' =>  3];
            $bill->duyetBill($a);
        } else {
            $ycsx = $this->ycsx->createYCSX($request->all());
        }
        flash('Thêm mới yêu cầu sản xuất thành công.')->success();
        return redirect()->route('yeucausanxuat.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $this->authorize('Q3_1');
        $ycsxDetail = new yeucausanxuatDetails;
        $ycsx = $this->ycsx->getYCSX($id);
        $Material = new Material;
        $ycsxDetails = $ycsxDetail->getYCSXdetails($id);
        foreach ($ycsx as $key => $value) {
            if (count($ycsxDetails) > 0) {
                foreach ($ycsxDetails as $key => $item) {
                    $tdsx = new Tiendosanxuat;
                    $last = $tdsx->orderBy('matdsx', 'desc')->first();
                    if (isset($last)) {
                        $matdsx = $last->matdsx;
                        $matdsx++;
                        $tdsx->matdsx = $matdsx;
                    } else {
                        $tdsx->matdsx = 'TDSX001';
                    }
                    $tdsx->ycsx_id = $id;
                    $tdsx->product_id = $item->product_id;
                    $tdsx->design_id = $item->design_id;
                    $tdsx->soluong = $item->soluong;
                    $tdsx->conlai = $item->soluong;
                    $tdsx->ngaybd = $value->ngayhen;
                    $tdsx->ngayht = $value->ngaytra;
                    $tdsx->tiendo = 1;
                    $tdsx->trangthai = 1;
                    $tdsx->save();

                    $Materials = $Material->findMaterialProduct($item->product_id);
                    if (count($Materials) > 0) {
                        foreach ($Materials as $key => $vt) {
                            $khvt = new Kehoachvattu;
                            $check = $khvt->checkKehoachvattu($id,$vt->supplie_id);
                            if (count($check) > 0) {
                                $khvt->where('ycsx_id',$id)
                                ->where('supplie_id',$vt->supplie_id)
                                ->increment('soluong',$vt->soluong*$item->soluong);
                            } else {
                                $last = $khvt->orderBy('makhvt', 'desc')->first();
                                if (isset($last)) {
                                    $makhvt = $last->makhvt;
                                    $makhvt++;
                                    $khvt->makhvt = $makhvt;
                                } else {
                                    $khvt->makhvt = 'KHVT001';
                                }
                                $khvt->ycsx_id = $id;
                                $khvt->supplie_id = $vt->supplie_id;
                                $khvt->soluong = $vt->soluong*$item->soluong;
                                $khvt->trangthai = 1;
                                $khvt->save();
                            }
                        }
                    }
                    
                }
            }
        }
        $a = ['id' => $id, 'trangthai' =>  2];
        $ycsx = $this->ycsx->editTrangthai($a);
        flash('Đã tiến hành sản xuất.')->success();
        return redirect()->route('yeucausanxuat.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $this->authorize('Q3_1');
        $ycsxDetail = new yeucausanxuatDetails;
        $product = new Products();
        $design = new Designs();
        $designs = $design->getList($request->all());
        $ycsx = $this->ycsx->getYCSX($id);
        $products = $product->findProduct($request->all());
        $ycsxDetails = $ycsxDetail->getYCSXdetails($id);
        return view('BackEnd.TacVu.EditYeucausanxuat', ['ycsx' => $ycsx, 'ycsxDetails' => $ycsxDetails, 'products' => $products, 'designs' => $designs]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CreateYCSXRequest $request, $id)
    {
        $this->authorize('Q3_1');
        $ycsx = $this->ycsx->updateYCSX($request->all(), $id);
        flash('Sửa yêu cầu sản xuất thành công.')->success();
        return redirect()->route('yeucausanxuat.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->authorize('Q3_1');
        $ycsx = $this->ycsx->deleteYCSX($id);
        flash('Xóa yêu cầu sản xuất thành công.')->success();
        return redirect()->route('yeucausanxuat.index');
    }
}
