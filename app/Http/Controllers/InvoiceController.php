<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Invoice;
use App\Models\InvoiceDetails;
use App\Models\Bills;
use App\Models\BillsDetails;

class InvoiceController extends Controller
{
    public $invoice;

    public function __construct(Invoice $invoice) {
        $this->middleware('auth');
        $this->invoice = $invoice;
    }

    public function index(Request $request)
    {
        $this->authorize('Q2_3');
        $invoices = $this->invoice->getList($request->all());
        return view('BackEnd.QLDH.invoice', [ 'invoices' => $invoices]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $detail = new BillsDetails();
        $details = $detail->getBillDetails($request->bill_id);
        $invoices = $this->invoice->createInvoice($request->all());
        try {
            if (count($details) > 0) {
                foreach ($details as $key => $item) {
                    $invoiceDetail = new InvoiceDetails();
                    $invoiceDetail->invoices_id = $invoices->id;
                    $invoiceDetail->product_id = $item->product_id;
                    $invoiceDetail->soluong = $item->soluong;
                    $invoiceDetail->dongia = $item->dongia;
                    $invoiceDetail->save();
                }
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }
        flash('Tạo hóa đơn thành công.')->success();
        return redirect()->route('quanlydonhang.index');
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
        $this->authorize('Q2_3');
        $invoiceDetail = new InvoiceDetails();
        $invoices = $this->invoice->getInvoice($id);
        $invoiceDetails = $invoiceDetail->getInvoiceDetails($id);
        return view('BackEnd.TacVu.EditInvoice', [ 'invoices' => $invoices, 'invoiceDetails' => $invoiceDetails]);
    }

    public function print($id)
    {
        $this->authorize('Q2_3');
        $invoiceDetail = new InvoiceDetails();
        $invoices = $this->invoice->getInvoice($id);
        $invoiceDetails = $invoiceDetail->getInvoiceDetails($id);
        return view('exports.printInvoice', [ 'invoices' => $invoices, 'invoiceDetails' => $invoiceDetails]);
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
        $this->authorize('Q2_3');
        $invoices = $this->invoice->updateInvoice($request->all());
        flash('Sửa hóa đơn thành công.')->success();
        return redirect()->route('quanlyhoadon.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->authorize('Q2_3');
        $invoices = $this->invoice->deleteInvoice($id);
        flash('Xóa hóa đơn thành công.')->success();
        return redirect()->route('quanlyhoadon.index');
    }
}
