<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Bills;
use App\Models\Reports;
use App\Models\Designs;
use App\Models\Products;
use App\Models\BillsDetails;
use App\Http\Requests\ChangePasswordCustomerRequest;
use App\Http\Requests\CreateBillsRequest;
use Cart;

class CustomerController extends Controller
{
    public $customer;

    public function __construct(Customer $customer)
    {
        $this->middleware('auth:customer');
        $this->customer = $customer;
    }
    public function index()
    {
        return view('customers.customerIndex');
    }

    public function bills(Request $request)
    {
        $bill = new Bills();
        $bills = $bill->getListBillCustomer($request->all());
        return view('customers.customerBill', [ 'bills' => $bills]);
    }

    public function reportsShow($mail_address)
    {
        $report = new Reports();
        $reports = $report->getMess($mail_address);
        return view('customers.customerReport', [ 'reports' => $reports]);
    }

    public function createReports(Request $request)
    {
        $report = new Reports();
        $reports = $report->createReports($request->all());
        return redirect()->route('customer.reports', $request->mail_address);
    }

    public function findDes(Request $request)
    {
        if ($request->ajax()) {
            $design = new Designs();
            $designs = $design->findDesign($request->all());
            return Response($designs);
        }
    }

    public function show()
    {
        return view('auth.customer-password');
    }

    public function showCreateBill()
    {
        $cart = Cart::content();
        return view('customers.customerCreateBill', ['cart' => $cart]);
    }

    public function CreateBill(CreateBillsRequest $request)
    {
        $cartInfor = Cart::content();
        $bill = new Bills();
        $bills = $bill->createBill($request->all());
        try {
            if (count($cartInfor) > 0) {
                foreach ($cartInfor as $key => $item) {
                    $billsDetail = new BillsDetails();
                    $billsDetail->bill_id = $bills->id;
                    $billsDetail->product_id = $item->id;
                    $billsDetail->soluong = $item->qty;
                    $billsDetail->dongia = $item->price;
                    $billsDetail->design_id = 1;
                    $billsDetail->save();
                }
            }
            Cart::destroy();
        } catch (Exception $e) {
            echo $e->getMessage();
        }
        return redirect()->route('customer.bills',[ 'id' => $request->customer_id]);
    }

    public function change(ChangePasswordCustomerRequest $request)
    {
        $user = $this->customer->changCustomer($request->all());
        return redirect()->route('customer.alert')->with('alert', 'Thay đổi mật khẩu thành công!');
    }

    public function showBillDetails(Request $request, $id)
    {
        $product = new Products();
        $billsDetail = new BillsDetails();
        $bill = new Bills();
        $products = $product->findProduct($request->all());
        $bills = $bill->getBill($id);
        $billsDetails = $billsDetail->getBillDetails($id);
        // dd($bills);
        return view('customers.customerEditBill', [ 'products' => $products, 'bills' => $bills, 'billsDetails' => $billsDetails ]);
    }

    public function findSP(Request $request)
    {   
        if ($request->ajax()) {
            $product = new Products();
            $products = $product->findProduct($request->all());
            return Response($products);
        }  
    }

    public function storeBillDetails(Request $request)
    {
        $billDetails = new BillsDetails();
        $check = $billDetails->checkBillDetails($request->bill_id, $request->product_id);
        if (count($check) > 0) {
            $billDetails->addqtyBillDetails($request->bill_id, $request->product_id);
        } else {
            $billDetails->createBillDetails($request->all());
        }
        return redirect()->route('customer.show',$request->bill_id);
    }

    public function destroyBillDetails(Request $request)
    {
        $billDetails = new BillsDetails();
        $billDetails->deleteBillDetails($request->id);
        return redirect()->route('customer.show',$request->bill_id);
    }

    public function editBillDetails(Request $request)
    {
        $billDetails = new BillsDetails();
        $billDetails->editBillDetails($request->all());
        return redirect()->route('customer.show',$request->bill_id);
    }

    public function updateBill(CreateBillsRequest $request, $id)
    {
        $bill = new Bills();
        $bills = $bill->updateBill($request->all());
        flash('Sửa đơn hàng thành công.')->success();
        return redirect()->route('customer.bills',[ 'id' => $request->customer_id]);
    }

    public function deleteBill($id)
    {
        $bill = new Bills();
        $bills = $bill->deleteBill($id);
        return Response('Xóa đơn hàng thành công!');
    }
}
