<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Http\Requests\CreateCustomerRequest;
use App\Http\Requests\UpdateCustomerRequest;

class CustomerBEController extends Controller
{
    public $customer;

    public function __construct(Customer $customer) {
        $this->middleware('auth');
        $this->customer = $customer;
    }

    public function index(Request $request)
    {
        $this->authorize('Q1_3');
        $customer = $this->customer->getList($request->all());
        return view('BackEnd.QLDM.customers', ['customers' => $customer]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('BackEnd.TacVu.CreateCustomer');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateCustomerRequest $request)
    {
        $customer = $this->customer->createCustomer($request->all());
        flash('Thêm mới khách hàng mới thành công.')->success();
        return redirect()->route('quanlykhachhang.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $customer = $this->customer->getCustomer($id);
        return view('BackEnd.TacVu.EditCustomer')->with('customer', $customer);
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
    public function update(UpdateCustomerRequest $request)
    {
        $this->authorize('Q1_3');        
        $customer = $this->customer->updateCustomer($request->all());
        flash('Sửa thông tin khách hàng thành công.')->success();
        return redirect()->route('quanlykhachhang.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $this->authorize('Q1_3');
        if ($request->ajax()) {
            $customer = $this->customer->deleteCustomer($request->all());
            return Response('Xóa khách hàng thành công!');
        }
    }
}
