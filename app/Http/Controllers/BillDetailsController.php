<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bills;
use App\Models\BillsDetails;

class BillDetailsController extends Controller
{
    public $billDetails;

    public function __construct(BillsDetails $billDetails) {
        $this->middleware('auth');
        $this->billDetails = $billDetails;
    }

    public function store(Request $request)
    {
    	$check = $this->billDetails->checkBillDetails($request->bill_id, $request->product_id);
    	if (count($check) > 0) {
    		$this->billDetails->addqtyBillDetails($request->bill_id, $request->product_id);
    	} else {
    		$this->billDetails->createBillDetails($request->all());
    	}
        return redirect()->route('quanlydonhang.show',$request->bill_id);
    }

    public function destroy(Request $request)
    {
        $this->billDetails->deleteBillDetails($request->id);
        return redirect()->route('quanlydonhang.show',$request->bill_id);
    }

    public function edit(Request $request)
    {
        $this->billDetails->editBillDetails($request->all());
        return redirect()->route('quanlydonhang.show',$request->bill_id);
    }

    public function chooseDesign(Request $request)
    {
        $this->billDetails->editDesign($request->all());
    }

}
