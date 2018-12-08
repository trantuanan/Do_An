<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Helper;
use App\Charts\SampleChart;
use App\Models\User;

class DashboardController extends Controller
{
	public function __construct() {
        $this->middleware('auth');
    }

    public function index()
    {
    	$chart = new SampleChart;
    	$user = new User;
    	$users = $user->getListUser();
    	$vl = DB::select(DB::raw("call doan.dashboard()"));
    	$index = DB::select(DB::raw("call doan.dashboardmoney()"));
    	$a = [];
    	foreach ($index as $key => $value) {
    		$a[Helper::formatDashboard($value->created_at)] = $value->tongtien;
    	}
    	$chart->labels(array_keys($a))->dataset('Doanh thu theo ngày', 'line', array_values($a))->Color('Red');
        return view('BackEnd.Dashboard', ['vl' => $vl, 'chart' => $chart, 'users' => $users]);
    }
}
