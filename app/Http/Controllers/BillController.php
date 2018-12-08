<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bills;
use App\Models\BillsDetails;
use App\Models\Customer;
use App\Models\Products;
use App\Models\Designs;
use App\Models\Yeucausanxuat;
use App\Models\yeucausanxuatDetails;
use App\Http\Requests\CreateBillsRequest;

class BillController extends Controller
{
    public $bill;

    public function __construct(Bills $bill) {
        $this->middleware('auth');
        $this->bill = $bill;
    }

    public function index(Request $request)
    {
        $this->authorize('Q2_2');
        $a = ['loai'=>$request->loai];
        $bills = $this->bill->getList($request->all());
        return view('BackEnd.QLDH.bills', [ 'bills' => $bills, 'a' => $a]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {        
        $this->authorize('Q2_2');
        $customer = new Customer();
        $product = new Products();
        $customers = $customer->findCustomer($request->all());
        $products = $product->findProduct($request->all());
        return view('BackEnd.TacVu.CreateBill', [ 'customers' => $customers, 'products' => $products ]);
    }

    public function findKH(Request $request)
    {   
        $this->authorize('Q2_2');
        if ($request->ajax()) {
            $customer = new Customer();
            $customers = $customer->findCustomer($request->all());
            return Response($customers);
        }  
    }

    public function findSP(Request $request)
    {   
        $this->authorize('Q2_2');
        if ($request->ajax()) {
            $product = new Products();
            $products = $product->findProduct($request->all());
            return Response($products);
        }  
    }

    public function duyet(Request $request)
    {   
        $this->authorize('Q2_2');
        if ($request->ajax()) {
            $bills = $this->bill->duyetBill($request->all());
            return Response('Duyệt đơn hàng thành công!');
        }  
    }

    public function createYCSX(Request $request)
    {   
        $this->authorize('Q2_2');
        if ($request->has('bill_id')) {
            $billsDetails = new BillsDetails;
            $ycsx = new Yeucausanxuat;
            $ycsxs = $ycsx->createYCSX($request->all());
            $bd = $billsDetails->getBillDetails($request->bill_id);
            if (count($bd) > 0) {
                foreach ($bd as $key => $item) {
                    $ycsxDetails = new yeucausanxuatDetails;
                    $ycsxDetails->ycsx_id = $ycsxs->id;
                    $ycsxDetails->product_id = $item->product_id;
                    $ycsxDetails->soluong = $item->soluong;
                    $ycsxDetails->design_id = $item->design_id;
                    $ycsxDetails->save();
                }
            }
            $a = ['id' => $request->bill_id, 'tiendo' =>  3];
            $this->bill->duyetBill($a);
        } else {
            $ycsx = new Yeucausanxuat;
            $ycsxs = $ycsx->createYCSX($request->all());
        }
        flash('Thêm yêu cầu sản xuất thành công.')->success();
        return redirect()->route('quanlydonhang.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateBillsRequest $request)
    {
        $this->authorize('Q2_2');
        $bills = $this->bill->createBill($request->all());
        flash('Thêm đơn hàng mới thành công.')->success();
        return redirect()->route('quanlydonhang.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        $this->authorize('Q2_2');
        $customer = new Customer();
        $product = new Products();
        $billsDetail = new BillsDetails();
        $design = new Designs();
        $designs = $design->getList($request->all());
        $customers = $customer->findCustomer($request->all());
        $products = $product->findProduct($request->all());
        $bills = $this->bill->getBill($id);
        $billsDetails = $billsDetail->getBillDetails($id);
        // dd($billsDetails);
        return view('BackEnd.TacVu.EditBill', [ 'customers' => $customers, 'products' => $products, 'bills' => $bills, 'billsDetails' => $billsDetails, 'designs' => $designs ]);
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
    public function update(CreateBillsRequest $request, $id)
    {
        $this->authorize('Q2_2');
        $bills = $this->bill->updateBill($request->all());
        flash('Sửa đơn hàng thành công.')->success();
        return redirect()->route('quanlydonhang.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->authorize('Q2_2');
        $bills = $this->bill->deleteBill($id);
        return Response('Xóa đơn hàng thành công!');
    }
}
