<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreateWarrantyRequest;
use App\Models\Warranty;
use App\Models\Invoice;

class WarrantyController extends Controller
{
    public $warranty;

    public function __construct(Warranty $warranty) {
        $this->middleware('auth');
        $this->warranty = $warranty;
    }

    public function index(Request $request)
    {
        $this->authorize('Q2_4');
        $warranties = $this->warranty->getList($request->all());
        return view('BackEnd.QLDH.warranty', ['warranties' => $warranties]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('Q2_4');
        $invoice = new Invoice;
        $invoices = $invoice->getInvoiceComplete();
        return view('BackEnd.TacVu.CreateWarranty', ['invoices' => $invoices]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateWarrantyRequest $request)
    {
        $this->authorize('Q2_4');
        // dd($request);
        $warranties = $this->warranty->createWarranty($request->all());
        flash('Thêm phiểu bảo hành thành công.')->success();
        return redirect()->route('quanlybaohanh.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $this->authorize('Q2_4');
        $warranties = $this->warranty->getWarranty($id);
        return view('BackEnd.TacVu.EditWarranty', [ 'warranties' => $warranties]);
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
        $this->authorize('Q2_4');
        $warranties = $this->warranty->updateWarranty($request->all());
        flash('Sửa thông tin phiểu bảo hành thành công.')->success();
        return redirect()->route('quanlybaohanh.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        if ($request->ajax()) {
            $warranties = $this->warranty->deleteWarranty($request->all());
            return Response('Xóa phiểu bảo hành thành công!');
        }
    }
}
