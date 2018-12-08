<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reports;

class ReportsController extends Controller
{
    public $report;

    public function __construct(Reports $report) {
        $this->middleware('auth');
        $this->report = $report;
    }

    public function index(Request $request)
    {
        $this->authorize('Q6_3');
        $reports = $this->report->getList($request->all());
        return view('BackEnd.QLHT.reports', ['reports' => $reports]);
    }


    public function create(Request $request)
    {
        $report = $this->report->createReports($request->all());
        flash('Cảm ơn quý khách đã phản hồi cho chúng tôi.')->success();
        return redirect()->route('contact');
    }

    public function destroy($id)
    {
        $this->authorize('Q6_3');
        $this->report->deleteReports($id);
        return redirect()->route('quanlyphanhoi.index');
    }
}
